@extends('layouts.app')

@section('content')

			<div class="panel panel-default">
				@if(Session::has('editTC'))

                <div class="panel-heading">
                    Edit Test Case <b>{{$tc->tc_name}}              
                
            </div>
            @endif
<!-- 				<div align="center" class="alert alert-info"> 
 -->					<!-- <h4>Would You Like To Update The Test Case ? </h4> -->

 <script src="../assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script type="text/javascript">
        $(document).ready(function(){

            demo.initChartist();

            $.notify({
                icon: 'pe-7s-gift',
                message: "Here you can update the Test Case "

            },{
                type: 'info',
                timer: 4000
            });

        });
    </script>
<!-- 				</div>
 -->
				<div  align="left">
					@if (session('status'))
					<div >
						{{ session('status') }}
					</div>
					@endif
					<form action="/editTC" method="Post">
                           {{ csrf_field() }}
							<input class="form-control" type="hidden" name="tc_id" value="{{$tc->id}}" required="true"></br>
						<div class="form-group">
							<label>Test's Name *</label>
							<input class="form-control" type="text" name="tc_name" value="{{$tc->tc_name}}" required="true">
						</div>
						<div class="form-group">
							<label>URL *</label>
							<input class="form-control" type="text" name="tc_url" value="{{$tc->tc_url}}" required="true">
						</div>

							<div class="form-group">
								<label>Decription *</br></label>
								<textarea    rows="10" cols="89" name="tc_desc"  class="form-group">
									{{$tc->tc_description}}
								</textarea>
							</div>
							

							<div class="form-group">

								<label>Comment (Optional)</br></label>
								<textarea    rows="10" cols="89" name="tc_coms" class="form-group" >
									{{$tc->tc_comments}}
								</textarea>
							</div>

							<div class="form-group">
							<label>TC Run Status</br></label>
								<select name='tc_run'>
									<option value="1" 
											@if($tc->tcrunstatus_id==1) {{'selected'}} @endif>
										{{'No Run'}}
									</option>
									<option value="2" 
									@if($tc->tcrunstatus_id==2) {{'selected'}} @endif>
										{{'Error'}}
									</option>
									<option value="3" 
									@if($tc->tcrunstatus_id==3) {{'selected'}} @endif>
										{{'Failed'}}
									</option>
									<option value="4" 
									@if($tc->tcrunstatus_id==4) {{'selected'}} @endif>
										{{'Pass'}}
									</option>
									
								</select>
							</div>

							<label>TC Status</br></label>
								<select name='tc_status'>
									<option value="1" 
											@if($tc->tcstatuss_id==1) {{'selected'}} @endif>
										{{'User Generate'}}
									</option>
									<option value="2" 
									@if($tc->tcstatuss_id==2) {{'selected'}} @endif>
										{{'System Generate'}}
									</option>
									<option value="3" 
									@if($tc->tcstatuss_id==3) {{'selected'}} @endif>
										{{'Ready for Approval'}}
									</option>
									<option value="4" 
									@if($tc->tcstatuss_id==4) {{'selected'}} @endif>
										{{'Approved'}}
									</option>
									<option value="5" 
									@if($tc->tcstatuss_id==5) {{'selected'}} @endif>
										{{'Executed'}}
									</option>
									
								</select>
							</div>
							
</br>
<input type="submit" value="Save"  style="color:black;" class="btn btn-outline btn-default">

<button type="reset" value="Cancel" style="color:black;" class="btn btn-outline btn-default"> Clear</button>
<div>         
</form></br>
    <a href="/actionTC/{{$tc->id}}?action=0" ><img width="2%" src="/img/back.png"></a>
                    <a href="/home"   > <img width="5%" src="/img/home.png">
  </a>
</div>                    

</div>
</div>
</div>
</div>
@endsection