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
        'EmployeeAccount' => [
            ['email', 'بريد إلكتروني', 'Email', 'بريد إلكتروني'],
            ['password', 'كلمة المرور', 'Password', 'كلمة المرور'],
            ['approved', 'موافقة', 'Approved', 'موافقة'],
            ['send_login_email', 'send_login_email', 'Send Login Email', 'إرسال البريد الإلكتروني لتسجيل الدخول']
        ],

        'EmployeeHoliday' => [
            ['employee_id', 'الموظف', 'Employee Id', 'معرف الموظف'],
            ['total_balance', 'Total_balance', 'Total Balance', 'التوازن الكلي'],
            ['remaining_balance', 'المتبقي_الرصيد', 'Remaining Balance', 'الرصيد المتبقي'],
            ['holiday_list_id', 'العيد _list_id', 'Holiday List Id', 'معرف قائمة العطلات'],
            ['status', 'حالة', 'Status', 'حالة'],
            ['list', 'قائمة', 'List', 'قائمة']
        ],

        'AttendanceEmployee' => [
            ['basic_hours', 'basic_hours', 'Basic Hours', 'ساعات أساسية'],
            ['attendance_device_id', 'الحضور_جهاز_id', 'Attendance Device Id', 'معرف جهاز الحضور'],
            ['shift_change', 'Shift_change', 'Shift Change', 'تغيير التحول']
        ],

        'EmployeeOtherEntitlement' => [
            ['employee_id', 'معرف_الموظف', 'Employee Id', 'معرف الموظف'],
            ['entitlement_name', 'enttlement_name', 'Entitlement Name', 'اسم الاستحقاق'],
            ['amount', 'كمية', 'Amount', 'كمية'],
            ['note', 'ملحوظة', 'Note', 'ملحوظة']
        ],

        'EmployeeAllowance' => [
            ['employee_id', 'معرف_الموظف', 'Employee Id', 'معرف الموظف'],
            ['entitlement_name', 'Entitlement_name', 'Entitlement Name', 'اسم الاستحقاق'],
            ['amount', 'كمية', 'Amount', 'كمية']
        ],

        'EmployeeFinancialEntitlement' => [
            ['employee_id', 'معرف_الموظف', 'Employee Id', 'معرف الموظف'],
            ['basic_salary', 'basic_salary', 'Basic Salary', 'الراتب الأساسي'],
            ['salary_type_id', 'معرف نوع_الراتب', 'Salary Type Id', 'معرف نوع الراتب'],
            ['currency_id', 'معرف العملة', 'Currency Id', 'معرف العملة'],
            ['iban', 'ايبان', 'Iban', 'إيبان'],
            ['cost_center', 'Cost_center', 'Cost Center', 'مركز التكلفة'],
            ['salary_payment_method', 'طريقة_دفع_الراتب', 'Salary Payment Method', 'طريقة دفع الراتب'],
            ['bank_id', 'معرف البنك', 'Bank Id', 'معرف البنك']
        ],

        'EmployeeMedicalRecord' => [
            ['employee_id', 'معرف_الموظف', 'Employee Id', 'معرف الموظف'],
            ['certificate_number', 'رقم الشهادة', 'Certificate Number', 'رقم الشهادة'],
            ['certificate_value', 'شهادة _value', 'Certificate Value', 'قيمة الشهادة'],
            ['certificate_start_date', 'certificate_start_date', 'Certificate Start Date', 'تاريخ بدء الشهادة'],
            ['certificate_end_date', 'certificate_end_date', 'Certificate End Date', 'تاريخ انتهاء الشهادة'],
            ['regular_checkup_date', 'العادية _checkup_date', 'Regular Checkup Date', 'تاريخ الفحص الدوري'],
            ['other_checkup_date', 'other_checkup_date', 'Other Checkup Date', 'تاريخ فحص آخر'],
            ['medical_insurance', 'Medical_insurance', 'Medical Insurance', 'التأمين الطبي'],
            ['medical_insurance_category_id', 'فئة التأمين الطبي', 'Medical Insurance Category Id', 'معرف فئة التأمين الطبي'],
            ['medical_insurance_value', 'medical_insurance_value', 'Medical Insurance Value', 'قيمة التأمين الطبي'],
            ['chronic_disease', 'مرض مزمن', 'Chronic Disease', 'مرض مزمن'],
            ['blood_type', 'Blood_type', 'Blood Type', 'فصيلة الدم'],
            ['medical_condition', 'Medical_condition', 'Medical Condition', 'الحالة الطبية']
        ],

        'EmployeeContact' => [
            ['employee_id', 'الموظف', 'Employee Id', 'معرف الموظف'],
            ['personal_email', 'personal_email', 'Personal Email', 'البريد الإلكتروني الشخصي'],
            ['company_email', 'Company_email', 'Company Email', 'البريد الإلكتروني للشركة'],
            ['contact_email', 'Contact_email', 'Contact Email', 'البريد الإلكتروني للاتصال'],
            ['mobile_number', 'رقم الهاتف المحمول', 'Mobile Number', 'رقم الهاتف المحمول'],
            ['mobile_number_two', 'mobile_number_two', 'Mobile Number Two', 'الجوال رقم اثنين'],
            ['emergency_contact_name', 'اسم جهة الاتصال في حالات الطوارئ', 'Emergency Contact Name', 'اسم جهة اتصال الطوارئ'],
            ['emergency_contact_phone', 'هاتف الاتصال الطارئ', 'Emergency Contact Phone', 'هاتف الاتصال في حالات الطوارئ'],
            ['job_title', 'مسمى وظيفي', 'Job Title', 'مسمى وظيفي'],
            ['relation', 'العلاقة', 'Relation', 'العلاقة'],
            ['company_name', 'اسم_الشركة', 'Company Name', 'اسم الشركة'],
            ['company_phone', 'Company_Phone', 'Company Phone', 'هاتف الشركة'],
            ['notes', 'ملحوظات', 'Notes', 'ملحوظات']
        ],

        'EmployeeQualification' => [
            ['country_id', 'country_id', 'Country Id', 'معرف البلد'],
            ['city_id', 'city_id', 'City Id', 'معرف المدينة'],
            ['university', 'جامعة', 'University', 'جامعة'],
            ['college', 'كلية', 'College', 'كلية'],
            ['qualification', 'مؤهل', 'Qualification', 'مؤهل'],
            ['major', 'رئيسي', 'Major', 'رئيسي'],
            ['degree', 'درجة', 'Degree', 'درجة'],
            ['gpa', 'GPA', 'Gpa', 'المعدل التراكمي'],
            ['graduation_year', 'Graduation_year', 'Graduation Year', 'سنة التخرج'],
            ['notes', 'ملحوظات', 'Notes', 'ملحوظات']
        ],

        'EmployeeCourse' => [
            ['employee_id', 'معرف_الموظف', 'Employee Id', 'معرف الموظف'],
            ['course_name', 'course_name', 'Course Name', 'اسم الدورة'],
            ['course_type', 'Course_type', 'Course Type', 'نوع الدورة'],
            ['program_type', 'program_type', 'Program Type', 'نوع البرنامج'],
            ['sponsored', 'برعاية', 'Sponsored', 'برعاية'],
            ['start_date', 'تاريخ البدء', 'Start Date', 'تاريخ البدء'],
            ['end_date', 'end_date', 'End Date', 'تاريخ الانتهاء'],
            ['course_value', 'course_value', 'Course Value', 'قيمة الدورة'],
            ['trainer', 'مدرب', 'Trainer', 'مدرب'],
            ['training_entity', 'Training_entity', 'Training Entity', 'جهة التدريب'],
            ['training_location', 'التدريب', 'Training Location', 'مكان التدريب'],
            ['country_id', 'country_id', 'Country Id', 'معرف البلد'],
            ['city_id', 'city_id', 'City Id', 'معرف المدينة'],
            ['location', 'موقع', 'Location', 'موقع'],
            ['issuer', 'المصدر', 'Issuer', 'المصدر'],
            ['certificate_number', 'Certificate_number', 'Certificate Number', 'رقم الشهادة'],
            ['certificate_end_date', 'certificate_end_date', 'Certificate End Date', 'تاريخ نهاية الشهادة'],
            ['certificate_issue_date', 'certificate_issue_date', 'Certificate Issue Date', 'تاريخ إصدار الشهادة'],
            ['grade', 'درجة', 'Grade', 'درجة'],
            ['hours_count', 'HOURS_COUNT', 'Hours Count', 'ساعات العد'],
            ['notes', 'ملحوظات', 'Notes', 'ملحوظات']
        ],

        'EmployeeSkill' => [
            ['employee_id', 'معرف_الموظف', 'Employee Id', 'معرف الموظف'],
            ['skill', 'مهارة', 'Skill', 'مهارة'],
            ['skill_level', 'Skill_level', 'Skill Level', 'مستوى المهارة'],
            ['date', 'تاريخ', 'Date', 'تاريخ']
        ],

        'EmployeeLanguage' => [
            ['employee_id', 'معرف_الموظف', 'Employee Id', 'معرف الموظف'],
            ['language', 'لغة', 'Language', 'لغة'],
            ['writing_level', 'مستوى الكتابة', 'Writing Level', 'مستوى الكتابة'],
            ['reading_level', 'read_level', 'Reading Level', 'مستوى القراءة'],
            ['speaking_level', 'تحدث', 'Speaking Level', 'مستوى التحدث']
        ],

        'EmployeeExperience' => [
            ['employee_id', 'الموظف', 'Employee Id', 'معرف الموظف'],
            ['entity_name', 'اسم الكيان', 'Entity Name', 'اسم الكيان'],
            ['job_title', 'مسمى وظيفي', 'Job Title', 'مسمى وظيفي'],
            ['start_date', 'تاريخ البدء', 'Start Date', 'تاريخ البدء'],
            ['end_date', 'end_date', 'End Date', 'تاريخ الانتهاء'],
            ['volunteer_experiences', 'تجارب تطوعية', 'Volunteer Experiences', 'الخبرات التطوعية'],
            ['unofficial_experiences', 'غير محتملة', 'Unofficial Experiences', 'تجارب غير رسمية'],
            ['previous_salary', 'السابق_الراتب', 'Previous Salary', 'الراتب السابق'],
            ['previous_evaluation', 'السابق_التقييم', 'Previous Evaluation', 'التقييم السابق'],
            ['leaving_reason', 'leaveing_reason', 'Leaving Reason', 'سبب الترك'],
            ['responsibilities', 'المسؤوليات', 'Responsibilities', 'المسؤوليات'],
            ['notes', 'ملحوظات', 'Notes', 'ملحوظات']
        ],

        'EmployeeAddress' => [
            ['employee_id', 'الموظف', 'Employee Id', 'معرف الموظف'],
            ['type', 'يكتب', 'Type', 'يكتب'],
            ['country_id', 'Country_id', 'Country Id', 'معرف البلد'],
            ['city_id', 'city_id', 'City Id', 'معرف المدينة'],
            ['neighborhood', 'حيّ', 'Neighborhood', 'حيّ'],
            ['street', 'شارع', 'Street', 'شارع'],
            ['building_number', 'Building_number', 'Building Number', 'رقم المبنى'],
            ['building_type', 'Building_type', 'Building Type', 'نوع المبنى'],
            ['building_name', 'Building_name', 'Building Name', 'اسم المبنى'],
            ['postal_code', 'رمز بريدي', 'Postal Code', 'رمز بريدي'],
            ['po_box', 'بوبوكس', 'Po Box', 'صندوق البريد'],
            ['notes', 'ملحوظات', 'Notes', 'ملحوظات'],
            ['same_address', 'نفس_العنوان', 'Same Address', 'نفس العنوان']
        ],

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