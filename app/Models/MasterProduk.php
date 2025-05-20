<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class MasterProduk extends Model
{
    /** @use HasFactory<\Database\Factories\MasterProdukFactory> */
    use HasFactory;

    protected $primaryKey = 'produk_id';
    public $incermenting = false;
    protected $keyType = 'string';

    protected $fillable = [
        'nama_produk',
        'kategori_produk',
        'sell_price',
        'cogs_price',
    ];

    // Generate UUID otomatis saat membuat model baru
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
