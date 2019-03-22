@extends('layouts.app')

@section('content')

            <div class="panel panel-default">
                <div class="panel-heading">Total number of Roles :<font ><b>&nbsp;{{ $roles->count()}}</b></font></div>

                <div class="panel-body">
                    @if (session('status'))
                    <div class="alert alert-default">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="form-group">
                        <div align="right">
                            <a href="/associatePermission" style="color:black;" class="btn btn-default" >Associate Permission To Role</a>
                        </div>
                    </br>
                        <div class="form-group">
                           <table id="example" class="display" style="width:100%">

                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Role name</th>
                                        <th>Permissions</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($roles as $role)
                                    <tr class="odd gradeX">
                                        <td class="active">
                                            <input type="checkbox" class="select-item checkbox" name="select-item" value="1000" />
                                            &nbsp;&nbsp;{{$role->id }}
                                        </td>
                                        <td >{{ $role->role_name}}</td>
                                        <td >
                                            @foreach($role->permissions as $permission)
                                            <a style="color:black;" href="revokePermission/{{$permission->id}}/{{$role->id}}"><img width="10%" title="Revoke Permission" src="/img/revoke.png"></a>
                                            {{ $permission->permission_name}}</br>
                                            

                                            @endforeach
                                        </td>
                                        
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->

                        <button id="select-invert"  style="color:black;" class="btn button-default">Select/Unselect All</button>
                        <button id="selected" style="color:black;" class="btn button-default">Get Selected</button>
                    </body>
                     <div align="left" class="form-group">
      
                    <a href="/home"   ><img width="5%" src="/img/home.png">  </a>
      
            </div>

                </div>
                <div class="form-group">


                    <div>                    
                        
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
                message: "Hey <b><i>{{$fullname}}</i></b>, Here you can manage Roles and grant users with the desired role. "

            },{
                type: 'info',
                timer: 4000
            });

        });
    </script>