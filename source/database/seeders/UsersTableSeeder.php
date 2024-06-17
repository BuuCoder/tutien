<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'John Doe',
                'user_name' => 'johndoe',
                'email' => 'majinbuuu113@gmail.com',
                'password' => Hash::make('password123'),
                'points' => 100,
                'money' => 1000,
                'system_id' => 1,
                'level_id' => 1,
                'created_at' => time(),
                'updated_at' => time(),
                'last_login' => 0
            ],
            [
                'name' => 'Jane Smith',
                'user_name' => 'janesmith',
                'email' => 'janesmith@example.com',
                'password' => Hash::make('password123'),
                'points' => 150,
                'money' => 1200,
                'system_id' => 2,
                'level_id' => 2,
                'created_at' => time(),
                'updated_at' => time(),
                'last_login' => 0
            ]
        ]);
    }
}
