                                        if(Auth::check()){
@extends('layouts.app')

@section('content')

      <div class="panel panel-default">
    <div class="panel-heading"><div align="center">Project {{$project->project_name}}</div></div>
        <div class="panel-body">
      @if(Session::has('executeTC0'))
       <div class="alert panel-default" role="alert">
        <h3>
          TC0 Executed Successfuly, The SiteMap is Generated.  
        </h3> 
      </div>
      @endif
          <div class="form-group" align="center">
          </li>

          @if(Session::has('updateProject'))

      <div class="alert alert-default" role="alert">
        <h3>
          Project Updated
        </h3> 
      </div>
      @endif
          <?php
//
          try{
            $roleSts=1;  
  $idRole=2;//Manager  
  $user= Auth::user();
//echo 'userID: '.$user->id.' roleID: '.$idRole.' roleSTS: '.$roleSts; 
  if($user!=null)
  {  
    $dislayByRole=$user->dislayByRole($user->id, $idRole, $roleSts);
    App\Role_user::where([['role_id','=',$idRole],['role_sts','=',$roleSts],['user_id','=',$user->id]])->get();
  //  echo '</br>display: '.$dislayAdmin;
  }
  else $dislayByRole=-1;
}catch(Exception $ex)
{
  $dislayByRole=-1;
}
//echo $hideAdmin;
    if($dislayByRole==2 ||$dislayByRole==4)//Manager//Tester//Reviewer
    {

      ?> 
      <h4></h4>

      <div class="panel-heading"></div>

      <div class="panel-body">
        @if (session('status'))
        <div class="alert alert-default">
          {{ session('status') }}
        </div>
        @endif
        
        <a href="/manageProject/{{$project->id}}"  style="color:black;" class="btn btn-outline btn-default" >Manage The Project  </a>
              </br>
              </br>
            <form>
        <a href="/manageTC/{{$project->id}}" style="color:black;" class="btn btn-outline btn-default" >&nbsp;Manage Test Cases  </a>
</form>
        <div align="left">
                <a href="/home"   > <img width="5%" src="/img/home.png">
  </a>
        </div>

<?}?>
<script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>

<?
$fullname= Auth::user()->firstname.' '.Auth::user()->lastname;
?>
<script type="text/javascript">
        $(document).ready(function(){

            demo.initChartist();

            $.notify({
                icon: 'pe-7s-gift',
                message: "Here you can Manage the Project <b><i>{{$project->project_name}}</i></b> and also the Test Cases of the Project."

            },{
                type: 'info',
                timer: 4000
            });

        });
    </script>
        @endsection
