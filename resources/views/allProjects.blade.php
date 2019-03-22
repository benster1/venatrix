@extends('layouts.app')

@section('content')

            <div class="panel panel-default">
                <div class="panel-heading">The Total number of Projects is :<font color=""><b>&nbsp;{{$projects->count()}}</b></font></div>
                
                <div class="panel-body">
                    @if (session('status'))
                    <div class="alert alert-default">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="form-group">
                        <div class="form-group">
                            <table id="example" class="display" style="width:100%">

                                <thead>
                                    <tr>
                                        <!--<th>ID</th>-->
                                        <th>Project's name</th>
                                        <th>Created at</th>
                                        <th>Update</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($projects as $project)
                                    <tr class="odd gradeX">
                                       <!-- <td class="active">-->
                                            
                                            <!--<input type="hidden" class="select-item checkbox" name="select-item" value="1000" />
                                            {{$project->id}}
                                       <!-- </td>-->
                                        <td ><a href="/viewTestsOfProject/{{$project->id}}" >{{$project->project_name}}</a></td>
                                        <td>  <?php echo date('Y-m-d', strtotime($project->created_at))?></td>
                                        <td>
                                        <form action="/editProject" method="get">
                                            <input type="hidden" name="idProject" value="{{$project->id}}" > 
                                            <input style="color:black;" type='submit' class="btn btn-outline btn-default" value='Update' >
                                        </form>
                                        </td>
                                    </tr>
                                    @endforeach

                                    
                                </tbody>
                            </table>
                <a href="/home"   ><img width="5%" src="./img/home.png">  </a>
                            <!-- /.table-responsive -->

                       <!-- <button id="select-invert" class="btn button-default">Select/Unselect All</button>
                        <button id="selected" class="btn button-default">Get Selected</button>-->
                    </body>

                </div>
                <div class="form-group">


                    <div>                    
                        
                    </div>
                </div>
            </div>
        
@endsection
