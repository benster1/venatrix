@extends('layouts.app')

@section('content')

            <div class="panel panel-default">
                <div class="panel-heading">Create Project, Initial TestCase TC0 And Generate The SiteMap</div>

                <div class="panel-body">
                    @if (session('status'))
                    <div class="alert alert-default">
                        {{ session('status') }}
                    </div>
                    @endif
                <form method="post" action='/newProject'>
                           {{ csrf_field() }}

                <div class="form-group">
                    <div class="form-group">
                        <label>Project's Name *</label>
                        <input class="form-control" placeholder="No Space in the ProjectName" name='projectname' type="text" required="true">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label>URL *</label>
                        <input class="form-control" name='url' type="text" required="true">
                    </div>   
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label>Username (Optional)</label>
                        <input class="form-control" name='Username' type="text" >
                    </div>   
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label>Password (Optional)</label>
                        <input class="form-control" name='Password' type="Password" >
                    </div>   
                </div>   
                <div>              
                    <a href="/home"   ><img width="5%" src="./img/home.png">  </a>
                    <input type="submit" name='create' style="color:black;" value="Create" class="btn btn-outline btn-primary">
                    <input type="reset" style="color:black;" class="btn btn-outline btn-default" value="Cancel">
                </div>
                </form>   
                             
                
            </div>
        </div>
    </div>

@endsection
