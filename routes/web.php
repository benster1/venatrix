<?php
use GraphAware\Neo4j\Client\ClientBuilder;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Wireframe

Route::get('/indexWireframe', function () {
    return view('indexWireframe');
});
Route::get('/homeManager', function () {
    return view('HomeManager');
});
Route::get('/NewProjectManager', function () {
    return view('NewProjectManager');
});
Route::get('/NotificationCreateProjectManager', function () {
    return view('NotificationCreateProjectManager');
});
Route::get('/TC0CreatedManager', function () {
    return view('TC0CreatedManager');
});
Route::get('/TC0EditManager', function () {
    return view('TC0EditManager');
});
Route::get('/CreadentialGenerateMapManager', function () {
    return view('CreadentialGenerateMapManager');
});
Route::get('/MapGenerated', function () {
    return view('MapGenerated');
});
Route::get('/ManageManager', function () {
    return view('ManageManager');
});
Route::get('/ManageProjectTCManager', function () {
    return view('ManageProjectTCManager');
});
Route::get('/ManageResourcesProject', function () {
    return view('ManageResourcesProject');
});
Route::get('/ManageTCManager', function () {
    return view('ManageTCManager');
});
Route::get('/EditProjectManager', function () {
    return view('EditProjectManager');
});
Route::get('/CreateNewTCManager', function () {
    return view('CreateNewTCManager');
});
Route::get('/CreateTCManualyManager', function () {
    return view('CreateTCManualyManager');
});
Route::get('/AllTCManager', function () {
    return view('AllTCManager');
});
Route::get('/NotifCreateTC', function () {
    return view('NotifCreateTC');
});
Route::get('/NotifEditProjectManager', function () {
    return view('NotifEditProjectManager');
});
Route::get('/homeTester', function () {
    return view('HomeTester');
});
Route::get('/ManageTCMenu2Tester', function () {
    return view('ManageTCMenu2Tester');
});
Route::get('/ManageTCMenuTester', function () {
    return view('ManageTCMenuTester');
});
Route::get('/CreateTCManualyTester', function () {
    return view('CreateTCManualyTester');
});
Route::get('/viewAllTCTester', function () {
    return view('viewAllTCTester');
});
Route::get('/NotifCreateTCTester', function () {
    return view('NotifCreateTCTester');
});
Route::get('/SiteMapManager', function () {
    return view('SiteMapManager');
});
Route::get('/SysGenerateTCManager', function () {
    return view('SysGenerateTCManager');
});
Route::get('/SiteMapTester', function () {
    return view('SiteMapTester');
});
Route::get('/SysGenerateTCTester', function () {
    return view('SysGenerateTCTester');
});
Route::get('/TC0CreatedTester', function () {
    return view('TC0CreatedTester');
});
Route::get('/TC0UpdatedManager', function () {
    return view('TC0UpdatedManager');
});
Route::get('/detailTCTester', function () {
    return view('detailTCTester');
});
Route::get('/processingMap', function () {
    return view('processingMap');
});







//NEW
Route::post('/contact','Controller@contact') ;

Route::get('/venatrix', function () {
    return view('features');
});
Route::get('/pricing', function () {
    return view('pricing');
});

Route::post('/SiteMapCrawl','HomeController@SiteMapCrawl') ;

Route::get('/truncateNeo4J',function(){
   $connection=new App\Project();
$con=new App\Project();
$client = ClientBuilder::create()
->addConnection($con->con1, $con->con2) 
        ->build();
$QUERY='MATCH (n)
OPTIONAL MATCH (n)-[r]-()
DELETE n,r';
 $client->run($QUERY);
/*
 $tcdetail=new App\Tcdetail();
 $tcdetail->truncate();
  $tcdetail->save();

   $tc=new App\Tc();
 $tc->truncate();
  $tc->save();

   $project=new App\Project();
 $project->truncate();
  $project->save();*/
 return view('/home');
}) ;

Route::get('/crawlingCreadentails/{id}',function($id){
    $tc=App\Tc::where('id','=',$id)->first();
        $arr=Array('tc'=>$tc);
     return view ('crawlingCreadentails',$arr);
}

) ;

