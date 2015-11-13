<div id="response"></div>
<div class="row spacer-100">
	<div class="col s12 m10 offset-m1">
		<div class="card-panel grey lighten-5 z-depth-1">
			<div class="row valign-wrapper">
				<div class="col m12">
					<form role="form" action="<?php echo base_url()?>app/do_upload" method="POST" enctype="multipart/form-data">
						<div class="col m10 offset-m1">
						<h5 class="valign center-align">Insert item</h5>
						<div class="input-field">
							<i class="material-icons prefix">perm_identity</i>
							<input id="title" name="title" type="text" class="validate">
							<label for="icon_prefix">Title</label>
						</div>
						<div class="input-field ">
							<i class="material-icons prefix">account_circle</i>
							<input id="name" name="brand" type="tel" class="validate">
							<label for="icon_telephone">Brand</label>
						</div>
						<div class="input-field">
							<i class="material-icons prefix">mode_edit</i>
							<textarea id="description" name="description" class="materialize-textarea"></textarea>
							<label for="icon_prefix2">Description</label>
						</div>
						<div class="file-field input-field">
							<div class="btn-floating btn-large waves-effect waves-light grey">
								<span>Image</span>
						<?php echo form_upload('userfile'); ?>
							</div>
							<div class="file-path-wrapper">
								<input class="file-path validate" id="userfile" name="userfile" type="text" multiple>
							</div>
						</div>
						
						<div class="spacer-40">
					
						<input class="btn btn-primary btn-lg btn-block" type="submit" name ="submit" value="submit"  />
						</div>
					</div>
					</form>
							
				</div>		
			</div>
		</div>
	</div>
</div>

<script>
    $(document).ready(function (){
        
        function readURL(input) {
            $("#preview").show();
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#preview').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#userfile").change(function(){
        readURL(this);
    });
            $('form').ajaxForm({
            beforeSend: function() {
                $("#loader").show();
            },
            complete: function(xhr) {
            $("#response").html(xhr.responseText);
            $("#loader").hide();
            $('form').resetForm();
         
            }
        }); 
         
    });


</script>