@extends('layouts.app')

@section('content')

<<div class="container">
        <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">TreeView</div>
                    <div id="content" class="general-style1">

                      
                    </div>
                </div>
            </div>
        

<div class="content" align="center">

                
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

$results=$treeView;
// echo $results;
 
//$arrayCategories = Array();
 
foreach($results as $result)
{ 
 $arrayCategories[$result->node_id] = Array("parent_id" => $result->nodeparent_id, "name" =>                       
 $result->node_id);   
  }
  //echo $arrayCategories;
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

@endsection

   