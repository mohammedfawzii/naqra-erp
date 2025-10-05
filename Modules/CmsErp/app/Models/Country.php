<?php

namespace Modules\CmsErp\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\CmsErp\Database\Factories\CountryFactory;
use Spatie\Translatable\HasTranslations;

class Country extends Model
{
    use HasFactory,HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    public $translatable = ['name'];

    public function cities()
    {
        return $this->hasMany(City::class);
    }
    // protected static function newFactory(): CountryFactory
    // {
    //     // return CountryFactory::new();
    // }

}
