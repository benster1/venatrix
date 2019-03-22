@extends('layouts.app')

@section('content')
<div class="panel panel-default">
                <div class="panel-heading">Total Number of Users :<font color=""><b>&nbsp;{{$users->count()}}</b></font></div>

                <div class="panel-body">
                    @if (session('status'))
                    <div class="alert alert-default">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="form-group">
                        <div class="form-group">
                             <div align="right">
                <a href="/newUser" style="color:black;" class="btn btn-default">Create New User</a>
            </div></br>
<table id="example" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Username</th>
                                    <th>Fullname</th>
                                    <th>Status</th>
                                    <th>Role</th>
                                    <th>Created at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr class="odd gradeX">
                                    <td class="active">
                                        <input type="checkbox" class="select-item checkbox" name="select-item" value="1000" />
                                    </td>
                                    <td >{{ $user->username}}</td>
                                    <td >{{ $user->firstname}}&nbsp;{{ $user->lastname}}</td>
                                    <td > @if($user->user_sts==1) {{'Active'}} @else {{'Deacctivate'}}  @endif</td>
                                    <td >
                                        @foreach ($user->roles as $role)
                                                   
                                                 <?php  
                                                    $roleUser1=App\Role_user::where('role_id','=',$role->id)->get();
                                                    $roleUser1=$roleUser1->where('user_id','=',$user->id)->first();
                                                    $sts=$roleUser1->role_sts;
                                                    if($sts==1)
                                                    {
                                                     ?>
                                                 <a href="/revokeRole/{{$user->id}}/{{$role->id}}"><img width="15%" title="Revoke Role" src="/img/revoke.png"></a>     
                                               {{ $role->role_name}}</br>
                                                    
                                                    
                                                    
                                                    
                                                <?php }?>
                                         @endforeach  
                                                                              
                                                                       </td>
                                <td ><?php echo date('Y-m-d', strtotime($user->created_at))?></td>
                                <td align="center"><a href="/userEdit/{{$user->id}}"><img width='50%' src="img/edit.png" ></a></td>
                                
                            </tr>
                            @endforeach
                            

                            
                        </tbody>
                    </table>
                            <!-- /.table-responsive -->
<!-- 
                        <button style="color:black;" id="select-invert" class="btn button-default">Select/Unselect All</button>
                        <button style="color:black;" id="selected" class="btn button-default">Get Selected</button>
 -->
                    </body>
<div align="left" class="form-group">
                    <a href="/home"   > <img width="5%" src="/img/home.png">
  </a>
      </div>
                </div>
                <div class="form-group">


                    <div>                    
                        
                    </div>
                </div>
            </div>
<section id="features">

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
                message: "Hey <b><i>{{$fullname}}</i></b>, Here you can manage Users of all users of Venatrix.io. "

            },{
                type: 'info',
                timer: 4000
            });

        });
    </script>