<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_requests', function (Blueprint $table) {
            $table->id();
            $table->string('brand_name');
            $table->integer('quantity');

            $table->bigInteger('unit_id')->unsigned()->nullable();
            $table->foreign('unit_id')->references('id')->on('units');

            $table->bigInteger('recived_by_id')->unsigned()->nullable();
            $table->foreign('recived_by_id')->references('id')->on('users');
    
            $table->integer('update_user')->nullable();
            $table->integer('status')->nullable();
    
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
        Schema::dropIfExists('products_requests');
    }
}
