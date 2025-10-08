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
                'infoable_type' => 'EmployeeAccount',
                'title' => ['en' => 'Employeeaccount', 'ar' => 'حساب الموظف'],
                'desc'  => ['en' => 'Description for Employeeaccount', 'ar' => 'وصف لحساب الموظف'],
            ],            [
                'infoable_type' => 'EmployeeHoliday',
                'title' => ['en' => 'Employeeholiday', 'ar' => 'عطلة الموظف'],
                'desc'  => ['en' => 'Description for Employeeholiday', 'ar' => 'وصف لعطلة الموظف'],
            ],            [
                'infoable_type' => 'AttendanceEmployee',
                'title' => ['en' => 'Attendanceemployee', 'ar' => 'موظف الحضور'],
                'desc'  => ['en' => 'Description for Attendanceemployee', 'ar' => 'وصف موظف الحضور'],
            ],            [
                'infoable_type' => 'EmployeeOtherEntitlement',
                'title' => ['en' => 'Employeeotherentitlement', 'ar' => 'الموظف'],
                'desc'  => ['en' => 'Description for Employeeotherentitlement', 'ar' => 'وصف لاستحقاقات الموظف الأخرى'],
            ],            [
                'infoable_type' => 'EmployeeAllowance',
                'title' => ['en' => 'Employeeallowance', 'ar' => 'بدل الموظف'],
                'desc'  => ['en' => 'Description for Employeeallowance', 'ar' => 'وصف بدل الموظف'],
            ],            [
                'infoable_type' => 'EmployeeFinancialEntitlement',
                'title' => ['en' => 'Employeefinancialentitlement', 'ar' => 'استحقاق الموظف المالي'],
                'desc'  => ['en' => 'Description for Employeefinancialentitlement', 'ar' => 'وصف الاستحقاق المالي للموظف'],
            ],            [
                'infoable_type' => 'EmployeeMedicalRecord',
                'title' => ['en' => 'Employeemedicalrecord', 'ar' => 'السجل الطبي للموظف'],
                'desc'  => ['en' => 'Description for Employeemedicalrecord', 'ar' => 'وصف السجل الطبي للموظفين'],
            ],            [
                'infoable_type' => 'EmployeeContact',
                'title' => ['en' => 'Employeecontact', 'ar' => 'جهة اتصال الموظف'],
                'desc'  => ['en' => 'Description for Employeecontact', 'ar' => 'وصف الاتصال بالموظف'],
            ],            [
                'infoable_type' => 'EmployeeQualification',
                'title' => ['en' => 'Employeequalification', 'ar' => 'مؤهل الموظف'],
                'desc'  => ['en' => 'Description for Employeequalification', 'ar' => 'وصف مؤهل الموظف'],
            ],            [
                'infoable_type' => 'EmployeeCourse',
                'title' => ['en' => 'Employeecourse', 'ar' => 'دورة الموظف'],
                'desc'  => ['en' => 'Description for Employeecourse', 'ar' => 'وصف دورة الموظف'],
            ],            [
                'infoable_type' => 'EmployeeSkill',
                'title' => ['en' => 'Employeeskill', 'ar' => 'مهارات الموظفين'],
                'desc'  => ['en' => 'Description for Employeeskill', 'ar' => 'وصف لمهارات الموظفين'],
            ],            [
                'infoable_type' => 'EmployeeLanguage',
                'title' => ['en' => 'Employeelanguage', 'ar' => 'لغة الموظف'],
                'desc'  => ['en' => 'Description for Employeelanguage', 'ar' => 'وصف لتوظيف اللغة'],
            ],            [
                'infoable_type' => 'EmployeeExperience',
                'title' => ['en' => 'Employeeexperience', 'ar' => 'تجربة الموظف'],
                'desc'  => ['en' => 'Description for Employeeexperience', 'ar' => 'وصف لتجربة الموظف'],
            ],            [
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