<?php

namespace Modules\CmsErp\Transformers\Qualification;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\CmsErp\Transformers\BaseResource\BaseResource;
use Spatie\Translatable\HasTranslations;

class QualificationResource extends JsonResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

          return [
            'name'       => $this->getTranslations('name'),
        ];
        
    }
}
