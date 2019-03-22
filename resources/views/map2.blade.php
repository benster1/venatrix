@extends('layouts.app')

@section('content')
    <div id="chart_div"></div>



<?php
//$children=$node->children;
//$node_node=App\Node_Node:: where([['nodeparent_id','=',$node->id],['node_id','=',$children->id]])->get();
foreach($nodes as $child){
 // echo '</br>Node: '.$child;
 // echo '</br>ID NODE: '.$child->id;
  $parent=App\Node_Node::where('node_id','=',$child->id)->get();
  foreach($parent as $child1){
  echo 'node:'.$child1->node_id.' Parent: '.$child1->nodeparent_id.'</br>';
 echo "{v:'".$child1->node_id."', f:'".$child1->node_id."desc< style='color:red; font-style:italic'>".$child1->node_id."desc' },'".$child1->nodeparent_id."', '".$child1->node_id."']";
           echo '</br>';
  //$parentid=$parent->nodeparent_id;
}
//echo '</br>Parent: '.$parentid;
}
?>
</br></br>

@endsection

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {packages:["orgchart"]});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Name');
        data.addColumn('string', 'Manager');
        data.addColumn('string', 'ToolTip');

        // For each orgchart box, provide the name, manager, and tooltip to show.


        data.addRows([
          [{v:'Raj', f:'Raj<div style="color:red; font-style:italic">President</div>'},
           '', 'The President'],
          [{v:'Atul', f:'Atul<div style="color:red; font-style:italic">Vice President</div>'},
           'Raj', 'VP'],
           [{v:'Eric', f:'Eric<div style="color:red; font-style:italic">Vice President</div>'},
           'Raj', 'VP'],
           [{v:'Gerry', f:'Gerry<div style="color:red; font-style:italic">Vice President</div>'},
           'Raj', 'VP'],
           [{v:'Othmane', f:'Othmane<div style="color:red; font-style:italic">Front End Developper</div>'},
           'Atul', 'VP'],
           [{v:'Julius', f:'Julius<div style="color:red; font-style:italic">Back End Developper</div>'},
           'Eric', 'VP'],
           [{v:'Warry', f:'Warry<div style="color:red; font-style:italic">Back End Developper</div>'},
           'Eric', 'VP'],
           [{v:'Allen', f:'Allen<div style="color:red; font-style:italic">Front End Developper</div>'},
           'Eric', 'VP'],
           [{v:'Pauline', f:'Pauline<div style="color:red; font-style:italic">JIRA Administrator</div>'},
           'Gerry', 'VP']
          
        ]);

        // Create the chart.
        var chart = new google.visualization.OrgChart(document.getElementById('chart_div'));
        // Draw the chart, setting the allowHtml option to true for the tooltips.
        chart.draw(data, {allowHtml:true});
      }
   </script>