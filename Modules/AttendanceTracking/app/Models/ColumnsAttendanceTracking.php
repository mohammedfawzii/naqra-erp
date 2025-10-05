<?php

namespace Modules\AttendanceTracking\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\AttendanceTracking\Database\Factories\ColumnsAttendanceTrackingFactory;

class ColumnsAttendanceTracking extends Model
{
    use HasFactory,HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
      public $translatable = ['key', 'label'];
      protected $fillable = ['model', 'key', 'label', 'type', 'sortable', 'filterable'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($column) {
            if (empty($column->type)) {
                $column->type = self::detectType($column->key);
            }
        });
    }

    protected static function detectType($key): string
    {
        $key = strtolower(is_array($key) ? implode('_', $key) : $key);

        return match (true) {
            str_contains($key, 'id')     => 'number',
            str_contains($key, 'date')   => 'date',
            str_contains($key, 'time')   => 'time',
            str_contains($key, 'image')  => 'image',
            str_contains($key, 'status') => 'status',
            default                      => 'string',
        };
    }

}
