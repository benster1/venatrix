@extends('layouts.app')

@section('content')

            <div class="panel panel-default">
                <div class="panel-heading">Total Number Of Permissions :<font ><b>&nbsp;{{$permissions->count()}}</b></font></div>

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
                                        <th></th>
                                        <th>Permission name</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($permissions as $permission)
                                    <tr class="odd gradeX">
                                        <td class="active">
                                            <input type="checkbox" class="select-item checkbox" name="select-item" value="1000" />
                                            &nbsp;&nbsp;{{$permission->id }}
                                        </td>
                                        <td >{{$permission->permission_name }}</td>
                                        
                                    </tr>
                                    @endforeach

                                    
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->

                        <button id="select-invert" style="color:black;" class="btn button-default">Select/Unselect All</button>
                        <button id="selected" style="color:black;" class="btn button-default">Get Selected</button>
                    </body>

                </div>
                <div class="form-group">

 <div align="left" class="form-group">
      
                    <a href="/home"   ><img width="5%" src="/img/home.png">  </a>
      
            </div>
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
                message: "Hey <b><i>{{$fullname}}</i></b>, Here you can see all Permissions."

            },{
                type: 'info',
                timer: 4000
            });

        });
    </script>