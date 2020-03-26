<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurkam extends Model
{
    protected $table = 'jurkam';

    protected $fillable = [
    	'id', 'nama_jurkam', 'nik', 'alamat', 'gender', 'no_hp', 'tanggal_lahir', 'tempat_lahir', 'foto', 'user_id'
    ];

    public function user_id()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }
}
