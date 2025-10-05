<?php

namespace Modules\Performance\Transformers\DevelopmentPlan;

use Illuminate\Http\Resources\Json\JsonResource;

class DevelopmentPlanResourceEnums extends JsonResource
{
    public function toArray($request)
    {
       return [
                'employee' => [],

        ];
    }
}
