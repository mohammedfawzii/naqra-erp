<?php

namespace Modules\Payroll\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Modules\Payroll\Models\PayrollAttachment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Payroll\Database\Factories\PayrollReportFactory;

class PayrollReport extends BaseModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];



}
