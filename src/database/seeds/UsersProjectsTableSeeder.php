<?php

use Illuminate\Database\Seeder;

class UsersProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // SQL-join command to verify:
        // select users.name, projects.name, users_projects.permission from users join users_projects on users.id = users_projects.user_id join projects on users_projects.project_id = projects.id;

        // **** Yannis ****
        DB::table('users_projects')->insert([
            'user_id' => 1,
            'project_id' => 1,
            'permission' => "owner",
        ]);
        DB::table('users_projects')->insert([
            'user_id' => 1,
            'project_id' => 2,
            'permission' => "owner",
        ]);
        DB::table('users_projects')->insert([
            'user_id' => 1,
            'project_id' => 5,
            'permission' => "readonly",
        ]);
        // ***************

        // **** Gian ****
        DB::table('users_projects')->insert([
            'user_id' => 2,
            'project_id' => 3,
            'permission' => "owner",
        ]);
        DB::table('users_projects')->insert([
            'user_id' => 2,
            'project_id' => 4,
            'permission' => "owner",
        ]);
        DB::table('users_projects')->insert([
            'user_id' => 2,
            'project_id' => 6,
            'permission' => "readonly",
        ]);
        // ***************

        // **** Kevin ****
        DB::table('users_projects')->insert([
            'user_id' => 3,
            'project_id' => 5,
            'permission' => "owner",
        ]);
        DB::table('users_projects')->insert([
            'user_id' => 3,
            'project_id' => 6,
            'permission' => "owner",
        ]);
        DB::table('users_projects')->insert([
            'user_id' => 3,
            'project_id' => 2,
            'permission' => "readonly",
        ]);
        // ***************
    }
}
