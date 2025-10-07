<?php

namespace Modules\Employee\Transformers\BaseCollection;

use App\Transformers\infoModel\infoResource;
use App\Transformers\columns\columnsResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Modules\Employee\Models\ColumnEmployee;
use Modules\Employee\Models\InfoEmployee;

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
                ColumnEmployee::where('model', $this->modelName)->get()
            ),
            'infos' => new infoResource(
                InfoEmployee::where('infoable_type', $this->modelName)->first()
            ),

        ];
    }
}
