<?php

use Illuminate\Database\Seeder;

class UsersInterestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // SQL-join command to verify:
        // select users.name, interests.name, users_interests.skill_level from users join users_interests on users.id = users_interests.user_id join interests on interests.id = users_interests.interest_id;

        // TODO: Delete duplicated entry!
        DB::table('users_interests')->insert([
            'user_id' => 1,
            'interest_id' => 1,
        ]);
        DB::table('users_interests')->insert([
            'user_id' => 1,
            'interest_id' => 4,
        ]);
        DB::table('users_interests')->insert([
            'user_id' => 1,
            'interest_id' => 5,
        ]);
        DB::table('users_interests')->insert([
            'user_id' => 1,
            'interest_id' => 11,
        ]);

        DB::table('users_interests')->insert([
            'user_id' => 2,
            'interest_id' => 2,
        ]);
        DB::table('users_interests')->insert([
            'user_id' => 2,
            'interest_id' => 4,
        ]);
        DB::table('users_interests')->insert([
            'user_id' => 2,
            'interest_id' => 5,
        ]);
        DB::table('users_interests')->insert([
            'user_id' => 2,
            'interest_id' => 12,
        ]);

        DB::table('users_interests')->insert([
            'user_id' => 3,
            'interest_id' => 3,
        ]);
        DB::table('users_interests')->insert([
            'user_id' => 3,
            'interest_id' => 4,
        ]);
        DB::table('users_interests')->insert([
            'user_id' => 3,
            'interest_id' => 5,
        ]);
        DB::table('users_interests')->insert([
            'user_id' => 3,
            'interest_id' => 13,
        ]);
    }
}
