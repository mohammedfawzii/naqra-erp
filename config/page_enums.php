<?php

use Modules\CmsErp\Models\City;
use Modules\CmsErp\Transformers\City\CityResource;

return [
    'EmployeePage' => [
         'status'   => ['active', 'inactive', 'terminated'],
        'gender'   => ['male', 'female'],

        'vacations' => [City::class, CityResource::class],
    ],

    'AttendancePage' => [
        'attendance_status' => ['present', 'absent', 'late'],
    ],
];
