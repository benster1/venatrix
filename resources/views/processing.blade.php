<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
<meta name="csrf-token" content="3JL39RiwG1lbiyDFHl0OeBZIO5IoQhrRrzZKLY0w" />
<link rel="stylesheet" type="text/css" href="magnifier.css">
<script type="text/javascript">
   $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
   });
</script>
  <link rel="stylesheet" href="your-path/popupmodal.css" />

 <script src="your-path/popupmodal-min.js">></script> 
 <link rel="shortcut icon" href="/img/VenatriX6X.png">
    <title>VenatriX.io By Basecampcs</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- default: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <div id="wrapper">
                                                <div align="center">
                    <i>
                       <u> <h4>Gery&nbsp;Manigbas</h4> </u>logged as <b>
                                                                                                                                                       </br>
                                                                                                                                                                            Tester
                                                                                    </br>
                                                                                                                                                                            Reviewer
                                                                                    </br>
                                                                            </b>
                    </i>
                   </div>
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/homeTester">
                     <table  border='0' width="50%" class="table table-striped table-bordered table-hover">
                        <tr>
                           
                                <div align="left">
                                    <div >
                                  <img class="img-circle" width="70%" src="/img/VenatriX6X.png"></br>
                                    </div>
                                        </br>
                                    <div ><a class="navbar-brand js-scroll-trigger" href="#page-top">   
                                        <font size='5' face="Calibri-Light"><font color="#00b3b3" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;V</font><font color="#008080" >enatri</font><font color="#009999" >X.io</font>
                                    </font></a>

                                    </div>
                                </div>

                         </tr>
            </table>
                </a>

            </div>

            </div>
            <!-- /.navbar-header -->
<div align="right"> <table border="4"><tr><td>
 <a id='logout' href="/userlogout">
                        Logout
                    </a>                    </td></tr></table></div>
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                                        
                   
                                       
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

           
            <!-- /.navbar-static-side -->
        </nav>
                    
                                <!-- /.panel-heading -->
                        <div class="panel-body">

       <script type="text/javascript">
         window.setInterval(function(){
    document.getElementById('processing').style.display = 'none';
document.getElementById('titleProcessing').innerHTML='Crawling Completed';
    document.getElementById('afterCrawling').style.display = 'block';


          },5000);
       </script>                    
                           
<div class="container" width="100%">

  <div   class="panel panel-default">
    <div class="panel-heading"><h2><div id="titleProcessing" align="center">Processing</div></h2></div>
   
  <div  align="center">
 
                 <img id="processing" src="/img/processing.gif"/>
                 <div align="center" hidden id="afterCrawling">
                 </br>
                 </br>
                 </br>
                  <h4>
                   <a href="#"> View Results </a>
                   </h4>
                   <div id="examples">
    <font size="3">
                            <table  width="100%" width="100%" id="example" class="table table-striped table-bordered table-hover" cellspacing="0" > <!-- id="dataTables-example"-->
                                    <tr>
                                        <th class="active">
                                            <input type="checkbox" class="select-all checkbox" name="select-all" />
                                            ID
                                        </th>
                                        <th >Test's name</th>
                                        <th >TC Status</th>
                                        <th >TC Run</th>
                                        <th >URL</th>
                                        <th >Created at</th>
                                        <th>Created&nbsp;by</th>
                                        <!--<th >Action</th>-->
                                    </tr>
                                <tbody>

                                                                        <tr>
                                        <td class="active">
                                            <input id="node" type="checkbox"  class="select-item checkbox" name="node[]" value="" />
                                        </td>
                                        <td ><a href="detailTCTester" >TC0</a></td>
                                        <td >
                                             <font color=''><b>Executed</b></font>
                                                                                    </td>
                                        <td align="center" >

                                             <font color='green'><b><img width="30" src="/img/green.png"/></b></font>
                                                                                    </td>
                                        <td> http://mikeisabella.com/</td>
                                        <td> 2018-06-09</td>
                                        <td> Gerry Manigbas</td>

                                    </tr>
                                    <tr>
                                        <td class="active">
                                            <input id="node" type="checkbox"  class="select-item checkbox" name="node[]" value="" />
                                            2
                                        </td>
                                        <td ><a href="/actionTC/62?action=0" >TC_Access to http://mikeisabella.com</a></td>
                                        <td >
                                             <font color=''><b>Executed</b></font>
                                                                                    </td>
                                        <td align="center" >

                                             <font color='green'><b><img  width="30" src="/img/blue.png"></b></font>
                                                                                    </td>
                                        <td>http://mikeisabella.com/</td>
                                        <td> 2018-06-09</td>
                                        <td> Gerry Manigbas</td>

                                    </tr>
                                    <tr>
                                        <td class="active">
                                            <input id="node" type="checkbox"  class="select-item checkbox" name="node[]" value="" />
                                            3
                                        </td>
                                        <td ><a href="/actionTC/62?action=0" >TC_Access to /about/</a></td>
                                        <td >
                                             <font color=''><b>Executed</b></font>
                                                                                    </td>
                                        <td align="center" >

                                             <font color='blue'><b><img  width="30" src="/img/orange.png"></b></font>
                                                                                    </td>
                                        <td>http://mikeisabella.com/about</td>
                                        <td> 2018-06-09</td>
                                        <td> Gerry Manigbas</td>

                                    </tr>
                                    <tr>
                                        <td class="active">
                                            <input id="node" type="checkbox"  class="select-item checkbox" name="node[]" value="" />
                                            4
                                        </td>
                                        <td ><a href="/actionTC/62?action=0" >TC_Access to /team/</a></td>
                                        <td >
                                             <font color=''><b>Executed</b></font>
                                                                                    </td>
                                        <td align="center" >

                                             <font color='blue'><b><img  width="30" src="/img/orange.png"></b></font>
                                                                                    </td>
                                        <td>http://mikeisabella.com/about/team/</td>
                                        <td> 2018-06-09</td>
                                        <td> Gerry Manigbas</td>

                                    </tr>
                                    <tr>
                                        <td class="active">
                                            <input id="node" type="checkbox"  class="select-item checkbox" name="node[]" value="" />
                                            5
                                        </td>
                                        <td ><a href="/actionTC/62?action=0" >TC_Access to /embed</a></td>
                                        <td >
                                             <font color=''><b>Executed</b></font>
                                                                                    </td>
                                        <td align="center" >

                                             <font color='blue'><b><img  width="30" src="/img/red.png"></b></font>
                                                                                    </td>
                                        <td>http://mikeisabella.com//about/team/embed/</td>
                                        <td> 2018-06-09</td>
                                        <td> Gerry Manigbas</td>

                                    </tr>
                                    
                                    


                                </tbody>
                            </table>
                            <table id="example" width="" heigh="500px" >
                               <tr>
                                <td>
                                    <font color='blue'><b><img  width="30" src="/img/blue.png"></b></font>
                                </td>
                                <td>
                                    No Run&nbsp;&nbsp;&nbsp;
                                </td>

                                <td>
                                    <font color='orange'><b><img  width="30" src="/img/orange.png"></b></font>
                                </td>
                                <td>
                                    Error&nbsp;&nbsp;&nbsp;
                                </td>

                                <td>
                                    <font color='red'><b><img  width="30" src="/img/red.png"></b></font>
                                </td>
                                <td>
                                    Failed&nbsp;&nbsp;&nbsp;
                                </td>

                                <td>
                                    <font color='green'><b><img  width="30" src="/img/green.png"></b></font>
                                </td>
                                <td>
                                    Pass&nbsp;&nbsp;&nbsp;
                                </td>

                            </tr>

                        </table>
                        </font>
                        </div>
                                            <div align="left">
                                                <a href="/homeTester"   > <img width="5%" src="/img/home.png">
                                            </div>

                 </div>
