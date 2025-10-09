<?php

namespace Modules\Facilities\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;


class Facilities extends Model
{
    use HasFactory;

    protected $translatable = ['name'];
    protected $casts = [
        'have_branches' => 'boolean',
    ];
}
