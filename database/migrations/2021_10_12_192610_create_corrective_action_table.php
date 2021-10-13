<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorrectiveActionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corrective_action', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('non_conformity_id')->unsigned()->nullable();
            $table->foreign('non_conformity_id')->references('id')->on('master_non_conformity');
            $table->boolean('request_review');
            $table->boolean('corrective_action');
            $table->boolean('preventive_action');
            $table->string('note');
        
            $table->bigInteger('quality_office_id')->unsigned()->nullable();
            $table->foreign('quality_office_id')->references('id')->on('users'); 

            $table->date('entered_date');
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
        Schema::dropIfExists('corrective_action');
    }
}
