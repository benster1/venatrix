@extends('layouts.app')

@section('content')

                <div class="panel panel-default" align="center">

  <div class="panel-heading">        <h3> Generate Test Cases </h3></div>
      </span>        
      <div class="panel-body">
           @if(Session::has('GenerateTC'))

                <h3>
                    Would You Like To Generate Test Cases ?
                    </br>             
                </h3>
                Select a Node and Click on Generate TCs Button to Generate as many Test Case as  Parents of The Node selected
               
            @endif
<div class="panel-body">
      <form method="get" action="/createNode">
      <table>
        <tr>
          <td>
          <label>Select a Project&nbsp;&nbsp;</label>

          </td>
          <td>
 <?
    $nameProject='';
    if(isset($_GET['projectname'])) {
      $projectname=$_GET['projectname'];
      //$Project=App\Project::where('id','=',$idProject)->first();
      $nameProject=$projectname;


    }
    ?>
            <select name='projectname' id='projectname' class="form-control" required onchange="myFunction(this.value)">
                                                 @if(isset($_GET['projectname']))
                                                <option value="{{$nameProject}}">
                                                 {{$nameProject}}
                                                @else {{'Select a Project' }}
                                                @endif
                                              </option>
                                    @foreach($projects as $project)
                                                <option value="{{$project->project_name}}">{{ $project->project_name}}</option>
                                               
                                    @endforeach           
          </select>
          </td>
          <td>
         &nbsp;&nbsp; <input type="submit"  id='generateSiteMap' class="btn btn-outline btn-default" value="Generate SiteMap">
          </td>
         
         
        </tr>
      </table>
              </form>


              <!--
<form method="get" action="/newTestCases"  onclick="myFunctionOnLOAD(this.value)">
<input type="hidden" name="NameProject" id="NameProject" value="" >
<input type="submit" value="Add TestCase"  class="btn btn-outline btn-warning" onclick="myFunctionLOAD(this.value)">
</form>-->
         
    <?
    $nameProject='';
    if(isset($_GET['projectname'])) {
      $projectname=$_GET['projectname'];
      //$Project=App\Project::where('id','=',$idProject)->first();
      $nameProject=$projectname;


    }
    ?>
      </span>
        <div id="chart_div" id="zoom_02" align="center" scroll-behavior: smooth; height='20' width='100%' " style="background-color: white; align-items: center; border: solid 3px black; height: 45%;  overflow:auto; width: 100%;" >
        </div>
        <div align="center" >
        </br>

        <form method="get" action="/sysGenerateTC">
          <input type="hidden"  name="nodeID" required value="" placeholder="NodeID" id="nodeID"/>
          <input type="hidden"  name="projectname" value="" id="projectid" required placeholder="Project Name" />
          <input type="submit" class="btn btn-outline btn-default" value="Generate TCs">
        </form>

       <div align="left" class="form-group">
                    <a href="/home"   ><img width="5%" src="./img/home.png">  </a>
   </div>
 </div>
</div>




@endsection

<?// NEO4J Geerate Map?>


<?
$connection=new App\Project();
use GraphAware\Neo4j\Client\ClientBuilder;
$con=new App\Project();
$client = ClientBuilder::create()
->addConnection($con->con1, $con->con2)
//->addConnection('bolt', 'bolt://neo4j:root@localhost:7687')
//->addConnection('default', 'http://neo4j:Basecamp@ec2-54-147-217-2.compute-1.amazonaws.com:7474')
->build();

//->addConnection($connection->con1, $connection->con2)

        //$NODENAME=App\Project::where('id','=',$tc->project_id)->first();
        //$NODENAMENEO4J=$NODENAME->project_name.''.$NODENAME->id.'_TC0';
?>



<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


    <script type="text/javascript">
      google.charts.load('current', {
        callback: function () {
          var data = new google.visualization.DataTable();
          data.addColumn('string', 'Name');
          data.addColumn('string', 'Manager');
          data.addColumn('string', 'ToolTip');

          <?
           $nameProject='';
    if(isset($_GET['projectname'])) {
      $projectname=$_GET['projectname'];
      //$Project=App\Project::where('id','=',$idProject)->first();
      $nameProject=$projectname;


    }
// $query='MATCH (n:'.$nameProject.'_TC0)<-[:parentOf]-(parent:'.$nameProject.'_TC0) RETURN n.node_id ,n.name, parent.node_id, parent.url as urlP, n.url as urlC, parent.name , id(n) as node_id, id(parent) as parent_id, n.name as nodeName, parent.name as parentName, n.tcid as tcid LIMIT 25';


$query='MATCH (n:'.$_GET["projectname"].'_TC0)<-[:parentOf]-(parent:'.$_GET["projectname"].'_TC0) RETURN n.title as titleC, parent.title as titleP, n.node_id ,n.name, parent.node_id, parent.url as urlP, n.url as urlC, parent.name , id(n) as node_id, id(parent) as parent_id, n.name as nodeName, parent.name as parentName, n.tcid as tcid LIMIT 600';
// $query='MATCH (u:TC0)-[r:childDir]->(p:TC0) RETURN u,p, id(u) as parent_id, id(p) as node_id, u.Site as urlP, p.Site as urlC LIMIT 25';
          $result = $client->run($query)
          ?>
          data.addRows([

            <?php $i=0;
?>

<?

            foreach ($result->getRecords() as $record) {
              $parent='null';
              $tcid= str_replace('"','',json_encode($record->get("tcid")));
              $tc=App\Tc::where('id','=',$tcid)->first();

              $rootUrl=App\Project::where('id','=',18)->first();

              $url=$record->get("urlP");
              $urlC=$record->get("urlC");
              if($record->get("parent_id"))$parent=$record->get("parent_id");
              if($record->get("urlP")==null) $urlP='';
              ?>
                  ['<div hidden>{{$nameProject}}_TC0->{{$record->get("parent_id")}}-></div><?php echo str_replace('"','',json_encode($record->get("parentName")));?>','','{{$record->get("urlC")}}'],

                  ['<div hidden>{{$nameProject}}_TC0->{{$record->get("node_id")}}-></div><?php echo str_replace('"','',json_encode($record->get("nodeName")));?>','<div hidden>{{$nameProject}}_TC0->{{$record->get("parent_id")}}-></div><?php echo str_replace('"','',json_encode($record->get("parentName")));?>','<?php echo str_replace('"','',json_encode($record->get("urlC")));?>'],
                  <? }?>

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