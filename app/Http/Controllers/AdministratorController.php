<?php
//namespace App\Http\Controllers;

//use DB;

use App\Quotation;
namespace App\Http\Controllers;
use App\User;
use App\Role;
use App\Permission;
use App\Permission_role;
use App\Role_user;
use App\Auth;
use App\Project;
use App\Tc;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class AdministratorController extends Controller
{
    //

   public function __construct()
    {
      // $this->middleware('Admin');//->except('logout');
    }
     
    //get all users
    public function users()
    {   
        $users=User::orderBy('created_at')->get();
        $arr= Array('users'=>$users);
        return view('allUsers', $arr);
    }
    //get all roles
    public function roles()
    {   
        $roles=Role::orderBy('created_at')->get();
        $permissions=Permission::all();
        $arr= Array('roles'=>$roles,'permissions'=>$permissions);
        return view('allRoles', $arr);
    }
     //get all users
    public function permissions()
    {   
        $permissions=Permission::orderBy('created_at')->get();
        $arr= Array('permissions'=>$permissions);
        return view('allPermissions', $arr);
    }
    public function associateRole(Request $request)
    {
      

        //post
        if ($request->isMethod('post')) {

            //$role=$request->input('role_id');
            //$permissions[]=$request->input('permission');//$request->all();//$request->get['permission'];
         //$roles= $request->input('role');
            // return $request->all();
             //if(empty($permissions)==false)
         {
                //foreach ($roles as $role)// ($i=0; count($permissions)-1; $i=$i+1) 
                try{
                    # code...
                      //return $permissions[2];//[$i];
                    
                    $role_user=new Role_user();
                    $role_user->user_id=$request->input('user');
                    $role_user->role_id= $request->input('role');
                    $role_user->created_at= date('Y-m-d H:i:s');
                    //echo $permissions[$i];
                    $count=Role_user::where([['role_id','=',$request->input('role')],['user_id','=',$request->input('user')]])->count();

                    if( $count>0) 
                      { 
                         $roles=Role::orderBy('created_at')->get();
                         $users=User::orderBy('created_at')->get();
                         $arr= Array('roles'=>$roles, 'users'=>$users);
                         return view('associateRole', $arr)->with('alert', 'Role Associated !');
                        } 
                                        $role_user->save();
    
                }
                catch(\Exception $ex)
                        {

                        }
                        //return $request->input('permission');

            }

        }{

//get
           $roles=Role::orderBy('created_at')->get();
           $users=User::orderBy('created_at')->get();
           $arr= Array('roles'=>$roles, 'users'=>$users);
           return view('associateRole', $arr)->with('alert', 'Role Associated !');
       }

    }

    public function updateUserDB(Request $request)
    {
        if ($request->isMethod('post')) {
                $user=new User();
                    $user=$user->where('id','=',$request->input('id'))->first();
                    $user->username=$request->input('username');
                    $user->firstname=$request->input('firstname');
                    $user->lastname=$request->input('lastname');
                    $user->email=$request->input('email');
                    $user->save();

 $roless=$request->input('roles');
                   // return$request->all();
                    //foreach ($roles as $role)// ($i=0; count($permissions)-1; $i=$i+1) 
                     
                    //if role exists
                      try{
                          $role_user=new Role_user();
                          $role_user->user_id=$request->input('id');
                          $role_user->role_id= $request->input('roles');
                          $role_user->created_at= date('Y-m-d H:i:s');
                          $role_user->role_sts=1;
                          $role_user->save();

                        }catch(\Exception $ex)
                        {
                          $role_user=Role_user::where([['user_id','=',$request->input('id')],['role_id','=',$request->input('roles')]])->first();
                          //$role_user->user_id=$request->input('id');
                          //$role_user->role_id= $request->input('roles');
                          $role_user->updated_at= date('Y-m-d H:i:s');
                          $role_user->role_sts=1;
                          $role_user->save();
                          //return$role_user;//->save();
                        }
                     
                     //else
                     /*   
                    $role_user=new Role_user();
                    $role_user->user_id=$request->input('id');
                    $role_user->role_id= $roles;
                    $role_user->created_at= date('Y-m-d H:i:s');
                    $role_user->save();*/
                    //echo $permissions[$i];
                    

         
          $user=User::where('id','=',$request->input('id'))->first();
                    //$roles=$user->roles;
                   // $roles=Role::where('id','<>',$roles->id)->get();
                    //return $user;
        $users=User::orderBy('created_at')->get();
        $arr= Array('users'=>$users);
        return view('allUsers', $arr)->with('alert', 'User Updated !');
    }
  }

    public function userEdit( $id )
    {
        /*if ($request->isMethod('post')) {
                    $user=User::where('id','=',$id)->first();
                    $user->username=$request->input('username');
                    $user->firstname=$request->input('firstname');
                    $user->lastname=$request->input('lastname');
                    $user->email=$request->input('email');
          

         }*/
        //else
                             
                    $user=User::where('id','=',$id)->first();
                    //$roles=$user->roles;
                   // $roles=Role::where('id','<>',$roles->id)->get();
                    //return $user;
                    $roles=Role::all();
                    $arr= Array('user'=>$user, 'roles'=>$roles);

                    return view('userEdit',$arr);
            
    }
    public function editUser( $id )
    {
      //if ($request->isMethod('post')) {
                
          //      }
        //else
          {
                    $user=User::where('id','=',$id)->first();
                   // return $user;
                    $arr= Array('user'=>$user);

                    return view('userEdit',$arr);
            }
    }




    public function newUser(Request $request)
    {
    if ($request->isMethod('post')) {

        $user=new User();
        $user->username=$request->input('username');
        $user->firstname=$request->input('firstname');
        $user->lastname=$request->input('lastname');
        $user->email=$request->input('email');
        $user->password=bcrypt('password');
        $user->user_sts=0;  

        $user->save();
        $users=User::orderBy('created_at')->get();
        $arr= Array('users'=>$users);
        return view('allUsers', $arr)->with('alert', 'User Created !');
        }
    if ($request->isMethod('get')) {
        return view('newUser');

        }

      
        
    }

    public function viewPermission()
    {//
      $permissions=Permission::orderBy('created_at')->get();
        $arr= Array('permissions'=>$permissions);
        return view('allPermissions', $arr);
    }
//Revoke Role from User
    public function revokeRole( $idUser, $idRole)
    {
     //return $idUser;
      $roleUser1=Role_user::where('role_id','=',$idRole)->get();
      $roleUser1=$roleUser1->where('user_id','=',$idUser)->first();
      //return $roleUser1;
      $roleUser1->role_sts=0;
      $roleUser1->save();
      //return $roleUser1;
      
        //$users=User::all();
        //$arr= Array('users'=>$users);
        return Redirect::action('AdministratorController@users')->with('alert', 'Role Revoked !');
    }
     public function revokePermission( $idPermission, $idRole)
    {
     //return $idUser;
      $permissionRole=Permission_role::where([ ['role_id','=',$idRole],['permission_id','=',$idPermission] ])->first();
    //  $roleUser1=$roleUser1->where('user_id','=',$idUser)->first();
      //return $roleUser1;
      //$roleUser1->role_sts=0;
      $permissionRole->delete();
//      $permissionRole->save();

      //return $roleUser1;
      
        //$users=User::all();
        //$arr= Array('users'=>$users);
        return Redirect::action('AdministratorController@roles')->with('alert', 'Permission Revoked !');
    }

    public function associatePermission(Request $request)
    {

      //post
      if ($request->isMethod('post')) {

        //$role=$request->input('role_id');
        //$permissions[]=$request->input('permission');//$request->all();//$request->get['permission'];
         //$permissions= $request->input('permission');
         //return $permissions;
         //if(empty($permissions)==false)
         
          try// ($i=0; count($permissions)-1; $i=$i+1) 
          {
            # code...
              //return $permissions[2];//[$i];
            
            $permission_role=new Permission_role();
            $permission_role->role_id=$request->input('role');
            $permission_role->permission_id= $request->input('permission');
                    $permission_role->created_at= date('Y-m-d H:i:s');

            $count=Permission_role::where([['role_id','=',$request->input('role')],['permission_id','=',$request->input('permission')]])->count();
           if($count>0)
            {
                  return Redirect::action('AdministratorController@roles');
            }
        
            $permission_role->save();
                  return Redirect::action('AdministratorController@roles')->with('alert', 'Permission Associated !');
          }catch(\Exception $ex)
                        {

                        }
                //return $request->input('permission');

        

        }
        else
        {
       //           return Redirect::action('AdministratorController@roles');

        
//get
          $roles=Role::orderBy('created_at')->get();
         $permissions=Permission::orderBy('created_at')->get();
         $arr= Array('roles'=>$roles, 'permissions'=>$permissions);
          return view('associatePermission', $arr);
       }
   }
}
