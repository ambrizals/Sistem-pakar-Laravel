<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    protected $table = 'penyakit';
    protected $fillable = ['tanaman','nama_penyakit','kulturteknis','fisikmekanis','kimiawi', 'hayati'];


    public function tanaman(){
    	return $this->belongsTo('App\Tanaman','tanaman','id');
    }

    public function gejala(){
    	return $this->hasMany('App\gejalaPenyakit','penyakit','id');
    }
}
