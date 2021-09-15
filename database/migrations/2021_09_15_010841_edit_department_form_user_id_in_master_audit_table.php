<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditDepartmentFormUserIdInMasterAuditTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('master_audit', function (Blueprint $table) {
            $table->bigInteger('department_id')->unsigned()->nullable()->change();
            $table->bigInteger('form_id')->unsigned()->nullable()->change();
            $table->bigInteger('user_id')->unsigned()->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('master_audit', function (Blueprint $table) {
            //
        });
    }
}
