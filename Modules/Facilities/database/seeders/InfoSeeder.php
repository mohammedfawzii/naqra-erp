<?php

namespace Modules\Facilities\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Facilities\Models\InfoFacilities;

class InfoSeeder extends Seeder
{
    public function run(): void
    {
        $records=[
            [
                'infoable_type' => 'MedicalInsurancesFacilities',
                'title' => ['en' => 'Medicalinsurancesfacilities', 'ar' => 'مرافق التأمين الطبي'],
                'desc'  => ['en' => 'Description for Medicalinsurancesfacilities', 'ar' => 'وصف مرافق التأمين الطبي'],
            ],            [
                'infoable_type' => 'PeriodicObligations',
                'title' => ['en' => 'Periodicobligations', 'ar' => 'الالتزامات الدورية'],
                'desc'  => ['en' => 'Description for Periodicobligations', 'ar' => 'وصف الالتزامات الدورية'],
            ],            [
                'infoable_type' => 'periodicObligations',
                'title' => ['en' => 'Periodicobligations', 'ar' => 'الالتزامات الدورية'],
                'desc'  => ['en' => 'Description for Periodicobligations', 'ar' => 'وصف الالتزامات الدورية'],
            ],            [
                'infoable_type' => 'SubscriptionFacilities',
                'title' => ['en' => 'Subscriptionfacilities', 'ar' => 'مرافق الاشتراك'],
                'desc'  => ['en' => 'Description for Subscriptionfacilities', 'ar' => 'وصف تسهيلات الاشتراك'],
            ],            [
                'infoable_type' => 'DigitalFacility',
                'title' => ['en' => 'Digitalfacility', 'ar' => 'المرافق الرقمية'],
                'desc'  => ['en' => 'Description for Digitalfacility', 'ar' => 'وصف للمرفق الرقمي'],
            ],            [
                'infoable_type' => 'OwnerForeignCompany',
                'title' => ['en' => 'Ownerforeigncompany', 'ar' => 'المالك Forforigncompany'],
                'desc'  => ['en' => 'Description for Ownerforeigncompany', 'ar' => 'وصف لـمالك شركة أجنبية'],
            ],            [
                'infoable_type' => 'OwnerEndowment',
                'title' => ['en' => 'Ownerendowment', 'ar' => 'ownerendowment'],
                'desc'  => ['en' => 'Description for Ownerendowment', 'ar' => 'وصف للوقف المالك'],
            ],            [
                'infoable_type' => 'OwnerGulfCompany',
                'title' => ['en' => 'Ownergulfcompany', 'ar' => 'ownergulfcompany'],
                'desc'  => ['en' => 'Description for Ownergulfcompany', 'ar' => 'وصف لـ ownergulfcompany'],
            ],            [
                'infoable_type' => 'OwnerResident',
                'title' => ['en' => 'Ownerresident', 'ar' => 'المالكالمقيم'],
                'desc'  => ['en' => 'Description for Ownerresident', 'ar' => 'وصف المالك المقيم'],
            ],            [
                'infoable_type' => 'OwnerGulf',
                'title' => ['en' => 'Ownergulf', 'ar' => 'مالك الخليج'],
                'desc'  => ['en' => 'Description for Ownergulf', 'ar' => 'وصف لـمالك الخليج'],
            ],            [
                'infoable_type' => 'OwnerSaudiIndividual',
                'title' => ['en' => 'Ownersaudiindividual', 'ar' => 'OwnersaudiIndualivual'],
                'desc'  => ['en' => 'Description for Ownersaudiindividual', 'ar' => 'الوصف لأصحاب الفرع'],
            ],            [
                'infoable_type' => 'OwnerAssociation',
                'title' => ['en' => 'Ownerassociation', 'ar' => 'جمعية المالك'],
                'desc'  => ['en' => 'Description for Ownerassociation', 'ar' => 'الوصف للعاملين'],
            ],            [
                'infoable_type' => 'Owner',
                'title' => ['en' => 'Owner', 'ar' => 'مالك'],
                'desc'  => ['en' => 'Description for Owner', 'ar' => 'وصف للمالك'],
            ],            [
                'infoable_type' => 'Branch',
                'title' => ['en' => 'Branch', 'ar' => 'فرع'],
                'desc'  => ['en' => 'Description for Branch', 'ar' => 'وصف للفرع'],
            ],            [
                'infoable_type' => 'Branches',
                'title' => ['en' => 'Branches', 'ar' => 'الفروع'],
                'desc'  => ['en' => 'Description for Branches', 'ar' => 'وصف الفروع'],
            ],            [
                'infoable_type' => 'branches',
                'title' => ['en' => 'Branches', 'ar' => 'الفروع'],
                'desc'  => ['en' => 'Description for Branches', 'ar' => 'وصف للفروع'],
            ],                [
                'infoable_type' => 'facilities',
                'title' => ['en' => 'facilities', 'ar' => 'حساب الموظف'],
                'desc'  => ['en' => 'Description for facilities', 'ar' => 'وصف لحساب الموظف'],
            ], 
        ];
        


        foreach ($records as $record) {
            InfoFacilities::firstOrCreate(
                ['infoable_type' => $record['infoable_type']],
                [
                    'title' => $record['title'],
                    'desc'  => $record['desc'],
                ]
            );
        }
    }
}