<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_projects', function (Blueprint $table) {
            $table->integer('user_id');
            $table->integer('project_id');
            // Use the natural composite key as primary (user_id, project_id)
            $table->primary(['user_id', 'project_id']);

            // TODO: Use own table for permissions eventually..?
            $table->enum('permission',
                ['readonly', 'owner'])->default('readonly');
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
        Schema::dropIfExists('users_projects');
    }
}
