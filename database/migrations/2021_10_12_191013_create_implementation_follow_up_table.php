<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImplementationFollowUpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('implementation_follow_up', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('non_conformity_id')->unsigned()->nullable();
            $table->foreign('non_conformity_id')->references('id')->on('master_non_conformity');
            $table->boolean('follow_up');
            $table->string('causes');
            $table->string('job');
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
        Schema::dropIfExists('implementation_follow_up');
    }
}
