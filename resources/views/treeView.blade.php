@extends('layouts.app')

@section('content')
    <p>
        <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">TreeView of TestCases</div>
                      <div class="panel-body">
                        <div id="tree"> </div>
                      </div>
                    </div>
                </div>
        </div>
        

<script src="http://cdn.graphalchemist.com/alchemy.min.js"></script>
<script type="text/javascript">
  alchemy.begin({
        dataSource: "actors.json",
        nodeCaption: 'name',
        nodeMouseOver: 'name',
        cluster: true,
        clusterColours: ["#1B9E77","#D95F02","#7570B3","#E7298A","#66A61E","#E6AB02"]})
</script>


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
                        text: "GrandGrandchild 1"
                      }
                      ]
                  },
                  {
                    text: "Grandchild 2"
                  }
                ]
              },
              
            ]
          },
          
        ];
      $('#tree').treeview({data: test_tree})
    </script>
@endsection
