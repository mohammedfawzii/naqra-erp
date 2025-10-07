<?php

namespace Modules\Employee\Transformers\EmployeeDebendent;
 use Modules\Employee\Transformers\BaseResource\BaseResource;
class EmployeeDebendentResource extends BaseResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'ss'=>'ss',
            'employee_id' => $this->employee_id,
            'full_name' => $this->full_name,
            'relationship' => $this->relationship,
            'birth_date' => $this->birth_date,
            'birth_place' => $this->birth_place,
            'nationality_id' => $this->nationality_id,
            'gender' => $this->gender,
            'national_id_number' => $this->national_id_number,
            'id_issue_date' => $this->id_issue_date,
            'id_expiry_date' => $this->id_expiry_date,
            'mobile_number' => $this->mobile_number,
            'passport_number' => $this->passport_number,
            'passport_issue_date' => $this->passport_issue_date,
            'passport_expiry_date' => $this->passport_expiry_date,
            'passport_issue_place' => $this->passport_issue_place,
            'health_status' => $this->health_status,
            'medical_test_status' => $this->medical_test_status,
            'notes' => $this->notes,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
