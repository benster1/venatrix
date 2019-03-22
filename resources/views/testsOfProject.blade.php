@extends('layouts.app')

@section('content')



@if(!Session::has('createProject1'))

<div class="panel panel-default">
    <div class="panel-heading">

       <div align="center">Tests Cases Of Project {{ $project->project_name}} </div>

   </div>
   <!--         <div class="panel-heading"> --> 
    @if(Session::has('ExecutedCrawl'))

    <div class="panel-heading">
        <h2><div align="center">Test Cases  Executed</div></h2></div>

        <div align="center">

            <div id=></br>

            </br>

            <h3>Find Below the Status of Test Cases</b></font></h4>
            </div>
        </div>
        @endif
        <div align="left">

            <div id="examples2"></br>

                Total Number Of Steps To Execute The Test Case is :<font color=""><b>&nbsp;{{$tcs->count()}}</b></font>
            </div>
        </div>
        @else
        <div class="panel panel-default"> 




            @endif



 <!-- @if(Session::has('editProject1'))

            <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script type="text/javascript">
        $(document).ready(function(){

            demo.initChartist();

            $.notify({
                icon: 'pe-7s-gift',
                message: "Project  <b>{{$project->project_name}}</b> Updated successfully"

            },{
                type: 'info',
                timer: 4000
            });

        });
    </script>
            
    @endif -->

    @if(Session::has('createProject1') || Session::has('editProject1'))

    @if(Session::has('editProject1'))

    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function(){

            demo.initChartist();

            $.notify({
                icon: 'pe-7s-gift',
                message: "Project  <b>{{$project->project_name}}</b> Updated successfully"

            },{
                type: 'info',
                timer: 4000
            });

        });
    </script>

    
    @elseif(Session::has('createProject1'))

    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function(){

            demo.initChartist();

            $.notify({
                icon: 'pe-7s-gift',
                message: "Project  <b>{{$project->project_name}}</b> Created successfully"

            },{
                type: 'info',
                timer: 4000
            });

        });
    </script>
    @endif

    <div align="center" class="alert alert-info">
        <h3>
            Would you like to Create  TC0 ?  
        </h3> 
        Creating TC0 is the 1st step to do after creating a project, it helps to Generate the SiteMap of the Project so the Tester can Generate TestCases.
    </div> <div align="center">
    </br>

    <a href="/newTC0/{{$project->id}}" style="color:black;" class="btn btn-outline btn-default">Create TC0</a>
</div>

<div align="left">
    <a href="/home"   ><img width="5%" src="./img/home.png">  </a>
                                                <!--                                                <a href="/home?id={{$project->id}}"class="btn btn-outline btn-default">Back</a>
                                                -->
                                            </div>

                                            @endif                  
                                            @if (session('status'))
                                            <div class="alert alert-default">
                                                {{ session('status') }}
                                            </div>
                                            @endif
                                            @if(!Session::has('createProject1'))

                                            <div class="form-group">
                        <!--<a class="toggle-vis btn btn-outline btn-primary" data-column="1">Test's Name</a>
                        <a class="toggle-vis btn btn-outline btn-primary" data-column="2">TC Status</a>
                        <a class="toggle-vis btn btn-outline btn-primary" data-column="3">TC Run</a>
                        <a class="toggle-vis btn btn-outline btn-primary" data-column="4">URL</a>
                        START-->




                        @if(!Session::has('createProject1') && !Session::has('editProject1'))

<table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th class="active">
                <input type="checkbox" class="select-all checkbox" name="select-all" />
                ID
            </th>
            <th >Test's name</th>
            <th >TC Status</th>
            <th >TC Run</th>
