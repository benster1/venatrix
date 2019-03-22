@extends('layouts.app')

@section('content')

      <div class="panel panel-default">
    <div class="panel-heading"><div align="center">Create Test Case</div></div>
        <div align="center" class="panel-body">
                                      
                                       @if(Session::has('choiceTCCreate'))

        <h3>
          Would You Like To Create The Test Case Manualy Or Using The Site Map?  
        </h3> 
      @endif
          <div class="form-group" align="center">
          </li>
          <!--
          
                       @foreach (Auth::user()->roles as $role)
                                            <?php $roleuser=App\Role_user::where('role_id','=',$role->id)->get();
                                                   $roleuser=$roleuser->where('user_id','=',Auth::user()->id)->first(); 
                                            ?>
                                            @if($roleuser->role_sts==1)
                                             @if($role->role_name=='Tester'){{$role->role_name}}
                                             @endif
                                            @endif
                                        </br>
                                        @endforeach
                                      -->
                                    </b></h4>

      <div class="panel-heading"></div>

      <div class="panel-body">
        @if (session('status'))
        <div class="alert alert-default">
          {{ session('status') }}
        </div>
        @endif
        
              <form method="get" action="/newTestCase/{{$project->id}}"  onclick="myFunctionOnLOAD(this.value)">
<input type="hidden" name="NameProject" id="NameProject" value="{{$project->id}}" >
<input type="submit" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Manualy&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"  class="btn btn-outline btn-default" style="color:black;" onclick="myFunctionLOAD(this.value)">
</form></br>
            <form>
        <a href="/createNode?projectname={{$project->project_name}}" style="color:black;" class="btn btn-outline btn-default" >View Site Map  </a>
</form>
</br>
<div align="left" class="form-group">
    <a href="/manageTC/{{$project->id}}" ><img width="2%" src="/img/back.png"> </a>
                    <a href="/home"   > <img width="5%" src="/img/home.png">
  </a>
</div>
        


        @endsection

<script src="../assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>

<?
$fullname= Auth::user()->firstname.' '.Auth::user()->lastname;
?>
<script type="text/javascript">
        $(document).ready(function(){

            demo.initChartist();

            $.notify({
                icon: 'pe-7s-gift',
                message: "Here you can Choose between creating a Test Case Manually or Generate a Test Case from The SiteMap of the Project <b><i>{{$project->project_name}}</i></b>."

            },{
                type: 'info',
                timer: 4000
            });

        });
    </script>