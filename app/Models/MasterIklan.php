<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterIklan extends Model
{
    /** @use HasFactory<\Database\Factories\MasterIklanFactory> */
    use HasFactory;
    protected $primaryKey = 'id_iklan';
    public $incermenting = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_produk',
        'nama_campaign',
        'durasi_campaign',
        'tanggal_mulai',
        'harga_iklan',
        'bidding_iklan',
        'tanggal_selesai',
        'ctr_target',
        'ctr_persen_target',
        'crt_target',
        'cr_persen_target',
        'roas_target',
        'roas_bep',
        'ctr_update',
        'ctr_persen_update',
        'cr_update',
        'cr_persen_update',
        'roas_update',
    ];
}
