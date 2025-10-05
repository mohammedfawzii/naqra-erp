<?php

namespace Modules\CmsErp\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\CmsErp\Database\Factories\OwnershipTypeFactory;
use Spatie\Translatable\HasTranslations;

class OwnershipType extends Model
{
    use HasFactory,HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    public $translatable = ['ownership_type'];

    // protected static function newFactory(): OwnershipTypeFactory
    // {
    //     // return OwnershipTypeFactory::new();
    // }
}
