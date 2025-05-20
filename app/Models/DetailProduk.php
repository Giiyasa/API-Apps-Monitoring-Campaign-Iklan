<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailProduk extends Model
{
    /** @use HasFactory<\Database\Factories\DetailProdukFactory> */
    use HasFactory;
    Protected $fillable = ['produk_detail_id','id_produk','deskripsi','gambar_url'];
}
