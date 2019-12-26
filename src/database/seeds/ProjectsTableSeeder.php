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
            'caption' => 'Change the AI world of tomorrow',
            'pitch' => 'Invest now',
            'description' => 'Some description',
            'project_picture' => '/pictures/ai.jpg',
        ]);
        DB::table('projects')->insert([
            'name' => 'Boxing workshops',
            'caption' => 'Hit fast, hit hard!',
            'pitch' => 'Invest now',
            'description' => 'Some description',
            'project_picture' => '/pictures/boxing.jpg',
        ]);
        DB::table('projects')->insert([
            'name' => 'SuperDuper Security project',
            'caption' => 'Secure the the IT world together',
            'pitch' => 'Invest now',
            'description' => 'Some description',
            'project_picture' => '/pictures/security.jpg',
        ]);
        DB::table('projects')->insert([
            'name' => 'Political workshops',
            'caption' => 'Faust hoch!',
            'pitch' => 'Invest now',
            'description' => 'Some description',
            'project_picture' => '/pictures/general_placeholder.png',
        ]);
        DB::table('projects')->insert([
            'name' => 'SuperDuper VR project',
            'caption' => 'Change the reality of tomorrow',
            'pitch' => 'Invest now',
            'description' => 'Some description',
            'project_picture' => '/pictures/vr.jpg',
        ]);
        DB::table('projects')->insert([
            'name' => 'Cosplay workshops',
            'caption' => 'Fantasy FTW',
            'pitch' => 'Invest now',
            'description' => 'Some description',
            'project_picture' => '/pictures/general_placeholder.png',
        ]);
    }
}
