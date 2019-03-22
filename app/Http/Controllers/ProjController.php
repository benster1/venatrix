<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
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
use GraphAware\Neo4j\Client\ClientBuilder;
use Illuminate\Support\Facades\Session;

class ProjController extends Controller
{

    public function send(Request $request)
    {
        echo '<script> alert('.json_encode($request->input('idNode')).')</script>';
                $username=$request->input('username');
                    $password=$request->input('password');
                   // $nodeid=$request->input('node_id');
                    $nodeid=Array($request->input('node_id'),1812,1813);
                    $project_name=$request->input('project_name');
                     $url = 'http://ec2-52-91-19-31.compute-1.amazonaws.com:5000/webcrawl/wikipedia';

                    $fields = array( array($username,$password,$project_name,$nodeid));
            
                    echo json_encode($fields );    
     
                    $ch = curl_init($url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
                    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields));
                    $response = curl_exec($ch);
                    echo '</br>Response: '.json_encode($response);
    }
    //
    public function newTC0( $id)
    {
        //if ($request->isMethod('post')) 
        {
        $project=Project::where('id','=',$id)->first();
        //if create TC0 YES
            $tc=new Tc();
                $tc->tc_name='TC0';
                $tc->tc_url=$project->url;
                $tc->tc_description='Generate the SiteMap of '.$project->url;
                $tc->tc_comments='Generate the SiteMap of '.$project->url;
                $tc->created_by =\Auth::user()->firstname.' '.\Auth::user()->lastname ;
                $tc->updated_by ='No Update';//\Auth::user()->lastname.' '.\Auth::user()->fistname;
                $tc->exec_by ='No Update';//\Auth::user()->lastname.' '.\Auth::user()->fistname;
                $tc->exec_date =date('Y-m-d H:i:s');//\Auth::user()->lastname.' '.\Auth::user()->fistname;
                $tc->updated_date=date('Y-m-d H:i:s');
                $tc->creation_date=date('Y-m-d H:i:s');
               // $tc->tcstatuss_id=4;
                $tc->tcrunstatus_id=1;
                $tc->project_id=$project->id;
                $tc->tc_type=1;
                $tc->tcstatuss_id=4;

                $tc->save();

            $tcStep=new Tcdetail();

            $tcStep->tc_step_name='Generate SiteMap';
            $tcStep->tc_step_sts_id =0;//$request->input('tc_name');
            $tcStep->expected_rslts ='SiteMap Generated';
            $tcStep->actual_rslts ='Pending Engine Execution';
            $tcStep->tc_desc='Generate SiteMap';
            $tcStep->tc_stp_comments ='Generate SiteMap';
            $tcStep->tc_val_pnt =0;
            $tcStep->tcs_id =$tc->id;

           // $idProject =$project->id;
            $tcStep->save();
            // if NO TC0 redirect to all my Projects
           // echo '<script>alert("TestCase TC0 of the Project'.$project->project_name.' created successfuly ")</script>';
        $tcs=Tc::where('project_id','=', $project->id)->get();
        //return $project;
        $arr= Array('tcs'=>$tcs, 'project'=>$project);
        Session::flash('tc0Created1', 'TC0 Created successfuly! Would you like to Run it?' );
                Session::flash('tc0Created2', 'Run TC0: Serve for creating a SiteMap for the URL given in the Project Creation');
                        Session::flash('createProject3', 'The Site Map help For Creating TestCase System Generated');
        //return view('testsOfProject', $arr);  
        return Redirect::to('actionTC/'.$tc->id.'?action=0');
            }

      //  if ($request->isMethod('get')) {
        //return view('newProjectNoExe');

            }
           
        //return Redirect::action('ViewController@viewProjects');

   public function newProjectNoExe(Request $request)
    {
        if ($request->isMethod('post')) {
        
        try{
            $project=new Project();
            $project->project_name=$request->input('projectname');
            $project->url=$request->input('url');
            $project->created_at=date('Y-m-d');
            $project->save();
            echo '<script>alert("Project'.$project->project_name.' created successfuly ")</script>';
        }catch(Exception $ex)
        {
            return view('newProject');
        }
        //if create TC0 YES
            $tc=new Tc();
                $tc->tc_name='TC0';
                $tc->tc_url=$project->url;
                $tc->tc_description='Generate the SiteMap of '.$project->url;
                $tc->tc_comments='Generate the SiteMap of '.$project->url;
                $tc->created_by =\Auth::user()->firstname.' '.\Auth::user()->lastname ;
                $tc->updated_by ='No Update';//\Auth::user()->lastname.' '.\Auth::user()->fistname;
                $tc->exec_by ='No Update';//\Auth::user()->lastname.' '.\Auth::user()->fistname;
                $tc->exec_date =date('Y-m-d H:i:s');//\Auth::user()->lastname.' '.\Auth::user()->fistname;
                $tc->updated_date=date('Y-m-d H:i:s');
                $tc->creation_date=date('Y-m-d H:i:s');
               // $tc->tcstatuss_id=4;
                $tc->tcrunstatus_id=1;
                $tc->project_id=$project->id;
                $tc->tc_type=1;
                $tc->tcstatuss_id=2;

                $tc->save();

            $tcStep=new Tcdetail();

            $tcStep->tc_step_name='Generate SiteMap';
            $tcStep->tc_step_sts_id =0;//$request->input('tc_name');
            $tcStep->expected_rslts ='SiteMap Generated';
            $tcStep->actual_rslts ='Pending Engine Execution';
            $tcStep->tc_desc='Generate SiteMap';
            $tcStep->tc_stp_comments ='Generate SiteMap';
            $tcStep->tc_val_pnt =0;
            $tcStep->tcs_id =$tc->id;

            $idProject =$project->id;
            $tcStep->save();
            // if NO TC0 redirect to all my Projects
            echo '<script>alert("TestCase TC0 of the Project'.$project->project_name.' created successfuly ")</script>';
$tcs=Tc::where('project_id','=', $project->id)->get();
        //return $project;
        $arr= Array('tcs'=>$tcs, 'project'=>$project);
        Session::flash('tc0Created1', 'TC0 Created successfuly! Would you like to Run it?' );
                Session::flash('tc0Created2', 'Run TC0: Serve for creating a SiteMap for the URL given in the Project Creation');
                        Session::flash('createProject3', 'The Site Map help For Creating TestCase System Generated');
        return view('testsOfProject', $arr);  


        return Redirect::action('ViewController@viewProjects');
            }

        if ($request->isMethod('get')) {
        return view('newProjectNoExe');

            }
           
        //return Redirect::action('ViewController@viewProjects');
    }

    //Create Project and TC0 if needed
     public function newProject(Request $request)
    {
        if ($request->isMethod('post')) {
        
        try{
            $project=new Project();
            $project->project_name=$request->input('projectname');
            $project->url=$request->input('url');
            $project->created_at=date('Y-m-d');
            $project->save();
            echo '<script>alert("Project '.$project->project_name.' created successfuly ")</script>';

        }catch(Exception $ex)
        {
            return view('newProject');
        }
        //if create TC0 YES
            $tc=new Tc();
                $tc->tc_name='TC0';
                $tc->tc_url=$project->url;
                $tc->tc_description='Generate the SiteMap of '.$project->url;
                $tc->tc_comments='Generate the SiteMap of '.$project->url;
                $tc->created_by =\Auth::user()->firstname.' '.\Auth::user()->lastname ;
                $tc->updated_by ='No Update';//\Auth::user()->lastname.' '.\Auth::user()->fistname;
                $tc->exec_by ='No Update';//\Auth::user()->lastname.' '.\Auth::user()->fistname;
                $tc->exec_date =date('Y-m-d H:i:s');//\Auth::user()->lastname.' '.\Auth::user()->fistname;
                $tc->updated_date=date('Y-m-d H:i:s');
                $tc->creation_date=date('Y-m-d H:i:s');
               // $tc->tcstatuss_id=4;
                $tc->tcrunstatus_id=1;
                $tc->project_id=$project->id;
                $tc->tc_type=1;
                $tc->tcstatuss_id=4;

                $tc->save();
            echo '<script>alert("TestCase TC0 of the Project '.$project->project_name.' created successfuly ")</script>';
            $tcStep=new Tcdetail();

            $tcStep->tc_step_name='Generate SiteMap';
            $tcStep->tc_step_sts_id =0;//$request->input('tc_name');
            $tcStep->expected_rslts ='SiteMap Generated';
            $tcStep->actual_rslts ='Pending Engine Execution';
            $tcStep->tc_desc='Generate SiteMap';
            $tcStep->tc_stp_comments ='Generate SiteMap';
            $tcStep->tc_val_pnt =0;
            $tcStep->tcs_id =$tc->id;

            $idProject =$project->id;
            $tcStep->save();
            // if NO TC0 redirect to all my Projects

        return Redirect::action('ExecuteController@executeTC',[$tc->id]);
            }

        if ($request->isMethod('get')) {
        return view('newProject');

            }
           
        //return Redirect::action('ViewController@viewProjects');
    }
    public function newTestCases(Request $request)
    {
        $projName=$request->input('NameProject');
        $project=Project::where('project_name','=',$projName)->first();
                $arr= Array('project'=>$project);

        return view ('createTestCase', $arr);
    }

    public function manage(Request $request)
    {
        $projName=$request->input('id');
        $project=Project::where('id','=',$projName)->first();
                $arr= Array('project'=>$project);

        return view ('manage', $arr);
    }
     public function manageTC(Request $request)
    {
        $projName=$request->input('id');
        $project=Project::where('id','=',$projName)->first();
                $arr= Array('project'=>$project);

        return view ('manage', $arr);
    }
 public function manageTCMenu2(Request $request)
    {
        $projName=$request->input('id');
        $project=Project::where('id','=',$projName)->first();
                $arr= Array('project'=>$project);

        return view ('manageTCMenu2', $arr);
    }

    //Project Create
     public function createTC(Request $request)
    {   //create tc
        if ($request->isMethod('post'))
        {
        $tc=new Tc();
        $tc->tc_name=$request->input('tc_name');
        $tc->tc_description=$request->input('tc_desc');
        $tc->tc_comments=$request->input('tc_coms');
        $tc->created_by =\Auth::user()->firstname.' '.\Auth::user()->lastname ;
        $tc->updated_by ='No Update';//\Auth::user()->lastname.' '.\Auth::user()->fistname;
        $tc->exec_by ='No Update';//\Auth::user()->lastname.' '.\Auth::user()->fistname;
        $tc->exec_date =date('Y-m-d H:i:s');//\Auth::user()->lastname.' '.\Auth::user()->fistname;
        $tc->updated_date=date('Y-m-d H:i:s');
        $tc->creation_date=date('Y-m-d H:i:s');
        $tc->tcstatuss_id=1;
        $tc->tcrunstatus_id=1;
        $tc->project_id=$request->input('project_id');
                $tc->tc_type=$request->input('tc_type');
                $tc->tc_url=$request->input('url');

        $tc->save();

        $project=Project::find($tc->project_id)->first();
        $tcs=Tc::where('project_id','=',$tc->project_id)->get();
        $arr= Array('tcs'=>$tcs, 'project'=>$project);
       // return view('testsOfProject', $arr);
                                Session::flash('TCCreated', 'Test Case Created');

               // return redirect('/manageTC/'.$tc->project_id.'/?action=0');
                $arr= Array('tc'=>$tc);

        return view('tcManualConfirm',$arr);//Redirect::to('/newTestCase/'.$tc->project_id.'?NameProject='.$tc->project_id); ///viewTestsOfProject/{{$project->id}}
        }
       
       
       
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
        $arr=Array('tc'=>$tc, 'uri'=>$uri);

        return view ('executeTC', $arr);
    }
    
    //
}   

