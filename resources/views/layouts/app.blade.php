<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>VenatriX.io</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />





    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />


    <!-- Bootstrap core CSS     -->
    
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="../assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="../assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="../assets/css/pe-icon-7-stroke.css" rel="stylesheet" />


</head>
<body>

 <div align="center">
                                          
<div class="wrapper">
    <div class="sidebar" data-color="venatrix" data-image="..assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

        <div class="sidebar-wrapper">
            <div class="logo" align="center">
                <a href="/" class="simple-text">
                    <img  width="100%"  src="../assets/img/VenatriXiologo.png" width="60%"/>
                </br></a>
                <div align="center"><h3><b><font face="Calibri-Light"><font color="#00b3b3"><b>V</b></font><font color="#008080">enatri</font><font color="#00b3b3"><b>X</b></font><font color="#008080">.io</font></font></b></h3></div>
<!-- style="border-width:4px;
    border-style:solid;" class="img-circle" -->                
            </div>

            <ul class="nav">
<!-- <div align="center"><h3><b><font face="Calibri-Light"><font color="#00b3b3"><b>V</b></font><font color="#008080">enatri</font><font color="#00b3b3"><b>X</b></font><font color="#008080">.io</font></font></b></h3></div>
 -->
                </br>
                <li  ><!-- class="active" -->
                        <i class=""></i>
                        <p><font face="Calibri-Light"><font color="black">
                        </font><font color="black"></font></p>
                </li>
                <?
                if(Auth::check()){
                   $roleuser=App\Role_user::where('user_id','=',Auth::user()->id)->first();
                $roleuser=$roleuser->where([['role_id','=',2],['role_sts','=',1]])->Orwhere([['role_id','=',3],['role_sts','=',1]])->get();

                if($roleuser){

                if($roleuser->count()>0){
                ?>
                <li ><!-- class="active" -->
                    <a href="/home">
                        <i class="pe-7s-graph"></i>
                        <p><font face="Calibri-Light"><font color="black">Dash</font><font color="black">board</font></p>
                    </a>
                </li>
                 <li>
                    <a href="reportblade.html">
                        <i class="pe-7s-note2"></i>
                        <p><font face="Calibri-Light"><font color="black">Rep</font><font color="black">ort</font></p>
                    </a>
                </li>
                <?  
                        }
                    }
                }
                                      if(Auth::check()){
   $roleuser=App\Role_user::where('role_id','=',1)->get();
                                                   $roleuser=$roleuser->where('user_id','=',Auth::user()->id)->where('role_sts','=',1)->first(); 
                                                   if($roleuser){

                                                   if($roleuser->count()>0){
                                            
?>
                <li>
                    <a href="/users">
                        <i class="pe-7s-user"></i>
                        <p><font face="Calibri-Light"><font color="black">Manage&nbsp;</font><font color="black">Users</font></p>
                    </a>
                </li>
                <!--<li>
                    <a href="testcaseboardblade.html">
                        <i class="pe-7s-door-lock"></i>
                        <p>Manage Test Case</p>
                    </a>
                </li>-->
               
<?
}}}
?>
                <!--<li>
                    <a href="reportblade.html">
                        <i class="pe-7s-note2"></i>
                        <p>Site Maps</p>
                    </a>
                </li>
                <li>
                    <a href="table.html">
                        <i class="pe-7s-note2"></i>
                        <p>Table List</p>
                    </a>
                </li>
                <li>
                    <a href="typography.html">
                        <i class="pe-7s-news-paper"></i>
                        <p>Typography</p>
                    </a>
                </li>
                <li>
                    <a href="icons.html">
                        <i class="pe-7s-science"></i>
                        <p>Icons</p>
                    </a>
                </li>
                <li>
                    <a href="maps.html">
                        <i class="pe-7s-map-marker"></i>
                        <p>Maps</p>
                    </a>
                </li>
                <li>
                    <a href="notifications.html">
                        <i class="pe-7s-bell"></i>
                        <p>Notifications</p>
                    </a>
                </li>-->
                <!--<li class="active-pro">
                    <a href="upgrade.html">
                        <i class="pe-7s-rocket"></i>
                        <p>Upgrade to PRO</p>
                    </a>
                </li>-->
           <?try{?>
                       @foreach (Auth::user()->roles as $role)
                                            <?php $roleuser=App\Role_user::where('role_id','=',$role->id)->get();
                                                   $roleuser=$roleuser->where('user_id','=',Auth::user()->id)->first(); 
                                            ?>
                                            @if($roleuser->role_sts==1)
                                            {{$role->role_name}}
                                            @endif
                                        </br>
                                        @endforeach
                                    </b>
                   <?}catch(Exception $ex){
?>
<div align="center">
       
       <a style="color:black;" class="btn btn-outline btn-default" href="/register">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Create User&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
     </br>
     </br>
<table border="1">
  <th><div align="center">Login Credentials</div></th>
  <tr>
    <td>
    Admin: admin.admin@venatrix.io</td>
  </tr>
  <tr>    <td>

    Manager: manager.manager@venatrix.io</td>
  </tr>
  <tr>    <td>

    Tester: tester.tester@venatrix.io</td>
  </tr>
  <tr>    <td>

    Password: venatrix</td>
  </tr>
</table>
</br>
</br>
     </div> 
<?
                   }?>
        </div>

    </div>

    <div class="main-panel">
         <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/home">