</br>
</div>


</div>
</div>
</div>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {

    var data = google.visualization.arrayToDataTable([
      ['TC Run Status', '%'],
      ['No Run', 3],
      ['Failed',      0],
      ['Error',  2],
      ['Pass',     0],
      ]);

    var options = {
      title: 'TC Run Status Summary'
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

    chart.draw(data, options);
  }
</script>

                            <!-- /.table-responsive
                            <div class="well">
                                <h4>DataTables Usage defaultrmation</h4>
                                <p>DataTables is a very flexible, advanced tables plugin for jQuery. In SB Admin, we are using a specialized version of DataTables built for Bootstrap 3. We have also customized the table headings to use Font Awesome icons in place of images. For complete documentation on DataTables, visit their website at <a target="_blank" href="https://datatables.net/">https://datatables.net/</a>.</p>
                                <a class="btn btn-default btn-lg btn-block" target="_blank" href="https://datatables.net/">View DataTables Documentation</a>
                            </div>
                        </div>
                        -->
                    </div>
                    <!-- /.panel -->
                

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

</body>

<script src="//cdn.bootcss.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script>
    $(function(){

        //button select all or cancel
        $("#select-all").click(function () {
            var all = $("input.select-all")[0];
            all.checked = !all.checked
            var checked = all.checked;
            $("input.select-item").each(function (index,item) {
                item.checked = checked;
            });
        });

        //button select invert
        $("#select-invert").click(function () {
            $("input.select-item").each(function (index,item) {
                item.checked = !item.checked;
            });
            checkSelected();
        });

        //button get selected default
        $("#selected").click(function () {
            var items=[];
            $("input.select-item:checked:checked").each(function (index,item) {
                items[index] = item.value;
            });
            if (items.length < 1) {
                alert("no selected items!!!");
            }else {
                var values = items.join(',');
                console.log(values);
                var html = $("<div></div>");
                html.html("selected:"+values);
                html.appendTo("body");
            }
        });

        //column checkbox select all or cancel
        $("input.select-all").click(function () {
            var checked = this.checked;
            $("input.select-item").each(function (index,item) {
                item.checked = checked;
            });
        });

        //check selected items
        $("input.select-item").click(function () {
            var checked = this.checked;
            console.log(checked);
            checkSelected();
        });

        //check is all selected
        function checkSelected() {
            var all = $("input.select-all")[0];
            var total = $("input.select-item").length;
            var len = $("input.select-item:checked:checked").length;
            console.log("total:"+total);
            console.log("len:"+len);
            all.checked = len===total;
        }
    });
</script>
<script type="text/javascript">
    
    $(document).ready(function() {
    var table = $('#example').DataTable( {
        "scrollY": "200px",
        "paging": false
    } );
 
    $('a.toggle-vis').on( 'click', function (e) {
        e.preventDefault();
 
        // Get the column API object
        var column = table.column( $(this).attr('data-column') );
 
        // Toggle the visibility
        column.visible( ! column.visible() );
    } );
} );
</script>
<meta name="csrf-token" content="3JL39RiwG1lbiyDFHl0OeBZIO5IoQhrRrzZKLY0w" />

<script type="text/javascript">
   $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
   });
</script>
<script type="text/javascript">
    
    
</script>
   
<!-- show and hide columns 
<script type="text/javascript">
    $("input:checkbox:not(:checked)").each(function() {
    var column = "table ." + $(this).attr("name");
    $(column).hide();
});

$("input:checkbox").click(function(){
    var column = "table ." + $(this).attr("name");
    $(column).toggle();
});
</script>-->
</body>

</html>
