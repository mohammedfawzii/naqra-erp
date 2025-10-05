<?php

namespace Modules\AttendanceTracking\Models;

  use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\CmsErp\Models\HolidaysList;
use Modules\AttendanceTracking\Models\BaseModel;

// use Modules\AttendanceTracking\Database\Factories\LeaveRequestFactory;

class LeaveRequest extends BaseModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): LeaveRequestFactory
    // {
    //     // return LeaveRequestFactory::new();
    // }


    public function holidaysList()
    {
        return $this->belongsTo(HolidaysList::class, 'holidays_list_id');
    }

}
