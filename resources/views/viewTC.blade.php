@extends('layouts.app')

@section('content')

        <div class="panel panel-default">
                <?if($project!== null){?>
                <div class="panel-heading">All Tests of the Project <b>{{$project->project_name}}</b></br>
                    <h4>The Total number of TestCases of the Project <b><b>{{ $project->project_name}}</b> is :<font color="Blue"><b>&nbsp;{{$tcs->count()}}</b></font></h4>
                </div>
                <?}else{?>
                 <div class="panel-heading">All Tests Cases </br>
                    <h4>The Total number of TestCases  is :<font color="Blue"><b>&nbsp;{{$tcs->count()}}</b></font></h4>
                </div><?}?>
                

                <div class="panel-body">
                    @if (session('status'))
                    <div class="alert alert-default">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="form-group">
                        <a style="color:black;" class="toggle-vis btn btn-outline btn-primary" data-column="1">Test's Name</a>
                        <a style="color:black;" class="toggle-vis btn btn-outline btn-primary" data-column="2">TC Status</a>
                        <a style="color:black;" class="toggle-vis btn btn-outline btn-primary" data-column="3">TC Run</a>
                        <a style="color:black;" class="toggle-vis btn btn-outline btn-primary" data-column="0">Project</a>
                        <div class="form-group">
                            <div>
                                <div class="form-group">
                        <form method="get" action="/viewTC">
                                            <label>Select a Project</label>
                                            <select name='project_id' class="form-control">
                                                <option value="">All</option>
                                    @foreach($projects as $project)
                                                <option value="{{$project->id}}">{{ $project->project_name}}</option>
                                                
                                    @endforeach            
                                            </select>
                                        </div>
                    <input type="submit" value="Search" style="color:black;" class="btn btn-outline btn-default">
                    </form>
                            </div>

                            <table  width="100%" width="100%" id="example" class="table table-striped table-bordered table-hover" cellspacing="0" > <!-- id="dataTables-example"-->
                                <thead>
                                    
                                    <tr>
                                        <th >Project</th>
                                        <th class="active">
                                            <input type="checkbox" class="select-all checkbox" name="select-all" />
                                            TC_ID
                                        </th>
                                        <th >TC Name</th>
                                        <th >TC Status</th>
                                        <th >TC Run</th>
                                        <th >Created at</th>
                                        <th>Created&nbsp;by</th>
                                        <th >Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach( $tcs as $tc)
                                    <tr>
                                        <?$projid=$tc->project_id;?>
                                        <td ><? echo App\Project::find($tc->project_id)->project_name?></td>
                                        <td class="active">
                                            <input type="checkbox"  class="select-item checkbox" name="select-item" value="1000" />
                                            {{$tc->id}}
                                        </td>
                                        <td >{{$tc->tc_name}}</td>
                                        <td >
                                            @if($tc->tcstatuss_id==1) <font color='green'><b>{{'User Generate'}}</b></font>
                                            @elseif($tc->tcstatuss_id==2) <font color='green'><b>{{'System Generate'}}</b></font>
                                            @elseif($tc->tcstatuss_id==3) <font color='orange'><b>{{'Ready for Approval'}}</b></font>
                                            @elseif($tc->tcstatuss_id==4) <font color='blue'><b>{{'Approved'}}</b></font>
                                            @elseif($tc->tcstatuss_id==5) <font color='black'><b>{{'Executed'}}</b></font>
                                             @elseif($tc->tcstatuss_id==6) <font color='black'><b>{{'Innactif'}}</b></font>

                                            @endif
                                        </td>
                                        <td >
                                         
                                            @if($tc->tcrunstatus_id==1) <font color='green'><b><img  width="30" src="/img/green.png"></b></font>
                                            @elseif($tc->tcrunstatus_id==2) <font color='orange'><b><img width="30" src="/img/orange.png"/></b></font>
                                           @elseif($tc->tcrunstatus_id==3) <font color='red'><b><img  width="30" src="/img/red.png"></b></font>
                                            @elseif($tc->tcrunstatus_id==4) <font color='blue'><b><img  width="30" src="/img/blue.png"></b></font>

                                            @endif
                                       </td>
                                        <td> <?php echo date('Y-m-d', strtotime($tc->creation_date))?></td>
                                        <td>{{$tc->created_by}}</td>

                                       <td>
                                        <form action="/actionTC/{{$tc->id}}" method="get">
                                            <table>
                                                <tr>
                                                    <td>
                                                        <select class="btn btn-outline btn-primary"   name="action">
                                                            <option  value='0' >Details</option>
                                                            <option  value='1' >Approve</option>
                                                            <option value='2' >Edit TestCase</option>
                                                            @if($tc->tcstatuss_id!=4)
                                                            <option  value='3' >Delete TestCase</option>
                                                            @endif
                                                        </select>
                                                    </td>
                                                    <td>
                                                    <input type="submit" value="GO"> 
                                                    </td>
                                                </tr>
                                            </table>
                                        </form>
                                        
                                        
                                    </td>
                                </tr>
                                @endforeach
                                


                            </tbody>
                               
                        </table>
                        <div align="center">
                            <a href="#" style="color:black;" class="btn btn-outline btn-default">Run the TC's</a>
                        </div>
                        <!-- /.table-responsive -->

                        <button id="select-invert" style="color:black;" class="btn btn-outline btn-default">Select/Unselect All</button>

                        <table>
                                         <tr>
                                        <td>
                                            <font color='green'><b><img  width="30" src="/img/green.png"></b></font>
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
                                            <font color='blue'><b><img  width="30" src="/img/blue.png"></b></font>
                                        </td>
                                        <td>
                                            Pass&nbsp;&nbsp;&nbsp;
                                        </td>
                                        
                                        </tr>
                                        
                                            </table>

                                            <div align="center">
        <div id="piechart" style="width: 900px; height: 500px;"></div>

</div>


                    </body>


                </div>
        </div>

<?php
$norun=App\Tc::where('tcrunstatus_id','=',1)->get()->count();
$error=App\Tc::where('tcrunstatus_id','=',2)->get()->count();
$Failed=App\Tc::where('tcrunstatus_id','=',3)->get()->count();
$pass=App\Tc::where('tcrunstatus_id','=',4)->get()->count();
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['TC Run Status', '%'],
          ['Pass', {{$pass}}],
          ['Failed',      {{$Failed}}],
          ['Error',  {{$error}}],
          ['No Run',     {{$norun}}],
        ]);

        var options = {
          title: 'TC Run Status Summary'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
@endsection
