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
            $table->string('homework_score')->nullable();
            $table->string('classwork_score')->nullable();
            $table->string('welcome_test_score')->nullable();
            $table->string('note_score')->nullable();
            $table->string('test_score');
            $table->string('exam');
            //Todo: This(topics) should be removed in the future into a separate table
            $table->string('topics');
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