Route::get('/TcCrawl','HomeController@TcCrawl') ;
Route::post('/TcCrawl','HomeController@TcCrawl') ;
Route::get('/TcCrawlX/{id}',function($id){

    
    //return '<div align="center"><h1>Crawling '.$id.'</h1></div>';
         return view ('processing');

}) ;
//Route::get('/viewProjects','ProjController@viewProjects'); viewController
Route::get('/newProject','ProjController@newProject');
Route::post('/newProject','ProjController@newProject');
Route::get('/createProject','CreateController@createProject');
Route::post('/newProjectNoExe','ProjController@newProjectNoExe') ;
Route::get('/newProjectNoExe','ProjController@newProjectNoExe') ;
Route::post('/createProject','CreateController@createProject') ;
Route::get('/executeTC/{id}/','ProjController@executeTC') ;
Route::post('/createTC','ProjController@createTC') ;

Route::get('/newTC0/{id}','ProjController@newTC0') ;

Route::get('/manage/','ProjController@manage') ;
Route::get('/manageTC/{id}',function($id){

    $project=App\Project::where('id','=',$id)->first();
    $arr= Array('project'=>$project);
    return view('manageTC',$arr);
}) ;

Route::get('/manageTCMenu/{id}',function($id){

    $project=App\Project::where('id','=',$id)->first();
    $arr= Array('project'=>$project);
                        Session::flash('choiceTCCreate', 'Manualy or using SiteMap');

    return view('manageTCMenu',$arr);
}) ;
Route::get('/manageTCMenu2/','ProjController@manageTCMenu2') ;

Route::get('/manageProject/{id}',function($id){

    $project=App\Project::where('id','=',$id)->first();
    $arr= Array('project'=>$project);
    return view('manageProject',$arr);
}) ;




//
Route::auth();
Route::get('/sysGenerateTC','CreateController@sysGenerateTC');

Route::get('/viewTC','ViewController@viewTC');
Route::post('/viewTC','ViewController@viewTC');

Route::get('/credentials/{id}', function ($id) {
        $tc=App\Tc::where('id','=',$id)->first();
        $arr=Array('tc'=>$tc);

    return view('credentials',$arr);
});

Route::post('/upload', 'HomeController@upload');

Route::get('/cloudservices', function () {
    return view('cloudservices');
});

Route::get('/m', function () {
    return view('m');
});

Route::get('/main', function () {
    return view('main');
});



Route::get('/map2', function () {
    return view('map2');
});

Route::get('/map3', function () {
    return view('map3');
});

Route::get('/Infrastructureservices', function () {
    return view('Infrastructureservices');
});
Route::get('/cybersecurity', function () {
    return view('cybersecurity');
});

Route::get('/neo4J', function () {
    return view('neo4J');
});
Route::get('/neo4Jmap', 'HomeController@neo4Jmap');




Route::get('/', function () {
    return view('welcome');//index
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/treeView', function () {
    return view('treeView');
});
Route::get('/nodeTreeView', 'HomeController@nodeTreeView');
Route::get('/Neo4JtoMap', 'HomeController@Neo4JtoMap');


Route::get('/map/{nameProject}', 'HomeController@map');
Route::get('/createNode/', 'HomeController@createNode');
Route::get('/createNNode/{id}', function ($id){
    $projects=App\Project::all();
        Session::flash('GenerateTC', 'Would Yu Like To Generate A TC?' );

                $arr=Array('id_project'=>$id,'projects'=>$projects);
                    return view('createNode', $arr);
});
Route::post('/createNode', 'HomeController@createNode');
//Route::get('/treeView', 'HomeController@treeView');



Route::get('verification/error', 'Auth\RegisterController@getVerificationError');
Route::get('verification/{token}', 'Auth\RegisterController@getVerification');

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/indexNotif/{sts}', 'HomeController@indexNotif');

