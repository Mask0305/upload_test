<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisciplineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discipline', function (Blueprint $table) {
            $table->increments('disciplineId');
            $table->string('disciplineCode');
            $table->string('disciplineName');
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
        Schema::dropIfExists('discipline');
    }
}
