<?php

namespace Modules\Performance\Transformers\SuccessionPlanning;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Transformers\BaseEnums\BaseEnums;
use Modules\CmsErp\Models\Position;

class SuccessionPlanningResourceEnums extends JsonResource
{
    public function toArray($request)
    {
       return [
                'position' => BaseEnums::collectionFrom(Position::all(), 'position_ahmed'),

        ];
    }
}
