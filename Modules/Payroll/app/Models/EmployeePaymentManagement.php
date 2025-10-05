<?php

namespace Modules\Payroll\Models;

use Modules\CmsErp\Models\Bank;
use Illuminate\Database\Eloquent\Model;
use Modules\CmsErp\Models\PaymentMethod;
use Modules\Employee\Models\Employeeinfo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Payroll\Database\Factories\EmployeePaymentManagementFactory;

class EmployeePaymentManagement extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

   public function employee()
    {
        return $this->belongsTo(Employeeinfo::class, 'employee_id');
    }
       public function payrollAttachments()
    {
        return $this->belongsTo(PayrollAttachment::class, 'payroll_attachments_id','reference_number');
    }



    public function bank()
    {
        return $this->belongsTo(Bank::class, 'bank_id');
    }



    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id');
    }

}
