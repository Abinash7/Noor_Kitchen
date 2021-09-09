<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    public function index()
    {
        $data = User::orderBy('created_at','DESC')->paginate(5);
        return view('Backend.User.list')->with('users', $data);
    }

    public function create()
    {
        return view('Backend.User.create');
    }

    public function store(Request $request)
    {
        $user = User::create($this->userValidation($request->all()));
        $user->role = 'staff';
        $user->password = Hash::make($user->password);
        $user->save();
        return redirect()->route('users.index')->with('message',"User Created Successfully !!!");
    }

    public function edit(user $user)
    {
        return view('Backend.User.edit')->with('users', $user);
    }

    public function update(Request $request, user $user)
    {
        $user->update($this->userUpdateValidation($request->all()));
        return redirect()->route('users.index')->with('message',"User Updated Successfully !!!");
    }

    public function destroy(user $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('message',"User Deleted Successfully !!!");
    }

    private function userValidation()
    {
        return request()->validate([
            'full_name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'contact_number' => 'required|numeric',
            'address' => 'required|string',
            'vehicle_number' => 'required|string',
            'password' => 'required|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!@$#%]).*$/',
            'staff_id'=>'sometimes|string'
        ]);
    }

    private function userUpdateValidation()
    {
        return request()->validate([
            'full_name' => 'required|string',
            'email' => 'required|email',
            'contact_number' => 'required|numeric',
            'address' => 'required|string',
            'vehicle_number' => 'required|string',
            'staff_id'=>'sometimes|string'
        ]);
    }
}
