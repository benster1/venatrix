<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


    <script type="text/javascript">
      google.charts.load('current', {
        callback: function () {
          var data = new google.visualization.DataTable();
          data.addColumn('string', 'Name');
          data.addColumn('string', 'Manager');
          data.addColumn('string', 'ToolTip');

                    data.addRows([

            

                  ]);


          var container = document.getElementById('chart_div');
          var chart = new google.visualization.OrgChart(container);

          container.addEventListener('click', function (e) {
            e.preventDefault();
            if (e.target.tagName.toUpperCase() === 'A') {
              console.log(e.target.href);
        // window.open(e.target.href, '_blank');
        // or
        // location.href = e.target.href;
      } else {
        var selection = chart.getSelection()[0];
        if (selection.length > 0) {
          var row = selection[0].row;
          var collapse = (chart.getCollapsedNodes().indexOf(row) == -1);
          chart.collapse(row, collapse);
        }
      }
      //chart.setSelection([]);
      //return false;
    }, false);

          chart.draw(data, {allowHtml:true, allowCollapse:true,size:'medium'});
          google.visualization.events.addListener(chart, 'select', selectHandler2);


          function getInbetweenStrings($start, $end, $str){
            $matches = array();
            $regex = "/$start([a-zA-Z0-9_]*)$end/";
            preg_match_all($regex, $str, $matches);
            return $matches[1];
          }

          function selectHandler2() {
            var selectedItem = chart.getSelection()[0];
            if (selectedItem) {
              var selectedValue = data.getValue(selectedItem.row, 0);
              var subStr = selectedValue.match("TC0->(.*)->");
                            document.getElementById("nodeID").value = subStr[1];
              document.getElementById("projectid").value = document.getElementById('projectname').value;

            // alert(subStr[1]);


              var subStrTC = selectedValue.match("(.*)_TC0");
             
  //  alert('Node ID: ' + node);

    //var x =node;
    //document.getElementById("nodeID").innerHTML = node;

   


  }

      //var selection = chart.getSelection();
      //alert('That\'s column no. '+selection[0].row);
    }
  },

  packages: ['orgchart']
});
</script>

<script>
function myFunction(val) {
 // alert("new input value: " + val);
    var newval=document.getElementById('projectname').value;
//alert(newval);
//document.getElementById('NameProject').value=newval; // to uncomment if needed

  document.getElementById('generateSiteMap').click();
   //document.getElementById('NameProject').click();

//location.reload();
  //document.getElementById('projectname').value=newval;

}
</script>
<script>
function myFunctionOnLOAD(val) {
  //alert("new input value: " + val);
    var newval=document.getElementById('projectname').value;
//alert(newval);
document.getElementById('NameProject').value=newval;


  document.getElementById('generateSiteMap').click();
//location.reload();
  //document.getElementById('projectname').value=newval;

}
</script>
<script>
function myFunctionLOAD(val) {
  //alert("new input value: " + val);

    var newval=document.getElementById('projectname').value;
//alert(newval);

var answer=alert('Create a TC for the project:' +newval+'?');
//alert(answer);

if (answer) {
    // Save it!
document.getElementById('NameProject').value=newval;
        //var newval=document.getElementById('projectname').value;

}

//document.getElementById('NameProject').value=newval;


//  document.getElementById('generateSiteMap').click();
//location.reload();
  //document.getElementById('projectname').value=newval;

}
</script>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
<meta name="csrf-token" content="WjDZtpdriCIZQw71n0ou8t8nGUhwv6J1dc6o9ein" />
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
 <link rel="shortcut icon" href="/img/VenatriX6.png">
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
                       <u> <h4>Eric&nbsp;Kreinar</h4> </u>logged as <b>
                                                                                                                                                       </br>
                                                                                                                                                                            Manager
                                                                                    </br>
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
                <a class="navbar-brand" href="/home">
                    <table  border='0' width="100%" class="table table-striped table-bordered table-hover">
                        <tr>
                            <td>
                                <div align="center">
                                    <div >
                                        <img width="160px" src="/img/VenatriX6.png">
                                    </div>
                                        </br>
                                    <div ><a class="navbar-brand js-scroll-trigger" href="#page-top">   
                                        <font face="Calibri-Light"><font color="#00b3b3" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;V</font><font color="#008080" >enatri</font><font color="#009999" >X</font>
                                    </font></a>

                                    </div>
                                </div>

                            </td>
                         </tr>
            </table>
                </a>

            </div>

            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                                         <table border="4"><tr><td>
 <a id='logout' href="/userlogout">
                        Logout
                    </a>                    </td></tr></table>
                   
                                       
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        <!--
                        <li>
                    <a href="/home"   > <img width="10%" src="/img/home.png">
  </a>
                            
                        </li>-->
