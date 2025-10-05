<?php

namespace Modules\CmsErp\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\LaravelPackageTools\Concerns\Package\HasTranslations;

// use Modules\CmsErp\Database\Factories\ReligionFactory;

class Religion extends Model
{
    use HasFactory, HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    public $translatable = ['name'];
    // protected static function newFactory(): ReligionFactory
    // {
    //     // return ReligionFactory::new();
    // }
}
