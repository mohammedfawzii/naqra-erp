<?php

namespace Modules\Payroll\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\CmsErp\Models\HolidaysList;

// use Modules\Payroll\Database\Factories\PaidLeaveManagementFactory;

class PaidLeaveManagement extends BaseModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): PaidLeaveManagementFactory
    // {
    //     // return PaidLeaveManagementFactory::new();
    // }


    public function holidaysLists()
    {
        return $this->belongsTo(HolidaysList::class, 'holidays_lists_id');
    }

}
