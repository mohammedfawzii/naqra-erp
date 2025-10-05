<?php

namespace Modules\Performance\Database\Seeders\Evaluation;

use Illuminate\Database\Seeder;
use Modules\Performance\Models\Evaluation;

class EvaluationSeeder extends Seeder
{
    public function run(): void
    {
        $evaluations = [
            [
                'employeeinfo_id' => 1,
                'evaluation_date' => '2024-09-28',
                'rating' => 85,
                'comments' => 'Good performance, needs slight improvement in communication.',
                'competencies' => 'Teamwork, Communication',
            ],
            [
                'employeeinfo_id' => 1,
                'evaluation_date' => '2024-10-10',
                'rating' => 92,
                'comments' => 'Excellent contribution to the last project.',
                'competencies' => 'Problem Solving, Leadership',
            ],
            [
                'employeeinfo_id' => 1,
                'evaluation_date' => '2023-11-15',
                'rating' => 76,
                'comments' => 'Solid technical skills, can improve in time management.',
                'competencies' => 'Technical Knowledge, Time Management',
            ],
            [
                'employeeinfo_id' => 1,
                'evaluation_date' => '2022-07-20',
                'rating' => 64,
                'comments' => 'Average performance, requires training on new tools.',
                'competencies' => 'Adaptability, Learning',
            ],
            [
                'employeeinfo_id' => 1,
                'evaluation_date' => '2021-05-05',
                'rating' => 58,
                'comments' => 'Below expectations, needs closer follow-up.',
                'competencies' => 'Discipline, Responsibility',
            ],
        ];

        foreach ($evaluations as $data) {
            Evaluation::firstOrCreate($data);
        }
    }
}
