<?php

namespace Modules\Employee\Http\Requests\EmployeeMedicalRecord;

 use Modules\Employee\Http\Requests\BaseRequest\UpdateBaseRequest;


class EmployeeMedicalRecordUpdateRequest extends UpdateBaseRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'certificate_number' => 'nullable|sometimes|string|max:255',
            'certificate_value' => 'nullable|sometimes|numeric',
            'certificate_start_date' => 'nullable|sometimes|date',
            'certificate_end_date' => 'nullable|sometimes|date',
            'regular_checkup_date' => 'nullable|sometimes|date',
            'other_checkup_date' => 'nullable|sometimes|date',
            'medical_insurance' => 'nullable|sometimes|string|max:255',
            'medical_insurance_category_id' => 'nullable|sometimes|exists:medical_insurance_categories,id',
            'medical_insurance_value' => 'nullable|sometimes|string|max:255',
            'chronic_disease' => 'nullable|sometimes|string|max:255',
            'blood_type' => 'nullable|sometimes|string|max:255',
            'medical_condition' => 'nullable|sometimes|string|max:255',
        ]);
    }
}
