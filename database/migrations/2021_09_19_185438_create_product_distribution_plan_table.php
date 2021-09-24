<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDistributionPlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_distribution_plan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('machine_id')->unsigned()->nullable();
            $table->foreign('machine_id')->references('id')->on('machines_lists');
            
            $table->string('brand');
            $table->integer('quantity');
            $table->string('comments')->nullable();
            $table->float('stop_time');
           
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
        Schema::dropIfExists('product_distribution_plan');
    }
}
