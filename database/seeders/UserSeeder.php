<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'name' => 'user1',
                'email' => 'user1@user1.com',
                'password' => bcrypt('12345678'),
                'role' => 'student'
            ],
            [
                'name' => 'user2',
                'email' => 'user2@user2.com',
                'password' => bcrypt('12345678'),
                'role' => 'instructor'
            ],
        ];

        User::insert($user);
    }
}
