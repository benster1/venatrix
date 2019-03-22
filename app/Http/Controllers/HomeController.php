<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Project;
use App\Tc;
use App\Permission;
use App\Auth;
use App\Node;
use App\Node_Node;
use GraphAware\Neo4j\Client\ClientBuilder;
use DOMDocument;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

public function upload(Request $request)
    {
            if($request->isMethod('post')){   

              $file=Input::file('file');
              dd($file);
      
// $name= $_FILES['file']['name'];

// $tmp_name= $_FILES['file']['tmp_name'];

// $position= strpos($name, ".");

// $fileextension= substr($name, $position + 1);

// $fileextension= strtolower($fileextension);


// if (isset($name)) {

// $path= 'Video/';
// if (empty($name))
// {
// echo "Please choose a file";
// }
// // else if (!empty($name)){
// // if (($fileextension !== "mp4") && ($fileextension !== "ogg") && ($fileextension !== "webm"))
// {
// echo "The file extension must be .mp4, .ogg, or .webm in order to be uploaded";
// }


// // else if (($fileextension == "mp4") || ($fileextension == "ogg") || ($fileextension == "webm"))
// {
// if (move_uploaded_file($tmp_name, $path.$name)) {
// echo 'Uploaded!';
// }
// }
// }
// }  
        // return view('welcome');
      }

    }

    public function __construct()
    {
      $this->middleware('auth');
    }

    public function SiteMapCrawl(Request $request)
    {
      echo '<div class="container">

      <div align="center" class="panel panel-default">
      <div class="panel-heading" ><h3>Crawling Credentials</h3></div>

      <div class="panel-body">
      <div align="center"><img id="processing" src="/img/processing.gif"/></div>
      </div>
      </div>
      </div>';
      if($request->isMethod('post')){   
$username='';
$password='';
                    $url=$request->input('url');//'http://basecampcs.com';
                    $username=$request->input('username');//'Othmane';
                    $password=$request->input('password');//'******';
                    $TestCase=$request->input('tc');//11;
                    $projectName=$request->input('project_name');//'Project';
                    $projectId=$request->input('project_id');//12;
                    $urlLogin=$request->input('url');//'http://basecampcs.com';

                    $project_name=$request->input('project_name');

                    $urlService='http://VXECSDevLoadBalancer-1322188209.us-east-1.elb.amazonaws.com:8080/Crawl';
                    $zero=0;

                    $data=array('url'=>$url,'username'=>$username,'password'=>$password,'testcase'=>$TestCase,'projectName='=>$projectName,'projectId'=>$projectId,'loginURL='=>$urlLogin,'nodeID'=>$zero);
                    //$string=http_build_query(($data));
                      //                  echo '<script>alert('. json_encode($string).')</script>';

                 //    $ch = curl_init($urlService);
                 //    curl_setopt($ch, CURLOPT_POST, true);
                 //    curl_setopt($ch, CURLOPT_POSTFIELDS, $string);
                 //    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


                 //    $response=curl_exec($ch);


                 //    echo '<script>alert('.json_encode($response).')</script>';
                 //    echo "<script>alert('before exec')</script>";

                 //   if(curl_errno($ch))//7
                 //   {
                 //    echo "<script>alert('inside errno')</script>";
                 //  // echo '</br><b>Response:</b> '.json_encode($response); 
                 //    $proj=Project::where('project_name','=',$projectName)->first();
                 //    $proj->status=1;
                 //    $proj->save();

                 //    $tcR=Tc::where('id','=',$TestCase)->first();
                 //    $tcR->tcstatuss_id=5;
                 //    $tcR->tcrunstatus_id=2;
                 //    $tcR->save();
                 //    $arr=Array('TestCase'=> $TestCase);
                 //    Session::flash('ExecutedTCError', 'TC Error' );
                 //  }
                 //       if(!curl_errno($ch))//
                 //       {
                 //        echo "<script>alert('inside ! errno')</script>";
                 //        $proj=Project::where('project_name','=',$projectName)->first();
                 //        $proj->status=1;
                 //        $proj->save();

                 //        $tcR=Tc::where('id','=',$TestCase)->first();
                 //        $tcR->tcstatuss_id=5;
                 //        $tcR->tcrunstatus_id=3;
                 //        $tcR->save();
                 //        $arr=Array('TestCase'=> $TestCase);
                 //        Session::flash('ExecutedTC', 'TC Executed Successfuly' );

                 //      }

                 //      echo "<script>alert('end')</script>";

                 // //  $tcR->tcstatuss_id=5;
                 //   //$tcR->tcrunstatus_id=4;







//header('Content-type: application/json');
$inputJSON = file_get_contents('php://input');
$input= json_decode( $inputJSON, TRUE );


$data["url"]=$request->input('url');//'We  Display This in Phone Screen';
$data["username"]=$request->input('username');//$input["applicationId"];
$data["password"]=$request->input('password');//;
$data["TestCase"]=$request->input('tc');//;
$data["projectName"]=$request->input('project_name');
$data["projectId"]=$request->input('project_id');;
$data["urlLogin"]=$request->input('url');
$data["project_name"]=$request->input('project_name');//"440";

$json_string = json_encode($data);
$json_url = "http://VXECSDevLoadBalancer-1322188209.us-east-1.elb.amazonaws.com:8080/Crawl";

$ch = curl_init( $json_url );

$options = array(
CURLOPT_RETURNTRANSFER => true,
CURLOPT_HTTPHEADER => array('Content-type: application/json') ,
CURLOPT_POSTFIELDS => $json_string
);
curl_setopt_array( $ch, $options );

$result =  curl_exec($ch);













// $ch = curl_init();

// curl_setopt($ch, CURLOPT_URL,"http://VXECSDevLoadBalancer-1322188209.us-east-1.elb.amazonaws.com:8080/Crawl");
// curl_setopt($ch, CURLOPT_POST, 1);

// //$data='{ url:'.$url.', username:'.$username.', password:'.$password.', testcase:'.$TestCase.', projectName:'.$projectName.', projectId:'.$projectId.', loginURL:'.$urlLogin.', nodeID:'.$zero.' }';
// json_encode($data);


// curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($data));

//   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 

    
// echo "<script>alert('before exec')</script>";

// echo "<script>alert('".json_encode($data)."')</script>";

// $response=$server_output = curl_exec($ch);

$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

echo "<script>alert('after exec:$httpcode')</script>";
$err = curl_error($ch);

echo "<script>alert('before cond:--> $result <--')</script>";
if(curl_exec($ch) === false){

   echo "<script>alert('ERROR')</script>";
    echo "cURL Success #:" . $err;
    
} else {
  echo "<script>alert('SUCCESS')</script>";
}
curl_close ($ch);
                      return Redirect::to('/actionTC/'.$TestCase.'?action=0/');

                   //return view ('progress',$arr);


                    // }

                    // return $response;


                  }
                }
                  public function TcCrawl(Request $request)
                  {

                    if($request->isMethod('get')){                   

                        //call WARRY Service
                        //retrurn 'Not Working with GET';
                    }

                    if($request->isMethod('post')){   
                      $username=$request->input('username');
                      $password=$request->input('password');
                      $project_name=$request->input('project_name');
                      $Pname=$project_name;
                      $project_name=$project_name.'_TC0';
                      $nodeid=$request->input('node');
                      $url = 'http://ec2-52-91-19-31.compute-1.amazonaws.com:5000/webcrawl/';

                      $fields =  array($username,$password,$project_name,$nodeid);
                        //echo '</br><b>API:</b> '.$url;

                        //echo'</br><b>Credentials: </b>'. json_encode($fields );    

                      $ch = curl_init($url);
                      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
                      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields));
                      $response = curl_exec($ch);

                      $tcid=TC::where('node_id','=',$nodeid)->first();
                      $project=Project::where('project_name','=',$Pname)->first();
                      $tc=Tc::where('project_id','=',$project->id)->get();
                      $arr=Array('project'=>$project,'tc'=>$tc,'tcs'=>$tc);

                      foreach ($tc as $testCase) {
                        $testCase->tcstatuss_id=5;
                        $testCase->save();
                                           # code...
                      }

                       //echo '</br>TC:'.$tcid->id.'<b>Response:</b> '.json_encode($response); 
                      Session::flash('ExecutedCrawl', 'Would Yu Like To Generate A TC?' );

                      return view('testsOfProject',$arr);

                    }              

                  }


                  public function nodeTreeView()
                  {
            //$treeView= Treeview_item::all();
                    $treeView= Node_Node::all();

                    $arr=Array('treeView'=>$treeView);
                    return view('nodeTreeView',$arr);
                  }

                  public function createNNode( $id)
                  {
        //$nodes=Node::all();
          //  $treeView= Node_Node::all();
                    $projects=Project::all();
                    Session::flash('GenerateTC', 'Would Yu Like To Generate A TC?' );

                    $arr=Array('id_project'=>$id,'projects'=>$projects);
                    return view('createNode', $arr);
                  }
                  public function createNode(Request $request)
                  {
                    $con=new Project();
                    Session::flash('GenerateTC', 'Would Yu Like To Generate A TC?' );
                    $projects=Project::where('status','=',1)->get();
//$projectName=Project::where('id','=',$tc->project_id)->first()
                    $client = ClientBuilder::create()
                    ->addConnection($con->con1, $con->con2) 
    //->addConnection('bolt', 'bolt://neo4j:root@localhost:7687') 
//    ->addConnection('default', 'http://neo4j:Basecamp@ec2-54-147-217-2.compute-1.amazonaws.com:7474')

                    ->build();
                    if ($request->isMethod('post')) {
                      if($request->input('idNode')=='')
                      {
                        $node=new Node();
                        $node->nodeName=$request->input('nodeName');
                        $node->url=$request->input('url');
                        $node->description=$request->input('description');
                        $node->save();
                        $nodeToNode=new Node_Node();
                        $nodeToNode->node_id=$node->id;
                        $nodeToNode->nodeparent_id = empty($request->input('idNode')) ? null : $request->input('idNode');;
                        $nodeToNode->save();
                //neo4j
                        $query = "CREATE(
                        root:NODE_TREE {name:'".$node->nodeName."', node_id:".$node->id.", url:'".$node->url."', description:'".$node->description."', nodeParent_id:'".$nodeToNode->nodeparent_id."' })

                        WITH root
                        MATCH (root) RETURN root LIMIT 25
                        ";
                        $client->run($query);
                                //return $query;

//$result = $client->run($query);
                //create node{id=node_id, name, url, description, htmlfile}
                //associate to parent { nodeparent_id, node_id}
                //run
                //
                        $nodes=Node::all();
                        $treeView= Node_Node::all();
                        $arr=Array('nodes'=>$nodes,'treeView'=>$treeView, 'projects'=>$projects);
                        return view('createNode', $arr);
                      }
                      else{
                        $node=new Node();
                        $node->nodeName=$request->input('nodeName');
                        $node->url=$request->input('url');
                        $node->description=$request->input('description');
                        $node->save();
                        $nodeToNode=new Node_Node();
                        $nodeToNode->node_id=$node->id;
                        $nodeToNode->nodeparent_id =$request->input('idNode');
                        $nodeToNode->save();
                        $query = "
                        MATCH (root:NODE_TREE) WHERE root.node_id=".$nodeToNode->nodeparent_id."

                        CREATE(child:NODE_TREE {name:'".$node->nodeName."', node_id:".$node->id.", url:'".$node->url."', description:'".$node->description."', nodeParent_id:'".$nodeToNode->nodeparent_id."' }),                      
                        (root)-[r:ParentOf]->(child)
                        WITH child,root,r
                        MATCH (root),(child) RETURN root, child, r LIMIT 25";
                        $client->run($query);
//return $query;
                //$result = $client->run($query);

                        $nodes=Node::all();
                        $treeView= Node_Node::all();
                        $arr=Array('nodes'=>$nodes,'treeView'=>$treeView, 'projects'=>$projects);
                        return view('createNode', $arr);
                      }
                    }else  {
                      $nodes=Node::all();
                      $treeView= Node_Node::all();
                      $arr=Array('nodes'=>$nodes,'treeView'=>$treeView, 'projects'=>$projects);
                      return view('createNode', $arr);
                    }            
                  }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('home');
    }
    public function neo4Jmap()
    {
      return view('neo4Jmap');
    }
    public function map($Project)
    {
      $nodes=Node::all();
      $treeView=Node_Node::all();
      $arr=Array('nodes'=>$nodes,'treeView'=>$treeView,'Project'=>$Project);
        // return view('createNode', $arr);
      return view('map',$arr);
    }
    public function treeView()
    {
      $query=Node_Node::all();
      $arr=Array('query'=>$query);
        // return view('createNode', $arr);
      return view('treeView',$arr);
    }
    
    public function neo4J()
    {

      return view('neo4J');
    }
    public function Neo4JtoMap()
    {

      return view('Neo4JtoMap');
    }
    public function indexNotif($sts)
    {
      $sts=0;
      if($sts==0) $sts=0;
      if($sts==1) $sts=1;
      if($sts==2) $sts=2;
      if($sts==3) $sts=3;

      $arr=Array('sts'=>$sts);
      return view('index',$arr);
    }
    //Notification
   //  public function notif()
    //{   
       // $sts=1;
        //$arr=Array('sts'=>$sts);
      //  return view('index');//,$arr);
    //}
    //get all users
    public function users()
    {   
      $users=User::all();
      $arr= Array('users'=>$users);
      return view('allUsers', $arr);
    }
     //get all roles
    public function roles()
    {   
      $roles=Role::all();
      $permissions=Permission::all();
      $arr= Array('roles'=>$roles,'permissions'=>$permissions);
      return view('allRoles', $arr);
    }
     //get all users
    public function permissions()
    {   
      $permissions=Permission::all();
      $arr= Array('permissions'=>$permissions);
      return view('allPermissions', $arr);
    }

    
  }