Route::get('/index', function () {
    return view('index');
});
//Route to create page for creating or choosing an existant project
Route::get('/selectProject','ViewController@selectProject');
//Route to Create a new Project
            //Route::get('/createproject','CreateController@createProject');

//Route to Create a new TestCase of the Project X
Route::get('/newTestCases','ProjController@newTestCases');

Route::get('/newTestCase/{id}', function ($id) {
    //$project_id=$id;
    $project=App\Project::where('id','=',$id)->first();
    //ADD TC
    //return $id;
    $arr=Array('project'=>$project);
                        Session::flash('newTC', 'New TC');
    return view('createTestCase',$arr);
});
//Action TC
Route::get('/actionTC/{id}', function ($id) {
        $action= $_GET['action'];
        //$tc=new App\Tc();
        //$tc=$tc->where('id','=',$id)->first();
        //$arr=Array('tc'=>$tc);
    if($action==0)
    {
        $tc=App\Tc::where("id","=",$id)->first();
 //        $tc=$tc->where("id","=",$id)->first();
            //$stps=new App\Tcdetail();
            $stps=App\Tcdetail::where('tcs_id','=',$tc->id)->get();
            $arr=Array('tc'=>$tc,'stps'=>$stps);

        return  view('/detailTC',$arr);    
    }
     if($action==1)
    {
        $tc=App\Tc::where("id","=",$id)->first();
 //        $tc=$tc->where("id","=",$id)->first();
            //$stps=new App\Tcdetail();
            $tc->tcstatuss_id=4;
            $tc->save();
            //$arr=Array('tc'=>$tc,'stps'=>$stps);

        return Redirect::to('viewTestsOfProject/'.$tc->project_id)->with('alert', 'TestCase Deleted!'); ///viewTestsOfProject/{{$project->id}}
    }
        elseif($action==2)
    {
        $tc=App\Tc::where("id","=",$id)->first();
        $arr=Array('tc'=>$tc);
                        Session::flash('editTC', 'Edit TC');


        return view('/editTC', $arr);
       // return 2;
    }elseif($action==3)
    {
        $tc=App\Tc::where('id','=',$id)->first();
        //$tc;//->tcDetails;
        $tcdetails=App\Tcdetail::where('tcs_id','=',$id)->get();

        foreach($tcdetails as $tcdetail ){
           // $tcdetail->delete();
            $tcdetail->tc_step_sts_id=0;
            $tcdetail->save();
        }
        $tc->tcstatuss_id=6;
        $tc->save();
        //$id=$tc->project_id;
        //$project=App\Project::where('id','=',$id)->first();
        //$tcs=App\Tc::where('project_id','=', $id)->orderBy('created_at')->get();
        //return $project;
        //$arr= Array('tcs'=>$tcs, 'project'=>$project);
        return Redirect::to('viewTestsOfProject/'.$tc->project_id)->with('alert', 'TestCase Deleted!'); ///viewTestsOfProject/{{$project->id}}
         }
    //ADD TC

    //$arr=Array('project'=>$project);
    //return view('createTestCase',$arr);
});



//Route to Step Details
Route::get('/actionTCStep/{id}', function ($id) {
        $action= $_GET['action'];
        //$tcstep=new App\Tcdetail();
        //$tcstep=$tcstep->where('id','=',$id)->first();
        //$arr=Array('tcstep'=>$tcstep);
    if($action==0)
    {
       // $tcstep=$tcstep->where("id","=",$id)->first();
         $tcstep=App\Tcdetail::where("id","=",$id)->first();
         //$tcstep=$tcstep->where("id","=",$id)->first();
         $arr=Array('tcstep'=>$tcstep);         
         return view('/detailTCStep', $arr);   
    }elseif($action==1)
    {
        //return  view('/createTestCaseStep',$arr);    
    }
        elseif($action==2)
    {
         $tcstep=App\Tcdetail::where("id","=",$id)->first();
        $arr=Array('tcstep'=>$tcstep);

        
         return view('/editTCStep', $arr);
       // return 2;
    }elseif($action==3)
    {
        return 3;
    }
    //ADD TC

    //$arr=Array('project'=>$project);
    return view('createTestStepCase',$arr);
});

