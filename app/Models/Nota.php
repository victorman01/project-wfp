<?php

namespace App\Models;

use App\Models\User;
use App\Models\Produk;
use App\Models\JenisPengiriman;
use App\Models\AlamatPengiriman;
use App\Models\MetodePembayaran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Nota extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'notas';

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function alamatPengiriman(){
        return $this->belongsTo(AlamatPengiriman::class, 'alamat_pengiriman_id');
    }
    public function metodePembayaran(){
        return $this->belongsTo(MetodePembayaran::class, 'metode_pembayaran_id');
    }
    public function jenisPengiriman(){
        return $this->belongsTo(JenisPengiriman::class, 'jenis_pengiriman_id');
    }
    public function detailTransaksi(){
        return $this->belongsTo(Produk::class, 'detail_transaksis','nota_id','jenis_produk_id');
    }
}
