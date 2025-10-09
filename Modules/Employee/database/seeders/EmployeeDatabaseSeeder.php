<?php

namespace Modules\Employee\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Employee\Database\Seeders\Employee\EmployeeSeeder;
use Modules\Employee\Database\Seeders\EmployeeSkill\EmployeeSkillSeeder;
use Modules\Employee\Database\Seeders\EmployeeCourse\EmployeeCourseSeeder;
use Modules\Employee\Database\Seeders\EmployeeAccount\EmployeeAccountSeeder;
use Modules\Employee\Database\Seeders\EmployeeAddress\EmployeeAddressSeeder;
use Modules\Employee\Database\Seeders\EmployeeContact\EmployeeContactSeeder;
use Modules\Employee\Database\Seeders\EmployeeHoliday\EmployeeHolidaySeeder;
use Modules\Employee\Database\Seeders\EmployeeLanguage\EmployeeLanguageSeeder;
use Modules\Employee\Database\Seeders\EmployeeAllowance\EmployeeAllowanceSeeder;
use Modules\Employee\Database\Seeders\EmployeeDebendent\EmployeeDebendentSeeder;
use Modules\Employee\Database\Seeders\AttendanceEmployee\AttendanceEmployeeSeeder;
use Modules\Employee\Database\Seeders\EmployeeExperience\EmployeeExperienceSeeder;
use Modules\Employee\Database\Seeders\EmployeeMedicalRecord\EmployeeMedicalRecordSeeder;
use Modules\Employee\Database\Seeders\EmployeeQualification\EmployeeQualificationSeeder;
use Modules\Employee\Database\Seeders\BaseInformationEmployee\BaseInformationEmployeeSeeder;
use Modules\Employee\Database\Seeders\EmployeeOtherEntitlement\EmployeeOtherEntitlementSeeder;
use Modules\Employee\Database\Seeders\PersonalInformationEmployee\PersonalInformationEmployeeSeeder;
use Modules\Employee\Database\Seeders\EmployeeFinancialEntitlement\EmployeeFinancialEntitlementSeeder;

class EmployeeDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $this->call(EmployeeSeeder::class);
          $this->call([
            ColumnsSeeder::class,
            InfoSeeder::class,
            BaseInformationEmployeeSeeder::class,
            PersonalInformationEmployeeSeeder::class,
            EmployeeDebendentSeeder::class,
            EmployeeAddressSeeder::class,
            EmployeeExperienceSeeder::class,
            EmployeeLanguageSeeder::class,
            EmployeeSkillSeeder::class,
            EmployeeCourseSeeder::class,
            EmployeeQualificationSeeder::class,
            EmployeeContactSeeder::class,
            EmployeeMedicalRecordSeeder::class,
            EmployeeFinancialEntitlementSeeder::class,
            EmployeeAllowanceSeeder::class,
            EmployeeOtherEntitlementSeeder::class,
            AttendanceEmployeeSeeder::class,
            EmployeeHolidaySeeder::class,
            EmployeeAccountSeeder::class,

         ]);

        
    }
}
