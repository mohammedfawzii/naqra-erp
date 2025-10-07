<?php

namespace App\Transformers\BaseEnums;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

class BaseEnums extends JsonResource
{
    protected string $labelKey;

    public function __construct($resource, string $labelKey = 'label')
    {
        parent::__construct($resource);
        $this->labelKey = $labelKey;
    }

    public function toArray($request): array
    {
        $resource = $this->resource;

        return [
            'label' => $this->resolveLabel($resource),
            'value' => $resource->id,
        ];
    }

    /**
      */
    protected function resolveLabel($resource): mixed
    {
        $key = $this->labelKey;

        if (
            method_exists($resource, 'getTranslatableAttributes') &&
            in_array($key, $resource->getTranslatableAttributes())
        ) {
            return $resource->getTranslation($key, app()->getLocale());
        }

        return $resource->{$key} ?? null;
    }

    /**
      */
    public static function collectionFrom(Collection $items, string $labelKey = 'label'): Collection
    {
        return $items->map(fn($item) => new static($item, $labelKey))->values();
    }
}
