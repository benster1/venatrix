@extends('layouts.app')

@section('content')

			<div class="panel panel-default">
				<div class="panel-heading">Details of Test Case Step <b>{{$tcstep->tc_step_name}}</b></div>

				<div class="panel-body" >
					@if (session('status'))
					<div class="alert alert-default">
						{{ session('status') }}
					</div>
					@endif
							<input class="form-control" type="hidden" name="id" value="{{$tcstep->id}}" required="true">
						<div class="form-group">
							<label>Step Name </label>
							{{$tcstep->tc_step_name}} 
						</div>

							<div class="form-group">
								<label>Decription </br></label>								
									{{$tcstep->tc_desc}}
							</div>
							

							<div class="form-group">

								<label>Comment</br></label>
									{{$tcstep->tc_stp_comments}}
							</div>
							<div class="form-group">

								<label>Step Status</br></label>
									{{$tcstep->tc_step_sts_id}}
							</div>
							<div class="form-group">

								<label>Expected Result</br></label>
									{{$tcstep->expected_rslts}}
							</div>
							<div class="form-group">

								<label>Actual Result</br></label>
									{{$tcstep->actual_rslts}}
							</div>
							<div class="form-group">

								<label>Verification Point</br></label>
									@if($tcstep->tc_val_pnt==0)
									<font color="green"><b>Step</b></font> 
									@elseif($tcstep->tc_val_pnt==1)
									<font color="blue"><b>Verification Point</b></font> 
									@endif
							</div>
							<div class="form-group">

								<label>Test Case</br></label>
								<?php $tc= App\Tc::find($tcstep->tcs_id)->first() ;?>
									{{$tc->tc_name}}
							</div>
							<div class="form-group">

								<label>Created at</br></label>
									{{$tcstep->created_at}}
							</div>
							<div class="form-group">

								<label>Updated at</br></label>
									{{$tcstep->updated_at}}
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

<div>         
           

</div>
</div>
</div>
</div>
@endsection