<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Profiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('profile_id');
            $table->string('age');
            $table->string('student_phone')->unique();
            $table->string('parents_guidians_name');
            $table->string('parents_guidians_phone');
            $table->string('address');
            $table->string('state_region');
            $table->string('city');
            $table->string('country');
            $table->string('avatar');
            $table->string('heallth_information');
            $table->string('class');
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
        Schema::dropIfExists('users');
    }
}
