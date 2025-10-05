<?php

namespace Modules\CmsErp\Http\Requests\Qualification;

use Modules\CmsErp\Http\Requests\BaseRequest\BaseUpdateRequest;

class QualificationUpdateRequest extends BaseUpdateRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'name' => 'sometimes|required|array',
        ]);
    }
}
