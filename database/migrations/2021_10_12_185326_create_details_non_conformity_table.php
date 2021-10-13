<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsNonConformityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details_non_conformity', function (Blueprint $table) {
            $table->id();
            
            $table->bigInteger('non_conformity_id')->unsigned()->nullable();
            $table->foreign('non_conformity_id')->references('id')->on('master_non_conformity');
            $table->string('description');
            $table->string('action');
            $table->string('descions');
            $table->string('problem_casuses');
            $table->date('apply_date');


            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
    
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
        Schema::dropIfExists('details_non_conformity');
    }
}
