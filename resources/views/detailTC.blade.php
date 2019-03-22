@extends('layouts.app')

@section('content')
	<div class="panel panel-default">
				<div class="panel-heading">Details of Test Case <b>{{$tc->tc_name}}</b> of the project <b>{{App\Project::where('id','=',$tc->project_id)->first()->project_name}}</b></div>
 @if(Session::has('editTC'))
<script src="../assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script type="text/javascript">
        $(document).ready(function(){

            demo.initChartist();

            $.notify({
                icon: 'pe-7s-gift',
                message: "Test Case  <b>{{$tc->tc_name}}</b> Updated successfully"

            },{
                type: 'info',
                timer: 4000
            });

        });
    </script>
           
            @endif
				
@if(Session::has('tc0Created1'))

<script src="../assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script type="text/javascript">
        $(document).ready(function(){

            demo.initChartist();

            $.notify({
                icon: 'pe-7s-gift',
                message: "TC0 Created Successfuly."

            },{
                type: 'info',
                timer: 4000
            });

        });
</script>
			@endif
			 @if(Session::has('ExecutedTC'))

        <div id='hidePanel'  align="center" >
        	
        	<div align="right">
        	<a href='#' id='hideButton' onclick="myFunctionHide(this.value)"><h4><b>X</b></h4></a>
        	</div> 
        	<div align="right">
            <h3>
 <script src="../assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script type="text/javascript">
        $(document).ready(function(){

            demo.initChartist();

            $.notify({
                icon: 'pe-7s-gift',
                message: "Test Case Executed."

            },{
                type: 'info',
                timer: 4000
            });

        });
</script>  
            </h3> 
            @if($tc->tcrunstatus_id==4)
            The SiteMap Was Generated Successfuly
            @elseif($tc->tcrunstatus_id==2)
            The TC Executed With Errors
            @elseif($tc->tcrunstatus_id==3)
            The Test Execution Failed
            @endif
            <div align="center">-------------------------------------------------------------</div>
</div>
        </div>
        @endif

        @if(Session::has('ExecutedTCError'))

        <div id='hidePanel'  align="left" >
        	
        	<div align="right">
        	<a href='#' id='hideButton' onclick="myFunctionHide(this.value)"><h4><b>X</b></h4></a>
        	</div> 
        	        	<div align="left">

            <h3>
                Test Case Executed With Errors !   
            </h3> 
        </div>
            <div align="center">-------------------------------------------------------------</div>

        </div>
        @endif

			@if(Session::has('TCGenerated'))

			<div class="alert alert-default" align="left" role="alert">
				<h3>
					Test Case Generated Successfuly 
				</h3> 
			</div>
			            <div align="left">-------------------------------------------------------------</div>

			@endif
			<div align="left" class="panel-body" >
				@if (session('status'))
				<div class="alert alert-default">
					{{ session('status') }}
				</div>
				@endif
				<input class="form-control" type="hidden" name="id" value="{{$tc->id}}" required="true">
				<!-- <div class="form-group">
					<label>Test's Name </label>
					{{$tc->tc_name}} 
				</div> -->
				<div class="form-group">
					<label>URL</label>
					{{$tc->tc_url}}
				</div>
				<div class="form-group">
					<label>Decription </br></label>								
					{{$tc->tc_description}}
				</div>


				<div class="form-group">

					<label>Comment</br></label>
					{{$tc->tc_comments}}
				</div>
				<div class="form-group">

					<label>Created by</br></label>
					{{$tc->created_by}}
				</div>
				<div class="form-group">

					<label>Created </label>
					{{$tc->creation_date}} <label>By </label> {{$tc->created_by}}

				</div>
				<div class="form-group">

				   <label>Updated  </label>{{$tc->updated_date}} <label>By </label> {{$tc->updated_by}}
				</div>
				<!-- <div class="form-group">

					<label>Updated date</br></label>
					{{$tc->updated_date}}
				</div> -->
				<div class="form-group">

					<label>Executed </label>{{$tc->exec_date}} <label>By </label> {{$tc->exec_by}}
				</div>
				<!-- <div class="form-group">

					<label>Project</br></label>
					{{App\Project::where('id','=',$tc->project_id)->first()->project_name}}
				</div> -->
				
				<div class="form-group">

					<label>TC Run Status</br></label>
					@if($tc->tcrunstatus_id==1) <font color='grey'><b>{{'No Run'}}</b></font>
					@elseif($tc->tcrunstatus_id==2) <font color='orange'>{{'Error'}}<b></b></font>
					@elseif($tc->tcrunstatus_id==3) <font color='red'><b>{{'Failed'}}</b></font>
					@elseif($tc->tcrunstatus_id==4) <font color='green'><b>{{'Pass'}}</b></font>
					@endif
				</div>
				<label>TC Status</br></label>
				@if($tc->tcstatuss_id==1) <font color='green'><b>{{'System Generate'}}</b></font>
				@elseif($tc->tcstatuss_id==2) <font color='orange'><b>{{'Ready for Approval'}}</b></font>
				@elseif($tc->tcstatuss_id==3) <font color='blue'><b>{{'Ready for Approval'}}</b></font>
				@elseif($tc->tcstatuss_id==4) <font color='black'><b>{{'Approved'}}</b></font>
				@elseif($tc->tcstatuss_id==5) <font color='black'><b>{{'Executed'}}</b></font>
				@endif
			</div>
