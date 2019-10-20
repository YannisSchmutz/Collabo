<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsInterestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects_interests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('interest_id');
            $table->integer('project_id');
            // TODO: User the natural composite key as primary (user_id, interest_id)
            //$table->index(['project_id', 'interest_id']);
            //$table->integer('skill_level');
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
        Schema::dropIfExists('projects_interests');
    }
}
