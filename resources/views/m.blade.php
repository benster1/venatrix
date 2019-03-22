<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Org Chart Editor</title>
<meta name="description" content="An organization chart editor -- edit details and change relationships." />
<!-- Copyright 1998-2018 by Northwoods Software Corporation. -->
<meta charset="UTF-8">
<script src="../release/go.js"></script>
<script src="../assets/js/goSamples.js"></script>  <!-- this is only for the GoJS Samples framework -->

<link rel="stylesheet" href="../extensions/dataInspector.css" />
<script src="../extensions/dataInspector.js"></script>


</head>
<body onload="init()">
<div  id="sample">
  <div id="chart_divNEO"  style="background-color: #696969; border: solid 1px black; height: 500px; overflow:scroll;">
      
  </div>
  

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
       <?
use GraphAware\Neo4j\Client\ClientBuilder;

 $client = ClientBuilder::create()
  //  ->addConnection('default', 'http://neo4j:root@localhost:7474') 
        //->addConnection('bolt', 'bolt://neo4j:root@localhost:7687') 
        ->addConnection('default', 'http://neo4j:Basecamp@ec2-54-147-217-2.compute-1.amazonaws.com:7474') 
       // ->addConnection('bolt', 'neo4j:password@ec2-54-147-217-2.compute-1.amazonaws.com:7687/') 
        ->build();
        $query='MATCH (n:NODE_TREES)<-[:ParentOf]-(parent:NODE_TREES) RETURN n.node_id,n.name, parent.node_id, parent.url, n.url, parent.name, id(n) LIMIT 25';
        $result = $client->run($query)
?>
        data.addRows([

          <?php foreach ($result->getRecords() as $record) {
            $parent='null';
           $url=$record->get("parent.url");
            if($record->get("parent.node_id"))$parent=$record->get("parent.node_id");
                    ?>
                         [{v:'<?php echo json_encode($record->get("id(n)"));?>', f:'<?php echo json_encode($record->get("n.name"));?><div style="color:red; font-style:italic"><?php echo json_encode($record->get("n.url"));?></br></div>'},'<?php echo json_encode($record->get("parent.name"));?><div style="color:red; font-style:italic"><?echo $url?></div>','<?php echo json_encode($parent);?>'],
                           
                          
                        <?php
                        }
                //echo '</br>Parent: '.$parentid;
                
                ?>
[{v:'', f:'SiteMap<div style="color:red; font-style:italic">JIRA Administrator</div>'},
           '', '']
        ]);


        // Create the chart.
        var chart = new google.visualization.OrgChart(document.getElementById('chart_divNEO'));
        // Draw the chart, setting the allowHtml option to true for the tooltips.
        chart.draw(data, {allowHtml:true});
      }
   </script>
</div>
</body>
</html>
