<?php

namespace Modules\Employee\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Employee\Database\Seeders\BaseInformationEmployee\BaseInformationEmployeeSeeder;
use Modules\Employee\Database\Seeders\Employee\EmployeeSeeder;

class EmployeeDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     
          $this->call([
            EmployeeSeeder::class,
            ColumnsSeeder::class,
            InfoSeeder::class,
            BaseInformationEmployeeSeeder::class,
            EmployeeAddress\EmployeeAddressSeeder::class,
            EmployeeDebendent\EmployeeDebendentSeeder::class,
            PersonalInformationEmployee\PersonalInformationEmployeeSeeder::class
          ]);
 
        
    }
}
