<?php

namespace Modules\Payroll\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Payroll\Database\Factories\PayrollAttachmentFactory;

class PayrollAttachment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

        protected static function booted()
    {
        static::creating(function ($model) {
    // $model->reference_number = (int) (now()->format('ymd') . mt_rand(100, 999));
        });
    }
}
