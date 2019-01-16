<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class daerahGejala extends Model
{
    protected $table = 'daerahGejala';
    protected $fillable = ['daerah_gejala'];

    public function gejala(){
    	return $this->hasMany('App\Gejala','daerah_gejala','id');
    }
}
