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
            //'owner_id' => 1,
        ]);
        DB::table('projects')->insert([
            'name' => 'Boxing workshops',
            'pitch' => 'Invest now',
            'description' => 'Some description',
            //'owner_id' => 1,
        ]);
        DB::table('projects')->insert([
            'name' => 'SuperDuper Security project',
            'pitch' => 'Invest now',
            'description' => 'Some description',
            //'owner_id' => 2,
        ]);
        DB::table('projects')->insert([
            'name' => 'Political workshops',
            'pitch' => 'Invest now',
            'description' => 'Some description',
            //'owner_id' => 2,
        ]);
        DB::table('projects')->insert([
            'name' => 'SuperDuper VR project',
            'pitch' => 'Invest now',
            'description' => 'Some description',
            //'owner_id' => 3,
        ]);
        DB::table('projects')->insert([
            'name' => 'Cosplay workshops',
            'pitch' => 'Invest now',
            'description' => 'Some description',
            //'owner_id' => 3,
        ]);
    }
}
