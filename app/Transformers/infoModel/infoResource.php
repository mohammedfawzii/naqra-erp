<?php

namespace App\Transformers\infoModel;

use Illuminate\Http\Resources\Json\JsonResource;

class infoResource extends JsonResource
{
    public function toArray($request)
    {
        $resource = $this->resource;

        return [
            "title" => $resource->getTranslation('title', app()->getLocale()),
            "desc" => $resource->getTranslation('desc', app()->getLocale()),

        ];
    }
}
