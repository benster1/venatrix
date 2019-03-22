
@extends('layouts.app')

@section('content')

<div align="center" class="panel-body">


  <img style="border-width:4px;
  border-style:solid;" class="img-circle" width="40%" src="/assets/img/VenatriXiologo.png"></br>



  <h1>                                        <font face="Calibri-Light"><font color="#00b3b3" >V</font><font color="#008080" >enatri</font><font color="#009999" >X.io</font>
  </h1>
  <form class=""  method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
      <label for="email" class="col-md-4 control-label">E-Mail Address</label>

      <div class="col-md-6">
        <input id="email" placeholder="E-Mail Address" type="text" class="form-control" name="email" value="{{ old('email') }}" required>

        @if ($errors->has('email'))
        <span class="help-block">
          <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
      </div>
    </div>

  </br>
</br>
<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
  <label for="password" class="col-md-4 control-label">Password</label>

  <div class="col-md-6">
    <input id="password" type="password" class="form-control" placeholder="Password" name="password" value="{{ old('password') }}" required>

    @if ($errors->has('password'))
    <span class="help-block">
      <strong>{{ $errors->first('password') }}</strong>
    </span>
    @endif
  </div>
</div>
</br>
</br>
<div class="form-group">
  <button   style="color:black;" type="submit" class="btn btn-default">
   <b>Login</b>
 </button>
 <button style="color:black;" type="reset" class="btn btn-default">
   <b>Reset</b>
 </button>

</div>
<div align="center">
 <a  href="{{ route('password.request') }}">
  Forgot&nbsp;Your&nbsp;Password?                   

</a>
<label>                      

  <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember&nbsp;Me
</label>

</div>
</div>
</div>


</div>
</form>

@endsection
