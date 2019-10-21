<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // TODO: Add timestamps
        DB::table('users')->insert([
            'name' => 'Yannis',
            'surname' => 'Schmutz',
            'email' => 'yannis@schmutz.com',
            'password' => bcrypt('12345678'),
            'pitch' => 'Yannis pitch',
            'description' => 'Yannis description',
        ]);
        DB::table('users')->insert([
            'name' => 'Gian',
            'surname' => 'Demarmels',
            'email' => 'gian@demarmels.com',
            'password' => bcrypt('12345678'),
            'pitch' => 'Gian pitch',
            'description' => 'Gian description',
        ]);
        DB::table('users')->insert([
            'name' => 'Kevin',
            'surname' => 'Riesen',
            'email' => 'kevin@riesen.com',
            'password' => bcrypt('12345678'),
            'pitch' => 'Kevin pitch',
            'description' => 'Kevin description',
        ]);
    }
}
