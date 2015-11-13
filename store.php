 <?php foreach ($portfolio as $portfolio): ?>

                    <!-- Modal Structure -->
                    <div id="<?= $portfolio->id; ?>" class="modal modal-fixed-footer">
                      <div class="modal-content">
                        <h5 class="valign center-align">Edit item</h5>
                        <form>
                          <div class="col m10 offset-m1">
                          <div class="input-field">
                            <i class="material-icons prefix">perm_identity</i>
                           <input id="title" name="title" type="text" value="<?= $portfolio->title ?> " class="validate">
                            <label for="icon_prefix">Title</label>
                          </div>
                          <div class="input-field ">
                            <i class="material-icons prefix">account_circle</i>
                            <input id="name" name="name" type="text" value="<?= $portfolio->name ?> " class="validate">
                            <label for="icon_telephone">Name</label>
                          </div>
                          <div class="input-field">
                            <i class="material-icons prefix">mode_edit</i>
                            <input id="description" name="description" type="text" value="<?= $portfolio->description ?>" class="validate">
                            <label for="icon_prefix2">Description</label>
                          </div>
                          <div class="file-field input-field">
                          <div class="btn-floating btn-large waves-effect waves-light grey">
                            <span>Image</span>
                            <?php echo form_upload('image'); ?>
                          </div>
                          <div class="file-path-wrapper">
                            <input class="file-path validate" id="image" name="image" value="<?= $portfolio->image;?>" type="text">
                          </div>
                          <img class="circle responsive-img"  src="<?php echo base_url()."".$portfolio->image;?>" style="width:100px; height:100px;"></td>
                        </div>
                          <div class="spacer-40">
                          <input class="btn btn-primary btn-lg btn-block" type="button" onclick="sendData()" name ="submit" value="submit"  />
                          </div>
                        </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Close</a>
                      </div>
                    </div>
                    <!-- End of Modal -->

                <tr>
                  <td>
                    <input type="checkbox" id="<?= $portfolio->id; ?>" />
                    <label for="<?= $portfolio->id; ?>"></label>
                  </td>
                  <td><?= $portfolio->id; ?></td>
                  <td><?= $portfolio->name; ?></td>
                  <td><?= $portfolio->title; ?></td>
                  <td ><?=  substr($portfolio->description ,0,80);?></td>
                  <td><img class="circle responsive-img"  src="<?php echo base_url()."".$portfolio->image;?>" style="width:100px; height:100px;"></td>
                  <td>
                    <a class="btn-floating btn-large waves-effect waves-light  darken-3 modal-trigger" href="#<?= $portfolio->id; ?>"><i class="material-icons">loop</i></a>
                  </td>
                  <td>
                    <form action="deletePortfolio" method="post">
                    <input type="hidden" name="id" value="<?= $portfolio->id; ?>"/>
                    <button class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">delete</i></button>
                    </form>    
                  </td>
                </tr>
               <?php endforeach; ?>


               <div class="spacer-100"></div>
<h4 style="color:white">Search Results</h4>
<div class="spacer-50"></div>
<div class="row"></div>
  <?php if (count($results) > 0): ?>

    <?php foreach($results as $result): ?>
      <div class="col s12 m8 offset-m2 l6 offset-l3">
        <div class="card-panel grey lighten-5 z-depth-1">
          <div class="row valign-wrapper">
            <div class="col s2">
            <img src="<?= $result->image ?>" style="width:100px; height:100px;" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
            </div>
            <div class="col s10">
              <span class="black-text">
                <div class="row center-align">
                  <div class="col m2"><strong></strong></div>
                  <div class="col m2 center-align"><strong class="center-align">Name:<br></strong><?= $result->name ?></div>
                  <div class="col m2"><strong>Title:<br></strong><?= $result->title ?></div>
                  <div class="col m2"><strong>Description:<br></strong><?= $result->description ?></div>
                  <div class="col m2"><a href='$edit' data-id='$result->id' class='btnedit btn-floating btn-large waves-effect waves-light  orange accent-3' title='edit'><i class='material-icons'>loop</i></a></div>
                  <div class="col m2"><a href='$delete' data-id='$portfolio->id' class='btndelete btn-floating btn-large waves-effect waves-light red' title='delete'><i class='material-icons'>delete</i></a></div>
                  
                
                </div>
              </span>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  
  <?php else: ?>
  <div class="alert alert-warning">Το προϊόν δεν υπάρχει διαθέσιμο!<br> Δίαλεξε μία απο τις παρακάτω κατηγορίες!</div>
  <?php endif; ?>


