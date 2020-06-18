<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = 'penjualans';

    protected $fillable = [
    	'kode_jual', 'tanggal_penjualan', 'status', 'nama_acara', 'alamat_acara', 'total_bayar', 'user_id'
    ];

    public function orderItems()
    {
    	return $this->belongsToMany(Produk::class)->withPivot('jumlah', 'status', 'start_date');
    }

    public function jual()
    {
    	return $this->hasMany('App\Jual', 'penjualan_id');
    }

    public function pembayaran()
    {
        return $this->hasMany('App\Pembayaran', 'penjualan_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
