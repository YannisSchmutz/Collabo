<?php

use Illuminate\Database\Seeder;

class ProjectsInterestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // SQL-join command to verify:
        // select projects.name, interests.name, projects_interests.skill_level from projects join projects_interests on projects.id = projects_interests.project_id join interests on interests.id = projects_interests.interest_id;


        DB::table('projects_interests')->insert([
            'project_id' => 1,
            'interest_id' => 1,
            //'skill_level' => 3,
        ]);
        DB::table('projects_interests')->insert([
            'project_id' => 1,
            'interest_id' => 14,
            //'skill_level' => 3,
        ]);

        DB::table('projects_interests')->insert([
            'project_id' => 2,
            'interest_id' => 11,
            //'skill_level' => 1,
        ]);
    }
}
