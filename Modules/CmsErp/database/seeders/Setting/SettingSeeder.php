<?php

namespace Modules\CmsErp\Database\Seeders\Setting;

use Illuminate\Database\Seeder;
use Modules\CmsErp\Models\Activity;
use Modules\CmsErp\Models\CompanySize;
use Modules\CmsErp\Models\CompanyType;
use Modules\CmsErp\Models\Department;
use Modules\CmsErp\Models\Entity;
use Modules\CmsErp\Models\MedicalInsuranceCategorie;
use Modules\CmsErp\Models\NoticePeriod;
use Modules\CmsErp\Models\TrialPeriod;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $departments = [
            ['name' => ['en' => 'Human Resources', 'ar' => 'الموارد البشرية']],
            ['name' => ['en' => 'Finance', 'ar' => 'المالية']],
            ['name' => ['en' => 'IT Department', 'ar' => 'قسم تكنولوجيا المعلومات']],
        ];

        $noticePeriods = [
            ['period_name' => ['en' => 'One Month', 'ar' => 'شهر واحد']],
            ['period_name' => ['en' => 'Two Months', 'ar' => 'شهرين']],
            ['period_name' => ['en' => 'Three Months', 'ar' => 'ثلاثة أشهر']],
        ];

        $trialPeriods = [
            ['period_long' => ['en' => 'One Month', 'ar' => 'شهر واحد']],
            ['period_long' => ['en' => 'Two Months', 'ar' => 'شهرين']],
            ['period_long' => ['en' => 'Three Months', 'ar' => 'ثلاثة أشهر']],
        ];
        $entities = [
             ['type' => 'Global Tech Solutions'],
            ['type' => 'Future Innovations Ltd.'],
            ['type' => 'Creative Minds Corp.'],
            ['type' => 'Bright Star Enterprises'],
            ['type' => 'NextGen Technologies'],
        
        ];
        $trialPeriods = [
            ['period_long' => ['en' => 'One Month', 'ar' => 'شهر واحد']],
            ['period_long' => ['en' => 'Two Months', 'ar' => 'شهرين']],
            ['period_long' => ['en' => 'Three Months', 'ar' => 'ثلاثة أشهر']],
        ];

        $company_sizes = [
            ['type' => ['en' => 'Small', 'ar' => 'صغير']],
            ['type' => ['en' => 'Medium', 'ar' => 'متوسط']],
            ['type' => ['en' => 'Large', 'ar' => 'كبير']],

        ];

          $activity = [
            ['activity' => ['en' => 'Default Activity', 'ar' => 'النشاط الافتراضي']],
            ['activity' => ['en' => 'Manufacturing', 'ar' => 'التصنيع']],
            ['activity' => ['en' => 'Trading', 'ar' => 'التجارة']],
        ];
        $companyTypes = [
            ['company_type' => ['en' => 'Default Company company_type', 'ar' => 'النوع الافتراضي للشركة']],
            ['company_type' => ['en' => 'Limited Liability Company', 'ar' => 'شركة ذات مسؤولية محدودة']],
            ['company_type' => ['en' => 'Joint Stock Company', 'ar' => 'شركة مساهمة']],
            ['company_type' => ['en' => 'Sole Proprietorship', 'ar' => 'ملكية فردية']],
        ];


         foreach ($activity as $act) {
            Activity::create($act);
        }
           foreach ($companyTypes as $companyType) {
            CompanyType::create($companyType);
        }
        foreach ($company_sizes as $company_size) {
            CompanySize::create($company_size);
        }
        foreach ($entities as $entitie) {
            Entity::create($entitie);
        }


        foreach ($trialPeriods as $period) {
            TrialPeriod::create($period);
        }

        foreach ($noticePeriods as $period) {
            NoticePeriod::create($period);
        }

        foreach ($departments as $department) {
            Department::create($department);
        }
    }
}
