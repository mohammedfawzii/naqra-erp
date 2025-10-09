<?php

namespace Modules\Employee\Transformers\EmployeeMedicalRecord;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 🔹 EmployeeMedicalRecordResource
 */
class EmployeeMedicalRecordResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'employee_id' => $this->employee_id,
            'certificate_number' => $this->certificate_number,
            'certificate_value' => $this->certificate_value,
            'certificate_start_date' => $this->certificate_start_date,
            'certificate_end_date' => $this->certificate_end_date,
            'regular_checkup_date' => $this->regular_checkup_date,
            'other_checkup_date' => $this->other_checkup_date,
            'medical_insurance' => $this->medical_insurance,
            'medical_insurance_category_id' => $this->medical_insurance_category_id,
            'medical_insurance_value' => $this->medical_insurance_value,
            'chronic_disease' => $this->chronic_disease,
            'blood_type' => $this->blood_type,
            'medical_condition' => $this->medical_condition,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
