@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            	<?php
            	$myproject=App\Project::where('id','=',$tc->project_id)->first();
            	$projectName=$myproject->project_name;
            	?>
                    <div class="panel-heading">Config file of the TestCase <b> {{$projectName}}</b></div>
                <div class="panel-body">

                    @if (session('status'))
                        <div class="alert alert-default">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h3>
<?php
echo '{"project_name": "'.$projectName.'", "url": "'.$myproject->url. '", "tc_name": "'.$tc->tc_name.'" }'; 
?>  </h3>
	<div class="panel-body" >
		@if (session('status'))
		<div class="alert alert-default">
			{{ session('status') }}
		</div>
		@endif
		<div class="form-group">
			<label>Username </label>
			{{\Auth::user()->email}} 
		</div>

		<div class="form-group">
			<label>Password</label>								
			{{\Auth::user()->password}}
		</div>


		<div class="form-group">

			<label>Url</label>
			{{$myproject->url}}
		</div>
		<div align="center">
				<a href="#"  class="btn btn-outline btn-default">Generate the JSON Config File</a>			
		</div>
	</div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
