<?php

namespace Modules\CmsErp\Transformers\Department;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\CmsErp\Transformers\BaseResource\BaseResource;

class DepartmentResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name'=> $this->getTranslations('name')
        ];
    }
}
