@extends('layouts.app')

@section('content') <div class="panel panel-default">
                <?// $tc=App\Tc::where('id','=',181)->first()?>
                       <div class="panel-heading">
                    <div align="center">
                <div class="alert alert-default" role="alert">
                                        <h3>Kindly Confirm The Credentials For The Test Case Crawling <b><u><i><a href="{{ $tc->tc_url}}">{{ $tc->tc_url}}</a></i></u> </br>Project:&nbsp;{{ App\Project::where('id','=',$tc->project_id)->first()->project_name}}</b></h3>
</div>

                <div class="panel-body">
                 <form class="form-horizontal" method="get" action="/TcCrawl">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label"">URL*</label>

                            <div class="col-md-6">
                                <input id="url" type="text" placeholder="url" class="form-control" name="url" value="{{ $tc->tc_url}}" required autofocus>

                                @if ($errors->has('url'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('url') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label"">Username*</label>

                            <div class="col-md-6">
                                <input id="username" type="text" placeholder="Username" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password*</label>

                            <div class="col-md-6">
                                <input id="password" type="password" placeholder="Password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            
                            
                            
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                            <div class="col-md-6">
                                <input id="tc" type="hidden" placeholder="TC ID" value="{{$tc->id}}" class="form-control" name="tc" required>

                                @if ($errors->has('tc'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tc') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label"">Node ID*</label>

                            <div class="col-md-6">
                                <input id="node_id" type="text" placeholder="Node ID" value="{{$tc->node_id}}" class="form-control" name="node_id" required>

                                @if ($errors->has('node_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('node_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label"">Project*</label>

                            <div class="col-md-6">
                                <input id="project_name" type="text" placeholder="project_name" value="{{ App\Project::where('id','=',$tc->project_id)->first()->project_name.'_TC0'}}" class="form-control" name="project_name" required>

                                @if ($errors->has('project_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('project_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        <div class="col-md-6">
                                <input id="project_id" type="hidden" placeholder="project_id" value="{{$tc->project_id}}" class="form-control" name="project_id" required>

                                @if ($errors->has('project_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('project_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <input type="submit" name="submit" style="color:black;"  value="Run" class="btn btn-primary">

                        <input type="reset" name="reset" style="color:black;" value="Reset" class="btn btn-default">
                        
                            <i>
                                 <a style="color:black;" href="/viewTestsOfProject/{{$tc->project_id}}" class="btn btn-outline btn-default">Cancel</a>
                            </i>

                        </div>
<div align="left">
                    <a href="/home"   ><img width="5%" src="./img/home.png">  </a>

</div>
                        </div>
                 </form>
                </div>
            </div>
        </div>
@endsection
