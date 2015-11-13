<span  class="card-title  hide-on-large-only center-align  " style="color:white"><h3>Blog</h3></span>
<ul style="display:none;" id="blog"  class="collection hide-on-large-only">
  
  <?php foreach($portfolio as $portfolio): ?>
	<li class="collection-item avatar">
		<div class="row">
			<div class="col s3">
				<img src="<?php echo base_url()."".$portfolio->image;?>" alt="" class="imageMobile">
			</div>
			<div class="col s7">
			<p>
				<b>Title:<br></b><?= $portfolio->title; ?><br>
				<b>Name:<br></b><?= $portfolio->name; ?><br>
				
			</p>
			</div>
			<div class="col s1">
				<form action="deletePortfolio" method="post">
					<input type="hidden" name="id" value="<?= $portfolio->id; ?>"/>
					<button class="btn-floating btn-small waves-effect waves-light red circleEdit"><i class="material-icons">delete</i></button>
				</form><br>
				<form action="edit_record" method="post">
                  <input type="hidden" name="id" value="<?= $portfolio->id; ?>"/>
                  <a href="edit/<?= $portfolio->id; ?>"class="btn-floating btn-small waves-effect waves-light  darken-3 circleDelete"><i class="material-icons">loop</i></a>
                </form> 
			</div>
		</div>
	</li><br>
  <?php endforeach; ?>  

  </ul 
