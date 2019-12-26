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
            $table->integer('interest_id');
            $table->integer('project_id');
            // Use the natural composite key as primary (project_id, interest_id)
            $table->primary(['project_id', 'interest_id']);
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
