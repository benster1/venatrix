<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
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


class CreateController extends Controller
{
    //
  public function __construct()
    {
        //$this->middleware('createTC');
                Session::forget('createProject1');
session()->flush();
    }

    public function createProject(Request $request)
    {
        if ($request->isMethod('post')) {
       
        try{
            $project=new Project();
            $project->project_name=$request->input('projectname');
            $project->url=$request->input('url');
            $project->created_at=date('Y-m-d');
            $project->save();
           // echo '<script>alert("Project '.$project->project_name.' created successfuly ")</script>';
        }catch(Exception $ex)
        {
            return view('createProject');
        }
           

      
        $tcs=Tc::where('project_id','=', $project->id)->get();
        //return $project;
        $arr= Array('tcs'=>$tcs, 'project'=>$project);
        Session::flash('createProject1', 'Project'.$project->project_name.' Created successfuly! Would you like to create a TC0 ?' );
                Session::flash('createProject2', 'TC0: Serve for creating a SiteMap for the URL given in the Project Creation');
                        Session::flash('createProject3', 'The Site Map help For Creating TestCase System Generated');
        return view('testsOfProject', $arr); 
       // return Redirect::action('ViewController@viewTestsOfProject/'.$project->id);
           
            }
        if ($request->isMethod('get')) {
        Session::flash('createProjectGET', 'Would You Like To Create A New Project ?' );
        return view('createProject');

            }
          
        //return Redirect::action('ViewController@viewProjects');
    }

    public function testsOfProject($id)
    {
        $tcs=Tc::all();
        $arr= Array('tc'=>$tcs);
        return view('testsOfProject', $arr);  
          
        //return Redirect::action('ViewController@viewProjects');
    }
     public function dbCreateTC(Request $request)
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
                //$tc->tc_url=Project::where('id','=',$request->input('project_id'))->first()->url;
                $tc->tc_url=$request->input('url');

        $tc->save();

