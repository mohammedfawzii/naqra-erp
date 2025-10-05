<?php

namespace Modules\CmsErp\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\CmsErp\Database\Factories\AllowanceFactory;
use Spatie\Translatable\HasTranslations;

class Allowance extends Model
{
    use HasFactory,HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    public $translatable = ['allowance_name'];

    // protected static function newFactory(): AllowanceFactory
    // {
    //     // return AllowanceFactory::new();
    // }
}
