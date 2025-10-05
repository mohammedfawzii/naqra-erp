<?php

namespace Modules\Facilities\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Facilities\Database\Factories\ColumnsFacilitiesFactory;
use Spatie\Translatable\HasTranslations;

class ColumnsFacilities extends Model
{
    use HasFactory, HasTranslations;
    protected $table = 'columns_facilities';
    public $translatable = ['key', 'label'];
}