<p<font face="Calibri-Light"><font color="#00b3b3">Dash</font><font color="#008080">board</font>
                    </a>
                </div>
                <div class="collapse navbar-collapse" >
                    <ul class="nav navbar-nav navbar-left">
                        
<?  
if(Auth::check()){
?>                        <li class="dropdown" ">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret hidden-lg hidden-md"></b>
                                    <p class="hidden-lg hidden-md">
                                        5 Notifications
                                        <b class="caret"></b>
                                    </p>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li>
<?
 }
?>

                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p>
                                        
                                        <?
                                        if(Auth::check()){
                                            echo Auth::user()->firstname.' '.Auth::user()->lastname; 




                                             }else echo 'Guest Account';
                                        ?>
                                        <b class="caret"></b>
                                    </p>

                              </a>
                              <ul class="dropdown-menu">
                                 <?if(Auth::check())
                                 {?>

                                <li><a href="#">Edit Profile</a></li>
                                <li><a href="#">Reset Password</a></li>
                                <li><a href="#">Contact the Administrator</a></li>
                                <?}
                                 ?>
                                  <?if(!Auth::check())
                                 {?>

                                <li><a href="#">Register</a></li>
                                <li><a href="#">Contact the Administrator</a></li>
                                <?}
                                 ?>
                              </ul>
                        </li>
                        @if(Auth::check())

                        <li>
                            <a href="/welcome">
                                <p>Welcome</p>
                            </a>
                        </li>
                        <li>
                            <a href="/userlogout">
                                <p>Log out</p>
                            </a>
                        </li>
                        @endif
                        <li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>
        </nav>


        <div class="content">
            <!-- -->
@yield('content')

<!-- -->
        </div>
</br>
</br>

        
</br>
      <div class="panel panel-default">

        <footer class="footer">
            <div class="container-fluid">
                
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com">Welcome to <b>VenatriX.io</b> - an easy way for every tester to make functional testing.</a>
                </p>
            </div>
        </footer>
</div>
    </div>
</div>


</body>


    <!--   Core JS Files   -->

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

   <!--  <script src="../assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
    <script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
 -->
    <!--  Charts Plugin -->
    <script src="../assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="../assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="../assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

    <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
    <script src="../assets/js/demo.js"></script>
    
     <script src="../assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
    <script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  Charts Plugin -->
    <script src="../assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="../assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="../assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

    <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
    <script src="../assets/js/demo.js"></script>

</script>
    <script type="text/javascript">    
        $(document).ready(function() {
            $('#example').DataTable( {
                "pagingType": "full_numbers"
            } );
        } );
    </script>
<script type="text/javascript">
    $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
</html>
