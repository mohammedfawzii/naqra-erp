<?php

namespace Modules\CmsErp\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\CmsErp\Database\Factories\RelationshipFactory;
use Spatie\Translatable\HasTranslations;

class Relationship extends Model
{
    use HasFactory,HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    public $translatable = ['relationship'];

    // protected static function newFactory(): RelationshipFactory
    // {
    //     // return RelationshipFactory::new();
    // }
}
