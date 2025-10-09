<?php

namespace Modules\Employee\Database\Seeders\Employee;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                  $employees = [
            [
                'id' => 1,
                'branch_id' => 1,
                'is_saudi' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'branch_id' => 1,
                'is_saudi' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'branch_id' => 2,
                'is_saudi' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($employees as $employee) {
            DB::table('employees')->updateOrInsert(
                ['id' => $employee['id']],
                $employee
            );
        }
    }
}
