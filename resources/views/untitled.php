@extends('layouts.app')

@section('content')
<?
?>
<script type="text/javascript">
$("div").scrollTop(($("a").height() - $("div").height())/2);
$("div").scrollLeft(($("a").width() - $("div").width())/2);
</script>
<!--Neo4J Map-->

<div class="row" align="center">


<div class="container">
 
        <div class="row">
            <div class="col-md-12 col-md-offset-2">
                <div class="panel panel-default">
                    <span>
                          <h3> SiteMap from NEO4J</h3>

                    <div id="chart_divNEO"  align="center" scroll-behavior: smooth; height='20%' width='100%' " style="background-color: #696969; align-items: center; border: solid 1px black; height: 40%;  overflow:auto; ">
                    </div>
                    </span>
                      <div class="panel-body">
                        <div id="chart_div"  align="center" scroll-behavior: smooth; height='20%' width='100%' " style="background-color: #696969; align-items: center; border: solid 1px black; height: 40%;  overflow:auto; ">
                    </div>
                      </div>
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
    
@endsection

  <?// NEO4J Geerate Map?>


<?
use GraphAware\Neo4j\Client\ClientBuilder;

 $client = ClientBuilder::create()
    //->addConnection('default', 'http://neo4j:root@localhost:7474') 
      //  ->addConnection('bolt', 'bolt://neo4j:root@localhost:7687') 
     ->addConnection('default', 'http://neo4j:Basecamp@ec2-54-147-217-2.compute-1.amazonaws.com:7474') 
        ->build();
?>



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
       <? $query='MATCH (n:NODE_TREES)<-[:ParentOf]-(parent:NODE_TREES) RETURN n.node_id,n.name, parent.node_id . id(parent), parent.url, n.url, parent.name, id(n) LIMIT 25';
        $result = $client->run($query)
?>
        data.addRows([

          <?php foreach ($result->getRecords() as $record) {
             $parent='null';
           $tcid= str_replace('"','',json_encode($record->get("tcid")));
           $tc=App\Tc::where('id','=',$tcid)->first();
           
           $rootUrl=App\Project::where('id','=',$tc->project_id)->first();

           $url=$record->get("urlP");
           $urlC=$record->get("urlC");
            if($record->get("parent_id"))$parent=$record->get("parent_id");
            if($record->get("urlP")==null) $urlP='';
            
            if($record->get("parent.node_id"))$parent=$record->get("parent.node_id");
                    ?>
                         [{v:'<input type="hidden" value="<?php echo str_replace('"','',json_encode($record->get("node_id")));?>', f:'<a data-toggle="tooltip" data-placement="top" title="<?echo $urlC ?> "href="<?echo $urlC?>" ><i><?php echo str_replace('"','',json_encode($record->get("n.name")));?></i></a><div  data-toggle="tooltip" data-placement="top" title="<?echo $urlC; ?> " style="color:blue; font-style:italic"> </br><?echo '<input type="checkbox" >'?></div>'},'<?php echo json_encode($record->get("id(parent)"));?>','<?php echo str_replace('"','',json_encode($record->get("n.url")));?>'],
                           
                          
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

   <script type="text/javascript">
    google.charts.load('current', {
  callback: function () {
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Name');
    data.addColumn('string', 'Manager');
    data.addColumn('string', 'ToolTip');

 <? 
$query='MATCH (n:NODE_TREES)<-[:ParentOf]-(parent:NODE_TREES) RETURN n.node_id ,n.name, parent.node_id, parent.url as urlP, n.url as urlC, parent.name , id(n) as node_id, id(parent) as parent_id, n.name as nodeName, parent.name as parentName, n.tcid as tcid LIMIT 25';

// $query='MATCH (u:TC0)-[r:childDir]->(p:TC0) RETURN u,p, id(u) as parent_id, id(p) as node_id, u.Site as urlP, p.Site as urlC LIMIT 25';
        $result = $client->run($query)
?>
    data.addRows([

      <?php $i=0;
foreach ($result->getRecords() as $record) {
            $parent='null';
           $tcid= str_replace('"','',json_encode($record->get("tcid")));
           $tc=App\Tc::where('id','=',$tcid)->first();
           
           $rootUrl=App\Project::where('id','=',$tc->project_id)->first();

           $url=$record->get("urlP");
           $urlC=$record->get("urlC");
            if($record->get("parent_id"))$parent=$record->get("parent_id");
            if($record->get("urlP")==null) $urlP='';

                    ?>
               ['<input type="hidden" value="<?php echo str_replace('"','',json_encode($record->get("parent_id")));?>"/><?php echo str_replace('"','',json_encode($record->get("parentName")));?>','','{{$rootUrl->url}}'] ,    // GET['url']    

  ['<input type="hidden" value="<?php echo str_replace('"','',json_encode($record->get("node_id")));?>"/><?php echo str_replace('"','',json_encode($record->get("nodeName")));?>','<input type="hidden" value="<?php echo str_replace('"','',json_encode($record->get("parent_id")));?>"/><?php echo str_replace('"','',json_encode($record->get("parentName")));?>','<?php echo str_replace('"','',json_encode($record->get("urlC")));?>'],
<? }?>
      
    ]);
    

    var container = document.getElementById('chart_div');
    var chart = new google.visualization.OrgChart(container);

    container.addEventListener('click', function (e) {
      e.preventDefault();
      if (e.target.tagName.toUpperCase() === 'A') {
        console.log(e.target.href);
        // wdefaultw.open(e.target.href, '_blank');
        // or
        // location.href = e.target.href;
      } else {
        var selection = chart.getSelection();
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
  },
  packages: ['orgchart']
});
   </script>`