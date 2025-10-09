<?php

namespace Modules\Employee\Database\Seeders\EmployeeContact;

use Illuminate\Database\Seeder;
use Modules\Employee\Models\EmployeeContact;

class EmployeeContactSeeder extends Seeder
{
    public function run(): void
    {
       $employee_contacts = [
    [
        'employee_id' => 1,
        'personal_email' => 'personal1@example.com',
        'company_email' => 'company1@example.com',
        'contact_email' => 'contact1@example.com',
        'mobile_number' => '01012345678',
        'mobile_number_two' => '01087654321',
        'emergency_contact_name' => 'Ahmed Samir',
        'emergency_contact_phone' => '01011223344',
        'job_title' => ['en'=>'Developer','ar'=>'مطور'], // لو JSON
        'relation' => 'father',
        'company_name' => 'Company One',
        'company_phone' => '01012345678',
        'notes' => 'Some notes',
    ],


        ];

        foreach ($employee_contacts as $data) {
            EmployeeContact::firstOrCreate($data);
        }
    }
}
