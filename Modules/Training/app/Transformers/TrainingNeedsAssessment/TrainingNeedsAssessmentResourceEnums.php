<?php

namespace Modules\Training\Transformers\TrainingNeedsAssessment;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Transformers\BaseEnums\BaseEnums;


class TrainingNeedsAssessmentResourceEnums extends JsonResource
{
    public function toArray($request)
    {
       return [
                'needs_priority' => [
                    [ 'label' => 'High', 'value' => 'high' ],
                    [ 'label' => 'Medium', 'value' => 'medium' ],
                    [ 'label' => 'Low', 'value' => 'low' ]
                ],

        ];
    }
}
