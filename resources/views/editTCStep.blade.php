@extends('layouts.app')

@section('content')

			<div class="panel panel-default">
				<div class="panel-heading">Edit Test Case Step <b>{{$tcstep->tc_step_name }}</b></div>

				<div class="panel-body" >
					@if (session('status'))
					<div class="alert alert-default">
						{{ session('status') }}
					</div>
					@endif
					<form method="post" action="/editTCStep/">
                           {{ csrf_field() }}
							<input class="form-control" type="hidden" name="idStep" value="{{$tcstep->id}}" required="true">
						<div class="form-group">
							<label>Step's Name *</label>
							<input class="form-control" type="text" name="stepName" value="{{$tcstep->tc_step_name}}" required="true">
						</div>

							<div class="form-group">
								<label>Decription *</br></label>
								<textarea    rows="10" cols="100" name="stepDesc"  class="form-group">
									{{$tcstep->tc_desc}}
								</textarea>
							</div>
							

							<div class="form-group">

								<label>Comment (Optional)</br></label>
								<textarea    rows="10" cols="100" name="stepComs" class="form-group" >
									{{$tcstep->tc_stp_comments }}
								</textarea>
							</div>

							<div class="form-group">

								<label>Step Status "Working on it, default value is 0"</br></label>
								<input class="form-control" type="number" min='0' max="1" name="stepSts" value="{{$tcstep->tc_step_sts_id}}" required="true">

							</div>
							<div class="form-group">

								<label>Expected Result</br></label>
								<input class="form-control" type="text" name="expected_rslt" value="{{$tcstep->expected_rslts}}" required="true">									
							</div>
							<div class="form-group">

								<label>Actual Result</br></label>
								<input class="form-control" type="text" name="actual_rslt" value="{{$tcstep->actual_rslts}}" required="true">
									
							</div>
							<div>
							<label>Verification Point*</label>
							    <input type="radio" name="vp" value="0" @if($tcstep->tc_val_pnt ==0) {{'checked'}} @endif >
							    
							    <label for="vp1">Step</label>

							    <input type="radio" name="vp" value="1" @if($tcstep->tc_val_pnt ==1) {{'checked'}} @endif >
							     
							    <label for="vp2">Verification</label>

							    
							  </div>


							<div class="form-group">

								<label>Test Case</br></label>
								<?php $tc= App\Tc::find($tcstep->tcs_id)->first() ;?>
									{{$tc->tc_name}}
							</div>
							<div class="form-group">

								<label>Project</br></label>
								<?php 
								$tc= App\Tc::find($tcstep->tcs_id)->first() ;
								$project=App\Project::find($tc->project_id)->first();
								?>
									{{$project->project_name}}
							</div>
							


</div>                    
<input type="submit" value="Save" style="color:black;" class="btn btn-outline btn-default">

<button type="reset" value="Cancel" style="color:black;" class="btn btn-outline btn-default">
<div>         
</form>

</div>
</div>
</div>
</div>
@endsection