        $project=Project::find($tc->project_id)->first();
        $tcs=Tc::where('project_id','=',$tc->project_id)->get();
        $arr= Array('tcs'=>$tcs, 'project'=>$project);
       // return view('testsOfProject', $arr);
        return Redirect::to('viewTestsOfProject/'.$tc->project_id); ///viewTestsOfProject/{{$project->id}}
        }
      
      
      
    }

      public function sysGenerateTC(Request $request)
    {  
        $proj=$_GET['projectname'];
        $projId=Project::where('project_name','=',$proj)->first();
        $con=new Project();

        $client = ClientBuilder::create()
        ->addConnection($con->con1, $con->con2)
//->addConnection('default', 'http://neo4j:root@localhost:7474')
    //->addConnection('bolt', 'bolt://neo4j:root@localhost:7687')
     //->addConnection('default', 'http://neo4j:Basecamp@ec2-54-147-217-2.compute-1.amazonaws.com:7474')
        ->build();
     $project=Project::where('project_name','=',$request->input('projectname'))->first();

        $idnode=$request->input('nodeID');//"<script>document.write(node)</script>";//800;
     $queryx='MATCH  (n:'.$proj.'_TC0)<-[:parentOf*0..]-(parent:'.$proj.'_TC0) WHERE id(n)='.$idnode.' RETURN n,parent, id(parent) as parent_id, id(n) as node_id, parent.url as urlP, parent.title as titleP, n.title as titleC, n.url as urlC LIMIT 600';

       // $queryx='MATCH (u)-[r:parentOf*0..]->(p) where id(n)='.$idnode.' RETURN u,p, id(u) as parent_id, id(p) as node_id, u.url as urlP, p.url as urlC LIMIT 600';
        $resultx = $client->run($queryx);

     $project=Project::where('project_name','=',$request->input('projectname'))->first();

$i=1;

foreach ($resultx->getRecords() as $record)
{
    $tc=new Tc();

//    $tc=new Tc();
  //  echo '<script> alert("'. $tcproject.' ")</script>' ;
            // $tc->project_id= $tcproject->project_id;//$request->input('projectid');//$tcproject->project_id;
   // echo str_replace("world","Peter","Hello world!");
 $tcTitle=str_replace($project->url, '', $record->get("urlP"));

        $tc->tc_name='ValidateAccessTo_'.$record->get("urlP");// $record->get("urlP")//$i++.'_'.$record->get("urlP");//$record->get("urlC");
        $tc->tc_description='Test Case For:'.$record->get("urlP");
        $tc->tc_comments='Any Comments about the URL:'.$record->get("urlP");
        $tc->created_by =\Auth::user()->firstname.' '.\Auth::user()->lastname ;
        $tc->updated_by ='No Update';//\Auth::user()->lastname.' '.\Auth::user()->fistname;
        $tc->exec_by ='No Update';//\Auth::user()->lastname.' '.\Auth::user()->fistname;
        $tc->exec_date =date('Y-m-d H:i:s');//\Auth::user()->lastname.' '.\Auth::user()->fistname;
        $tc->updated_date=date('Y-m-d H:i:s');
        $tc->creation_date=date('Y-m-d H:i:s');
        $tc->tcstatuss_id=2;
        $tc->tcrunstatus_id=1;
        $tc->project_id=$projId->id;//$project->id;//$request->input('projectid');//$tcproject->project_id;
                $tc->node_id=$record->get("parent_id");

       // $proj=Project::where('id','=',$tcproject->project_id)->first();
                        $tc->tc_url=$record->get("urlP");

                $tc->tc_type=1;

        $tc->save();



    }
           // $project=Project::find($tc->project_id)->first();

        $tcs=Tc::where('project_id','=',$projId->id)->get();
        $arr= Array('tcs'=>$tcs, 'project'=>$project);
        //Session::flash('TCGenerated', 'Test Case Generated successfuly' );
       // return view('testsOfProject', $arr);
       // return Redirect::to('/actionTC/'.$tc->id.'?action=0/'); 
        $projects=Project::all();
        Session::flash('TCCreated', 'Test Case Created successfuly' );

                $arr=Array('project_id'=>$projId->id, 'id_project'=>$projId->id,'projects'=>$projects);    
                         return view ('tcGeneratetcConfirm', $arr);//view('createNode', $arr);
 
    }


    public function dbCreateTCStep(Request $request){

        if ($request->isMethod('post'))
        {

            $tcStep=new Tcdetail();

            $tcStep->tc_step_name=$request->input('stepName');
            $tcStep->tc_step_sts_id =0;//$request->input('tc_name');
            $tcStep->expected_rslts =$request->input('expected_rslt');
            $tcStep->actual_rslts =$request->input('actual_rslt');
            $tcStep->tc_desc=$request->input('stepDescription');
            $tcStep->tc_stp_comments =$request->input('stepComments');
            $tcStep->tc_val_pnt =$request->input('vp');
            $tcStep->tcs_id =$request->input('tc');

            $idProject =$request->input('idProject');
            //$tcStep->tcs_id =$request->input('idProject');
//return $tcStep;
            $tcStep->save();

            //return $id;
        //$project=Project::where('id','=',$idProject)->first();
       // $project=Project::find($tc->project_id)->first();
        //$tcs=Tc::where('project_id','=',$tc->project_id)->get();
        //$arr= Array('tcs'=>$tcs, 'project'=>$project);
                //return $project;
        //$arr= Array('tcs'=>$tcs, 'project'=>$project);
        //return view('testsOfProject', $arr);
        $tc=Tc::where("id","=",$tcStep->tcs_id)->first();
 //        $tc=$tc->where("id","=",$id)->first();
            //$stps=new App\Tcdetail();
            $stps=Tcdetail::where('tcs_id','=',$tc->id)->get();
            $arr=Array('tc'=>$tc,'stps'=>$stps);

       return  view('/detailTC',$arr);
        }

    }





}