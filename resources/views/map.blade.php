@extends('layouts.app')

@section('content')


                <div class="panel panel-default">
                    <div class="panel-heading" align="center"><h4><i><u>Tree View From RDB </u></i></h4></div>
                      <div class="panel-body">
                        <div id="tree"> </div>
<table><tr>
                        <td>
         &nbsp;&nbsp; <a href="/createNode?projectname={{$Project}}" class="btn btn-outline btn-default" > Tree View</a>
          </td>
           <td>
         &nbsp;&nbsp; <a href="/main?projectname={{$Project}}" class="btn btn-outline btn-default" > Implementing New Text View</a>          </td>
        </tr>
      </table>
                      </div>

                       <link rel="stylesheet" type="text/css" href="_styles.css" media="screen">
<?php
function createTreeView($array, $currentParent, $currLevel = 0, $prevLevel = -1) {
foreach ($array as $categoryId => $category) {
  //echo $categoryId.'->';

if ($currentParent == $category['parent_id']) {                       
    if ($currLevel > $prevLevel) echo " <ol class='tree'> "; 
 
    if ($currLevel == $prevLevel) echo " </li> ";
 
    echo '<li> <label for="subfolder2"><a title="'.App\Node::find($category['name'])->url.'" href="'.App\Node::find($category['name'])->url.'">'.App\Node::find($category['name'])->nodeName.'</a></label> <input type="checkbox" name="subfolder2"/>';
 
    if ($currLevel > $prevLevel) { $prevLevel = $currLevel; }
 
    $currLevel++; 
 
    createTreeView ($array, $categoryId, $currLevel, $prevLevel);
 
    $currLevel--;               
    }   
 
}
 
if ($currLevel == $prevLevel) echo " </li>  </ol> ";
 
}
//mysqli_connect('localhost', 'root');
//mysqli_select_db('db_test');
 

use GraphAware\Neo4j\Client\ClientBuilder;
$con=new App\Project();

$client = ClientBuilder::create()
->addConnection($con->con1, $con->con2) 
//->addConnection('bolt', 'bolt://neo4j:root@localhost:7687') 
// ->addConnection('default', 'http://neo4j:Basecamp@ec2-54-147-217-2.compute-1.amazonaws.com:7474') 
->build();


        //$NODENAME=App\Project::where('id','=',$tc->project_id)->first();
        //$NODENAMENEO4J=$NODENAME->project_name.''.$NODENAME->id.'_TC0';
$nameProject=$Project;
//$qry="SELECT * FROM treeview_items";
$query='MATCH (n:'.$nameProject.'_TC0)<-[:ParentOf]-(parent:'.$nameProject.'_TC0) RETURN n.node_id ,n.name, parent.node_id, parent.url as urlP, n.url as urlC, parent.name , id(n) as node_id, id(parent) as parent_id, n.name as nodeName, parent.name as parentName, n.tcid as tcid LIMIT 25';

          $result = $client->run($query);?>

<table border="1"><tr><td><?
$i=0;
           
                
              foreach ($result->getRecords() as $record) 
              {
              $parentName=$record->get("parentName");
              if($record->get("parentName")==App\Project::where('project_name','=',$Project)->first()->url && $i==0)
                {
                 echo $parentName.'---->'.$record->get("nodeName").'</br>';
                $i=$i+1;
                }
              else{ echo '------------------------------->'.$record->get("nodeName").'</br>';   }
              
}
?>
</td></tr></table>
<?
$results=App\Node_node::all();//$treeView;
// echo $results;
 
//$arrayCategories = Array();
 
foreach($results as $result)
{ 
 $arrayCategories[$result->node_id] = Array("parent_id" => $result->nodeparent_id, "name" =>                       
 $result->node_id);   
  }
 // echo $arrayCategories;
?>
<div id="content" class="general-style1">
<?php
if($results->count()>0)
{
?>
<?php 
$i=0;
// echo $i++;
createTreeView($arrayCategories, 0); ?>
<?php
}
?>
 
</div>
                    </div>


          


@endsection

   