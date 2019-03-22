@extends('layouts.app')

@section('content')

      <div class="panel panel-default">
    <div class="panel-heading"><div align="center">Manage Project</div></div>
        <div class="panel-body">

          <div class="form-group" align="center">
          </li>
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
     

      <div class="panel-heading"></div>

      <div class="panel-body">
        @if (session('status'))
        <div class="alert alert-default">
          {{ session('status') }}
        </div>
        @endif
        
              <form action="editProject" method="get">
        <input type="hidden" name="idProject"   value="{{$project->id}}" >
        <input type="button" style="color:black;" value="Manage Test Ressources" onclick="return  confirm('No Yet Implemented')" class="btn btn-outline btn-default"/>
</form>
              </br>
              </br>

<form action="/editProject" method="get">
        <input type="hidden" name="idProject"   value="{{$project->id}}" >
        <input type="submit" style="color:black;" value="&nbsp;&nbsp;Update Project Details&nbsp;&nbsp;" class="btn btn-outline btn-default"/>
</form>

         <div align="left">
                <a href="/manage?id={{$project->id}}"   ><img width="2%" src="/img/back.png">  </a>
                <a href="/home"   > <img width="5%" src="/img/home.png">
  </a>
        </div>


<?}?>
<script src="../assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>

<?
$fullname= Auth::user()->firstname.' '.Auth::user()->lastname;
?>
<script type="text/javascript">
        $(document).ready(function(){

            demo.initChartist();

            $.notify({
                icon: 'pe-7s-gift',
                message: "Here you can Manage the Project <b><i>{{$project->project_name}}</i></b> and the Configuration ressources of the Project."

            },{
                type: 'info',
                timer: 4000
            });

        });
    </script>
        @endsection
