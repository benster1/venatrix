<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
    //
    public $table='nodes';
    public $timestamps=false;

    public function children(){
    	return $this->belongsToMany('App\Node');
    }
}
