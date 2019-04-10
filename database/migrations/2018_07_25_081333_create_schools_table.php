<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->increments('school_id');
            $table->string('title');
            $table->string('user_id');
            $table->string('status_id');
            $table->string('slug');
            $table->string('address');
            $table->string('phones')->nullable();
            $table->string('emails')->nullable();
            $table->string('description');
            $table->string('media')->nullable();
            $table->string('instructors')->nullable();
            $table->string('what_you_get')->nullable();
            $table->string('why_choosing');
            $table->string('_token')->nullable();
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
        Schema::dropIfExists('schools');
    }
}
