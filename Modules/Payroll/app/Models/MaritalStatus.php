<?php

namespace Modules\CmsErp\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\CmsErp\Database\Factories\MaritalStatusFactory;
use Spatie\Translatable\HasTranslations;

class MaritalStatus extends Model
{
    use HasFactory,HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    public $translatable = ['status_type'];

    // protected static function newFactory(): MaritalStatusFactory
    // {
    //     // return MaritalStatusFactory::new();
    // }
}
