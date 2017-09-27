<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengambilan extends Model
{
    protected $fillable=['paket_id','divisi_id','diambil'];
    public $timestamps=true;

    public function paket()
    {
    	return $this->belongsTo('App\Paket');
    }

    public function divisi()
    {
    	return $this->belongsTo('App\Divisi');
    }
    
    protected $casts = ['diambil'=>'boolean'];
    public function scopeReturned($query)
    {
    	return $query->where('diambil',1);
    }
    public function scopeBorrowed($query)
    {
    	return $query->where('diambil',0);
    }
}
