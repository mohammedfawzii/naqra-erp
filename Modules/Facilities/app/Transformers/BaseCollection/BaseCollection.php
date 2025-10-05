<?php

namespace Modules\Facilities\Transformers\BaseCollection;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Modules\Facilities\Models\ColumnsFacilities;
use Modules\Facilities\Models\InfoFacilities;
use Modules\Facilities\Transformers\columns\columnsResource;
use Modules\Facilities\Transformers\infoModel\infoResource;

class BaseCollection extends ResourceCollection
{
    protected string $modelName;
    protected string $resourceClass;

    public function __construct($resource, string $modelName, string $resourceClass)
    {
        parent::__construct($resource);
        $this->modelName = $modelName;
        $this->resourceClass = $resourceClass;
    }

    public function toArray($request)
    {
        return [
            'data'    => ($this->resourceClass)::collection($this->collection),
            'columns' => columnsResource::collection(
                ColumnsFacilities::where('model', $this->modelName)->get()
            ),
            'infos'   => infoResource::collection(
                InfoFacilities::where('infoable_type', $this->modelName)->get()
            ),
        ];
    }
}