<?php
//
/*
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
    if($dislayByRole!=2)//Manager//Tester//Reviewer
    {*/{?>
			<div align="center">
				<a href="/actionTC/{{$tc->id}}?action=2/{{$tc->id}}" style="color:black;" class="btn btn-outline btn-default">Edit TestCase</a>
			</div>
		</br>
			<?}?>
			<?$url=App\Project::find($tc->project_id)->first();?>

			<!-- test steps-->
			<?
			$prjct=App\Project::where('id','=',$tc->project_id)->first();
			?>
			@if($tc->tcstatuss_id == 4 && $tc->tcrunstatus_id == 1 && $prjct->status==0)
			@if($tc->tcstatuss_id==4 && $tc->tcrunstatus_id==1)
<div align="center">
				<a href="/credentials/{{$tc->id}}"  style="color:black;" class="btn btn-outline btn-default" data-toggle="tooltip" data-placement="top" title="Tooltip on top" >Execute TC0</a>
			</div>
			@endif

			@if(Session::has('tc0Created2'))

				<div align="center" class="alert alert-info">
					Would you like to Execute the TC0 ?  
				</h3> 
				When executing the TC0, a SiteMap of the Project will be Generated, it will help the Tester to Create TestCases.
				<!-- @if($tc->tcstatuss_id==4 && $tc->tcrunstatus_id==1)

<div align="center">

				<a href="/credentials/{{$tc->id}}"  style="color:black;" class="btn btn-outline btn-default">Execute TC0</a>
			</div>
			@endif -->

<script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>

<?
$fullname= Auth::user()->firstname.' '.Auth::user()->lastname;
?>
<script type="text/javascript">
        $(document).ready(function(){

            demo.initChartist();

            $.notify({
                icon: 'pe-7s-gift',
                message: "Now you can Edit and Execute the TC0 to launch the crawl and build the site Map."

            },{
                type: 'info',
                timer: 4000
            });

        });
    </script>




?>

			</div></div>

			@endif

			
<!--			<div align="center">
				<a href="/credentials/{{$tc->id}}"  class="btn btn-outline btn-default">Run The TestCase TC0</a>
			</div>
-->
 <!--
			<div align="left">
                 <a href="/home"class="btn btn-outline btn-default">Back To Home</a>
                 <a href="/viewTestsOfProject/{{$tc->project_id}}" class="btn btn-outline btn-default">Back</a>

			</div>
		-->
			@endif
			
			<!----> 
			<div align="left">
                 <a href="/viewTestsOfProject/{{$tc->project_id}}" ><img width="2%" src="/img/back.png"></a>
                    <a href="/home"   > <img width="5%" src="/img/home.png">
  </a>

			</div>

