<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
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
            $table->string('user_id');
            $table->string('age');
            $table->string('gender');
            $table->string('phone')->unique();
            $table->string('parents_guidians_name')->nullable();
            $table->string('parents_guidians_phone')->nullable();
            $table->string('address');
            $table->string('state');
            $table->string('city');
            $table->string('country');
            $table->string('avatar')->nullable();
            $table->string('heallth_information')->nullable();
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
