<?php

namespace Modules\Performance\Http\Requests\Feedback;

use Modules\Performance\Http\Requests\BaseRequest\BaseUpdateRequest;

class FeedbackUpdateRequest extends BaseUpdateRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'type' => 'nullable|sometimes|string|max:255',
            'comment' => 'nullable|sometimes|string',
            'feedback_date' => 'nullable|sometimes|date',
            'sender_name' => 'nullable|sometimes|string|max:255',
        ]);
    }
}
