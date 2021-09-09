<?php

use App\Http\Controllers\AdminCashierController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

if (Auth::check()) {
    Route::get('/', function () {
        return view('auth.login');
    });
} else {
    //For Staff
    Route::prefix('/staff')->middleware('auth', 'revalidate')->group(function () {
        Route::get('/home', function () {
            return view('Backend.Dashboard.staff_dashboard');
        });
        Route::get('/report/individual', [ReportController::class, 'individualReport']);
    });

    // For Admin
    Route::prefix('/admin')->middleware('auth', 'adminauth', 'revalidate')->group(function () {
        Route::get('/home', function () {
            return view('Backend.Dashboard.admin_dashboard');
        });
        Route::resource('/users', UsersController::class);
        Route::resource('/stock', StockController::class);
        Route::get('/stock/quantity/{id}', [StockController::class, 'editStock']);
        Route::put('/stock/quantity/{id}', [StockController::class, 'addStock']);
        Route::resource('/client', ClientController::class);
        Route::resource('/category', CategoryController::class);
        //Reciept Controller Routes
        Route::get('/report', [ReportController::class, 'Index']);
        Route::get('/report/{id}', [ReportController::class, 'getReportByID']);
        Route::delete('/report/delete/{productId}', [ReportController::class, 'deleteSoldProduct']);
        Route::get('/report/edit/{productId}', [ReportController::class, 'editSoldProduct']);
        Route::put('/report/update/{productId}', [ReportController::class, 'updateSoldProduct']);
        Route::get('/report/list', [ReportController::class, 'getReport']);
        Route::get('/history', [ReportController::class, 'reportHistory']); // Report History
        Route::get('/cashier', [CashierController::class, 'adminCashier']);
    });
    Route::middleware('auth', 'revalidate')->group(function () {
        //Cashier Controller Routes
        Route::get('/cashier', [CashierController::class, 'index']);
        Route::post('/cashier/order', [CashierController::class, 'orderProduct']);
        Route::post('/cashier/confirmOrder', [CashierController::class, 'confirmOrder']);
        Route::post('/cashier/savePayment', [CashierController::class, 'savePayment']);
        Route::get('/admin/cashier/showReceipt/{saleID}', [CashierController::class, 'showReceipt']);
        Route::post('/cashier/deleteDetail', [CashierController::class, 'deleteDetail']);
        Route::get('/cashier/getMenuByCategory/{category_id}', [CashierController::class, 'getMenuByCategory']);
    });

    //Incorrect Url
    Route::get('/{path?}', function ($path = null) {
        if (Auth::check() == true && Auth::user()->role == "admin") {
            return redirect('/admin/home');
        } else {
            return redirect('/staff/home');
        }
    })->where('path', '.*');
}
