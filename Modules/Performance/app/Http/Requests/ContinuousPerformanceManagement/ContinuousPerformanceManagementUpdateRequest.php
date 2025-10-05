<?php

namespace Modules\Performance\Http\Requests\ContinuousPerformanceManagement;

use Modules\Performance\Http\Requests\BaseRequest\BaseUpdateRequest;

class ContinuousPerformanceManagementUpdateRequest extends BaseUpdateRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'activity_id' => 'sometimes|required|integer|exists:activities,id',
            'activity_date' => 'nullable|sometimes|date',
            'ongoing_rating' => 'nullable|sometimes|string|max:255',
            'description' => 'nullable|sometimes|string',
        ]);
    }
}
