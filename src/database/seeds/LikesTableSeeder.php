<?php

use Illuminate\Database\Seeder;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // SQL-join command to verify:
        // select users.name, projects.name, likes.liked_by_user, likes.liked_by_project from users join likes on users.id = likes.user_id join projects on likes.project_id = projects.id;

        DB::table('likes')->insert([
            'user_id' => 1,
            'project_id' => 3,
            'liked_by_user' => true,
            'liked_by_project' => false,
        ]);

        DB::table('likes')->insert([
            'user_id' => 2,
            'project_id' => 1,
            'liked_by_user' => true,
            'liked_by_project' => true,
        ]);

        DB::table('likes')->insert([
            'user_id' => 3,
            'project_id' => 4,
            'liked_by_user' => false,
            'liked_by_project' => true,
        ]);
    }
}
