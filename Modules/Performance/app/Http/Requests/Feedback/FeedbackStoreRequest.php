<?php

namespace Modules\Performance\Http\Requests\Feedback;

use Modules\Performance\Http\Requests\BaseRequest\BaseStoreRequest;

class FeedbackStoreRequest extends BaseStoreRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'type' => 'nullable|string|max:255',
            'comment' => 'nullable|string',
            'feedback_date' => 'nullable|date',
            'sender_name' => 'nullable|string|max:255',
        ]);
    }
}
