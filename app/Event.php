<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    protected $fillable = [
    	'id', 'tittle', 'color', 'start_date', 'end_date', 'penjualan_id', 'jurkam_id'
    ];

    public function jurkam()
    {
    	return $this->belongsTo('App\Jurkam', 'jurkam_id');
    }
}
