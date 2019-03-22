@extends('layouts.app')

@section('content')
<div align="center">
<div align="center">
    <img src="/img/screenMap.png">
            <div align='center'><h5><font color='red'><i>The Site Map will be like that, this one is just a print screen using NEO4J tool</i></font></h5></div>
</div>
<?

echo 'Require /vendor/autoload.php  Done</br>';
echo 'use GraphAware\Neo4j\Client\ClientBuilder Starts</br>';

use GraphAware\Neo4j\Client\ClientBuilder;
echo 'use GraphAware\Neo4j\Client\ClientBuilder Done</br>';
echo 'Connection to NEO4J Starts</br>';

$client = ClientBuilder::create()
    ->addConnection('default', 'http://neo4j:root@localhost:7474') 
        ->addConnection('bolt', 'bolt://neo4j:root@localhost:7687') 
//->setAutoFormatResponse(true)
->build();
    //echo json_encode ( $client);
echo 'Connection to NEO4J Done</br>';
/*
$query = "
CREATE(
root:Node {name:'Raj', node_id:1, url:'Raj.cs', description:'Director', html:'Raj.html' }),
(s1:Node {name:'Gerry', node_id:2, url:'Gerry.cs', description:'Vice Director', html:'Gerry.html' }),
(s2:Node {name:'Atul', node_id:3, url:'Atul.cs', description:'Database Administrator', html:'Atul.html' }),
(s3:Node {name:'Eric', node_id:4, url:'Eric.cs', description:'Security Administrator', html:'Eric.html' }),
(s4:Node {name:'Othmane', node_id:5, url:'Othmane.cs', description:'Front-End Developper', html:'Othmane.html' }), 
(s5:Node {name:'Julius', node_id:6, url:'Julius.cs', description:'Engine Developper', html:'Julius.html' }),
(s6:Node {name:'Warry', node_id:7, url:'Warry.cs', description:'Engine Developper', html:'Warry.html' }),
(s7:Node {name:'Allen', node_id:8, url:'Allen.cs', description:'Font-End Developper', html:'Allen.html' }),
(s8:Node {name:'Pauline', node_id:9, url:'Pauline.cs', description:'JIRA Administrator', html:'Pauline.html' }),
(root)-[:childDir]->(s1),
(root)-[:childDir]->(s2),
(root)-[:childDir]->(s3),
(s1)-[:childDir]->(s8), 
(s2)-[:childDir]->(s4), 
(s3)-[:childDir]->(s5), 
(s3)-[:childDir]->(s6), 
(s3)-[:childDir]->(s7) 
WITH root, s1, s2, s3, s4, s5
MATCH (n:Hierarchy) RETURN n LIMIT 25
";

$result = $client->run($query);
*/

/*
$query1 = "MATCH (n:Nodes) RETURN COUNT(n) LIMIT 25";
$result1 = $client->run($query1);
foreach ($result1->getRecords() as $record) {
    echo'</br>Count Nodes:'. json_encode( $record->get('COUNT(n)')).'</br>';
}*/
/*
$query1 = "MATCH (n:Nodes)  RETURN n.Hierarchy LIMIT 25";
$result1 = $client->run($query1);
foreach ($result1->getRecords() as $record) {
    echo'</br>Count Nodes:'. json_encode( $record->get('n.Hierarchy')).'</br>';
    */
/*
$query1 = "MATCH (n:Nodes) where n.Hierarchy='RAJ' RETURN n.Hierarchy";
$result1 = $client->run($query1);
foreach ($result1->getRecords() as $record) {
    echo'</br>Count Nodes:'. json_encode( $record->get('n.Hierarchy')).'</br>';
}   */
echo 'Query runs Starts</br>';
echo '<h3>Children of Nodes</h3>';

$query1 = "MATCH (n:NODE_TREESssssss)<-[:childDir]-(b {name:'Raj'}) 
RETURN DISTINCT n.name, b.name";
$result1 = $client->run($query1);
//echo'</br>Children of the Node'.json_encode( $result1->get());

foreach ($result1->getRecords() as $record) {
    echo'</br>Children of the Node<b>'.json_encode( $record->get('b.name')).'</b>:<i>'. json_encode( $record->get('n.name')).'</i></br>';
}  

$query1 = "MATCH (n:NODE_TREESssssss)<-[:ParentOf]-(b {name:'Atul'}) 
RETURN DISTINCT n.name, b.name";
$result1 = $client->run($query1);
foreach ($result1->getRecords() as $record) {
    echo'</br>Children of the Node<b>'.json_encode( $record->get('b.name')).'</b>:<i>'. json_encode( $record->get('n.name')).'</i></br>';
}  

$query1 = "MATCH (n:NODE_TREESssssss)<-[:ParentOf]-(b {name:'Gerry'}) 
RETURN DISTINCT n.name, b.name";
$result1 = $client->run($query1);
foreach ($result1->getRecords() as $record) {
    echo'</br>Children of the Node<b>'.json_encode( $record->get('b.name')).'</b>:<i>'. json_encode( $record->get('n.name')).'</i></br>';
}  

$query1 = "MATCH (n:NODE_TREESssssss)<-[:ParentOf]-(b {name:'Eric'}) 
RETURN DISTINCT n.name, b.name";
$result1 = $client->run($query1);
foreach ($result1->getRecords() as $record) {
    echo'</br>Children of the Node<b>'.json_encode( $record->get('b.name')).'</b>:<i>'. json_encode( $record->get('n.name')).'</i></br>';
}  

echo '</br>Query runs Done</br>';


$query1 = "MATCH (n:NODE_TREESssssss) RETURN DISTINCT n.name, n.description LIMIT 25";
$result1 = $client->run($query1);
echo '<h3>All Nodes</h3>';
foreach ($result1->getRecords() as $record) {
    echo'</br>'.json_encode( $record->get('n.name')).' -> <u>'.json_encode( $record->get('n.description')).'</u>';//. json_encode( $record->get('n.Hierarchy')).'</br>';
}  


?>

</div>
@endsection
