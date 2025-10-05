<?php

namespace Modules\Payroll\Models;

use Modules\CmsErp\Models\Currency;
use Illuminate\Database\Eloquent\Model;
 use Modules\CmsErp\Models\PaymentMethod;
use Modules\Employee\Models\Employeeinfo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// use Modules\Payroll\Database\Factories\PayrollFactory;

class Payroll extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];



    public function employee()
    {
        return $this->belongsTo(Employeeinfo::class, 'employee_id','id');
    }



    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id');
    }



    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }



    public function payrollAttachments()
    {
        return $this->belongsTo(PayrollAttachment::class, 'payroll_attachments_id','reference_number');
    }

}
