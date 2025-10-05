<?php

namespace Modules\CmsErp\Http\Requests\Qualification;

use Modules\CmsErp\Http\Requests\BaseRequest\BaseStoreRequest;

class QualificationStoreRequest extends BaseStoreRequest
{
    public function rules(): array
    {
        return array_merge($this->baseRules(), [
            'name' => 'required|array',
        ]);
    }
}
