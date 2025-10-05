<?php

namespace Modules\CmsErp\Database\Seeders;


use Illuminate\Database\Seeder;

class CmsErpDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(Attendance\AttendanceSeeder::class);
        $this->call(Bank\BankSeeder::class);
        $this->call(PaymentMethod\PaymentMethodSeeder::class);
        $this->call(SubscriptionType\SubscriptionTypeSeeder::class);
        $this->call(Country\CountrySeeder::class);
        $this->call(City\CitySeeder::class);
        $this->call(ActivityGeneral\ActivityGeneralSeeder::class);

        $this->call(ActivityPrivate\ActivityPrivateSeeder::class);

        $this->call(ActivitySpecific\ActivitySpecificSeeder::class);

        $this->call(Nationality\NationalitySeeder::class);
        $this->call(BloodType\BloodTypeSeeder::class);
        $this->call(Allowance\AllowanceSeeder::class);
        $this->call(SecurityQuestions\SecurityQuestionsSeeder::class);
        $this->call(ReligionSeeder::class);
        $this->call(CompanyTypeSeeder::class);
        $this->call(CompanyHeadquarterSeeder::class);

        $this->call(Language\LanguageSeeder::class);

        $this->call([
            CurrencySeeder::class,
            HolidayListSeeder::class
         ]);
    }
}