<!--                                                 <th >URL</th>
-->                                                <th >Created At</th>
<th>By</th>
<th >Action</th>
</thead>
<tbody>
    @foreach( $tcs as $tc)
    <tr>
     <td ><a href="/actionTC/{{$tc->id}}?action=0" >{{$tc->id}}</a></td>
     <td ><a href="/actionTC/{{$tc->id}}?action=0" >{{$tc->tc_name}}</a></td>
     <td >
        @if($tc->tcstatuss_id==1) <font color='green'><b>{{'User Generate'}}</b></font>
        @elseif($tc->tcstatuss_id==2) <font color='green'><b>{{'System Generate'}}</b></font>
        @elseif($tc->tcstatuss_id==3) <font color='orange'><b>{{'Ready for Approval'}}</b></font>
        @elseif($tc->tcstatuss_id==4) <font color='purple'><b>{{'Approved'}}</b></font>
        @elseif($tc->tcstatuss_id==5) <font color='blue'><b>{{'Executed'}}</b></font>
        @elseif($tc->tcstatuss_id==6) <font color='black'><b>{{'Innactif'}}</b></font>

        @endif
    </td>              <td align="center" >

        @if($tc->tcrunstatus_id==1) <font color='blue'><b><img  width="30" src="/img/blue.png"></b></font>
        @elseif($tc->tcrunstatus_id==2) <font color='orange'><b><img width="30" src="/img/orange.png"/></b></font>
        @elseif($tc->tcrunstatus_id==3) <font color='red'><b><img  width="30" src="/img/red.png"></b></font>
        @elseif($tc->tcrunstatus_id==4) <font color='green'><b><img  width="30" src="/img/green.png"></b></font>

        @endif
    </td>
<!--                                                 <td> {{$tc->tc_url}}</td>
-->                                                <td> <?php echo date('Y-m-d', strtotime($tc->creation_date))?></td>
<td> {{$tc->created_by}}</td>
<td>
   
    <form action="/actionTC/{{$tc->id}}" method="get">
        <select class="btn btn-outline btn-primary"   name="action">
            <option  value='0' >Details</option>
            <option  value='1' >Approve</option>
            <option value='2' >Edit</option>
            @if($tc->tcstatuss_id!=4)
            <option  value='3' >Delete</option>
            @endif
        </select>
        <input type="submit" value="GO">
    </form>
</td>
</tr>
@endforeach
</tbody>
</table>

                    </br><div class="form-group">

                        <form  action="/TcCrawl" method="post">
                            {{ csrf_field() }}

                            <div id="examples">

<div align="right">
    <a href="/newTestCase/{{$project->id}}" style="color:black;" class="btn btn-outline btn-default">Create New TestCase Manualy</a>
</div></br>
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
    if($dislayByRole==3||$dislayByRole==4)//Manager//Tester//Reviewer
    {

        ?> 
        <!-- -------------------------------------->                            
        <div class="form-group" align="center">                          
            <div align="center" hidden id='credentialsTC' class="panel-body" style=" align-items: center;  overflow:auto;">
                <div class="alert alert-default" role="alert">

                    <h3>
                        Would You Like To Execute Test Cases ?
                    </br>

                    Credentials To Run TC
                </h3> 
            </div>
            <table>
                <tr>
                    <td> <b><i>Username&nbsp;</i></b> </td>
                    <td><input  type="text" name="username" class="form-control" value="" placeholder="Username(Optional)"></td>
                </tr>
                <tr>
                    <td> <b><i>Password&nbsp;</i></b> </td>
                    <td><input type="password" name="password" class="form-control" value="" placeholder="Password(Optional)"></td>
                </tr>
                <tr>
                    <td> <b><i>Project&nbsp;</i></b> </td>
                    <td><input type="text" name="project_name" class="form-control"" value="{{ $project->project_name}}" readonly placeholder="Project"></td>
                </tr>
            </table>

        </br>
        <input type="submit" name="submit" style="color:black;" class="btn btn-outline btn-default" value="Execute">
        <input type="reset" name="reset" style="color:black;" class="btn btn-outline btn-default" value="Clear">
    </div>
</div>
<?}?>
</form>

