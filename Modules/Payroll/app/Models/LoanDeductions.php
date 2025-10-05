<?php

namespace Modules\Payroll\Models;

use App\Models\BaseModel;
 use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Payroll\Database\Factories\LoanDeductionsFactory;

class LoanDeductions extends BaseModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): LoanDeductionsFactory
    // {
    //     // return LoanDeductionsFactory::new();
    // }


    public function loanType()
    {
        return $this->belongsTo(LoanType::class, 'loan_type_id');
    }

}
