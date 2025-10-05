<?php

namespace Modules\CmsErp\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\CmsErp\Database\Factories\BranchTypeFactory;

class BranchType extends Model
{
    use HasFactory,HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
            public $translatable = ['type'];


    // protected static function newFactory(): BranchTypeFactory
    // {
    //     // return BranchTypeFactory::new();
    // }
}
