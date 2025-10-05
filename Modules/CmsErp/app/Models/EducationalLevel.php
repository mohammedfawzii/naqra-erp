<?php

namespace Modules\CmsErp\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\CmsErp\Database\Factories\EducationalLevelFactory;
use Spatie\Translatable\HasTranslations;

class EducationalLevel extends Model
{
    use HasFactory,HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    public $translatable = ['level_name'];

    // protected static function newFactory(): EducationalLevelFactory
    // {
    //     // return EducationalLevelFactory::new();
    // }
}
