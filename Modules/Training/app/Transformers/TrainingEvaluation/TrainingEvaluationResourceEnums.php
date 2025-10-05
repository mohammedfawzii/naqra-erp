<?php

namespace Modules\Training\Transformers\TrainingEvaluation;

use Modules\Training\Models\Course;
use App\Transformers\BaseEnums\BaseEnums;
use Illuminate\Http\Resources\Json\JsonResource;

class TrainingEvaluationResourceEnums extends JsonResource
{
    public function toArray($request)
    {
       return [
                'course' => BaseEnums::collectionFrom(Course::all(), 'program_name'),
                'satisfaction_level' => [
                    [ 'label' => 'Very low', 'value' => 'very_low' ],
                    [ 'label' => 'Low', 'value' => 'low' ],
                    [ 'label' => 'Medium', 'value' => 'medium' ],
                    [ 'label' => 'High', 'value' => 'high' ],
                    [ 'label' => 'Very high', 'value' => 'very_high' ]
                ],

        ];
    }
}
