@extends('layouts.app')

@section('content')

            <div class="panel panel-default">
                <div class="panel-heading">Edit User</div>

                <div class="panel-body">
<form action="/updateUserDB" method="POST">
                            {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Username</label>
                                <input id="id" type="hidden" class="form-control" name="id" value="{{ $user->id}}" required autofocus>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="{{ $user->username}}" required autofocus>

                               
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                            <label for="firstname" class="col-md-4 control-label">First name</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control" name="firstname" value="{{ $user->firstname }}" required autofocus>

                                
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                            <label for="lastname" class="col-md-4 control-label">Last name</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control" name="lastname" value="{{ $user->lastname }}" required autofocus>

                                
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>

                               
                            </div>
                        </div>
<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Select Role(s)</label>
                            <select class="form-control" required  name="roles">
                                <!--
                                @foreach($user->roles as $role)
                                <option  value='{{$role->role_id}}' >{{$role->role_name}}</option>
                                @endforeach
                                -->
                                @foreach($roles as $role)
                                <option  value='{{$role->id}}' >{{$role->role_name}}</option>
                                @endforeach
                            </select>
</div>
                        

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button style="color:black;" type="submit" class="btn btn-primary">
                                    Save
                                </button>
                                <button style="color:black;" type="reset" class="btn btn-default">
                                    Cancel
                                </button>
                                 @if($user->user_sts==1)
                                     <a  style="color:black;" class="btn btn-default" href="/innactivate/{{$user->id}}">
                                       {{'Innactivate'}}</a>
                                       @elseif($user->user_sts==0)
                                     <a  style="color:black;" class="btn btn-default" href="/innactivate/{{$user->id}}">
                                       {{'Activate'}}
                                </a>
                                      @endif
                            </div>
                        </div>
                    </form>
                </div>
                 <div align="left" class="form-group">
                    <a href="/users"   ><img width="2%" src="/img/back.png">  </a>
      
                    <a href="/home"   ><img width="5%" src="/img/home.png">  </a>
      
            </div>
        </div>

@endsection

 <script src="../assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>

<?
$fullname= Auth::user()->firstname.' '.Auth::user()->lastname;
?>
<script type="text/javascript">
        $(document).ready(function(){

            demo.initChartist();

            $.notify({
                icon: 'pe-7s-gift',
                message: "Hey <b><i>{{$fullname}}</i></b>, Here you can edit credentials of the user<b><i> {{ $user->firstname }} {{ $user->lastname }}</i></b>."

            },{
                type: 'info',
                timer: 4000
            });

        });
    </script>
