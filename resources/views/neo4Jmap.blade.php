
@extends('layouts.app')
<?
use GraphAware\Neo4j\Client\ClientBuilder;

$client = ClientBuilder::create()
    ->addConnection('default', 'http://neo4j:root@localhost:7474') 
        ->addConnection('bolt', 'bolt://neo4j:root@localhost:7687') 
        ->build();

$url='http://www.basecampcs.com';
        $html = file_get_contents($url);

        $node=new App\Node();
        $node->nodeName=$url;
        $node->url='url '.$url;
        $node->description='desc '.$url;
        $node->save();

        $nodenode=new App\Node_Node();
        $nodenode->nodeParent_id=null;
        $nodenode->node_id=$node->id;

        $nodenode->save();
            $query = "CREATE(
                                root:NODE_TREESssssss {name:'".$node->nodeName."', node_id:".$node->id.", url:'".$node->url."', description:'".$node->description."', nodeParent_id:'".$nodenode->nodeparent_id."' })

                                WITH root
                                MATCH (root) RETURN root LIMIT 25
                                ";
                                $client->run($query);
        //Create a new DOM document
        $dom = new \DOMDocument();

        //Parse the HTML. The @ is used to suppress any parsing errors
        //that will be thrown if the $html string isn't valid XHTML.
        @$dom->loadHTML($html);

        //Get all links. You could also use any other tag name here,
        //like 'img' or 'table', to extract other tags.
        $links = $dom->getElementsByTagName('a');
        $liValues = array();

        //Iterate over the extracted links and display their URLs
        foreach ($links as $link){
        //Extract and show the "href" attribute.
          $nodeName='NO NAME';
          if($link->nodeValue) $nodeName=$link->nodeValue;

        $nodeURL=$link->getAttribute('href');
        $nodeDesc=$link->getAttribute('href');
         $liValues[]=$link->nodeValue;
        // echo $link->nodeValue;
         //echo $nodeName.'</br>';
        $nodeC=new App\Node();
        $nodeC->nodeName=$nodeName;
        $nodeC->description=$nodeDesc;
        $nodeC->url=$nodeURL;
        $nodeC->save();

        $nodenode=new App\Node_Node();
        $nodenode->nodeparent_id=$node->id;
        $nodenode->node_id=$nodeC->id;
        $nodenode->save();
        $query = "
MATCH (root:NODE_TREESssssss) WHERE root.node_id=".$nodenode->nodeparent_id."

CREATE(child:NODE_TREESssssss {name:'".$nodeC->nodeName."', node_id:".$nodeC->id.", url:'".$nodeC->url."', description:'".$nodeC->description."', nodeParent_id:'".$nodenode->nodeparent_id."' }),                      
(root)-[r:ParentOf]->(child)
WITH child,root,r
MATCH (root),(child) RETURN root, child, r LIMIT 25";
$client->run($query);
            }
         redirect('createNode');
?>
@section('content')
              <div class="container">
    <div class="row" align="center">
    <h3> SiteMap from NEO4J</h3>

   <div id="chart_div"></div>
</div></div>
@endsection

<?
//use GraphAware\Neo4j\Client\ClientBuilder;

 //$client = ClientBuilder::create()
   // ->addConnection('default', 'http://neo4j:root@localhost:7474') 
     //   ->addConnection('bolt', 'bolt://neo4j:root@localhost:7687') 
       // ->build();
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
       <? $query='MATCH (n:NODE_TREESssssss)<-[:ParentOf]-(parent:NODE_TREESs)RETURN n.node_id,n.name, parent.node_id, parent.url, n.url, parent.name LIMIT 25';
        $result = $client->run($query)
?>
        data.addRows([

          <?php foreach ($result->getRecords() as $record) {
            $parent='null';
           $url=$record->get("parent.url");
            if($record->get("parent.node_id"))$parent=$record->get("parent.node_id");
                    ?>
                         [{v:'<?php echo json_encode($record->get("n.node_id"));?>', f:'<?php echo json_encode($record->get("n.name"));?><div style="color:red; font-style:italic"><?php echo json_encode($record->get("n.url"));?></br></div>'},'<?php echo json_encode($record->get("parent.name"));?><div style="color:red; font-style:italic"><?echo $url?></div>','<?php echo json_encode($parent);?>'],
                           
                          
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