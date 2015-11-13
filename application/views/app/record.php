<div class="row spacer-100">
	<div class="col s12 m10 offset-m1">
		<div class="card-panel grey lighten-5 z-depth-1">
			<div class="row valign-wrapper">
				<div class="col m12">
					<?php echo form_open_multipart('app/update');?>
					<input type="hidden" name="id" value="<?= $record->id ?>" >
					<div class="col m10 offset-m1">
						<h5 class="valign center-align">Update item</h5>
						<div class="input-field">
							<i class="material-icons prefix">perm_identity</i>
							<input id="title" name="title" type="text" value="<?= $record->title ?> " class="validate">
							<label for="icon_prefix">Title</label>
						</div>
						<div class="input-field ">
							<i class="material-icons prefix">account_circle</i>
							<input id="name" name="name" type="tel" value="<?= $record->name ?>" class="validate">
							<label for="icon_telephone">Name</label>
						</div>
						<div class="input-field ">
							<i class="material-icons prefix">mode_edit</i>
							<input id="description" name="description" type="text" value="<?= $record->description ?>" class="validate">
							<label for="icon_telephone">Description</label>
						</div>
						<div class="file-field input-field">
							<div class="btn-floating btn-large waves-effect waves-light grey">
								<span>Image</span>
								<?php echo form_upload('image'); ?>
							</div>
							<div class="file-path-wrapper">
								<input class="file-path validate" id="image" name="image" value="<?= $record->image;?>" type="text">
							</div>
							<img class="circle responsive-img"  src="<?php echo base_url()."".$record->image;?>" style="width:100px; height:100px;"></td>
						</div>
						<div class="spacer-40"><?php echo form_submit('submit', 'update','class="btn btn-primary btn-lg btn-block"' ) ;?></div>
					</div>	
				</div>	
			</div>
		</div>
	</div>
</div>
