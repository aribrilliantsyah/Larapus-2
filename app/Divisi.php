<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    protected $fillable=['nama'];
    public function pakets()
    {
    	return $this->hasMany('App\Paket');
    }

    public function pengambilan()
    {
    	return $this->hasMany('App\Pengambilan');
    }
}
