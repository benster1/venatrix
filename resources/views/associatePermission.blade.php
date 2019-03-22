@extends('layouts.app')

@section('content')<div class="panel panel-default">
				<div class="panel-heading">Associate  Permission To Role</div>

				<div class="panel-body">
					@if (session('status'))
					<div class="alert alert-default">
						{{ session('status') }}
					</div>
					@endif
					<div class="form-group">
						<form method="post" action="/associatePermission">
							        {{ csrf_field() }}
						<label>Select Permission</label>
							<select class="form-control"   name="permission">
								@foreach($permissions as $permission)
								<option  value='{{$permission->id}}' >{{$permission->permission_name}}</option>
								@endforeach
							</select>

						<label>Select Role</label>
							<select class="form-control" name='role'>
								@foreach($roles as $role)
								<option name='role_id' value='{{$role->id}}' >{{$role->role_name}}</option>
								@endforeach
							</select>	
							
						</div>
						<input type="submit" style="color:black;"  class="btn btn-outline btn-default" value="Associate">
					</form>
					 <div align="left" class="form-group">
                    <a href="/roles"   ><img width="2%" src="/img/back.png">  </a>
      
                    <a href="/home"   ><img width="5%" src="/img/home.png">  </a>
      
            </div>
					<div>             

						
					</div>
				</div>
			</div>
		</div>
@endsection

 <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>

<?
$fullname= Auth::user()->firstname.' '.Auth::user()->lastname;
?>
<script type="text/javascript">
        $(document).ready(function(){

            demo.initChartist();

            $.notify({
                icon: 'pe-7s-gift',
                message: "Hey <b><i>{{$fullname}}</i></b>, Here you can associate Permission to a Role "

            },{
                type: 'info',
                timer: 4000
            });

        });
    </script>