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
      $this->call(EmployeeSeeder::class);
        // $this->call(EmployeeAccount\EmployeeAccountSeeder::class);
        // $this->call(EmployeeHoliday\EmployeeHolidaySeeder::class);
        // $this->call(AttendanceEmployee\AttendanceEmployeeSeeder::class);
        // $this->call(EmployeeOtherEntitlement\EmployeeOtherEntitlementSeeder::class);
        // $this->call(EmployeeAllowance\EmployeeAllowanceSeeder::class);
        // $this->call(EmployeeFinancialEntitlement\EmployeeFinancialEntitlementSeeder::class);
        // $this->call(EmployeeMedicalRecord\EmployeeMedicalRecordSeeder::class);
        // $this->call(EmployeeContact\EmployeeContactSeeder::class);
       
     
          $this->call([
            ColumnsSeeder::class,
            InfoSeeder::class,
            BaseInformationEmployeeSeeder::class,
            // EmployeeAddress\EmployeeAddressSeeder::class,
            // EmployeeDebendent\EmployeeDebendentSeeder::class,
            // PersonalInformationEmployee\PersonalInformationEmployeeSeeder::class
          ]);
        // $this->call(EmployeeQualification\EmployeeQualificationSeeder::class);
        // $this->call(EmployeeCourse\EmployeeCourseSeeder::class);
        // $this->call(EmployeeSkill\EmployeeSkillSeeder::class);
        // $this->call(EmployeeLanguage\EmployeeLanguageSeeder::class);
        // $this->call(EmployeeExperience\EmployeeExperienceSeeder::class);
 
        
    }
}
