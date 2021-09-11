<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('user_name');
            $table->string('vehicle_number');
            $table->unsignedBigInteger('customer_id')->nullable(); 
            $table->decimal('total_price')->default(0);
            $table->decimal('total_received')->default(0);
            $table->decimal('change')->default(0);
            $table->string('payment_type')->default('cash');
            $table->string('sale_status')->default("unpaid");
            $table->foreign('customer_id')->on('clients')->references('id')->onDelete('SET NULL');
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
        Schema::dropIfExists('sales');
    }
}
