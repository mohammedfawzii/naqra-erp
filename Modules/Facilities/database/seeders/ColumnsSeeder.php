<?php

namespace Modules\Facilities\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColumnsSeeder extends Seeder
{
    public function run(): void
    {
        $now = now()->toDateTimeString();

        $columns = [
        'MedicalInsurancesFacilities' => [
            ['avater', 'الصورة الرمزية', 'Avater', 'الصورة الرمزية'],
            ['company_name', 'اسم_الشركة', 'Company Name', 'اسم الشركة'],
            ['policy_number', 'سياسة_رقم', 'Policy Number', 'رقم السياسة'],
            ['medical_insurance_categories_id', 'Medical_insurance_categories_id', 'Medical Insurance Categories Id', 'معرف فئات التأمين الطبي'],
            ['start_date', 'تاريخ البدء', 'Start Date', 'تاريخ البدء'],
            ['end_date', 'end_date', 'End Date', 'تاريخ الانتهاء']
        ],

        'PeriodicObligations' => [
            ['facility_id', 'منشأة_id', 'Facility Id', 'معرف المنشأة'],
            ['zakat_due_date', 'موعد استحقاق الزكاة', 'Zakat Due Date', 'موعد استحقاق الزكاة'],
            ['zakat_reminder_date', 'تاريخ_تذكير_الزكاة', 'Zakat Reminder Date', 'تاريخ تذكير الزكاة'],
            ['tax_declaration_due_date', 'Tax_declaration_due_date', 'Tax Declaration Due Date', 'تاريخ استحقاق الإقرار الضريبي'],
            ['tax_declaration_reminder_date', 'Tax_declaration_reminder_date', 'Tax Declaration Reminder Date', 'تاريخ تذكير الإقرار الضريبي'],
            ['salary_due_date', 'تاريخ_استحقاق_الراتب', 'Salary Due Date', 'تاريخ استحقاق الراتب'],
            ['salary_reminder_date', 'تذكير_الراتب_التاريخ', 'Salary Reminder Date', 'تاريخ تذكير الراتب']
        ],

        'SubscriptionFacilities' => [
            ['branch_id', 'Branch_id', 'Branch Id', 'معرف الفرع'],
            ['subscription_id', 'معرف الاشتراك', 'Subscription Id', 'معرف الاشتراك'],
            ['subscription_types_id', 'اشتراك _types_id', 'Subscription Types Id', 'معرف أنواع الاشتراك'],
            ['invoice_number', 'رقم الفاتورة', 'Invoice Number', 'رقم الفاتورة'],
            ['invoice_value', 'فاتورة', 'Invoice Value', 'قيمة الفاتورة'],
            ['start_date', 'تاريخ البدء', 'Start Date', 'تاريخ البدء'],
            ['end_date', 'end_date', 'End Date', 'تاريخ الانتهاء'],
            ['reminder_date', 'تذكير', 'Reminder Date', 'تاريخ التذكير'],
            ['notes', 'ملحوظات', 'Notes', 'ملحوظات']
        ],

        'DigitalFacility' => [
            ['branch_id', 'Branch_id', 'Branch Id', 'معرف الفرع'],
            ['name', 'اسم', 'Name', 'اسم'],
            ['unified_national_number', 'unified_national_number', 'Unified National Number', 'الرقم الوطني الموحد'],
            ['tax_number', 'Tax_number', 'Tax Number', 'الرقم الضريبي'],
            ['commercial_record_value', 'Commercial_record_value', 'Commercial Record Value', 'قيمة السجل التجاري'],
            ['capital', 'عاصمة', 'Capital', 'عاصمة'],
            ['start_date', 'تاريخ البدء', 'Start Date', 'تاريخ البدء'],
            ['annual_confirmation_date', 'السنوية _confirmation_date', 'Annual Confirmation Date', 'تاريخ التأكيد السنوي'],
            ['financial_year_start', 'financial_year_start', 'Financial Year Start', 'تبدأ السنة المالية'],
            ['financial_year_end', 'Financial_year_end', 'Financial Year End', 'نهاية السنة المالية']
        ],

        'OwnerForeignCompany' => [
            ['owner_id', 'owner_id', 'Owner Id', 'معرف المالك'],
            ['company_name', 'اسم_الشركة', 'Company Name', 'اسم الشركة'],
            ['license_number', 'رقم الترخيص', 'License Number', 'رقم الترخيص'],
            ['issue_date', 'تاريخ الإصدار', 'Issue Date', 'تاريخ الإصدار'],
            ['email', 'بريد إلكتروني', 'Email', 'بريد إلكتروني'],
            ['mobile', 'متحرك', 'Mobile', 'متحرك'],
            ['address', 'عنوان', 'Address', 'عنوان'],
            ['partnership_percentage', 'نسبة الشراكة', 'Partnership Percentage', 'نسبة الشراكة'],
            ['authorized_person', 'eledired_person', 'Authorized Person', 'الشخص المعتمد'],
            ['authorized_email', 'Author_email', 'Authorized Email', 'البريد الإلكتروني المعتمد'],
            ['authorized_mobile', 'eledtired_mobile', 'Authorized Mobile', 'الجوال المعتمد'],
            ['landline', 'خط أرضي', 'Landline', 'الخط الأرضي'],
            ['website', 'موقع إلكتروني', 'Website', 'موقع إلكتروني'],
            ['partnership_type', 'Partnership_Type', 'Partnership Type', 'نوع الشراكة'],
            ['note', 'ملحوظة', 'Note', 'ملحوظة']
        ],

        'OwnerEndowment' => [
            ['owner_id', 'owner_id', 'Owner Id', 'معرف المالك'],
            ['endowment_name', 'endowment_name', 'Endowment Name', 'اسم الوقف'],
            ['endowment_national_number', 'الوقف_الوطني_الرقم', 'Endowment National Number', 'الرقم الوطني للوقف'],
            ['approval_date', 'تاريخ_الموافقة', 'Approval Date', 'تاريخ الموافقة'],
            ['authorized_person', 'eledired_person', 'Authorized Person', 'الشخص المعتمد'],
            ['authorized_mobile', 'eledtired_mobile', 'Authorized Mobile', 'الجوال المعتمد'],
            ['authorized_email', 'eledized_email', 'Authorized Email', 'البريد الإلكتروني المعتمد'],
            ['address', 'عنوان', 'Address', 'عنوان'],
            ['partnership_type', 'Partnership_Type', 'Partnership Type', 'نوع الشراكة'],
            ['partnership_percentage', 'نسبة الشراكة', 'Partnership Percentage', 'نسبة الشراكة'],
            ['note', 'ملحوظة', 'Note', 'ملحوظة']
        ],

        'OwnerGulfCompany' => [
            ['owner_id', 'owner_id', 'Owner Id', 'معرف المالك'],
            ['gulf_commercial_number', 'gulf_commercial_number', 'Gulf Commercial Number', 'الرقم التجاري الخليج'],
            ['name', 'اسم', 'Name', 'اسم'],
            ['company_type', 'Company_type', 'Company Type', 'نوع الشركة'],
            ['company_status', 'Company_status', 'Company Status', 'حالة الشركة'],
            ['company_nationality', 'Company_nationality', 'Company Nationality', 'جنسية الشركة'],
            ['email', 'بريد إلكتروني', 'Email', 'بريد إلكتروني'],
            ['landline', 'الخط الأرضي', 'Landline', 'الخط الأرضي'],
            ['website', 'موقع إلكتروني', 'Website', 'موقع إلكتروني'],
            ['authorized_person', 'eledired_person', 'Authorized Person', 'الشخص المعتمد'],
            ['authorized_email', 'eledized_email', 'Authorized Email', 'البريد الإلكتروني المعتمد'],
            ['authorized_mobile', 'Author_mobile', 'Authorized Mobile', 'الجوال المعتمد'],
            ['unified_phone', 'unified_phone', 'Unified Phone', 'هاتف موحد'],
            ['partnership_type', 'نوع الشراكة', 'Partnership Type', 'نوع الشراكة'],
            ['partnership_percentage', 'نسبة الشراكة', 'Partnership Percentage', 'نسبة الشراكة'],
            ['note', 'ملحوظة', 'Note', 'ملحوظة']
        ],

        'OwnerResident' => [
            ['owner_id', 'معرف_المالك', 'Owner Id', 'معرف المالك'],
            ['full_name', 'full_name', 'Full Name', 'الاسم الكامل'],
            ['resident_id', 'Resident_id', 'Resident Id', 'معرف المقيم'],
            ['email', 'بريد إلكتروني', 'Email', 'بريد إلكتروني'],
            ['mobile', 'متحرك', 'Mobile', 'متحرك'],
            ['national_address', 'national_address', 'National Address', 'العنوان الوطني'],
            ['investment_license_number', 'Investment_license_number', 'Investment License Number', 'رقم رخصة الاستثمار'],
            ['birth_date', 'الولادة', 'Birth Date', 'تاريخ الميلاد'],
            ['partnership_type', 'نوع الشراكة', 'Partnership Type', 'نوع الشراكة'],
            ['partnership_percentage', 'نسبة الشراكة', 'Partnership Percentage', 'نسبة الشراكة'],
            ['note', 'ملحوظة', 'Note', 'ملحوظة']
        ],

        'OwnerGulf' => [
            ['owner_id', 'owner_id', 'Owner Id', 'معرف المالك'],
            ['first_name', 'الاسم الأول', 'First Name', 'الاسم الأول'],
            ['second_name', 'الاسم الثاني', 'Second Name', 'الاسم الثاني'],
            ['third_name', 'Third_name', 'Third Name', 'الاسم الثالث'],
            ['family_name', 'Family_name', 'Family Name', 'اسم العائلة'],
            ['gender', 'جنس', 'Gender', 'جنس'],
            ['birth_date', 'الولادة', 'Birth Date', 'تاريخ الميلاد'],
            ['occupation', 'إشغال', 'Occupation', 'إشغال'],
            ['nationality_id', 'الجنسية_id', 'Nationality Id', 'معرف الجنسية'],
            ['residency_number', 'Residency_Number', 'Residency Number', 'رقم الإقامة'],
            ['gulf_national_id', 'gulf_national_id', 'Gulf National Id', 'الهوية الوطنية الخليجية'],
            ['email', 'بريد إلكتروني', 'Email', 'بريد إلكتروني'],
            ['saudi_mobile', 'saudi_mobile', 'Saudi Mobile', 'موبايل السعودية'],
            ['foreign_mobile', 'foreign_mobile', 'Foreign Mobile', 'الهاتف المحمول الأجنبي'],
            ['saudi_address', 'saudi_address', 'Saudi Address', 'العنوان السعودي'],
            ['foreign_address', 'Office_address', 'Foreign Address', 'عنوان أجنبي'],
            ['partnership_type', 'Partnership_Type', 'Partnership Type', 'نوع الشراكة'],
            ['partnership_percentage', 'نسبة الشراكة', 'Partnership Percentage', 'نسبة الشراكة'],
            ['note', 'ملحوظة', 'Note', 'ملحوظة']
        ],

        'OwnerSaudiIndividual' => [
            ['owner_id', 'owner_id', 'Owner Id', 'معرف المالك'],
            ['name', 'اسم', 'Name', 'اسم'],
            ['national_id', 'national_id', 'National Id', 'الهوية الوطنية'],
            ['email', 'بريد إلكتروني', 'Email', 'بريد إلكتروني'],
            ['mobile', 'متحرك', 'Mobile', 'متحرك'],
            ['national_address', 'national_address', 'National Address', 'العنوان الوطني'],
            ['birth_date', 'تاريخ الميلاد', 'Birth Date', 'تاريخ الميلاد'],
            ['occupation', 'إشغال', 'Occupation', 'إشغال'],
            ['partnership_percentage', 'نسبة الشراكة', 'Partnership Percentage', 'نسبة الشراكة'],
            ['partnership_type', 'نوع الشراكة', 'Partnership Type', 'نوع الشراكة'],
            ['note', 'ملحوظة', 'Note', 'ملحوظة']
        ],

        'OwnerAssociation' => [
            ['owner_id', 'معرف_المالك', 'Owner Id', 'معرف المالك'],
            ['association_name', 'Association_name', 'Association Name', 'اسم الجمعية'],
            ['license_number', 'رقم الترخيص', 'License Number', 'رقم الترخيص'],
            ['establishment_date', 'تاريخ التأسيس', 'Establishment Date', 'تاريخ الإنشاء'],
            ['license_expiry_date', 'License_expiry_date', 'License Expiry Date', 'تاريخ انتهاء الترخيص'],
            ['email', 'بريد إلكتروني', 'Email', 'بريد إلكتروني'],
            ['national_address', 'national_address', 'National Address', 'العنوان الوطني'],
            ['authorized_person', 'eledired_person', 'Authorized Person', 'الشخص المعتمد'],
            ['authorized_email', 'eledized_email', 'Authorized Email', 'البريد الإلكتروني المعتمد'],
            ['authorized_mobile', 'Author_mobile', 'Authorized Mobile', 'الهاتف المحمول المعتمد'],
            ['landline', 'الخط الأرضي', 'Landline', 'الخط الأرضي'],
            ['website', 'موقع إلكتروني', 'Website', 'موقع إلكتروني'],
            ['partnership_percentage', 'نسبة الشراكة', 'Partnership Percentage', 'نسبة الشراكة'],
            ['partnership_type', 'Partnership_Type', 'Partnership Type', 'نوع الشراكة'],
            ['note', 'ملحوظة', 'Note', 'ملحوظة']
        ],

        'Owner' => [
            ['facility_id', 'منشأة_id', 'Facility Id', 'معرف التسهيل'],
            ['owner_type', 'owner_type', 'Owner Type', 'نوع المالك']
        ],

        'branches' => [
            ['facility_id', 'Facility_id', 'Facility Id', 'معرف المنشأة'],
            ['avatar', 'الصورة الرمزية', 'Avatar', 'الصورة الرمزية'],
            ['unified_national_number', 'unified_national_number', 'Unified National Number', 'الرقم الوطني الموحد'],
            ['name', 'اسم', 'Name', 'اسم'],
            ['entity_id', 'entity_id', 'Entity Id', 'معرف الكيان'],
            ['company_type_id', 'Company_type_id', 'Company Type Id', 'معرف نوع الشركة'],
            ['company_size_id', 'Company_size_id', 'Company Size Id', 'معرف حجم الشركة'],
            ['city_id', 'city_id', 'City Id', 'معرف المدينة'],
            ['headquarter_id', 'headquarter_id', 'Headquarter Id', 'معرف المقر'],
            ['activity_id', 'Activity_id', 'Activity Id', 'معرف النشاط'],
            ['phone_number', 'رقم التليفون', 'Phone Number', 'رقم التليفون'],
            ['email', 'بريد إلكتروني', 'Email', 'بريد إلكتروني'],
            ['website', 'موقع إلكتروني', 'Website', 'موقع إلكتروني']
        ],

        'branch' => [
            ['facility_id', 'Facility_id', 'Facility Id', 'معرف المنشأة'],
            ['avatar', 'الصورة الرمزية', 'Avatar', 'الصورة الرمزية'],
            ['unified_national_number', 'الرقم_الوطني_الموحد', 'Unified National Number', 'الرقم الوطني الموحد'],
            ['name', 'اسم', 'Name', 'اسم'],
            ['entity_id', 'entity_id', 'Entity Id', 'معرف الكيان'],
            ['company_type_id', 'Company_type_id', 'Company Type Id', 'معرف نوع الشركة'],
            ['company_size_id', 'Company_size_id', 'Company Size Id', 'معرف حجم الشركة'],
            ['city_id', 'city_id', 'City Id', 'معرف المدينة'],
            ['headquarter_id', 'المقر الرئيسي', 'Headquarter Id', 'معرف المقر الرئيسي'],
            ['activity_id', 'Activity_id', 'Activity Id', 'معرف النشاط'],
            ['phone_number', 'رقم التليفون', 'Phone Number', 'رقم التليفون'],
            ['email', 'بريد إلكتروني', 'Email', 'بريد إلكتروني'],
            ['website', 'موقع إلكتروني', 'Website', 'موقع إلكتروني']
        ],

   
        'Facilities' => [
            ['name', 'اسم', 'Name', 'اسم'],
            ['have_branches', 'have_branches', 'Have Branches', 'لها فروع'],
            ['employee_count', 'الموظف', 'Employee Count', 'عدد الموظفين'],
            ['national_number_alone', 'الرقم_الوطني_وحده', 'National Number Alone', 'الرقم الوطني وحده'],
            ['status', 'حالة', 'Status', 'حالة'],
            ['activity', 'نشاط', 'Activity', 'نشاط'],
            ['completion_percentage', 'نسبة الإنجاز', 'Completion Percentage', 'نسبة الانتهاء']
        ],
];
         foreach ($columns as $model => $fields) {
            foreach ($fields as $field) {
                DB::table('columns_facilities')->insert([
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