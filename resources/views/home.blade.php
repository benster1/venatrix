@extends('layouts.app')

@section('content')

<div class="panel-heading"></div>
      <div class="panel panel-default">



    <div class="panel-heading"><h2><div align="center">Welcome to VenatriX.io</div></h2></div>
    <img style="border-width:4px;
    border-style:solid;" class="img-circle" width="40%" src="/assets/img/VenatriXiologo.png">

      <div class="form-group" align="center">
      </li>
      <div>
        <div >

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

<!-- <div align="center">
       <a  href="/homeManager" class="btn btn-default">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Manager WireFrame&nbsp;&nbsp;&nbsp;&nbsp;</a>
      </div> -->

        @if (session('status'))
        <div class="alert alert-default">
          {{ session('status') }}
        </div>
        @endif

        <? $projects=App\Project::all();?>
        <h3>Create/Select Project</h3>

        <label> Select Project</label>

        <table>
<tr> </tr>
          <tr>
            <td>
              <div class="form-group">
                <form method="get" action="/manage"> <!-- getTestsOfProject-->
                  <select name='id' required class="form-control">
                    @foreach($projects as $project)
                    <option value="{{$project->id}}">{{ $project->project_name}}</option>

                    @endforeach            
                  </select>
                </div>
              </td>
              <td>
                <div class="form-group">

                  <input type="submit" style="color:black;" value="Go"  class="btn btn-outline btn-default">
                </div>
              </td>
            </tr></table>
                    <?//                    <a href="/createProject"  class="btn btn-outline btn-primary" onclick="return  confirm('Would you like to create a new Project? ')">Create a New Project</a>
                    ?>
                    <a href="/createProject" style="color:black;" class="btn btn-outline btn-default" >Create a New Project</a>
                  </form>
                  <div>                    
                  </div>


                <? }?>
            </div>



              <?php
//
//
              try{
                $roleSts=1;  
  $idRole=3;//Manager  
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
    if($dislayByRole==3||$dislayByRole==4)////Tester//Reviewer
    {

      ?>
      
<!-- <div align="center">
      <a  href="/homeTester" tooltip="Click to Access the Wireframe" class="btn btn-default">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tester WireFrame&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>

      </div> -->
         <? $projects=App\Project::where('status','=',1)->get();?>
      <h4></h4>
      <label>Select Project</label>

      <table>
<tr>
  
</tr>
        <tr>
          <td>
            <div class="form-group">
              <form method="get" action="/manageTCMenu2"> <!-- getTestsOfProject-->
                <select required name='id' class="form-control">
                  @foreach($projects as $project)
                  <option value="{{$project->id}}">{{ $project->project_name}}</option>

                  @endforeach            
                </select>
              </div>
            </td>
            <td>
              <div class="form-group">

                <input type="submit" value="Go" style="color:black;" class="btn btn-outline btn-default">
              </div>
            </td>
          </tr>
        </form>
    
</table>
      <? }?>
    </div>


      <?php
//$idRole=2; 
 //$user= Auth::user();

//echo $user->dislayAdmin($user->id, $idRole);
      try{
        $roleSts=1;  
        $idRole=1;  
        $user= Auth::user();
//echo 'userID: '.$user->id.' roleID: '.$idRole.' roleSTS: '.$roleSts; 
        if($user!=null)
        {  
          $dislayAdmin=$user->dislayAdmin($user->id, $idRole, $roleSts);
          App\Role_user::where([['role_id','=',$idRole],['role_sts','=',$roleSts],['user_id','=',$user->id]])->get();
  //  echo '</br>display: '.$dislayAdmin;
        }
        else $dislayAdmin=-1;
      }catch(Exception $ex)
      {
        $dislayAdmin=-1;
      }
//echo $hideAdmin;
      if($dislayAdmin==1)
      {
        ?>
        <? $projects=App\Project::where('status','=',1)->get();?>
        <div class="panel-heading"><h4>Manage Users</h4></div>  


      <table>

        <tr>

          <td>
            <div class="form-group">&nbsp;
              <a style="color:black;" class="btn btn-outline btn-default" href="/users">All Users</a>
            &nbsp;</div>
          </td>
          
          <td>
            <div class="form-group">&nbsp;
              <a style="color:black;" class="btn btn-outline btn-default" href="/roles">All Roles</a>
            &nbsp;</div>
          </td>
          <td>
            <div class="form-group">&nbsp;
              <a style="color:black;" class="btn btn-outline btn-default" href="/permissions">All Permissions</a>
            &nbsp;</div>
          </td>

        </tr></table>
        <div align="left" class="form-group">
        </div>
      <? }?>
    </div>
    <div> 

   
  <h4 align="center">
    <i>
      <!--  Total Number Of TestCases: <?// $TestCases=new  App\Tc(); echo $TestCases->count()?> -->
    </i>
  </h4>
  <div align="center">
   <!-- <div id="piechart" style="width: 100%; height: 500px;"></div>-->
       <!--
<div align="center">
    <img src="/img/VenatriX.png">
  </div>-->
</div>
@if (session('status'))
<div class="alert alert-default">
  {{ session('status') }}
</div>
@endif


</div>


@endsection
 <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>

<?
$fullname= Auth::user()->firstname.' '.Auth::user()->lastname;
?>
<script type="text/javascript">
        $(document).ready(function(){

            demo.initChartist();

            $.notify({
                icon: 'pe-7s-gift',
                message: "Welcome <b><i>{{$fullname}}</i></b> "

            },{
                type: 'info',
                timer: 4000
            });

        });
    </script>