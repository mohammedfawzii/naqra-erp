<?php

namespace Modules\AttendanceTracking\Transformers\BaseCollection;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Log;
use Modules\AttendanceTracking\Models\InfoAttendanceTracking;
use Modules\AttendanceTracking\Models\ColumnsAttendanceTracking;
use Modules\AttendanceTracking\Transformers\infoModel\infoResource;
use Modules\AttendanceTracking\Transformers\columns\columnsResource;

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
                ColumnsAttendanceTracking::where('model', $this->modelName)->get()
            ),
            'infos' => new infoResource(
                InfoAttendanceTracking::where('infoable_type', $this->modelName)->first()
            ),

        ];
    }
}
