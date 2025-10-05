<?php

namespace Modules\Training\Transformers\BaseCollection;

use App\Transformers\infoModel\infoResource;
use App\Transformers\columns\columnsResource;
use Modules\Performance\Models\InfoPerformance;
use Modules\Performance\Models\ColumnPerformance;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Modules\Training\Models\ColumnTraining;
use Modules\Training\Models\InfoTraining;

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
                ColumnTraining::where('model', $this->modelName)->get()
            ),
            'infos' => new infoResource(
                InfoTraining::where('infoable_type', $this->modelName)->first()
            ),

        ];
    }
}
