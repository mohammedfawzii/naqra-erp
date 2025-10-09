<?php

namespace Modules\Facilities\Http\Requests\PeriodicObligations;

 use Modules\Facilities\Http\Requests\BaseRequest\UpdateBaseRequest;


class PeriodicObligationsUpdateRequest extends UpdateBaseRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'facility_id' => 'nullable|sometimes|exists:facilities,id',
            'zakat_due_date' => 'nullable|sometimes|date',
            'zakat_reminder_date' => 'nullable|sometimes|date',
            'tax_declaration_due_date' => 'nullable|sometimes|date',
            'tax_declaration_reminder_date' => 'nullable|sometimes|date',
            'salary_due_date' => 'nullable|sometimes|date',
            'salary_reminder_date' => 'nullable|sometimes|date',
        ]);
    }
}
