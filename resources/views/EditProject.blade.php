@extends('layouts.app')

@section('content')

            <div class="panel panel-default">
    <div class="panel-heading"><div align="center">Edit Project {{$project->project_name}}</div></div>
                @if(Session::has('updateProjectGET'))

           
            @endif

                <div class="panel-body">
                    @if (session('status'))
                    <div class="alert alert-default">
                        {{ session('status') }}
                    </div>
                    @endif
                     <h3>
                        <!-- <div align="center">
                    Would You Like To Update The Project ?  
                    </div> -->             
                </h3> 
                <form method="post" action='/editProject'>
                           {{ csrf_field() }}

                <div class="form-group">
                    <div class="form-group">
                        <label>Project's Name *</label>
                        <input class="form-control" name='projectname' value='{{$project->project_name}}' type="text" required="true">
                        <input class="form-control" name='idProject' value='{{$project->id}}' type="hidden" required="true">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label>URL (Optional)</label>
                        <input class="form-control" name='url' type="text" value='{{$project->url}}' required="true">
                    </div>   
                </div>   
               
                <select name='status' id='status' class="form-control"  >
                    <option value="{{$project->status}}">
                        @if($project->status==1) {{'Executed'}}
                         @elseif($project->status==0) {{'Not Executed'}}
                    @endif
                </option>          
                    <option value="1">Executed</option>          
                    <option value="0">Not Executed</option>          
                 </select>
             </br>
              <div>              
                    <input type="submit" style="color:black;" name='create'  value="Save" class="btn btn-outline btn-default">
                    <input type="reset" style="color:black;" class="btn btn-outline btn-default" value="Clear">
                </div>
                </form>  
                              </br>
 
                <div align="left">
                <a href="/manageProject/{{$project->id}}"  ><img width="2%" src="/img/back.png">  </a>
                    <a href="/home"   > <img width="5%" src="/img/home.png">
  </a>
        </div>              
                
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
                message: " Here you can update the project <b>{{$project->project_name}}</b>"

            },{
                type: 'info',
                timer: 4000
            });

        });
    </script>