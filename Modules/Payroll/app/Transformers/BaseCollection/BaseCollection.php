<?php

namespace Modules\Payroll\Transformers\BaseCollection;


use Modules\Payroll\Models\InfoPayroll;
use Modules\Payroll\Models\ColumnsPayroll;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Modules\Payroll\Transformers\infoModel\infoResource;
use Modules\Payroll\Transformers\columns\columnsResource;

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
                ColumnsPayroll::where('model', $this->modelName)->get()
            ),
            'infos'   => infoResource::collection(
                InfoPayroll::where('infoable_type', $this->modelName)->get()
            ),
        ];
    }
}
