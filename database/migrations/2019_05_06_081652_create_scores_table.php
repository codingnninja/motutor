<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->increments('score_id');
            $table->string('subject_id');
            $table->string('student_id');
            $table->string('term');
            $table->string('homework')->nullable();
            $table->string('classwork')->nullable();
            $table->string('welcome_test')->nullable();
            $table->string('continues_assessement_test');
            $table->string('exam');
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
        Schema::dropIfExists('scores');
    }
}
