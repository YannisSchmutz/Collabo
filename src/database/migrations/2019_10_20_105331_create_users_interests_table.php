<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersInterestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_interests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('interest_id');
            $table->integer('user_id');
            //$table->index(['user_id', 'interest_id']);
            $table->integer('skill_level');
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
        Schema::dropIfExists('users_interests');
    }
}
