<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColumnsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('columns')->insert([
            'model' => 'User',
            'columns' => '{
    "id": {
        "type": "bigint",
        "label": "Id"
    },
    "userName": {
        "type": "varchar",
        "label": "UserName"
    },
    "email": {
        "type": "varchar",
        "label": "Email"
    },
    "fullName": {
        "type": "text",
        "label": "FullName"
    },
    "password": {
        "type": "varchar",
        "label": "Password"
    },
    "mobileNumber": {
        "type": "varchar",
        "label": "MobileNumber"
    },
    "securityQuestion_id": {
        "type": "int",
        "label": "SecurityQuestion id"
    },
    "security_answer": {
        "type": "varchar",
        "label": "Security answer"
    },
    "gender": {
        "type": "enum",
        "label": "Gender"
    },
    "nationality_id": {
        "type": "bigint",
        "label": "Nationality id"
    },
    "language_id": {
        "type": "bigint",
        "label": "Language id"
    },
    "termsAccepted": {
        "type": "tinyint",
        "label": "TermsAccepted"
    },
    "created_at": {
        "type": "timestamp",
        "label": "Created at"
    },
    "updated_at": {
        "type": "timestamp",
        "label": "Updated at"
    }
}',
        ]);

        DB::table('columns')->insert([
            'model' => 'Facilities',
            'columns' => '{
    "id": {
        "type": "bigint",
        "label": "Id"
    },
    "img": {
        "type": "varchar",
        "label": "Img"
    },
    "unified_national_number": {
        "type": "varchar",
        "label": "Unified national number"
    },
    "company_name_ar": {
        "type": "varchar",
        "label": "Company name ar"
    },
    "company_name_en": {
        "type": "varchar",
        "label": "Company name en"
    },
    "company_type_id": {
        "type": "int",
        "label": "Company type id"
    },
    "company_size_id": {
        "type": "int",
        "label": "Company size id"
    },
    "company_headquarters_id": {
        "type": "int",
        "label": "Company headquarters id"
    },
    "company_activities_id": {
        "type": "int",
        "label": "Company activities id"
    },
    "created_at": {
        "type": "timestamp",
        "label": "Created at"
    },
    "updated_at": {
        "type": "timestamp",
        "label": "Updated at"
    }
}',
        ]);

    }
}
