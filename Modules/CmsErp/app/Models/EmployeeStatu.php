<?php

namespace Modules\CmsErp\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\CmsErp\Database\Factories\EmployeeStatuFactory;
use Spatie\Translatable\HasTranslations;

class EmployeeStatu extends Model
{
    use HasFactory,HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    public $translatable = ['status_name'];

    // protected static function newFactory(): EmployeeStatuFactory
    // {
    //     // return EmployeeStatuFactory::new();
    // }
}
