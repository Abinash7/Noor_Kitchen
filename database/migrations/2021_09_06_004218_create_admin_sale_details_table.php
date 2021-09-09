<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminSaleDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_sale_details', function (Blueprint $table) {
            $table->id();
            $table->integer('sale_id');
            $table->integer('product_id');
            $table->string('product_name');
            $table->double('product_price');
            $table->integer('quantity');
            $table->string('status')->default('notConfirmed');
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
        Schema::dropIfExists('admin_sale_details');
    }
}
