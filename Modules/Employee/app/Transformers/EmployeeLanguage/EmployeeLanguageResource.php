<?php

namespace Modules\Employee\Transformers\EmployeeLanguage;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 🔹 EmployeeLanguageResource
 */
class EmployeeLanguageResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'employee_id' => $this->employee_id,
            'language' => $this->language,
            'writing_level' => $this->writing_level,
            'reading_level' => $this->reading_level,
            'speaking_level' => $this->speaking_level,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
