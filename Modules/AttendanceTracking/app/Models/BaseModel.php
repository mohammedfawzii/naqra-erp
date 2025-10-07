<?php

namespace Modules\AttendanceTracking\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Employee\Models\Employee;

class BaseModel extends Model
{

       public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
        public function attendanceAttachments()
    {
        return $this->belongsTo(AttendanceTrackingAttachment::class, 'attendance_attachments_id','reference_number');
    }
}