<!-- Administrator--> 
<!--/Administrator-->
                       
                      
                        
                        
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
                    
                                <!-- /.panel-heading -->
                        <div class="panel-body">

                           
                           



<div class="container" >
    <div class="row">
        <div align="center" class="panel-heading">
        
           
            <div class="alert alert-default" align="center" scroll-behavior: smooth; width='100%' " style=" align-items: center;  overflow:auto; height :35%; width: 90%%;" role="alert">
                <h3>
                    Would You Like To Generate Test Cases ?
                    </br>             
                </h3>
                Select a Node and Click on Generate TCs Button to Generate as many Test Case as  Parents of The Node selected
               
            </div>
                  <span>
        <h3> Generate Test Cases </h3>
      </span>
      <form method="get" action="/createNode">
      <table>
        <tr>
          <td>
          <label>Select a Project&nbsp;&nbsp;</label>

          </td>
          <td>
             <select name='projectname' id='projectname' class="form-control" required onchange="myFunction(this.value)">
                                                                                                 <option value="BaseCamp">
                                                 BaseCamp
                                                                                              </option>
                                                                                    <option value="HarrisTeeter">HarrisTeeter</option>
                                               
                                               
          </select>
          </td>
          <td>
         &nbsp;&nbsp; <input type="submit"  id='generateSiteMap' class="btn btn-outline btn-default" value="Generate SiteMap">
          </td>
           <td>
         &nbsp;&nbsp; <a href="/map/BaseCamp" class="btn btn-outline btn-default" > Text View</a>
          </td>
          <td>

          </td>
        </tr>
      </table>
              </form>
              <!--
<form method="get" action="/newTestCases"  onclick="myFunctionOnLOAD(this.value)">
<input type="hidden" name="NameProject" id="NameProject" value="" >
<input type="submit" value="Add TestCase"  class="btn btn-outline btn-warning" onclick="myFunctionLOAD(this.value)">
</form>-->
         
    </div>
          </span>
      <div class="panel-body">
        <div id="chart_div" id="zoom_02" align="center" scroll-behavior: smooth; height='20' width='100%' " style="background-color: white; align-items: center; border: solid 3px black; height: 45%;  overflow:auto; width: 127%;" >
        </div>
        <div align="center" >
        </br>

        <form method="get" action="/sysGenerateTC">
          <input type="hidden"  name="nodeID" required value="" placeholder="NodeID" id="nodeID"/>
          <input type="hidden"  name="projectname" value="" id="projectid" required placeholder="Project Name" />
          <input type="submit" class="btn btn-outline btn-default" value="Generate TCs">
        </form>

       <div align="left" class="form-group">
                    <a href="/home"   ><img width="15%" src="./img/home.png">  </a>
      </div>
      </div>
    </div>
  </div>
  

</div>


</div>
<div>                   

</div>
</div>
</div>

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
<meta name="csrf-token" content="WjDZtpdriCIZQw71n0ou8t8nGUhwv6J1dc6o9ein" />

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
