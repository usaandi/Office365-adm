<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserHobbies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('hobbies', function (Blueprint $table){
           $table->increments('id');
           $table->text('name');
           $table->timestamps();
        });

        Schema::create('users_hobbies', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('hobby_id');
            $table->timestamps();

            $table->foreign('hobby_id')->references('id')->on('hobbies')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hobbies');
        Schema::dropIfExists('users_hobbies');
    }
}
