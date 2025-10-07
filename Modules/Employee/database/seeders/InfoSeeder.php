<?php

namespace Modules\Employee\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Employee\Models\InfoEmployee;

class InfoSeeder extends Seeder
{
    public function run(): void
    {
        $records = [
            [
                'infoable_type' => 'EmployeeAddress',
                'title' => ['en' => 'Employeeaddress', 'ar' => 'عنوان الموظف'],
                'desc'  => ['en' => 'Description for Employeeaddress', 'ar' => 'وصف لعنوان الموظف'],
            ],            [
                'infoable_type' => 'EmployeeDebendent',
                'title' => ['en' => 'Employeedebendent', 'ar' => 'يعتمد على الموظف'],
                'desc'  => ['en' => 'Description for Employeedebendent', 'ar' => 'وصف الموظف المعتمد'],
            ],            [
                'infoable_type' => 'PersonalInformationEmployee',
                'title' => ['en' => 'Personalinformationemployee', 'ar' => 'موظف المعلومات الشخصية'],
                'desc'  => ['en' => 'Description for Personalinformationemployee', 'ar' => 'وصف لموظف المعلومات الشخصية'],
            ],            [
                'infoable_type' => 'BaseInformationEmployee',
                'title' => ['en' => 'Baseinformationemployee', 'ar' => 'baseInformationEmployee'],
                'desc'  => ['en' => 'Description for Baseinformationemployee', 'ar' => 'الوصف لـ BaseInformationEmployee'],
            ],
        ];

        foreach ($records as $record) {
            InfoEmployee::firstOrCreate(
                ['infoable_type' => $record['infoable_type']],
                [
                    'title' => $record['title'],
                    'desc'  => $record['desc'],
                ]
            );
        }
    }
}