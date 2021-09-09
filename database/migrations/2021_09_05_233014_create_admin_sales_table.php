<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_sales', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('user_name');
            $table->string('vehicle_number');
            $table->string('customer_name')->nullable();
            $table->string('customer_number')->nullable();
            $table->decimal('total_price')->default(0);
            $table->decimal('total_received')->default(0);
            $table->decimal('change')->default(0);
            $table->string('sale_status')->default("unpaid");
            $table->bigInteger('customer_vat')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_sales');
    }
}
