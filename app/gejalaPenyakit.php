<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gejalaPenyakit extends Model
{
    protected $table = 'gejala_penyakit';
    protected $fillable = ['gejala', 'penyakit'];

    public function gejala(){
    	return $this->belongsTo('App\Gejala','gejala','id');
    }

    public function penyakit(){
    	return $this->belongsTo('App\Penyakit','penyakit','id');
    }
}
