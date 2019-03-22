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
use App\Tcdetail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class EditController extends Controller
{
    public function __construct()
    {
      // $this->middleware('editTC');
        // Session::forget('updateProject');
        // Session::forget('updateProjectGET');
        // Session::forget('editProject1');
        // Session::forget('createProject1')
        // Session::forget('editTC')
        // Session::forget('updateProject')

    }
     public function editProject(Request $request)
    {
                // Session::forget('createProject1')

                    $project= Project::find($request->input('idProject'));

        if ($request->isMethod('post')) {
            $project= Project::find($request->input('idProject'));
            $project->project_name=$request->input('projectname');
            $project->url=$request->input('url');
            $project->status=$request->input('status');
            $project->save();
                        Session::flash('updateProject', 'The Project Successfuly Updated');
                        $project=Project::where('id','=',$request->input('idProject'))->first();
                $arr= Array('project'=>$project);
                $projName=$request->input('idProject');
        $project=Project::where('id','=',$projName)->first();
                $arr= Array('project'=>$project);



$tcs=Tc::where('project_id','=', $project->id)->get();
        //return $project;
        $arr= Array('tcs'=>$tcs, 'project'=>$project);
        //Session::flash('createProject1', 'Project'.$project->project_name.' Updated successfuly! Would you like to create a TC0 ?' );
                Session::flash('editProject1', 'TC0: Serve for creating a SiteMap for the URL given in the Project Creation');
                        Session::flash('editProject1', 'The Site Map help For Creating TestCase System Generated');
        return view('testsOfProject', $arr);  
       // return Redirect::action('ViewController@viewTestsOfProject/'.$project->id);
            
            }
        if ($request->isMethod('get')) {
            $tcs=Tc::where('project_id','=', $project->id)->get();

                    $arr= Array('tcs'=>$tcs, 'project'=>$project);
                        Session::flash('updateProjectGET', 'Would You Lie To Update The Project?');

        return view('editProject', $arr);



        //return view ('manage', $arr);
        //return Redirect::route('manage?id'.$project->id, 'project'=>$project);//
       // return redirect()->route('manage/'.$project->id, ['project'=>$project]);
        //Redirect::action('ViewController@viewProjects');
            }
            else{
            $project= Project::find($request->input('idProject'));
            $arr=Array('project'=>$project);
        ////if ($request->isMethod('get')) {
        return view('editProject', $arr);

            }
            
        //return Redirect::action('ViewController@viewProjects');
    }
    //
    public function editTC(Request $request)
    {   //create tc
        if ($request->isMethod('post')) 
        {
        $tc= Tc::where('id','=',($request->input('tc_id')))->first();
       // $tc=$tc->find($request->input('tc_id'))->first();
        $tc->tc_name=$request->input('tc_name');
        $tc->tc_description=$request->input('tc_desc');
        $tc->tc_comments=$request->input('tc_coms');
        //$tc->created_by =\Auth::user()->firstname.' '.\Auth::user()->lastname ;
        $tc->updated_by =\Auth::user()->firstname.' '.\Auth::user()->lastname;//\Auth::user()->lastname.' '.\Auth::user()->fistname;
        //$tc->exec_by ='No Update';//\Auth::user()->lastname.' '.\Auth::user()->fistname;
        $tc->exec_date =date('Y-m-d H:i:s');//\Auth::user()->lastname.' '.\Auth::user()->fistname;
        $tc->updated_date=date('Y-m-d H:i:s');
        $tc->tcrunstatus_id=$request->input('tc_run');
        $tc->tcstatuss_id=$request->input('tc_status');
        $tc->tc_url=$request->input('tc_url');
        //$tc->creation_date=date('Y-m-d H:i:s');
        //$tc->tcstatuss_id=1;
        //$tc->tcrunstatus_id=1;
        //$tc->project_id=$request->input('project_id');
       // $tc->tc_type=$request->input('tc_type');
        $tc->save();
                        Session::flash('editTC', 'Test Case Updated Successfuly');
        return redirect('/actionTC/'.$tc->id.'/?action=0');
        }
        
        /*if ($request->isMethod('get')) 
        {
        $tc=$tc->where("id","="\,$id)->first();
         $tc=new Tc();
         $tc=$tc->where("id","="\,$id)->first();
         $arr=Array('tc'=>$tc);
         return view('editTC', $arr);
        }*/
    }

     public function editTCStep(Request $request)
    {   //create tc
        if ($request->isMethod('post')) 
        {
        $tcstep= Tcdetail::where('id','=',$request->input('idStep'))->first();
        $tcstep->tc_step_name=$request->input('stepName');
        $tcstep->tc_desc =$request->input('stepDesc');
        $tcstep->tc_stp_comments =$request->input('stepComs');
        $tcstep->tc_step_sts_id =$request->input('stepSts');
        $tcstep->expected_rslts =$request->input('expected_rslt');
        $tcstep->actual_rslts =$request->input('actual_rslt');
        $tcstep->tc_val_pnt =$request->input('vp');    
        $tcstep->save();
         
         $tc=Tc::where("id","=",$tcstep->tcs_id)->first();
         $arr=Array('tc'=>$tc);
        
       return redirect('/actionTC/'.$tc->id.'?action=0');
        }
        
       
    }
}
