@extends('layouts.app')

@section('content')<div class="panel panel-default">
                <div class="panel-heading">Create/Select Project</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-default">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="form-group">
                        <form method="get" action="/getTestsOfProject">
                                            <label>Select a Project</label>
                                            <select name='id' class="form-control">
                                    @foreach($projects as $project)
                                                <option value="{{$project->id}}">{{ $project->project_name}}</option>
                                                
                                    @endforeach            
                                            </select>
                                        </div>
                    <input type="submit" value="Mext" style="color:black;" class="btn btn-outline btn-default">
                    </form>
                    <a href="/createProject" style="color:black;"  class="btn btn-outline btn-primary">Create a New Project</a>
                    <div>                    
                    
                	</div>
                </div>
            </div>
        
@endsection
