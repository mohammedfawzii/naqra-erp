<?php

namespace Modules\Employee\Transformers\EmployeeContact;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 🔹 EmployeeContactResource
 */
class EmployeeContactResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'employee_id' => $this->employee_id,
            'personal_email' => $this->personal_email,
            'company_email' => $this->company_email,
            'contact_email' => $this->contact_email,
            'mobile_number' => $this->mobile_number,
            'mobile_number_two' => $this->mobile_number_two,
            'emergency_contact_name' => $this->emergency_contact_name,
            'emergency_contact_phone' => $this->emergency_contact_phone,
            'job_title' => $this->job_title,
            'relation' => $this->relation,
            'company_name' => $this->company_name,
            'company_phone' => $this->company_phone,
            'notes' => $this->notes,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
