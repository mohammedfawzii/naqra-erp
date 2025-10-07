<?php

namespace Modules\Facilities\Database\Seeders\User;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'userName' => 'Sample userName 1',
                'fullName' => 'Sample fullName 1',
                'email' => 'user1@example.com',
                'phone' => '010100001',
                'password' => Hash::make('password123'),
                'is_fully_verified' => true,
                'google_id' => null,
            ],
            [
                'userName' => 'Sample userName 2',
                'fullName' => 'Sample fullName 2',
                'email' => 'user2@example.com',
                'phone' => '010100002',
                'password' => Hash::make('password123'),
                'is_fully_verified' => false,
                'google_id' => null,
            ],
            [
                'userName' => 'Sample userName 3',
                'fullName' => 'Sample fullName 3',
                'email' => 'user3@example.com',
                'phone' => '010100003',
                'password' => Hash::make('password123'),
                'is_fully_verified' => true,
                'google_id' => null,
            ],
            [
                'userName' => 'Sample userName 4',
                'fullName' => 'Sample fullName 4',
                'email' => 'user4@example.com',
                'phone' => '010100004',
                'password' => Hash::make('password123'),
                'is_fully_verified' => false,
                'google_id' => null,
            ],
            [
                'userName' => 'Sample userName 5',
                'fullName' => 'Sample fullName 5',
                'email' => 'user5@example.com',
                'phone' => '010100005',
                'password' => Hash::make('password123'),
                'is_fully_verified' => true,
                'google_id' => null,
            ],
        ];

        foreach ($users as $user) {
            User::firstOrCreate(
                ['email' => $user['email']], // unique field
                $user
            );
        }
    }
}
