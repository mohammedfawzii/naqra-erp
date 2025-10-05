<?php

namespace Modules\Facilities\Database\Seeders\User;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
        public function run(): void
        {
                User::firstOrCreate(
                        ['email' => 'user1@example.com'], // unique key
                        [
                                'userName' => 'Sample userName 1',
                                'fullName' => 'Sample fullName 1',
                                'password' => bcrypt('password123'),
                                'mobileNumber' => '010100001',
                                'securityQuestion_id' => 1,
                                'security_answer' => 'Sample security_answer 1',
                                'gender' => 'Female',
                                'nationality_id' => 1,
                                'language_id' => 1,
                                'termsAccepted' => true,
                        ]
                );

                User::firstOrCreate(
                        ['email' => 'user2@example.com'],
                        [
                                'userName' => 'Sample userName 2',
                                'fullName' => 'Sample fullName 2',
                                'password' => bcrypt('password123'),
                                'mobileNumber' => '010100002',
                                'securityQuestion_id' => 2,
                                'security_answer' => 'Sample security_answer 2',
                                'gender' => 'Male',
                                'nationality_id' => 2,
                                'language_id' => 2,
                                'termsAccepted' => true,
                        ]
                );

                User::firstOrCreate(
                        ['email' => 'user3@example.com'],
                        [
                                'userName' => 'Sample userName 3',
                                'fullName' => 'Sample fullName 3',
                                'password' => bcrypt('password123'),
                                'mobileNumber' => '010100003',
                                'securityQuestion_id' => 3,
                                'security_answer' => 'Sample security_answer 3',
                                'gender' => 'Female',
                                'nationality_id' => 3,
                                'language_id' => 3,
                                'termsAccepted' => false,
                        ]
                );

                User::firstOrCreate(
                        ['email' => 'user4@example.com'],
                        [
                                'userName' => 'Sample userName 4',
                                'fullName' => 'Sample fullName 4',
                                'password' => bcrypt('password123'),
                                'mobileNumber' => '010100004',
                                'securityQuestion_id' => 4,
                                'security_answer' => 'Sample security_answer 4',
                                'gender' => 'Male',
                                'nationality_id' => 4,
                                'language_id' => 4,
                                'termsAccepted' => true,
                        ]
                );

                User::firstOrCreate(
                        ['email' => 'user5@example.com'],
                        [
                                'userName' => 'Sample userName 5',
                                'fullName' => 'Sample fullName 5',
                                'password' => bcrypt('password123'),
                                'mobileNumber' => '010100005',
                                'securityQuestion_id' => 5,
                                'security_answer' => 'Sample security_answer 5',
                                'gender' => 'Female',
                                'nationality_id' => 5,
                                'language_id' => 5,
                                'termsAccepted' => true,
                        ]
                );
        }
}
