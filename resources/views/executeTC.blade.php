@extends('layouts.app')

@section('content')
<?
 Session::flash('executeTC0', 'The Site Map  Generated defaultfully');

?>
<meta http-equiv="refresh" content="0;URL=/manage?id={{$tc->project_id}}">

            <div class="panel panel-default">
                <div class="panel-heading">Execution Status</div>
                <div class="panel-body">
                    <div class="alert alert-default" role="alert">
  
                                    <div align='center'><h1><font color='red'><i>TestCase Executed Successfuly, Site Map generated<!-- <a href="/createNode">Click here to view the Map</a>--></i></font></h1></div>
</div>
                    <a href="/home"   > <img width="5%" src="/img/home.png">
  </a>


                    @if (session('status'))
                        <div class="alert alert-default">
                            {{ session('status') }}
                        </div>
                    @endif
<?
use GraphAware\Neo4j\Client\ClientBuilder;
$con=new App\Project();

$client = ClientBuilder::create()
    //->addConnection('bolt', 'bolt://neo4j:root@localhost:7687') 
->addConnection($con->con1, $con->con2) 
//   ->addConnection('default', 'http://neo4j:Basecamp@ec2-54-147-217-2.compute-1.amazonaws.com:7474') 
        ->build();


$QUERY='MATCH (n)
OPTIONAL MATCH (n)-[r]-()
DELETE n,r';
 //$client->run($QUERY);

$url=$uri;//'http://www.basecampcs.com';
        $html = file_get_contents($url);
        $nodenode=new App\Node_Node();
        $nodenode->truncate();
$tc->project_id;
$Project=App\Project::where('id','=',$tc->project_id)->first();
//$Project->truncate();
      $nameProject=$Project->project_name;

              $node=new App\Node();
        $node->truncate();
        $node->nodeName=$url;
        $node->url=$url;
        $node->description='desc '.$url;
        $node->save();

        $nodenode=new App\Node_Node();
        $nodenode->nodeparent_id=null;
        $nodenode->node_id=$node->id;

        $nodenode->save();
            $query = "CREATE(
                                root:".$nameProject."_TC0 {name:'".$node->nodeName."', node_id:".$node->id.", url:'".$node->url."', description:'".$node->description."', tcid:".$tc->id.", nodeParent_id:'".$nodenode->nodeparent_id."' })

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
        if ($nodeURL=='#' || $nodeURL==$url || $nodeName=='NO NAME'){ continue;} 
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
MATCH (root:".$nameProject."_TC0) WHERE root.node_id=".$nodenode->nodeparent_id."

CREATE(child:".$nameProject."_TC0{name:'".$nodeC->nodeName."', tcid:".$tc->id.", node_id:".$nodeC->id.", url:'".$nodeC->url."', description:'".$nodeC->description."', nodeParent_id:'".$nodenode->nodeparent_id."' }),                      
(root)-[r:parentOf]->(child)
WITH child,root,r
MATCH (root),(child) RETURN root, child, r LIMIT 25";
$client->run($query);
            }
               //     $nodenode->truncate();
                 //   $node->truncate();

         redirect('/createNNode');
?>
                    You are logged in!
                </div>
            </div>
        </div>


@endsection
