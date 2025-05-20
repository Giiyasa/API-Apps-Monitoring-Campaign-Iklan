<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class MasterResearch extends Model
{
    /** @use HasFactory<\Database\Factories\MasterResearchFactory> */
    use HasFactory;
    Protected $primaryKey = 'research_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'nama_toko',
        'Deskripsi',
        'alamat',
        'price',
        'rating',
        'jumlah_penjualan',
        'jumlah_keuntungan',
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
