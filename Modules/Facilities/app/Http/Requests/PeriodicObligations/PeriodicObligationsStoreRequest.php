<?php

namespace Modules\Facilities\Http\Requests\PeriodicObligations;

 use Modules\Facilities\Http\Requests\BaseRequest\StoreBaseRequest;


class PeriodicObligationsStoreRequest extends StoreBaseRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'facility_id' => 'nullable|exists:facilities,id',
            'zakat_due_date' => 'nullable|date',
            'zakat_reminder_date' => 'nullable|date',
            'tax_declaration_due_date' => 'nullable|date',
            'tax_declaration_reminder_date' => 'nullable|date',
            'salary_due_date' => 'nullable|date',
            'salary_reminder_date' => 'nullable|date',
        ]);
    }
}
