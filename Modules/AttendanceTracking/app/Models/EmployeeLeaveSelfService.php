<?php

namespace Modules\AttendanceTracking\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\CmsErp\Models\HolidaysList;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\AttendanceTracking\Database\Factories\EmployeeLeaveSelfServiceFactory;

class EmployeeLeaveSelfService extends BaseModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): EmployeeLeaveSelfServiceFactory
    // {
    //     // return EmployeeLeaveSelfServiceFactory::new();
    // }


    public function holidaysList()
    {
        return $this->belongsTo(HolidaysList::class, 'holidays_list_id');
    }

}
