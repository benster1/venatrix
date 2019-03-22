<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
class ExecuteController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('executeTC');
    }
    public function executeTC( $id)
    {  
        //$url=$request->input('url');
        $tc=Tc::where('id','=', $id)->first();//::find($id)->first();
        $url=Project::where('id','=', $tc->project_id)->first();
        $uri=$url->url;
       // return
        $tc->tcstatuss_id=5;
                $tc->tcrunstatus_id=4;

        $tc->save();
        $url->status=1;
        $url->save();
        $arr=Array('tc'=>$tc, 'uri'=>$uri);

        return view ('executeTC', $arr);
    }
    public function configFile($id)
    {
        $tc=Tc::where('id','=',$id)->first();
        $arr=Array('tc'=>$tc);
        return view ('config', $arr);
    }
}