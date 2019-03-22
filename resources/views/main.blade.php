@extends('layouts.app')

@section('content')
    <p>

                <div class="panel panel-default">
                  <br>
                  <table><tr>
               <td>
<td>
            <? $projectname=$_GET['projectname']?>
         &nbsp;&nbsp; <a href="/createNode?projectname={{$projectname}}" style="color:black;" class="btn btn-outline btn-default" > Tree View</a>
          </td>

               </td>         
           <td>
             <td>
            <? $projectname=$_GET['projectname']?>
         &nbsp;&nbsp; <a href="/map/{{$projectname}}" style="color:black;" class="btn btn-outline btn-default" > Text View
          </td>
          <td>
            <? $projectname=$_GET['projectname']?>
          </td>
        </tr>
      </table>
                    <div class="panel-heading">TreeView of TestCases</div>
                      <div class="panel-body">
                        <div id="tree"> </div>
                      </div>
                                          <a href="/home"   ><img width="10%" src="/img/home.png">  </a>

                    </div>
                </div>
            </div>


    </p>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/bootstrap-treeview.min.js"></script>
    <script type="text/javascript">
      
      var test_tree = [
          {

            text: "Parent 1",
            nodes: [
              {
                text: "Child 1",
                nodes: [
                  {
                    text: "Grandchild 1",
                      nodes: [
                      {
                        text: "GrandGrandchild 1.1",
                          nodes: [
                          {
                            text: "GrandGrandGrandchild 1.1.1",
                          }
                      ]
                      }
                      ]
                  },
                  {
                    text: "Grandchild 2",
                     nodes: [
                      {
                        text: "GrandGrandchild 2.1"
                      }
                      ]
                  }

                ]
              },
              
            ]
            
          },
          
        ];
      $('#tree').treeview({data: test_tree})
    </script>

@endsection