<!--
				 <script type="text/javascript">
  function openWdefaultw() {
    myWin = wdefaultw.open('/credentials/{{$tc->id}}', 'login', 'width=400,height=300');
   // myWin.document.write("Hello!");
  }
</script>
</head>
				<div align="center">

<input type="button" class="btn btn-outline btn-default" value="Run Test Case" 
    onclick="openWdefaultw()" />

</div>  --> 
			@if(Session::has('tc0Created1'))

@if($tc->tcstatuss_id != 4)
				<!--<div align="center">
				<a href="#"  class="btn btn-outline btn-default">Delete Test Case</a>
			</div>-->
			@endif
			
			@if(!Session::has('tc0Created1'))

			<div class="panel-heading">Steps of Test Case <b>{{$tc->tc_name}}</b>
			</br>
			<h4>The Total number of TestCases Steps of the TestCase <b>{{$tc->tc_name}}</b>: is :<font color=""><b>&nbsp;{{$stps->count()}}</b></font></h4>

		</div>
		<?php 
		$idProject=$tc->project_id;
//echo '---'.$idProject;

		$testcase=  App\Tc::all();
		$testcase= $testcase->where('project_id', '=', $tc->project_id)->first();
		if($testcase->count()>0)
		{
//echo '</br>---'.$testcase;
			?>
			<div align="center">                    
				<a style="color:black;" href="/newStepTC/{{$tc->id}}"  class="btn btn-outline btn-default">Add a Step to the TestCase {{$tc->tc_name}}</a> 
			</br>
		</div>
		<?php }?>
		<div>  
			<a style="color:black;" class="toggle-vis btn btn-outline btn-primary" data-column="1">Step's Name</a>
			<a style="color:black;" class="toggle-vis btn btn-outline btn-primary" data-column="2">TC Step Status</a>
			<?php
			$stps=new App\Tcdetail();
	//$stps=App\Tcdetail::all();
			$stps=$stps->where('tcs_id','=',$tc->id)->get();
	//echo '-----'.$stps;
			?>                          <a class="toggle-vis btn btn-outline btn-primary" data-column="3">TC Step VAL Point</a>
			<table  width="100%" width="100%" id="example" class="table table-striped table-bordered table-hover" cellspacing="0" > <!-- id="dataTables-example"-->
				
				<thead>
					<tr>
							<!--<th class="active">
								<input type="checkbox" class="select-all checkbox" name="select-all" />
								ID
							</th>-->
							<th >Step's name</th>
							<th >TC Step Status</th>
							<th >TC Step Verification Point</th>
							<th >Created at</th>
							<th >Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($stps as $stp)
						<tr>
							<!--<td>-->
								<input type="hidden"  class="select-item checkbox" value="{{$stp->id}}" name="select-item" value="1000" />
								
								<!--</td>-->
								<td>
									{{$stp->tc_step_name}}
								</td>
								<td>
									{{$stp->tc_step_sts_id}}
								</td>
								<td>
									@if($stp->tc_val_pnt==0)
									<font color="green"><b>Step</b></font> 
									@elseif($stp->tc_val_pnt==1)
									<font color="blue"><b>Verification Point</b></font> 
									@endif
								</td>
								<td> <?php echo date('Y-m-d', strtotime($stp->created_at))?></td>

								<td>
									<form action="/actionTCStep/{{$stp->id}}" method="get">
										<table>
											<tr>
												<td>
													<select class="btn btn-outline btn-default"   name="action">
														<option  value='0' >Details</option>
														<!--    <option  value='1' >Add Step</option>-->
														<option value='2' >Edit Step</option>
														<!--<option  value='3' >Delete Step</option>-->
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
					@endif          
					@endif          
					
					
				</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function myFunctionHide()
	{        
            document.getElementById("hidePanel").style.display = 'none';
           
    }

</script>
@endsection
 