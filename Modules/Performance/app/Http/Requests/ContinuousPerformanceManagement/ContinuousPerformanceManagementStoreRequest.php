<?php

namespace Modules\Performance\Http\Requests\ContinuousPerformanceManagement;

use Modules\Performance\Http\Requests\BaseRequest\BaseStoreRequest;

class ContinuousPerformanceManagementStoreRequest extends BaseStoreRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'activity_id' => 'required|integer|exists:activities,id',
            'activity_date' => 'nullable|date',
            'ongoing_rating' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);
    }
}
