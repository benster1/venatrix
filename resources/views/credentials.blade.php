@extends('layouts.app')

@section('content')

            <div align="center" class="panel panel-default">
                <h3>Crawling Credentials</h3>
                <div class="panel-heading" ></div>
                                        <h3> Project:&nbsp;{{ App\Project::where('id','=',$tc->project_id)->first()->project_name}}</b></br>Kindly Confirm the Credentials for Crawling the website <b><u><i><a href="{{ App\Project::where('id','=',$tc->project_id)->first()->url}}">{{ App\Project::where('id','=',$tc->project_id)->first()->url}}</a></i></u></h3>

                <div class="panel-body">
                 <form class="form-horizontal" method="POST" action="/SiteMapCrawl">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label"">URL*(Login Page)</label>

                            <div class="col-md-6">
                                <input id="url" type="text" placeholder="URL Of Login Page(If It Exists) Format http://www.website.x - https://www.website.x" class="form-control" name="url" value="{{ App\Project::where('id','=',$tc->project_id)->first()->url}}" required autofocus>

                                @if ($errors->has('url'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('url') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label"">Username</label>

                            <div class="col-md-6">
                                <input id="username" type="text" placeholder="Username(Optional)" class="form-control" name="username" value="{{ old('username') }}" autofocus>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password"  placeholder="Password(Optional)" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <input id="tc" type="hidden" placeholder="TC ID" value="{{$tc->id}}" class="form-control" name="tc" required>

                                @if ($errors->has('tc'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tc') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <input id="project_name" type="hidden" placeholder="project_name" value="{{ App\Project::where('id','=',$tc->project_id)->first()->project_name}}" class="form-control" name="project_name" required>

                                @if ($errors->has('project_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('project_name') }}</strong>
                                    </span>
                                @endif
                            </div>
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

                        <input type="reset" style="color:black;" name="reset"  value="Reset" class="btn btn-default">
                        <input type="submit" style="color:black;" name="run"  value="Run" class="btn btn-default">
                        
                            <i>
                                 <!--<a href="/executeTC/{{$tc->id}}"  class="btn btn-outline btn-default">Run</a>-->
                                 <a href="/actionTC/{{$tc->id}}?action=0" style="color:black;" class="btn btn-outline btn-default">Cancel</a>
                             </i>
                             </br>
                             <div align="left">
                            <a href="/actionTC/{{$tc->id}}?action=0" ><img width="2%" src="/img/back.png"></a>
                             </div>
                            </i>
                        </div>

                        </div>
                 </form></div>
            </div>
        </div>
    </div>
</div>
@endsection
