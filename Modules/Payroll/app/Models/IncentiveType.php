<?php

namespace Modules\Payroll\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\CmsErp\Database\Factories\IncentiveTypeFactory;

class IncentiveType extends Model
{
    use HasFactory,HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    public $translatable = ['type'];
    protected $casts = [
    'type' => 'array',
];


    // protected static function newFactory(): IncentiveTypeFactory
    // {
    //     // return IncentiveTypeFactory::new();
    // }
}
