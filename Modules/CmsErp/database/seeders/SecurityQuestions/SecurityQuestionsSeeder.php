<?php

namespace Modules\CmsErp\Database\Seeders\SecurityQuestions;

use Illuminate\Database\Seeder;
use Modules\CmsErp\Models\SecurityQuestions;

class SecurityQuestionsSeeder extends Seeder
{
    public function run(): void
    {
        SecurityQuestions::firstOrCreate([
                'questions' => 'Sample questions 1',
        ]);

        SecurityQuestions::firstOrCreate([
                'questions' => 'Sample questions 2',
        ]);

        SecurityQuestions::firstOrCreate([
                'questions' => 'Sample questions 3',
        ]);

        SecurityQuestions::firstOrCreate([
                'questions' => 'Sample questions 4',
        ]);

        SecurityQuestions::firstOrCreate([
                'questions' => 'Sample questions 5',
        ]);

    }
}
