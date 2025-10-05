<?php

namespace Modules\Performance\Transformers\ContinuousPerformanceManagement;

use Illuminate\Http\Resources\Json\JsonResource;

class ContinuousPerformanceManagementResourceEnums extends JsonResource
{
    public function toArray($request)
    {
       return [
                'activity' => [],

        ];
    }
}