</br>


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
    if($dislayByRole==3||$dislayByRole==4)//Manager//Tester//Reviewer
    {

        ?> 
        <div align="center">
            <a href="#"  id='credentialButton' style="color:black;" class="btn btn-outline btn-default" onclick="myFunctionCredentials(this.value)">Execute</a>
        </div>
    </br>

    <?}?>
    <!------------------------------>
    <div id="examples1">
        <table id="example" width="" heigh="500px" >
           <tr>
            <td>
                <font color='blue'><b><img  width="30" src="/img/blue.png"></b></font>
            </td>
            <td>
                No Run&nbsp;&nbsp;&nbsp;
            </td>

            <td>
                <font color='orange'><b><img  width="30" src="/img/orange.png"></b></font>
            </td>
            <td>
                Error&nbsp;&nbsp;&nbsp;
            </td>

            <td>
                <font color='red'><b><img  width="30" src="/img/red.png"></b></font>
            </td>
            <td>
                Failed&nbsp;&nbsp;&nbsp;
            </td>

            <td>
                <font color='green'><b><img  width="30" src="/img/green.png"></b></font>
            </td>
            <td>
                Pass&nbsp;&nbsp;&nbsp;
            </td>

        </tr>

    </table>

    <!-- /.table-responsive -->


    <div align="center">
        <div id="piechart" style="width:  100%; height: 500px;"></div>

    </div>
    <div align="left">
        <div>
            <a href="/manageTCMenu2?id={{$project->id}}" ><img width="2%" src="/img/back.png"></a>
        </div>

    </div>
    @endif
               <!-- <div class="form-group">
                        <button  type="button" class="btn btn-outline btn-default" >Approve TestCases</button>

                    <button type="button" class="btn btn-outline btn-primary">Run</button>
                    <button type="button" class="btn btn-outline btn-default">Cancel</button>
                    <div>                    
                        

                    </div>
                </div>-->
            </div>
        </div>
    </div>
</div>
<?php
$norun=App\Tc::where([['tcrunstatus_id','=',1],['project_id','=',$project->id]])->get()->count();
$error=App\Tc::where([['tcrunstatus_id','=',2],['project_id','=',$project->id]])->get()->count();
$Failed=App\Tc::where([['tcrunstatus_id','=',3],['project_id','=',$project->id]])->get()->count();
$pass=App\Tc::where([['tcrunstatus_id','=',4],['project_id','=',$project->id]])->get()->count();
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {

    var data = google.visualization.arrayToDataTable([
      ['TC Run Status', '%'],
      ['No Run', {{$norun}}],
      ['Failed',      {{$Failed}}],
      ['Error',  {{$error}}],
      ['Pass',     {{$pass}}],
      ]);

    var options = {
      title: 'TC Run Status Summary'
  };

  var chart = new google.visualization.PieChart(document.getElementById('piechart'));

  chart.draw(data, options);
}
</script>

@endif

<script src="../assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>

<?
$fullname= Auth::user()->firstname.' '.Auth::user()->lastname;
?>
<script type="text/javascript">
        $(document).ready(function(){

            demo.initChartist();

            $.notify({
                icon: 'pe-7s-gift',
                message: "Here you can View all the Test Cases of the Project <b><i>{{$project->project_name}}</i></b>."

            },{
                type: 'info',
                timer: 4000
            });

        });
    </script>
<!--END---------------------------->


<script type="text/javascript">

    function myFunctionCredentials()
    {        
        var val=document.getElementById("credentialButton").innerHTML;
        if(val=='Execute') 
        {
            document.getElementById("examples").style.display = 'none';
            document.getElementById("examples1").style.display = 'none';
            document.getElementById("examples2").style.display = 'none';
            document.getElementById("credentialsTC").style.display = 'block';
            document.getElementById("credentialButton").innerHTML = 'Cancel';
        }
        if(val=='Cancel') 
        {
            document.getElementById("examples").style.display = 'block';
            document.getElementById("examples1").style.display = 'block';
            document.getElementById("examples2").style.display = 'block';

            document.getElementById("credentialsTC").style.display = 'none';
            document.getElementById("credentialButton").innerHTML = 'Execute' ;
        }    
    }

    @endsection
