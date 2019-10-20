<?php

use Illuminate\Database\Seeder;

class InterestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('interests')->insert(['name' => 'Python']);
        DB::table('interests')->insert(['name' => 'C#']);
        DB::table('interests')->insert(['name' => 'VB']);
        DB::table('interests')->insert(['name' => 'PHP']);
        DB::table('interests')->insert(['name' => 'Java']);
        DB::table('interests')->insert(['name' => 'JavaScript']);
        DB::table('interests')->insert(['name' => 'F#']);
        DB::table('interests')->insert(['name' => 'C']);
        DB::table('interests')->insert(['name' => 'C++']);
        DB::table('interests')->insert(['name' => 'Assembly']);
        DB::table('interests')->insert(['name' => 'Boxing']);
        DB::table('interests')->insert(['name' => 'Politics']);
        DB::table('interests')->insert(['name' => 'Cosplay']);
    }
}
