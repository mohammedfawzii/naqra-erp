<?php

namespace Modules\Payroll\Transformers\columns;

use Illuminate\Http\Resources\Json\JsonResource;

class columnsResource extends JsonResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return [
            "key" => $resource->getTranslation('key', app()->getLocale()),
            "label" => $resource->getTranslation('label', app()->getLocale()),
            "sortable" => (bool) $resource->sortable,
            "filterable" => (bool) $resource->filterable,
        ];
    }
}
