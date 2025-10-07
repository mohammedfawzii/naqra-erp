<?php

namespace Modules\Employee\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColumnsSeeder extends Seeder
{
    public function run(): void
    {
        $now = now()->toDateTimeString();

        $columns = [
        'EmployeeDebendent' => [
            ['employee_id', 'الموظف', 'Employee Id', 'معرف الموظف'],
            ['full_name', 'full_name', 'Full Name', 'الاسم الكامل'],
            ['relationship', 'علاقة', 'Relationship', 'علاقة'],
            ['birth_date', 'تاريخ الميلاد', 'Birth Date', 'تاريخ الميلاد'],
            ['birth_place', 'Birth_place', 'Birth Place', 'مكان الولادة'],
            ['nationality_id', 'الجنسية', 'Nationality Id', 'معرف الجنسية'],
            ['gender', 'جنس', 'Gender', 'جنس'],
            ['national_id_number', 'national_id_number', 'National Id Number', 'رقم الهوية الوطني'],
            ['id_issue_date', 'id_issue_date', 'Id Issue Date', 'تاريخ عدد المعرف'],
            ['id_expiry_date', 'id_expiry_date', 'Id Expiry Date', 'تاريخ انتهاء الهوية'],
            ['mobile_number', 'رقم الهاتف المحمول', 'Mobile Number', 'رقم الهاتف المحمول'],
            ['passport_number', 'passport_number', 'Passport Number', 'رقم جواز السفر'],
            ['passport_issue_date', 'passport_issue_date', 'Passport Issue Date', 'تاريخ إصدار جواز السفر'],
            ['passport_expiry_date', 'passport_expiry_date', 'Passport Expiry Date', 'تاريخ انتهاء جواز السفر'],
            ['passport_issue_place', 'passport_issue_place', 'Passport Issue Place', 'مكان إصدار جواز السفر'],
            ['health_status', 'health_status', 'Health Status', 'الحالة الصحية'],
            ['medical_test_status', 'Medical_test_status', 'Medical Test Status', 'حالة الاختبار الطبي'],
            ['notes', 'ملحوظات', 'Notes', 'ملحوظات']
        ],

        'PersonalInformationEmployee' => [
            ['attachments', 'المرفقات', 'Attachments', 'المرفقات'],
            ['employee', 'موظف', 'Employee', 'موظف'],
            ['first_name', 'الاسم الأول', 'First Name', 'الاسم الأول'],
            ['second_name', 'الاسم الثاني', 'Second Name', 'الاسم الثاني'],
            ['therd_name', 'therd_name', 'Therd Name', 'الاسم الثالث'],
            ['family_name', 'Family_name', 'Family Name', 'اسم العائلة'],
            ['nationality', 'جنسية', 'Nationality', 'جنسية'],
            ['marital_status', 'MARITAL_STATUS', 'Marital Status', 'الحالة الزوجية'],
            ['marriage_date', 'تاريخ_الزواج', 'Marriage Date', 'تاريخ الزواج'],
            ['gender', 'جنس', 'Gender', 'جنس'],
            ['birth_date', 'تاريخ الميلاد', 'Birth Date', 'تاريخ الميلاد'],
            ['place_of_birth', 'مكان الميلاد', 'Place Of Birth', 'مكان الميلاد'],
            ['national_id_number', 'رقم_الرقم_الوطني', 'National Id Number', 'رقم الهوية الوطني'],
            ['national_id_expiry', 'national_id_expiry', 'National Id Expiry', 'هوية الوطني انتهاء الصلاحية'],
            ['religion', 'دِين', 'Religion', 'دِين'],
            ['passport_type', 'جواز السفر_نوع', 'Passport Type', 'نوع جواز السفر'],
            ['passport_number', 'passport_number', 'Passport Number', 'رقم جواز السفر'],
            ['passport_issue_date', 'passport_issue_date', 'Passport Issue Date', 'تاريخ إصدار جواز السفر'],
            ['passport_expiry_date', 'passport_expiry_date', 'Passport Expiry Date', 'تاريخ انتهاء جواز السفر'],
            ['passport_issue_place', 'Passport_issue_place', 'Passport Issue Place', 'مكان إصدار جواز السفر'],
            ['passport_validity', 'صلاحية جواز السفر', 'Passport Validity', 'صحة جواز السفر'],
            ['work_card_number', 'Work_card_number', 'Work Card Number', 'رقم بطاقة العمل'],
            ['work_card_issue_date', 'work_card_issue_date', 'Work Card Issue Date', 'تاريخ إصدار بطاقة العمل'],
            ['work_card_expiry_date', 'work_card_expiry_date', 'Work Card Expiry Date', 'تاريخ انتهاء بطاقة العمل'],
            ['work_card_fee', 'رسوم_بطاقة_العمل', 'Work Card Fee', 'رسوم بطاقة العمل'],
            ['iqama_number', 'رقم الإقامة', 'Iqama Number', 'رقم الإقامة'],
            ['iqama_issue_date', 'iqama_issue_date', 'Iqama Issue Date', 'تاريخ عدد الإقامة'],
            ['iqama_expiry_date', 'تاريخ انتهاء الإقامة', 'Iqama Expiry Date', 'تاريخ انتهاء الإقامة'],
            ['iqama_fee', 'Original_fee', 'Iqama Fee', 'رسوم السلعة'],
            ['document_type', 'document_type', 'Document Type', 'نوع المستند']
        ],

            'BaseInformationEmployee' => [
                ['employee', 'موظف', 'Employee', 'موظف'],
                ['attachments', 'المرفقات', 'Attachments', 'المرفقات'],
                ['avatar', 'الصورة الرمزية', 'Avatar', 'الصورة الرمزية'],
                ['hire_date', 'reire_date', 'Hire Date', 'تاريخ استئجار'],
                ['job_title', 'مسمى وظيفي', 'Job Title', 'مسمى وظيفي'],
                ['company', 'شركة', 'Company', 'شركة'],
                ['branch', 'فرع', 'Branch', 'فرع'],
                ['position', 'موضع', 'Position', 'موضع'],
                ['department', 'قسم', 'Department', 'قسم'],
                ['start_hire', 'start_hire', 'Start Hire', 'ابدأ استئجار'],
                ['end_hire', 'end_hire', 'End Hire', 'تأجير نهاية'],
                ['retirement_date', 'التقاعد', 'Retirement Date', 'تاريخ التقاعد'],
                ['noticePeriod', 'فترة إشعار', 'Noticeperiod', 'فترة إشعار'],
                ['trialPeriod', 'فترة التجربة', 'Trialperiod', 'فترة التجربة'],
                ['directManager', 'DirectManager', 'Directmanager', 'DirectManager'],
                ['holidayManager', 'العطل', 'Holidaymanager', 'العطل'],
                ['salaryManager', 'الراتب', 'Salarymanager', 'الراتب'],
                ['status', 'حالة', 'Status', 'حالة']
            ]
        ];

        foreach ($columns as $model => $fields) {
            foreach ($fields as $field) {
                DB::table('column_employees')->insert([
                    'model' => $model,
                    'key' => json_encode(['en' => $field[0], 'ar' => $field[1]], JSON_UNESCAPED_UNICODE),
                    'label' => json_encode(['en' => $field[2], 'ar' => $field[3]], JSON_UNESCAPED_UNICODE),
                    'sortable' => true,
                    'filterable' => true,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }
        }
    }
}