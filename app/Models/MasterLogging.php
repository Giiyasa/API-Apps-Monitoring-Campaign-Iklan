<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class MasterLogging extends Model
{
    /** @use HasFactory<\Database\Factories\MasterLoggingFactory> */
    use HasFactory;
    protected $primaryKey = 'log_id';
    public $incrementing = false;

    protected $fillable = [
        'level',
        'message',
        'data',
    ];
     protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }
}
