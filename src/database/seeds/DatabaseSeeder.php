<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(InterestsTableSeeder::class);
        $this->call(ProjectsInterestsTableSeeder::class);
        $this->call(ProjectsTableSeeder::class);
        $this->call(UsersInterestsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
