<?php

namespace Modules\Facilities\Http\Requests\SubscriptionFacilities;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class SubscriptionFacilitiesStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'subscription_id' => 'required|integer|exists:subscriptions,id',
            'subscription_types_id' => 'required|integer|exists:subscription_types,id',
            'invoice_number' => 'required|string|max:255',
            'invoice_value' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'reminder_date' => 'nullable|date',
            'notes' => 'nullable|string',
            'facility_attachments_id' => 'required|integer|exists:facility_attachments,reference_number',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validation errors',
            'error' => $validator->errors()
        ], 422));
    }
}
