@extends('layouts.app')

@section('content')<div class="panel panel-default">
				<div class="panel-heading">Associate  Role to User</div>

				<div class="panel-body">
					@if (session('status'))
					<div class="alert alert-default">
						{{ session('status') }}
					</div>
					@endif
					<div class="form-group">
						<form method="post" action="/associateRole">
							        {{ csrf_field() }}
						<label>Select a Role</label>
							<select class="form-control"  name="role">
								@foreach($roles as $role)
								<option  value='{{$role->id}}' >{{$role->role_name}}</option>
								@endforeach
							</select>
							<label>Select a User</label>
							<select class="form-control" name='user' >
								@foreach($users as $user)
								<option name='user_id' value='{{$user->id}}' >{{$user->firstname}}&nbsp;{{$user->lastname}}</option>
								@endforeach
							</select>
						</div>
						<input style="color:black;" type="submit"  class="btn btn-outline btn-default" value="Associate">
					</form>


					<div>                    
						

					</div>
				</div>
			</div>
		</div>
	
@endsection
