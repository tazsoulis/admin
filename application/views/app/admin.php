<div class="row spacer-200 ">
  <div class="col s6 offset-s3 ">
     <h4 class=" center-align white-text">Welcome Back </h4>
  </div>

</div>
<h4 class="white-text">Search...</h4>
  <form action="<?= base_url('app/search')?>" method="GET">
      <input type="text" name="project" id="project"> 
  </form>
</div>


<script>
    $(document).ready(function(){
        (function($){
  
          var $project = $('#project');

          var projects = [
            {
              value: "jquery",
              label: "jQuery",
              desc: "the write less, do more, JavaScript library",
              icon: "jquery_32x32.png"
            },
            {
              value: "jquery-ui",
              label: "jQuery UI",
              desc: "the official user interface library for jQuery",
              icon: "jqueryui_32x32.png"
            },
            {
              value: "sizzlejs",
              label: "Sizzle JS",
              desc: "a pure-JavaScript CSS selector engine",
              icon: "sizzlejs_32x32.png"
            }
          ];
          
          $project.autocomplete({
            minLength: 0,
            source: projects,
            focus: function( event, ui ) {
              $project.val( ui.item.label );
              return false;
            }
          });
          
          $project.data( "ui-autocomplete" )._renderItem = function( ul, item ) {
            
            var $li = $('<li>'),
                $img = $('<img>');


            $img.attr({
              src: 'https://jqueryui.com/resources/demos/autocomplete/images/' + item.icon,
              alt: item.labelta
            });

            $li.attr('data-value', item.label);
            $li.append('<a href="#">');
            $li.find('a').append($img).append(item.label);    

            return $li.appendTo(ul);
          };
          
          $.getJSON( "<?= base_url("app/search/a"); ?>", function( data ) {
              console.log(data);
          });

        })(jQuery);
    });
</script>