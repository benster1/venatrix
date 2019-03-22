@extends('layouts.app')

@section('content')
    <p>

                <div class="panel panel-default">
                    <div class="panel-heading">
                      

                      @if(Session::has('TCCreated'))

            <div class="alert alert-default" align="center" scroll-behavior: smooth; width='100%' " style=" align-items: center;  overflow:auto; width: 100%;" role="alert">
                <h3>
         Test Case Created Successfuly
        </h3> 
        Would you like to Generate Another Test Case ?</br>

               <? 
               $projname=$_GET['projectname'];
               $proj=App\Project::where('project_name','=',$projname)->first();
               //echo $proj;
               //return  $proj;?>
               <a class="btn btn-default" style="color:black;" href="/createNode?projectname={{$proj->project_name}}">Yes</a>
               <a class="btn btn-default" style="color:black;" href="/manageTC/{{$proj->id}}">No</a>

                
            </div>
            @endif
                    </div>
                      
                    </div>
                </div>
            

    </p>

   
@endsection
