<?php

namespace Modules\CmsErp\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\CmsErp\Database\Seeders\SalaryTypeSeeder;
use Modules\CmsErp\Database\Seeders\Setting\SettingSeeder;
use Modules\CmsErp\Database\Seeders\MedicalInsuranceCategorieSeeder;

class CmsErpDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            SettingSeeder::class,
            Attendance\AttendanceSeeder::class,
            Bank\BankSeeder::class,
            PaymentMethod\PaymentMethodSeeder::class,
            SubscriptionType\SubscriptionTypeSeeder::class,
            Country\CountrySeeder::class,
            City\CitySeeder::class,
            ActivityGeneral\ActivityGeneralSeeder::class,
            ActivityPrivate\ActivityPrivateSeeder::class,
            ActivitySpecific\ActivitySpecificSeeder::class,
            Nationality\NationalitySeeder::class,
            BloodType\BloodTypeSeeder::class,
            Allowance\AllowanceSeeder::class,
            SecurityQuestions\SecurityQuestionsSeeder::class,
            ReligionSeeder::class,
            CompanyTypeSeeder::class,
            CompanyHeadquarterSeeder::class,
            Language\LanguageSeeder::class,
            CurrencySeeder::class,
            HolidayListSeeder::class,
            MedicalInsuranceCategorieSeeder::class,
            SalaryTypeSeeder::class,
        ]);
    }
}
