@extends('index')

@section('login')

           @if(!Auth::user())

               </font>
<table ><tr><td>
 
  <div class="panel-body">
                 <form class="form-horizontal"  method="POST" action="{{ route('login') }}">
                    <table><tr>
                  {{ csrf_field() }}

                  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                              <font color="red">
</font>
                      <input id="email" type="email" placeholder='Username' width='280px' name="email" value="{{ old('email') }}" required autofocus>

                      @if ($errors->has('email'))
                      <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
         

                  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                             <font color="red">
</font>
                      <input id="password" type="password" placeholder='Password'  width='280px' name="password" required>

                      @if ($errors->has('password'))
                      <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>

                 
             

                  <div  align="left" >
                    <div align="left" class="col-md-8 col-md-offset-4">
                      <table><tr>
                        <td>
                          <button type="reset" style="color:black;" class="btn btn-default">
                        Reset
                      </button>
                        </td>
                        <td>
                          <button type="submit" style="color:black;" class="btn btn-default">
                        Login
                      </button>
                        </td>
                      </tr></table>
                     

                     
                        <a  href="{{ route('password.request') }}">
                          Forgot&nbsp;Your&nbsp;Password?                   

                        </a>
                    </div>

                      <div class="checkbox">
                        <label>                      

                          <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember&nbsp;Me
                        </label>
                     
                  </div>
                  </div></td></tr>

<tr>
  <a href="/homeManager"></a>
</tr>
                </table>
                </form>
              </div>
</td></tr></table>
@endif

            </div>
@endsection