<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
     public $table='roles';
    public $timestamps=false;

    public function permissions(){
    	return $this->belongsToMany('App\Permission');
    }
    
}
