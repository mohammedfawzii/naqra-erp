<?php

namespace Modules\Training\Transformers\InternalTrainingManagement;

use Modules\Training\Models\Course;
use App\Transformers\BaseEnums\BaseEnums;
use Illuminate\Http\Resources\Json\JsonResource;

class InternalTrainingManagementResourceEnums extends JsonResource
{
    public function toArray($request)
    {
       return [
                'course' => BaseEnums::collectionFrom(Course::all(), 'program_name'),

        ];
    }
}
