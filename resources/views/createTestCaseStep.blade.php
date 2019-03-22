@extends('layouts.app')

@section('content')

			<div class="panel panel-default">
				<div class="panel-heading">Add a step to the TestCase <b>{{$tc->tc_name}}</b> </div>

				<div class="panel-body" >
					@if (session('status'))
					<div class="alert alert-default">
						{{ session('status') }}
					</div>
					@endif
					<form action="/dbCreateTCStep" method="post">
                           {{ csrf_field() }}
						<div>
							<label>Verification Point*</label>
					    <input type="radio" name="vp" value="0" checked="checked">
					    <label for="vp1">Step</label>

					    <input type="radio" name="vp" value="1">
					    <label for="vp2">Verification</label>

					    
					  </div>
					  	<input class="form-control" name='tc' type="hidden" value="{{$tc->id}}" required="true">
					  	<input class="form-control" name='idProject' type="hidden" value="{{$tc->project_id}}" required="true">

						<div class="form-group">
							<label>Step's Name *</label>
							<input class="form-control" type="text" name="stepName" required="true">
						</div>

							<div class="form-group">
								<label>Decription *</br></label>
								<textarea    rows="10" cols="100" class="form-group" name="stepDescription"required="true">
								</textarea>
							</div>
							

							<div class="form-group">

								<label>Comments (Optional)</br></label>
								<textarea    rows="10" cols="100" class="form-group" name="stepComments">
								</textarea>
							</div>
							 <div class="form-group">
								<label>Expected Result *</label>
								<input class="form-control" type="text" name="expected_rslt" required="true">
							</div>
							<div class="form-group">
								<label>Actual Result *</label>
								<input class="form-control" type="number" name="actual_rslt" required="true">
							</div>
<input type="submit" style="color:black;" class="btn btn-outline btn-default" name="save" value="Save">
<input type="reset" style="color:black;" class="btn btn-outline btn-default" name="cancel" value="Cancel">


</div>                    
</form>

<div>         
           

</div>
</div>
</div>
</div>
@endsection