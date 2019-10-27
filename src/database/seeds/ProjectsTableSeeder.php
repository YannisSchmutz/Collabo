<?php

use Illuminate\Database\Seeder;


class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([
            'name' => 'SuperDuper AI project',
            'pitch' => 'Invest now',
            'description' => 'Some description',
            'project_picture' => 'pictures/ai.jpg',
        ]);
        DB::table('projects')->insert([
            'name' => 'Boxing workshops',
            'pitch' => 'Invest now',
            'description' => 'Some description',
            'project_picture' => 'pictures/boxing.jpg',
        ]);
        DB::table('projects')->insert([
            'name' => 'SuperDuper Security project',
            'pitch' => 'Invest now',
            'description' => 'Some description',
            'project_picture' => 'pictures/security.jpg',
        ]);
        DB::table('projects')->insert([
            'name' => 'Political workshops',
            'pitch' => 'Invest now',
            'description' => 'Some description',
            'project_picture' => 'pictures/general_placeholder.png',
        ]);
        DB::table('projects')->insert([
            'name' => 'SuperDuper VR project',
            'pitch' => 'Invest now',
            'description' => 'Some description',
            'project_picture' => 'pictures/vr.jpg',
        ]);
        DB::table('projects')->insert([
            'name' => 'Cosplay workshops',
            'pitch' => 'Invest now',
            'description' => 'Some description',
            'project_picture' => 'pictures/general_placeholder.png',
        ]);
    }
}
