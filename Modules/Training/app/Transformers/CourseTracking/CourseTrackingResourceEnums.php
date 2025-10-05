<?php

namespace Modules\Training\Transformers\CourseTracking;

use Modules\Training\Models\Course;
use App\Transformers\BaseEnums\BaseEnums;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseTrackingResourceEnums extends JsonResource
{
    public function toArray($request)
    {
       return [
                'course' => BaseEnums::collectionFrom(Course::all(), 'program_name'),
                'status' => [
                    [ 'label' => 'Not started', 'value' => 'not_started' ],
                    [ 'label' => 'In progress', 'value' => 'in_progress' ],
                    [ 'label' => 'Completed', 'value' => 'completed' ]
                ],

        ];
    }
}
