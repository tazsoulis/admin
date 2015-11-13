<div class="row spacer-200 ">
  <div class="col s6 offset-s3 ">
     <h4 class=" center-align white-text">Welcome Back </h4>
  </div>
</div>

<script>
$(document).ready(function(){
	/*$("#productname").autocomplete({
		source:"<?php echo base_url('app/search/?'); ?>"
	});*/
	$('#productname').autocomplete({

    source: function (request, response) {
    	console.log(request);
    	var url="app/search/"+request.term;
        $.getJSON("<?php echo base_url('?>"+url+"<?php');?>", function (data) {
        	console.log(data);
            response($.map(data.dealers, function (value, key) {
                return {
                    label: value,
                    id: key
                };
            }));
        });
    },
    minLength: 2,
    delay: 100
});
});
	
</script>
<div class="spacer-100"></div>


<h4 class="white-text">Search...</h4>
    <input type="text" name="productname" id="productname">
    
</div>






