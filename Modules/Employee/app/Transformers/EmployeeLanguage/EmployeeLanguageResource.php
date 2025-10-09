<?php

namespace Modules\Employee\Transformers\EmployeeLanguage;

use App\Transformers\BaseResource\BaseMetaResource;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 🔹 EmployeeLanguageResource
 */
class EmployeeLanguageResource extends BaseMetaResource
{
    public function toArray($request): array
    {
            return $this->mergeWithTimestamps([
            'employee_id' => $this->employee_id,
            'language' => $this->language,
            'writing_level' => $this->writing_level,
            'reading_level' => $this->reading_level,
            'speaking_level' => $this->speaking_level,
          
        ]);
    }
}
