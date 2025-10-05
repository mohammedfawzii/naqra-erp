<?php

namespace Modules\Payroll\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Employee\Models\Employeeinfo;

// use Modules\Payroll\Database\Factories\TaxDeductionFactory;

class TaxDeduction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): TaxDeductionFactory
    // {
    //     // return TaxDeductionFactory::new();
    // }


    public function employee()
    {
        return $this->belongsTo(Employeeinfo::class, 'employee_id');
    }



    public function taxDeductionTypes()
    {
        return $this->belongsTo(TaxDeductionType::class, 'tax_deduction_types_id');
    }



    public function taxDeductionStatuses()
    {
        return $this->belongsTo(TaxDeductionStatus::class, 'tax_deduction_statuses_id');
    }



    public function payrollAttachments()
    {
        return $this->belongsTo(PayrollAttachment::class, 'payroll_attachments_id','reference_number');
    }

}
