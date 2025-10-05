<?php

namespace Modules\AttendanceTracking\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Employee\Models\Employeeinfo;

class BaseModel extends Model
{

       public function employee()
    {
        return $this->belongsTo(Employeeinfo::class, 'employee_id');
    }
        public function attendanceAttachments()
    {
        return $this->belongsTo(AttendanceTrackingAttachment::class, 'attendance_attachments_id','reference_number');
    }
}
