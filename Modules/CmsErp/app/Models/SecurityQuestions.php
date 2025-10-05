<?php

namespace Modules\CmsErp\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\CmsErp\Database\Factories\SecurityQuestionsFactory;
use Spatie\Translatable\HasTranslations;

class SecurityQuestions extends Model
{
    use HasFactory,HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    public $translatable = ['questions'];

    // protected static function newFactory(): SecurityQuestionsFactory
    // {
    //     // return SecurityQuestionsFactory::new();
    // }
}
