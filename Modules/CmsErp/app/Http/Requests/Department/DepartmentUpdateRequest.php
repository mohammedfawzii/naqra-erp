<?php

namespace Modules\CmsErp\Http\Requests\Department;

use Modules\CmsErp\Http\Requests\BaseRequest\BaseUpdateRequest;

class DepartmentUpdateRequest extends BaseUpdateRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'name' => 'sometimes|required|array',
        ]);
    }
}
