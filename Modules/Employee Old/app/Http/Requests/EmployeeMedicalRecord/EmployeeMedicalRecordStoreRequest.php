<?php

namespace Modules\Employee\Http\Requests\EmployeeMedicalRecord;

 use Modules\Employee\Http\Requests\BaseRequest\StoreBaseRequest;


class EmployeeMedicalRecordStoreRequest extends StoreBaseRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'certificate_number' => 'nullable|string|max:255',
            'certificate_value' => 'nullable|numeric',
            'certificate_start_date' => 'nullable|date',
            'certificate_end_date' => 'nullable|date',
            'regular_checkup_date' => 'nullable|date',
            'other_checkup_date' => 'nullable|date',
            'medical_insurance' => 'nullable|string|max:255',
            'medical_insurance_category_id' => 'nullable|exists:medical_insurance_categories,id',
            'medical_insurance_value' => 'nullable|string|max:255',
            'chronic_disease' => 'nullable|string|max:255',
            'blood_type' => 'nullable|string|max:255',
            'medical_condition' => 'nullable|string|max:255',
        ]);
    }
}
