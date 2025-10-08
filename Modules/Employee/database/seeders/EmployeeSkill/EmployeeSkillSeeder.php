<?php

namespace Modules\Employee\Database\Seeders\EmployeeSkill;

use Illuminate\Database\Seeder;
use Modules\Employee\Models\EmployeeSkill;

class EmployeeSkillSeeder extends Seeder
{
    public function run(): void
    {
        $employee_skills = [
            [
                'employee_id' => 2,
                'skill' => 'Sample skill 1',
                'skill_level' => 'Sample skill_level 1',
                'date' => '2005-10-08',
            ],
            [
                'employee_id' => 1,
                'skill' => 'Sample skill 2',
                'skill_level' => 'Sample skill_level 2',
                'date' => '2020-10-08',
            ],
            [
                'employee_id' => 1,
                'skill' => 'Sample skill 3',
                'skill_level' => 'Sample skill_level 3',
                'date' => '2010-10-08',
            ],
            [
                'employee_id' => 2,
                'skill' => 'Sample skill 4',
                'skill_level' => 'Sample skill_level 4',
                'date' => '2006-10-08',
            ],
            [
                'employee_id' => 1,
                'skill' => 'Sample skill 5',
                'skill_level' => 'Sample skill_level 5',
                'date' => '2020-10-08',
            ],
        ];

        foreach ($employee_skills as $data) {
            EmployeeSkill::firstOrCreate($data);
        }
    }
}
