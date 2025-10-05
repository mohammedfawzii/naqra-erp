<?php

namespace Modules\CmsErp\Http\Requests\Department;

use Modules\CmsErp\Http\Requests\BaseRequest\BaseStoreRequest;

class DepartmentStoreRequest extends BaseStoreRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'name' => 'required|array',
        ]);
    }
}
