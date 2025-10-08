<?php

namespace Modules\Employee\Transformers\AttendanceEmployee;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Transformers\BaseEnums\BaseEnums;


/**
 * 🔹 AttendanceEmployeeResourceEnums
 */
class AttendanceEmployeeResourceEnums extends JsonResource
{
    public function toArray($request): array
    {
        return [

        ];
    }


    protected function enum(string $modelClass, string $labelField): array
    {
        $records = $modelClass::query()->select('id', $labelField)->get();
        return BaseEnums::collectionFrom($records, $labelField)->toArray();
    }


}
