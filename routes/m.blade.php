@extends('layouts.app')

@section('content')

<div align="center"><h4><i><u>Site Maps</u></i></h4>
    <div id="chart_div"></div>
</div>
<?
use GraphAware\Neo4j\Client\ClientBuilder;

 $client = ClientBuilder::create()
    ->addConnection('default', 'http://neo4j:root@localhost:7474') 
        ->addConnection('bolt', 'bolt://neo4j:root@localhost:7687') 
        ->build();
?>


@endsection

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      <?
      $query='MATCH (n:Nodesss)<-[:ParentOf]-(parent:Nodesss)RETURN n.node_id,n.name, parent.node_id, n.url, parent.name LIMIT 25';
        $result = $client->run($query);
      ?>
      google.charts.load('current', {packages:["orgchart"]});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Name');
        data.addColumn('string', 'Manager');
        data.addColumn('string', 'ToolTip');

        // For each orgchart box, provide the name, manager, and tooltip to show.
        

        data.addRows([

          <?php 
        $result = $client->run($query);
 echo json_encode($result);
          foreach ($result->getRecords() as $record) {
                    ?>
                         [{v:'<?php echo json_encode($record->get("n.node_id"));?>', f:'<?php echo json_encode($record->get("n.name"));?><div style="color:red; font-style:italic"><?php echo json_encode($record->get("n.url"));?></br></div>'},'<?php echo json_encode($record->get("parent.node_id"));?>','<?php echo json_encode($record->get("parent.node_id"));?>'],
                           
                          
                        <?php
                        }
                //echo '</br>Parent: '.$parentid;
                
                ?>
[{v:'', f:'SiteMap<div style="color:red; font-style:italic">JIRA Administrator</div>'},
           '', '']
        ]);


        // Create the chart.
        var chart = new google.visualization.OrgChart(document.getElementById('chart_div'));
        // Draw the chart, setting the allowHtml option to true for the tooltips.
        chart.draw(data, {allowHtml:true});
      }
   </script>
   