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

class ViewController extends Controller
{
    public function __construct()
    {
       // $this->middleware('viewTC');
    }
    //
    public function viewProjects()
    {
    	$projects=Project::all();
    	$arr= Array('projects'=>$projects);
    	return view('allProjects', $arr);
    }

    public function selectProject()
    {
    	$projects=Project::all();
    	$arr= Array('projects'=>$projects);
    	return view('create', $arr);
    }
    public function viewTestsOfProject($id)
    {
        //return $id;
        $project=Project::where('id','=',$id)->first();
        $project=Project::where('id','=',$id)->first();
        $tcs=Tc::where('project_id','=', $id)->get();
        //return $project;
        $arr= Array('tcs'=>$tcs, 'project'=>$project);
        return view('testsOfProject', $arr);    
            
        //return Redirect::action('ViewController@viewProjects');
    }
    public function viewTC(Request $request)
    {
        $projects=Project::all();
        $project=null;
         $tcs=Tc::all();
        if ($request->isMethod('get')) {

            if ($request->input('project_id') !== null ){
                        $id=$request->input('project_id');
                        $tcs=Tc::where('project_id','=', $id)->get();
                         $project=Project::where('id','=',$id)->first();

                    }
        }
        
        //return $project;
        $arr= Array('tcs'=>$tcs, 'project'=>$project, 'projects'=>$projects);
        return view('viewTC', $arr);    
            
        //return Redirect::action('ViewController@viewProjects');
    }
    public function getTestsOfProject(Request $request)
    {
        //return $request->input("projectname");
        $project=Project::where('id','=',$request->input("id"))->first();
               // return $project;

        $tcs=Tc::where('project_id','=', $request->input("id"))->get();
        $arr= Array('tcs'=>$tcs, 'project'=>$project);
        return view('testsOfProject', $arr);    
            
        //return Redirect::action('ViewController@viewProjects');
    }
}
