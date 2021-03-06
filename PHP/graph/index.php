<!DOCTYPE>

<html>

  <head>
    <title>cose demo</title>

    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">

    <script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
    <script src="http://cytoscape.github.io/cytoscape.js/api/cytoscape.js-latest/cytoscape.min.js"></script>

    <!-- for testing with local version of cytoscape.js -->
    <!--<script src="../cytoscape.js/build/cytoscape.js"></script>-->

    <style>
      body {
        font-family: helvetica;
        font-size: 14px;
      }

      #cy {
        float: right;
        width: 80%;
        height: 100%;
        background: #ddd;
      }

      #barra_lateral{
        width: 20%;
        height: 50%;
        background: #aaa;
      }

      h1 {
        opacity: 0.5;
        font-size: 1em;
      }
    </style>

    <script>

      window.onload = function(){
      getJson();
      }

      function getJson(){        
        //.. do some overall initialization
          $.ajax({
              url: 'graph.php',
              method: 'GET', 
              dataType: 'json',
              data: {},  //probably you have some parameters
              error: function() {
                alert('Erro ao tentar ação!');
              },
              success: function(data) {
                console.log(data);
                atualizaTela(data)
              },
              beforeSend: function() {
              }
          });

          
      }  

      function atualizaTela(data){
          var cy = window.cy = cytoscape({container: document.getElementById('cy'),

          layout: {
            name: 'cose',
            idealEdgeLength: 100,
            nodeOverlap: 20
          },

          style: [{"selector":"core","style":{"selection-box-color":"#AAD8FF","selection-box-border-color":"#8BB0D0","selection-box-opacity":"0.5"}},{"selector":"node","style":{"width":"mapData(score, 0, 0.006769776522008331, 20, 60)","height":"mapData(score, 0, 0.006769776522008331, 20, 60)","content":"data(name)","font-size":"12px","text-valign":"center","text-halign":"center","background-color":"#555","text-outline-color":"#555","text-outline-width":"2px","color":"#fff","overlay-padding":"6px","z-index":"10"}},{"selector":"node[?attr]","style":{"shape":"rectangle","background-color":"#aaa","text-outline-color":"#aaa","width":"16px","height":"16px","font-size":"6px","z-index":"1"}},{"selector":"node[?query]","style":{"background-clip":"none","background-fit":"contain"}},{"selector":"node:selected","style":{"border-width":"6px","border-color":"#AAD8FF","border-opacity":"0.5","background-color":"#77828C","text-outline-color":"#77828C"}},{"selector":"edge","style":{"curve-style":"haystack","haystack-radius":"0.5","opacity":"0.4","line-color":"#bbb","width":"mapData(weight, 0, 1, 1, 8)","overlay-padding":"3px"}},{"selector":"node.unhighlighted","style":{"opacity":"0.2"}},{"selector":"edge.unhighlighted","style":{"opacity":"0.05"}},{"selector":".highlighted","style":{"z-index":"999999"}},{"selector":"node.highlighted","style":{"border-width":"6px","border-color":"#AAD8FF","border-opacity":"0.5","background-color":"#394855","text-outline-color":"#394855","shadow-blur":"12px","shadow-color":"#000","shadow-opacity":"0.8","shadow-offset-x":"0px","shadow-offset-y":"4px"}},{"selector":"edge.filtered","style":{"opacity":"0"}},{"selector":"edge[group=\"coexp\"]","style":{"line-color":"#d0b7d5"}},{"selector":"edge[group=\"coloc\"]","style":{"line-color":"#a0b3dc"}},{"selector":"edge[group=\"gi\"]","style":{"line-color":"#90e190"}},{"selector":"edge[group=\"path\"]","style":{"line-color":"#9bd8de"}},{"selector":"edge[group=\"pi\"]","style":{"line-color":"#eaa2a2"}},{"selector":"edge[group=\"predict\"]","style":{"line-color":"#f6c384"}},{"selector":"edge[group=\"spd\"]","style":{"line-color":"#dad4a2"}},{"selector":"edge[group=\"spd_attr\"]","style":{"line-color":"#D0D0D0"}},{"selector":"edge[group=\"reg\"]","style":{"line-color":"#D0D0D0"}},{"selector":"edge[group=\"reg_attr\"]","style":{"line-color":"#D0D0D0"}},{"selector":"edge[group=\"user\"]","style":{"line-color":"#f0ec86"}}],
    
          elements: data

        });

      }

      
    </script>
  </head>

  <body>
    
    <div id="barra_lateral">
      
      <h1>GRAFO</h1>

    </div>

    <div id="cy">
      

    </div>

  </body>

</html>
