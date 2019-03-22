@extends('layouts.app')

@section('content')
    <p>
   
            <div class="panel panel-default">
                <div class="panel-heading">TC Confirmation</div>
                                </br>


                      @if(Session::has('TCCreated'))
 

            <div align="center" scroll-behavior: smooth; width='100%' " style=" align-items: center;  overflow:auto; width: 100%;" role="alert">
               <script src="../assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script type="text/javascript">
        $(document).ready(function(){

            demo.initChartist();

            $.notify({
                icon: 'pe-7s-gift',
                message: "Test Case  <b>{{$tc->tc_name}}</b> Updated successfully"

            },{
                type: 'info',
                timer: 4000
            });

        });
    </script>
        Would you like to Create Another Test Case Manualy?</br>

               <a  style="color:black;" class="btn btn-default" href="/newTestCase/{{$tc->project_id}}?NameProject={{$tc->project_id}}">Yes</a>
               <a style="color:black;" class="btn btn-default" href="/manageTC/{{$tc->project_id}}">No</a>

         
                
            </div>
            @endif
          </br>
                    </div>
                      
                      </div>
                    </div>
                </div>
            

    </p>

   
@endsection
