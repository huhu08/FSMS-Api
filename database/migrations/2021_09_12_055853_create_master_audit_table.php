<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterAuditTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_audit', function (Blueprint $table) {
            $table->id();
            $table->integer('department_id');
            $table->foreign('department_id')->references('id')->on('departments');

            $table->integer('form_id');
            $table->foreign('form_id')->references('id')->on('forms');


            $table->boolean('Conformity');
            $table->text('note');
            $table->date('date_in');

            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->date('update_date');

            $table->integer('update_user');
            $table->foreign('update_user')->references('updated_at')->on('users');
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
        Schema::dropIfExists('master_audit');
    }
}
