<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProceduresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procedures', function (Blueprint $table) {
            $table->id();
            $table->string('Procedure_name');
            // $table->UnsignedBigInteger('Department_id');
            $table->foreignId('Department_id')->nullable()->constrained();
           // $table->foreignId('User_id')->nullable()->constrained();
            
        

            $table->timestamps();
        });
        // Schema::table('procedures', function (Blueprint $table) {
            
        // });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('procedures');
    }
}
