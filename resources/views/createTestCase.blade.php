@extends('layouts.app')

@section('content')
<div class="panel panel-default">
				@if(Session::has('newTC'))

     <!--  <div class="alert alert-default" role="alert">
        <h3>
          Would You Like To Create A New Test Case Manualy?  
        </h3> 
      </div> -->
      <script src="../assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script type="text/javascript">
        $(document).ready(function(){

            demo.initChartist();

            $.notify({
                icon: 'pe-7s-gift',
                message: "Here you can create a new Test Case to the project <b>{{$project->project_name}}</b>"

            },{
                type: 'info',
                timer: 4000
            });

        });
    </script>
      @endif
      @if(Session::has('createTC'))

      <div class="alert alert-default" role="alert">
       
        Would you like to Create a New Test Case ?</br>
        if No <a href="/manageTC/{{$project->id}}">Click Here</a>
      </div>
      @endif
				<div class="panel-heading">Add TestCase To Project <b>{{$project->project_name}}</b></div>

				<div class="panel-body" >
					@if (session('status'))
					<div class="alert alert-default">
						{{ session('status') }}
					</div>
					@endif
					<form method="post" action="/createTC">
                           {{ csrf_field() }}
						<div class="form-group">
							<input class="form-control" name="project_id" type="hidden" value="{{$project->id}}" required="true">
						</div>
						<div class="form-group">
							<input placeholder="URL *" class="form-control" name="url" type="text"  required="true">
						</div>
						<div class="form-group">
							<input class="form-control" placeholder="TestCase Name *" name="tc_name" type="text"  required="true">
						</div>
						<div class="form-group">
							<input class="form-control" placeholder="TestCase Type *" name="tc_type" type="text"  required="true">
						</div>

							<div class="form-group">
								<textarea    name="tc_desc" rows="10" cols="87" class="form-group" required="true"  placeholder="TestCase Comments (Optional)">
								</textarea>
							</div>
							

							<div class="form-group">

								<textarea   placeholder="TestCase Comments (Optional)" name="tc_coms" rows="10" cols="87" class="form-group">
								</textarea>
							</div>
							<!--<div class="form-group">
								<label>Expected Result *</label>
								<input class="form-control" type="text" value="" required="true">
							</div>
							<div class="form-group">
								<label>Actual Result *</label>
								<input class="form-control" type="text" value="" required="true">
							</div>-->
							<input type="submit" style="color:black;" class="btn btn-outline btn-default" value="Save">
							<input type="reset" style="color:black;" class="btn btn-outline btn-default" value="Clear">
					</form>
				</br>
<div align="left" class="form-group">
    <a href="/manageTCMenu/{{$project->id}}"><img width="2%" src="/img/back.png"> </a>
                    <a href="/home"   > <img width="5%" src="/img/home.png">
  </a>
      </div></div>
       
           
	

</div>
</div>
</div>
</div>
@endsection