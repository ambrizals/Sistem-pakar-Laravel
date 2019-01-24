<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    protected $table = 'gejala';
    protected $fillable = ['daerah_gejala','tanaman','nama_gejala'];

    public function daerahGejala(){
    	return $this->belongsTo('App\daerahGejala','daerah_gejala','id');
    }

    public function tanaman(){
    	return $this->belongsTo('App\Tanaman','tanaman','id');
    }
}
