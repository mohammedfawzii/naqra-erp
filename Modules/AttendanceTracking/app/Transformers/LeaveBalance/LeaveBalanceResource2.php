<?php

namespace Modules\AttendanceTracking\Transformers\LeaveBalance;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Log;

class LeaveBalanceResource2 extends ResourceCollection
{
    public function toArray($request)
    {
        Log::info('Request Data:', ['request' => $request]);
        Log::info('Collection Data:', ['collection' => $this->collection]);
        return [

             'relations' => [
                'holidaysList' => $this->holidaysList,
            ],
        ];


    }
}