//Route to Create a new TestCase Step
Route::get('/newStepTC/{id_tc}', function ($id_tc) {

    $tc=new App\Tc();
    $tc=$tc->where('id' ,'=', $id_tc)->first();
    $arr=Array('tc'=>$tc);
    return view('createTestCaseStep', $arr);
});

//Route to Tests of Project Page
Route::get('/testsOfProject/{id}', 'CreateController@testsOfProject');

//Route to All Projects Page
Route::get('/allProjects', function () {
    return view('allProjects');
});

//Route to Edit Test Page
Route::post('/editTC/','EditController@editTC');

Route::post('/editTCStep/','EditController@editTCStep');
//Config File
//Route::get('/configFile/{idProject}/','ViewController@configFile');

//Route to Users  Page
Route::get('/allUsers', function () {
    return view('allUsers');
});

//Route to Roles  Page
Route::get('/allRoles', function () {
    return view('allRoles');
});

//Route to Permission  Page
Route::get('/allPermissions', function () {
    return view('allPermissions');
});

//Route to all Users  Page
Route::get('/users', 'AdministratorController@users');//->name('home');

//Route to all Roles  Page
Route::get('/roles', 'AdministratorController@roles');

//Route to all Permissions  Page
Route::get('/permissions', 'AdministratorController@permissions');

//Route to Logout
Route::get('/userlogout', function () {
    Auth::logout();
    return view('/welcome');
});

//Route to Associate Role
Route::get('/associateRole','AdministratorController@associateRole') ;
Route::post('/associateRole','AdministratorController@associateRole') ;

//Route to Associate Permission
Route::get('/associatePermission','AdministratorController@associatePermission') ;
Route::post('/associatePermission','AdministratorController@associatePermission') ;

//Route to Edit user

Route::get('/userEdit/{id}','AdministratorController@userEdit') ;
//Route::get('/editUser/{id}','AdministratorController@editUser') ;
Route::get('/userEdit','AdministratorController@userEdit') ;
Route::post('/updateUserDB','AdministratorController@updateUserDB') ;

//Route to New User Page
Route::get('/newUser','AdministratorController@newUser') ;
Route::post('/newUser','AdministratorController@newUser') ;

//Route to Revoke Role
Route::get('/revokeRole/{idUser}/{idRole}','AdministratorController@revokeRole') ;
Route::get('/revokePermission/{idPermission}/{idRole}','AdministratorController@revokePermission') ;


//Innactivate User Account
Route::get('/innactivate/{id}', function ($id) {
    $user=new App\User();
    $user=App\User::where('id','=',$id)->first();
    if($user->user_sts==0) $user->user_sts=1;
    elseif($user->user_sts==1) $user->user_sts=0;
    $user->save();
    $user=App\User::where('id','=',$id)->first();
    $roles=App\Role::all();
    $arr= Array('user'=>$user, 'roles'=>$roles);

    return view('userEdit',$arr);
});

//Route to create project
//Route::get('/createproject','CreateController@createProject') ;
//Route::post('/createProject','CreateController@createProject') ;

//Edit Project
Route::get('/editProject/','EditController@editProject') ;
Route::post('/editProject','EditController@editProject') ;

//ROute to View Projects
Route::get('/viewProjects', 'ViewController@viewProjects');

//View TC of project
Route::get('/viewTestsOfProject/{id}', 'ViewController@viewTestsOfProject');
Route::post('/viewTestsOfProject', 'ViewController@viewTestsOfProject');
Route::get('/getTestsOfProject', 'ViewController@getTestsOfProject');

//Route to Create TC
Route::post('/dbCreateTC','CreateController@dbCreateTC') ;

//Route to creat Step TC
Route::post('/dbCreateTCStep','CreateController@dbCreateTCStep') ;

Route::post('/CreateTCStep', function () {
    
    return 1;
});
Route::get('/executeTC/{id}/','ExecuteController@executeTC') ;
Route::get('/configFile/{id}','ExecuteController@configFile') ;



