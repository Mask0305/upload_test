<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('department', function (Blueprint $table) {
            $table->increments('departmentId');
            $table->integer('educationSystemId');
            $table->Integer('schoolId');
            $table->string('departmentName');
            $table->string('collegeId');
            $table->tinyInteger('isEnabled')->default('0');
            $table->unsignedInteger('searchCount')->default('0');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('department');
    }
}
