<?php

namespace Modules\AttendanceTracking\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\AttendanceTracking\Database\Factories\TimeTrackingIntegrationFactory;

class TimeTrackingIntegration extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    public function attendanceAttachments()
    {
        return $this->belongsTo(AttendanceTrackingAttachment::class, 'attendance_attachments_id','reference_number');
    }
}
