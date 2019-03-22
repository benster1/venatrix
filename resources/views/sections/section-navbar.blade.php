
<nav class="navbar navbar-fixed-top">

  <header id="mu-header">
    <div class="container">

      <div class="row">
        <div class="col-xl-12 col-xl-12">
          <div class="mu-header-area">
            <div class="row">

              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="mu-header-top-left">
                  <div class="mu-top-email">
                    <i class="fa fa-envelope"></i>
                    <span>info@Basecampcs.Com</span>
                  </div>
                  <div class="mu-top-phone">
                    <i class="fa fa-phone"></i>
                    <span>(571) 210 2142</span>
                  </div>
                </div>
              </div>

              <div class="mu-header-top-right">
                <nav>
                  <ul class="mu-top-social-nav">
                    <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                    <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                    <li><a href="#"><span class="fa fa-google-plus"></span></a></li>
                    <li><a href="#"><span class="fa fa-linkedin"></span></a></li>
                    <li><a href="#"><span class="fa fa-youtube"></span></a></li>
                  </ul>
                </nav>
              </div>

              



              <section id="mu-menu" data-spy="scroll" data-target=".navbar" data-offset="50">

                <nav class="navbar navbar-default" role="navigation">  
                  <div class="container">
                    <div class="navbar-header">
                      <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->

                      <!-- LOGO -->              
                      <!-- TEXT BASED LOGO -->
                      <a class="navbar-brand" href="/welcome">                   <span><b><font face="Calibri-Light"><font color="#00b3b3"><b>V</b></font><font color="#008080">enatri</font><font color="#00b3b3"><b>X</b></font><font color="#008080">.io</font></font></b></span></a>
                      <!-- IMG BASED LOGO  -->
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                      <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
                        @if(Auth::user()) <li ><a href="#"> <u>{{Auth::user()->firstname}} {{Auth::user()->lastname}}</u> </a></li> @endif            
                        <li class="active"><a href="/welcome">Home</a></li>            
                        <li><a href="#mu-about-us">About us</a></li>            

                        <li><a href="#mu-features">Our Features</a></li>
                        <li><a href="#mu-pricing">Pricing</a></li>

                        <li><a href="#mu-contact">Contact</a></li>
                        <li><a href="http://wireframe-venatrix.us-east-1.elasticbeanstalk.com/homeManager">Demo</a></li>

                        @if(!Auth::user())
                        <li><a   href="#mu-login" data-toggle="modal" data-target="#myModal">Login</a>
                          @endif
                          @if(Auth::user())

                          <li><a href="/home">Venatrix.io</a></li>
                          <li><a href="/userlogout">logout</a></li>

                          @endif
                          <!-- Modal -->





                        </li>


                      </ul>                     
                    </div><!--/.nav-collapse -->        
                  </div>     
                </nav>
              </section>
            </div>

          </div>
        </div>
      </div>

    </header>

    


  </nav>
  <div class="modal fade" id="myModal" role="dialog" >
    <div class="modal-dialog" style="width: 350px">

      <!-- Modal content-->
      <div class="modal-content" style="background-image: url(assets/img/VenatriXiologo.png); background-size: 100%; background-repeat: no-repeat; background-position: center;" >
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Login</h4>
        </div>
      </br>
      <form class="form-horizontal"  method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
        <div align="center">

          <input style="width: 300px" type="text" class="form form-control" name="username" placeholder="Username">                
          <input style="width: 300px" type="password" class="form form-control"   name="password"  placeholder="Password">
        </div>
        <div align="center" >
          <input type="submit" class="btn btn-default" name="Login"  value="Login" style="margin-top: 25px;margin : 25px; ">
          <input type="reset" class="btn btn-default" name="Reset" value="Reset" style="margin-top: 25px;margin: 25px;">
        </div>
      </form> 

    </div>

  </div>
</div>

</div>