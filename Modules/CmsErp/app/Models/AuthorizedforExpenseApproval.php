<?php

namespace Modules\CmsErp\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

// use Modules\CmsErp\Database\Factories\AuthorizedforExpenseApprovalFactory;

class AuthorizedforExpenseApproval extends Model
{
    use HasFactory,HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    public $translatable = ['activity_name'];

    // protected static function newFactory(): AuthorizedforExpenseApprovalFactory
    // {
    //     // return AuthorizedforExpenseApprovalFactory::new();
    // }
}
