<?php

namespace Modules\Payroll\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\CmsErp\Models\Attendance;
use Modules\Employee\Models\Employeeinfo;

// use Modules\Payroll\Database\Factories\AttendanceManagementFactory;

class AttendanceManagement extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): AttendanceManagementFactory
    // {
    //     // return AttendanceManagementFactory::new();
    // }

    public function timein()
    {
        return $this->hasOne(Attendance::class,'time_in','id');
    }

     public function timeout()
    {
        return $this->hasOne(Attendance::class,'time_out','id');
    }
    public function employee()
    {
        return $this->belongsTo(Employeeinfo::class, 'employee_id');
    }



    public function payrollAttachments()
    {
        return $this->belongsTo(PayrollAttachment::class, 'payroll_attachments_id');
    }

}
