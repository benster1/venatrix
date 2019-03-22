@extends('layouts.app')

@section('content')<div class="panel panel-default">
                @if(Session::has('createProjectGET'))
                <div class="panel-heading">Create Project</div>

               <!--  <h3>
                    Would You Like To Create A New Project ?               
                </h3>  -->
                
            @endif

                <div class="panel-body">
                    @if (session('status'))
                    <div class="alert alert-default">
                        {{ session('status') }}
                    </div>
                    @endif
                <form method="post" action='/createProject'>
                           {{ csrf_field() }}

                <div class="form-group">
                    <div class="form-group">
                        <label>Project's Name *</label>
                        <input class="form-control" name='projectname' placeholder="No Space in the ProjectName" type="text" required="true">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label>URL *</label>
                        <input class="form-control" name='url' type="text" placeholder="URL Of Login Page (If It Exists)" required="true">
                    </div>   
                </div>
                <!--<div class="form-group">
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
                </div>  --> 
                <div>   
 <div align="left" class="form-group">
                    <a href="/home"   > <img width="5%" src="/img/home.png">
  </a>
      </div>           
                    <input type="submit" name='create' style="color:black;" value="Save" class="btn btn-outline btn-default">
                    <input type="reset" style="color:black;" class="btn btn-outline btn-default" value="Clear">
                </div>
                </form>     

                
            </div>
        </div>
    </div>
</div>

@endsection
 <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>

<script type="text/javascript">
        $(document).ready(function(){

            demo.initChartist();

            $.notify({
                icon: 'pe-7s-gift',
                message: " Here you can create a new Project. "

            },{
                type: 'info',
                timer: 4000
            });

        });
    </script>
