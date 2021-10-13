<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterNonConformityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_non_conformity', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('department_id')->unsigned()->nullable();
            $table->foreign('department_id')->references('id')->on('departments');

            $table->bigInteger('non_conformity_status_id')->unsigned()->nullable();
            $table->foreign('non_conformity_status_id')->references('id')->on('non_conformity_status');
            $table->string('auditor_name');
            $table->string('job');
            $table->string('responsible_by');
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
        Schema::dropIfExists('master_non_conformity');
    }
}
