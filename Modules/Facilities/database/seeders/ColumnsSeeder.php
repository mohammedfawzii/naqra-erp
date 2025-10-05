<?php

namespace Modules\Facilities\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColumnsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('columns_facilities')->insert(
            [
                ['model' => 'User', 'key' => json_encode(array(
                    'en' => 'userName',
                    'ar' => 'اسم المستخدم',
                ), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array(
                    'en' => 'Username',
                    'ar' => 'اسم المستخدم',
                ), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-17 22:16:01', 'updated_at' => '2025-09-17 22:16:01'],
                ['model' => 'User', 'key' => json_encode(array(
                    'en' => 'email',
                    'ar' => 'بريد إلكتروني',
                ), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array(
                    'en' => 'Email',
                    'ar' => 'بريد إلكتروني',
                ), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-17 22:16:01', 'updated_at' => '2025-09-17 22:16:01'],
                ['model' => 'User', 'key' => json_encode(array(
                    'en' => 'fullName',
                    'ar' => 'fullname',
                ), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array(
                    'en' => 'Fullname',
                    'ar' => 'fullname',
                ), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-17 22:16:05', 'updated_at' => '2025-09-17 22:16:05'],
                ['model' => 'User', 'key' => json_encode(array(
                    'en' => 'mobileNumber',
                    'ar' => 'رقم الهاتف المحمول',
                ), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array(
                    'en' => 'Mobilenumber',
                    'ar' => 'رقم الهاتف المحمول',
                ), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-17 22:16:05', 'updated_at' => '2025-09-17 22:16:05'],
                ['model' => 'User', 'key' => json_encode(array(
                    'en' => 'securityQuestion',
                    'ar' => 'مسألة أمان',
                ), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array(
                    'en' => 'Securityquestion',
                    'ar' => '.مسألة أمان',
                ), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-17 22:16:06', 'updated_at' => '2025-09-17 22:16:06'],
                ['model' => 'User', 'key' => json_encode(array(
                    'en' => 'security_answer',
                    'ar' => 'Security_answer',
                ), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array(
                    'en' => 'Security Answer',
                    'ar' => 'إجابة أمنية',
                ), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-17 22:16:06', 'updated_at' => '2025-09-17 22:16:06'],
                ['model' => 'User', 'key' => json_encode(array(
                    'en' => 'gender',
                    'ar' => 'جنس',
                ), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array(
                    'en' => 'Gender',
                    'ar' => 'جنس',
                ), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-17 22:16:06', 'updated_at' => '2025-09-17 22:16:06'],
                ['model' => 'User', 'key' => json_encode(array(
                    'en' => 'nationality',
                    'ar' => 'جنسية',
                ), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array(
                    'en' => 'Nationality',
                    'ar' => 'جنسية',
                ), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-17 22:16:06', 'updated_at' => '2025-09-17 22:16:06'],
                ['model' => 'User', 'key' => json_encode(array(
                    'en' => 'language',
                    'ar' => 'لغة',
                ), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array(
                    'en' => 'Language',
                    'ar' => 'لغة',
                ), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-17 22:16:07', 'updated_at' => '2025-09-17 22:16:07'],
                ['model' => 'User', 'key' => json_encode(array(
                    'en' => 'termsAccepted',
                    'ar' => 'مصطلح',
                ), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array(
                    'en' => 'Termsaccepted',
                    'ar' => 'مصطلح',
                ), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-17 22:16:07', 'updated_at' => '2025-09-17 22:16:07']
            ]
        );
        DB::table('columns_facilities')->insert(
            [
                ['model' => 'Facilities', 'key' => json_encode(array(
                    'en' => 'img',
                    'ar' => 'IMG',
                ), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array(
                    'en' => 'Img',
                    'ar' => 'IMG',
                ), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-17 22:16:25', 'updated_at' => '2025-09-17 22:16:25'],
                ['model' => 'Facilities', 'key' => json_encode(array(
                    'en' => 'unified_national_number',
                    'ar' => 'unified_national_number',
                ), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array(
                    'en' => 'Unified National Number',
                    'ar' => 'الرقم الوطني الموحد',
                ), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-17 22:16:25', 'updated_at' => '2025-09-17 22:16:25'],
                ['model' => 'Facilities', 'key' => json_encode(array(
                    'en' => 'company_name_ar',
                    'ar' => 'company_name_ar',
                ), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array(
                    'en' => 'Company Name Ar',
                    'ar' => 'اسم الشركة AR',
                ), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-17 22:16:25', 'updated_at' => '2025-09-17 22:16:25'],
                ['model' => 'Facilities', 'key' => json_encode(array(
                    'en' => 'company_name_en',
                    'ar' => 'Company_name_en',
                ), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array(
                    'en' => 'Company Name En',
                    'ar' => 'اسم الشركة في',
                ), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-17 22:16:26', 'updated_at' => '2025-09-17 22:16:26'],
                ['model' => 'Facilities', 'key' => json_encode(array(
                    'en' => 'companyType',
                    'ar' => 'CompanyType',
                ), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array(
                    'en' => 'Companytype',
                    'ar' => 'CompanyType',
                ), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-17 22:16:26', 'updated_at' => '2025-09-17 22:16:26'],
                ['model' => 'Facilities', 'key' => json_encode(array(
                    'en' => 'companySize',
                    'ar' => 'حجم الشركة',
                ), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array(
                    'en' => 'Companysize',
                    'ar' => 'حجم الشركة',
                ), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-17 22:16:26', 'updated_at' => '2025-09-17 22:16:26'],
                ['model' => 'Facilities', 'key' => json_encode(array(
                    'en' => 'companyHeadquarters',
                    'ar' => 'مقر الشركة',
                ), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array(
                    'en' => 'Companyheadquarters',
                    'ar' => 'مقر الشركة',
                ), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-17 22:16:27', 'updated_at' => '2025-09-17 22:16:27'],
                ['model' => 'Facilities', 'key' => json_encode(array(
                    'en' => 'companyActivities',
                    'ar' => 'شركة CompanyActivities',
                ), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array(
                    'en' => 'Companyactivities',
                    'ar' => 'شركة CompanyActivities',
                ), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-17 22:16:28', 'updated_at' => '2025-09-17 22:16:28']
            ]
        );
        DB::table('columns_facilities')->insert(
            [
                ['model' => 'Owner', 'key' => json_encode(array(
                    'en' => 'full_name',
                    'ar' => 'full_name',
                ), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array(
                    'en' => 'Full Name',
                    'ar' => 'الاسم الكامل',
                ), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 00:13:14', 'updated_at' => '2025-09-20 00:13:14'],
                ['model' => 'Owner', 'key' => json_encode(array(
                    'en' => 'ownerType',
                    'ar' => 'Owntype',
                ), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array(
                    'en' => 'Ownertype',
                    'ar' => 'Owntype',
                ), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 00:13:14', 'updated_at' => '2025-09-20 00:13:14'],
                ['model' => 'Owner', 'key' => json_encode(array(
                    'en' => 'national_id_number',
                    'ar' => 'national_id_number',
                ), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array(
                    'en' => 'National Id Number',
                    'ar' => 'رقم الهوية الوطني',
                ), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 00:13:15', 'updated_at' => '2025-09-20 00:13:15'],
                ['model' => 'Owner', 'key' => json_encode(array(
                    'en' => 'jobTitle',
                    'ar' => 'مسمى وظيفي',
                ), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array(
                    'en' => 'Jobtitle',
                    'ar' => 'مسمى وظيفي',
                ), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 00:13:17', 'updated_at' => '2025-09-20 00:13:17'],
                ['model' => 'Owner', 'key' => json_encode(array(
                    'en' => 'date_of_birth',
                    'ar' => 'تاريخ الميلاد',
                ), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array(
                    'en' => 'Date Of Birth',
                    'ar' => 'تاريخ الميلاد',
                ), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 00:13:18', 'updated_at' => '2025-09-20 00:13:18'],
                ['model' => 'Owner', 'key' => json_encode(array(
                    'en' => 'gender',
                    'ar' => 'جنس',
                ), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array(
                    'en' => 'Gender',
                    'ar' => 'جنس',
                ), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 00:13:18', 'updated_at' => '2025-09-20 00:13:18'],
                ['model' => 'Owner', 'key' => json_encode(array(
                    'en' => 'country',
                    'ar' => 'دولة',
                ), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array(
                    'en' => 'Country',
                    'ar' => 'دولة',
                ), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 00:13:19', 'updated_at' => '2025-09-20 00:13:19'],
                ['model' => 'Owner', 'key' => json_encode(array(
                    'en' => 'city',
                    'ar' => 'مدينة',
                ), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array(
                    'en' => 'City',
                    'ar' => 'مدينة',
                ), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 00:13:19', 'updated_at' => '2025-09-20 00:13:19'],
                ['model' => 'Owner', 'key' => json_encode(array(
                    'en' => 'company_details',
                    'ar' => 'company_details',
                ), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array(
                    'en' => 'Company Details',
                    'ar' => 'تفاصيل الشركة',
                ), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 00:13:20', 'updated_at' => '2025-09-20 00:13:20']
            ]
        );

            DB::table('columns_facilities')->insert(
            [
            ['model' => 'DigitalFacility', 'key' => json_encode(array (
  'en' => 'name',
  'ar' => 'اسم',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Name',
  'ar' => 'اسم',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 14:43:25', 'updated_at' => '2025-09-20 14:43:25'],
            ['model' => 'DigitalFacility', 'key' => json_encode(array (
  'en' => 'total_employees',
  'ar' => 'Total_employees',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Total Employees',
  'ar' => 'إجمالي الموظفين',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 14:43:25', 'updated_at' => '2025-09-20 14:43:25'],
            ['model' => 'DigitalFacility', 'key' => json_encode(array (
  'en' => 'unified_national_number',
  'ar' => 'unified_national_number',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Unified National Number',
  'ar' => 'الرقم الوطني الموحد',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 14:43:26', 'updated_at' => '2025-09-20 14:43:26'],
            ['model' => 'DigitalFacility', 'key' => json_encode(array (
  'en' => 'tax_number',
  'ar' => 'Tax_number',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Tax Number',
  'ar' => 'الرقم الضريبي',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 14:43:26', 'updated_at' => '2025-09-20 14:43:26'],
            ['model' => 'DigitalFacility', 'key' => json_encode(array (
  'en' => 'commercial_record_value',
  'ar' => 'commercial_record_value',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Commercial Record Value',
  'ar' => 'قيمة السجل التجاري',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 14:43:27', 'updated_at' => '2025-09-20 14:43:27'],
            ['model' => 'DigitalFacility', 'key' => json_encode(array (
  'en' => 'capital',
  'ar' => 'عاصمة',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Capital',
  'ar' => 'عاصمة',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 14:43:28', 'updated_at' => '2025-09-20 14:43:28'],
            ['model' => 'DigitalFacility', 'key' => json_encode(array (
  'en' => 'start_date',
  'ar' => 'تاريخ البدء',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Start Date',
  'ar' => 'تاريخ البدء',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 14:43:29', 'updated_at' => '2025-09-20 14:43:29'],
            ['model' => 'DigitalFacility', 'key' => json_encode(array (
  'en' => 'annual_confirmation_date',
  'ar' => 'السنوية _confirmation_date',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Annual Confirmation Date',
  'ar' => 'تاريخ التأكيد السنوي',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 14:43:30', 'updated_at' => '2025-09-20 14:43:30'],
            ['model' => 'DigitalFacility', 'key' => json_encode(array (
  'en' => 'financial_year_start',
  'ar' => 'financial_year_start',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Financial Year Start',
  'ar' => 'تبدأ السنة المالية',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 14:43:31', 'updated_at' => '2025-09-20 14:43:31'],
            ['model' => 'DigitalFacility', 'key' => json_encode(array (
  'en' => 'financial_year_end',
  'ar' => 'financial_year_end',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Financial Year End',
  'ar' => 'نهاية السنة المالية',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 14:43:32', 'updated_at' => '2025-09-20 14:43:32'],
            ['model' => 'DigitalFacility', 'key' => json_encode(array (
  'en' => 'facilityAttachments',
  'ar' => 'FacilityAttachments',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Facilityattachments',
  'ar' => 'FacilityAttachments',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 14:43:33', 'updated_at' => '2025-09-20 14:43:33']
        ]
        );
            DB::table('columns_facilities')->insert(
            [
            ['model' => 'Branches', 'key' => json_encode(array (
  'en' => 'name',
  'ar' => 'اسم',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Name',
  'ar' => 'اسم',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 16:01:41', 'updated_at' => '2025-09-20 16:01:41'],
            ['model' => 'Branches', 'key' => json_encode(array (
  'en' => 'registration_number',
  'ar' => 'التسجيل',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Registration Number',
  'ar' => 'رقم التسجيل',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 16:01:42', 'updated_at' => '2025-09-20 16:01:42'],
            ['model' => 'Branches', 'key' => json_encode(array (
  'en' => 'address',
  'ar' => 'عنوان',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Address',
  'ar' => 'عنوان',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 16:01:42', 'updated_at' => '2025-09-20 16:01:42'],
            ['model' => 'Branches', 'key' => json_encode(array (
  'en' => 'branchTypes',
  'ar' => 'BranchTypes',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Branchtypes',
  'ar' => 'BranchTypes',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 16:01:43', 'updated_at' => '2025-09-20 16:01:43'],
            ['model' => 'Branches', 'key' => json_encode(array (
  'en' => 'registration_start_date',
  'ar' => 'registration_start_date',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Registration Start Date',
  'ar' => 'تاريخ بدء التسجيل',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 16:01:44', 'updated_at' => '2025-09-20 16:01:44'],
            ['model' => 'Branches', 'key' => json_encode(array (
  'en' => 'registration_end_date',
  'ar' => 'registration_end_date',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Registration End Date',
  'ar' => 'تاريخ نهاية التسجيل',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 16:01:45', 'updated_at' => '2025-09-20 16:01:45'],
            ['model' => 'Branches', 'key' => json_encode(array (
  'en' => 'facilityAttachments',
  'ar' => 'FacilityAttachments',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Facilityattachments',
  'ar' => 'FacilityAttachments',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 16:01:45', 'updated_at' => '2025-09-20 16:01:45']
        ]
        );
            DB::table('columns_facilities')->insert(
            [
            ['model' => 'License', 'key' => json_encode(array (
  'en' => 'ministryName',
  'ar' => 'الوزارة',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Ministryname',
  'ar' => 'الوزارة',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 21:03:13', 'updated_at' => '2025-09-20 21:03:13'],
            ['model' => 'License', 'key' => json_encode(array (
  'en' => 'license_address',
  'ar' => 'ترخيص _address',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'License Address',
  'ar' => 'عنوان الترخيص',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 21:03:14', 'updated_at' => '2025-09-20 21:03:14'],
            ['model' => 'License', 'key' => json_encode(array (
  'en' => 'license_number',
  'ar' => 'ترخيص _number',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'License Number',
  'ar' => 'رقم الترخيص',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 21:03:15', 'updated_at' => '2025-09-20 21:03:15'],
            ['model' => 'License', 'key' => json_encode(array (
  'en' => 'licenseType',
  'ar' => 'نوع الترخيص',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Licensetype',
  'ar' => 'نوع الترخيص',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 21:03:16', 'updated_at' => '2025-09-20 21:03:16'],
            ['model' => 'License', 'key' => json_encode(array (
  'en' => 'license_value',
  'ar' => 'ترخيص _value',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'License Value',
  'ar' => 'قيمة الترخيص',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 21:03:16', 'updated_at' => '2025-09-20 21:03:16'],
            ['model' => 'License', 'key' => json_encode(array (
  'en' => 'branch_area',
  'ar' => 'Branch_area',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Branch Area',
  'ar' => 'منطقة الفرع',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 21:03:17', 'updated_at' => '2025-09-20 21:03:17'],
            ['model' => 'License', 'key' => json_encode(array (
  'en' => 'license_start_date',
  'ar' => 'ترخيص _start_date',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'License Start Date',
  'ar' => 'تاريخ بدء الترخيص',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 21:03:18', 'updated_at' => '2025-09-20 21:03:18'],
            ['model' => 'License', 'key' => json_encode(array (
  'en' => 'license_end_date',
  'ar' => 'ترخيص _end_date',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'License End Date',
  'ar' => 'تاريخ نهاية الترخيص',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 21:03:19', 'updated_at' => '2025-09-20 21:03:19'],
            ['model' => 'License', 'key' => json_encode(array (
  'en' => 'branch',
  'ar' => 'فرع',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Branch',
  'ar' => 'فرع',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 21:03:19', 'updated_at' => '2025-09-20 21:03:19']
        ]
        );
            DB::table('columns_facilities')->insert(
            [
            ['model' => 'SubscriptionFacilities', 'key' => json_encode(array (
  'en' => 'subscription',
  'ar' => 'الاشتراك',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Subscription',
  'ar' => 'الاشتراك',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 21:45:47', 'updated_at' => '2025-09-20 21:45:47'],
            ['model' => 'SubscriptionFacilities', 'key' => json_encode(array (
  'en' => 'subscriptionTypes',
  'ar' => 'أنواع الاشتراك',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Subscriptiontypes',
  'ar' => 'أنواع الاشتراك',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 21:45:48', 'updated_at' => '2025-09-20 21:45:48'],
            ['model' => 'SubscriptionFacilities', 'key' => json_encode(array (
  'en' => 'invoice_number',
  'ar' => 'فاتورة',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Invoice Number',
  'ar' => 'رقم الفاتورة',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 21:45:49', 'updated_at' => '2025-09-20 21:45:49'],
            ['model' => 'SubscriptionFacilities', 'key' => json_encode(array (
  'en' => 'invoice_value',
  'ar' => 'فاتورة',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Invoice Value',
  'ar' => 'قيمة الفاتورة',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 21:45:49', 'updated_at' => '2025-09-20 21:45:49'],
            ['model' => 'SubscriptionFacilities', 'key' => json_encode(array (
  'en' => 'start_date',
  'ar' => 'تاريخ البدء',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Start Date',
  'ar' => 'تاريخ البدء',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 21:45:50', 'updated_at' => '2025-09-20 21:45:50'],
            ['model' => 'SubscriptionFacilities', 'key' => json_encode(array (
  'en' => 'end_date',
  'ar' => 'end_date',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'End Date',
  'ar' => 'تاريخ الانتهاء',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 21:45:50', 'updated_at' => '2025-09-20 21:45:50'],
            ['model' => 'SubscriptionFacilities', 'key' => json_encode(array (
  'en' => 'reminder_date',
  'ar' => 'تذكير',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Reminder Date',
  'ar' => 'تاريخ التذكير',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 21:45:50', 'updated_at' => '2025-09-20 21:45:50'],
            ['model' => 'SubscriptionFacilities', 'key' => json_encode(array (
  'en' => 'notes',
  'ar' => 'ملحوظات',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Notes',
  'ar' => 'ملحوظات',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 21:45:51', 'updated_at' => '2025-09-20 21:45:51'],
            ['model' => 'SubscriptionFacilities', 'key' => json_encode(array (
  'en' => 'facilityAttachments',
  'ar' => 'FacilityAttachments',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Facilityattachments',
  'ar' => 'FacilityAttachments',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 21:45:51', 'updated_at' => '2025-09-20 21:45:51']
        ]
        );
            DB::table('columns_facilities')->insert(
            [
            ['model' => 'periodicObligations', 'key' => json_encode(array (
  'en' => 'zakat_due_date',
  'ar' => 'ZAKAT_DUE_DATE',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Zakat Due Date',
  'ar' => 'زكاة تاريخ الاستحقاق',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 22:26:15', 'updated_at' => '2025-09-20 22:26:15'],
            ['model' => 'periodicObligations', 'key' => json_encode(array (
  'en' => 'zakat_reminder_date',
  'ar' => 'Zakat_Reminder_Date',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Zakat Reminder Date',
  'ar' => 'تاريخ تذكير الزكاة',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 22:26:15', 'updated_at' => '2025-09-20 22:26:15'],
            ['model' => 'periodicObligations', 'key' => json_encode(array (
  'en' => 'tax_declaration_due_date',
  'ar' => 'Tax_declaration_due_date',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Tax Declaration Due Date',
  'ar' => 'تاريخ استحقاق الإعلان الضريبي',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 22:26:16', 'updated_at' => '2025-09-20 22:26:16'],
            ['model' => 'periodicObligations', 'key' => json_encode(array (
  'en' => 'tax_declaration_reminder_date',
  'ar' => 'Tax_Declaration_Reminder_Date',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Tax Declaration Reminder Date',
  'ar' => 'تاريخ تذكير الإعلان الضريبي',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 22:26:17', 'updated_at' => '2025-09-20 22:26:17'],
            ['model' => 'periodicObligations', 'key' => json_encode(array (
  'en' => 'salary_due_date',
  'ar' => 'SALARY_DUE_DATE',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Salary Due Date',
  'ar' => 'تاريخ استحقاق الراتب',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 22:26:18', 'updated_at' => '2025-09-20 22:26:18'],
            ['model' => 'periodicObligations', 'key' => json_encode(array (
  'en' => 'salary_reminder_date',
  'ar' => 'SALARY_REMINDER_DATE',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Salary Reminder Date',
  'ar' => 'تاريخ تذكير الراتب',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 22:26:18', 'updated_at' => '2025-09-20 22:26:18'],
            ['model' => 'periodicObligations', 'key' => json_encode(array (
  'en' => 'facilityAttachments',
  'ar' => 'FacilityAttachments',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Facilityattachments',
  'ar' => 'FacilityAttachments',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 22:26:19', 'updated_at' => '2025-09-20 22:26:19']
        ]
        );
            DB::table('columns_facilities')->insert(
            [
            ['model' => 'MedicalInsurancesFacilities', 'key' => json_encode(array (
  'en' => 'company_name',
  'ar' => 'Company_name',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Company Name',
  'ar' => 'اسم الشركة',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 22:55:08', 'updated_at' => '2025-09-20 22:55:08'],
            ['model' => 'MedicalInsurancesFacilities', 'key' => json_encode(array (
  'en' => 'policy_number',
  'ar' => 'Policy_number',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Policy Number',
  'ar' => 'رقم السياسة',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 22:55:09', 'updated_at' => '2025-09-20 22:55:09'],
            ['model' => 'MedicalInsurancesFacilities', 'key' => json_encode(array (
  'en' => 'medicalInsuranceCategories',
  'ar' => 'فئات التأمين الطبي',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Medicalinsurancecategories',
  'ar' => 'فئات التأمين الطبي',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 22:55:09', 'updated_at' => '2025-09-20 22:55:09'],
            ['model' => 'MedicalInsurancesFacilities', 'key' => json_encode(array (
  'en' => 'start_date',
  'ar' => 'تاريخ البدء',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'Start Date',
  'ar' => 'تاريخ البدء',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 22:55:10', 'updated_at' => '2025-09-20 22:55:10'],
            ['model' => 'MedicalInsurancesFacilities', 'key' => json_encode(array (
  'en' => 'end_date',
  'ar' => 'end_date',
), JSON_UNESCAPED_UNICODE), 'label' => json_encode(array (
  'en' => 'End Date',
  'ar' => 'تاريخ الانتهاء',
), JSON_UNESCAPED_UNICODE), 'sortable' => true, 'filterable' => true, 'created_at' => '2025-09-20 22:55:10', 'updated_at' => '2025-09-20 22:55:10']
        ]
        );
    }
}