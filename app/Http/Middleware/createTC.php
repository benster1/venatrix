<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Role_user;
use App\User;
use App\Permission_role;

class createTC
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //
        //
        if(\Auth::check())
            {
                //user id
                $user_id=\Auth::user()->id;
                $user=User::find($user_id)->first();
                $roles=$user->roles;

                foreach ($roles as $role) {
                    # code...
                        $rolests=Role_user::where([['role_id','=',$role->id],['user_id','=',$user_id],['role_sts','=',1]])->first();
                        if($rolests)
                         {
                           if($rolests->role_sts==1)
                            {
                                $rolePermission= Permission_role::where([['role_id','=',$rolests->role_id],['permission_id','=',2]])->get();
                                if($rolePermission->count() >0)

                                {
                                   // echo '<h1>OK</h1>';
                                    return $next($request);
                                }else{
                                echo '<div align="center"><h1><font color="red"><i>You don&apos;t have the right role to access this page</i></font></h1></div>';
                                return redirect('/indexNotif/0');
                                }
                            }else {
                                echo '<div align="center"><h1><font color="red"><i>You don&apos;t have the right role to access this page</i></font></h1></div>';
                                return redirect('/indexNotif/3');
                            }
                         } else {
                                echo '<div align="center"><h1><font color="red"><i>You don&apos;t have the right role to access this page</i></font></h1></div>';
                                return redirect('/indexNotif/2');
                            }  
                        
                }


                }else return redirect('/indexNotif/1');
               
    }
    
}
