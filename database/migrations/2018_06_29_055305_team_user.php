<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TeamUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('teams', function (Blueprint $table){
            $table->increments('id');
            $table->string('team_name');
            $table->timestamps();
        });

        Schema::create('departments', function (Blueprint $table){
           $table->increments('id');
           $table->string('department_name');
           $table->string('department_abbr');
           $table->text('department_info');
           $table->timestamps();
        });

        Schema::create('users_departments', function (Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('department_id');
            $table->unsignedInteger('user_id');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });


        Schema::create('users_teams', function (Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('team_id');
            $table->unsignedInteger('user_id');
            $table->timestamps();

            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
        Schema::create('users_teams_moderators', function (Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('team_id');
            $table->unsignedInteger('user_id');
            $table->timestamps();

            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
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
        schema::dropIfExists('users_teams_moderators');
        schema::dropIfExists('teams');
        Schema::dropIfExists('departments');
        schema::dropIfExists('users_teams');
        Schema::dropIfExists('users_departments');
        schema::dropIfExists('departments_teams');


    }
}
