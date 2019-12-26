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
            'name' => 'Yannis Schmutz',
            'caption' => 'ML | Python | Boxing',
            'email' => 'yannis@schmutz.com',
            'password' => bcrypt('12345678'),
            'pitch' => 'Yannis pitch',
            'description' => 'Yannis description',
            'profile_picture' => '/pictures/yannis.jpg',
        ]);
        DB::table('users')->insert([
            'name' => 'Gian Demarmels',
            'caption' => 'Security | F# | Functional Programming',
            'email' => 'admin',
            'password' => bcrypt('supersecret!'),
            'pitch' => 'Gian pitch',
            'description' => 'Gian description',
            'profile_picture' => '/pictures/gian.png',
        ]);
        DB::table('users')->insert([
            'name' => 'Kevin Riesen',
            'caption' => 'VR | Gaming',
            'email' => 'kevin@riesen.com',
            'password' => bcrypt('12345678'),
            'pitch' => 'Kevin pitch',
            'description' => 'Kevin description',
            'profile_picture' => '/pictures/kevin.png',
        ]);
    }
}
