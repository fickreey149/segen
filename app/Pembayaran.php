<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';

    protected $fillable = [
    	'id', 'tgl_bayar', 'jumlah_bayar', 'total_tagihan', 'kekurangan', 'status','bukti', 'penjualan_id'
    ];

    public function penjualan()
    {
    	return $this->belongsTo('App\Penjualan', 'penjualan_id');
    }
}
