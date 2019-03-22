@extends('layouts.app')

@section('content')

      <div class="panel panel-default">
    <div class="panel-heading"><div align="center">Manage Test Cases</div></div>
        <div class="panel-body">

          <div class="form-group" align="center">
          </li>
         


      <div class="panel-body">
        @if (session('status'))
        <div class="alert alert-default">
          {{ session('status') }}
        </div>
        @endif

        <div>
              
        <a href="/manageTCMenu/{{$project->id}}" style="color:black;" class="btn btn-outline btn-default" >Create New TestCase </a>

            </div>
            </br>
            <div>
        <a href="/viewTestsOfProject/{{$project->id}}" style="color:black;" class="btn btn-outline btn-default" >&nbsp;&nbsp;View All TestCases&nbsp;&nbsp;</a>
</form></div></br>
        <div align="left">
                    <a href="/home"   > <img width="5%" src="/img/home.png">
  </a>
</div>

        @endsection
