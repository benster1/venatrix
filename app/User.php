<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\User;
use App\Role;
use App\Permission;
use App\Permission_role;
use App\Role_user;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','firstname','lastname', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    
     public function roles(){
        return $this->belongsToMany('App\Role');
    }

    public function dislayAdmin($idUser, $idRole, $roleSts)
    {
        try{
            
           // $user=new App\User();
            //$user= Auth::user();
            $role=new Role();
            $user_id=$idUser;//Auth::user()->id;//$userRole->user_id;
            $role=Role_user::where([['role_id','=',$idRole],['role_sts','=',$roleSts],['user_id','=',$idUser]])->get();
            $x=1;
            if($role->count()>0) {return $x;}
            else {$x=-1;return $x;}
            }catch(Exception $ex){
                $x=-1;return $x;
            }

    }

    public function dislayByRole($idUser, $idRole, $roleSts)
    {
        try{          
            $role=new Role();
            $user_id=$idUser;//Auth::user()->id;//$userRole->user_id;
            $role=Role_user::where([['role_id','=',$idRole],['role_sts','=',$roleSts],['user_id','=',$idUser]])->get();
            $x=1;
            if($role->count()>0) 
                {
                    return $idRole;
                }
            else 
                {
                    $x=-1;return $x;
                }
            }catch(Exception $ex){
                $x=-1;return $x;
            }

    }
}
