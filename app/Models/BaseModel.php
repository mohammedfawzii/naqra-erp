<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Employee\Models\Employeeinfo;
use Modules\Payroll\Models\PayrollAttachment;

class BaseModel extends Model
{

       public function employee()
    {
        return $this->belongsTo(Employeeinfo::class, 'employee_id');
    }
        public function payrollAttachments()
    {
        return $this->belongsTo(PayrollAttachment::class, 'payroll_attachments_id','reference_number');
    }
}
