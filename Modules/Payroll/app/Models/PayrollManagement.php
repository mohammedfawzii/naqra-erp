<?php

namespace Modules\Payroll\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Employee\Models\Employeeinfo;

// use Modules\Payroll\Database\Factories\PayrollManagementFactory;

class PayrollManagement extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

      public function payrollAttachments()
    {
        return $this->belongsTo(PayrollAttachment::class, 'payroll_attachments_id','reference_number');
    }
    // protected static function newFactory(): PayrollManagementFactory
    // {
    //     // return PayrollManagementFactory::new();
    // }


    public function employee()
    {
        return $this->belongsTo(Employeeinfo::class, 'employee_id');
    }

}
