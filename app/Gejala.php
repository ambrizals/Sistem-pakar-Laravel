<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    protected $table = 'gejala';
    protected $fillable = ['daerah_gejala','penyakit','nama_gejala'];

    public function daerahGejala(){
    	return $this->belongsTo('App\daerahGejala','daerah_gejala','id');
    }

    public function penyakit(){
    	return $this->belongsTo('App\Penyakit','penyakit','id');
    }
}
