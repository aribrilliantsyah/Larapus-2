<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $fillable=['nama','divisi_id','telpon','pengirim'];
    public $timestamps=true;

    public function divisi()
    {
    	return $this->belongsTo('App\Divisi');
    }

    public function pengambilan()
    {
    	return $this->hasMany('App\Pengambilan');
    }
}
