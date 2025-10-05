<?php

namespace Modules\Facilities\Http\Requests\SubscriptionFacilities;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class SubscriptionFacilitiesUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'subscription_id' => 'sometimes|required|integer|exists:subscriptions,id',
            'subscription_types_id' => 'sometimes|required|integer|exists:subscription_types,id',
            'invoice_number' => 'sometimes|required|string|max:255',
            'invoice_value' => 'sometimes|required|string|max:255',
            'start_date' => 'sometimes|required|date',
            'end_date' => 'sometimes|required|date',
            'reminder_date' => 'nullable|sometimes|date',
            'notes' => 'nullable|sometimes|string',
            'facility_attachments_id' => 'sometimes|required|integer|exists:facility_attachments,reference_number',
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
