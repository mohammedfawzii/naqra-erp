<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\CmsErp\Database\Seeders\CmsErpDatabaseSeeder;
use Modules\Payroll\Database\Seeders\PayrollDatabaseSeeder;
use Modules\Employee\Database\Seeders\EmployeeDatabaseSeeder;
use Modules\Training\Database\Seeders\TrainingDatabaseSeeder;
use Modules\Facilities\Database\Seeders\FacilitiesDatabaseSeeder;
use Modules\Performance\Database\Seeders\PerformanceDatabaseSeeder;
use Modules\Recruitment\Database\Seeders\RecruitmentDatabaseSeeder;
use Modules\AttendanceTracking\Database\Seeders\AttendanceTrackingDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CmsErpDatabaseSeeder::class,
            FacilitiesDatabaseSeeder::class,
            EmployeeDatabaseSeeder::class,
            PayrollDatabaseSeeder::class,
            AttendanceTrackingDatabaseSeeder::class,
            // RecruitmentDatabaseSeeder::class,
            PerformanceDatabaseSeeder::class,
            TrainingDatabaseSeeder::class
        ]);

    }
}
