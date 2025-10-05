<?php

namespace Modules\CmsErp\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\CmsErp\Database\Factories\ActivityGeneralFactory;
use Spatie\Translatable\HasTranslations;

class ActivityGeneral extends Model
{
    use HasFactory,HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    public $translatable = ['name'];

    public function priviteActivities()
    {
        return $this->hasMany(ActivityPrivate::class);
    }
    // protected static function newFactory(): ActivityGeneralFactory
    // {
    //     // return ActivityGeneralFactory::new();
    // }
}
