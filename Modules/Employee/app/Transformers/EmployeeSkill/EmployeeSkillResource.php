<?php

namespace Modules\Employee\Transformers\EmployeeSkill;

use App\Transformers\BaseResource\BaseMetaResource;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 🔹 EmployeeSkillResource
 */
class EmployeeSkillResource extends BaseMetaResource
{
    public function toArray($request): array
    {
                   return $this->mergeWithTimestamps([

            'employee_id' => $this->employee_id,
            'skill' => $this->skill,
            'skill_level' => $this->skill_level,
            'date' => $this->date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);
    }
}
