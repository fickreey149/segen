<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beli extends Model
{
    protected $table = 'pembelian_produk';

    protected $fillable = [
    	'harga_produk', 'jumlah', 'produk_id', 'pembelian_id'
    ];

    protected $guarded = ['id', '_token'];

    public function produk()
    {
    	return $this->belongsTo('App\Produk', 'produk_id');
    }

    public function pembelian()
    {
    	return $this->belongsTo('App\Pembelian', 'pembelian_id');
    }
    
    public function getProdukAttribute()
    {
        return $this->produk->lists('id')->toArray();
    }

    public function scopeProduk($query, $id_produk)
    {
        return $query->where('produk_id', $produk_id);
    }

}
