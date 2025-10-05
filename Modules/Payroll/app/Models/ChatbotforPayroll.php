<?php

namespace Modules\Payroll\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Payroll\Database\Factories\ChatbotforPayrollFactory;

class ChatbotforPayroll extends BaseModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): ChatbotforPayrollFactory
    // {
    //     // return ChatbotforPayrollFactory::new();
    // }
}
