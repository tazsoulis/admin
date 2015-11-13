<div class="well">
    <div class="errorresponse"></div>

        <form class="form" id="frmupdate" role="form" action="<?php echo base_url() ?>App/update" method="POST">
            <?php foreach($query->result() as $row):?>
                <div class="col m10 offset-m1">
                    <h5 class="valign center-align">Insert item</h5>
                    <div class="input-field">
                        <i class="material-icons prefix">perm_identity</i>
                        <input id="title" name="brand" type="text" class="validate"  value="<?php echo $row->brand?>">
                        <label for="icon_prefix"></label>
                    </div><div class="input-field">
                        <i class="material-icons prefix">perm_identity</i>
                        <input id="title" name="title" type="text" class="validate"  value="<?php echo $row->title?>">
                        <label for="icon_prefix"></label>
                    </div>
                 
                    <div class="input-field">
                        <i class="material-icons prefix">mode_edit</i>
                        <input type="text" id="description" name="description" class="materialize-textarea"  value="<?php echo $row->description?>">
                        <label for="icon_prefix2"></label>
                    </div>
                    <div class="file-field input-field">
                        <div class="btn-floating btn-large waves-effect waves-light grey">
                            <span>Image</span>
                    <?php echo form_upload('image'); ?>
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" id="image" name="image" type="text">
                        </div>
                    </div>
                    <div class="spacer-40">
                    <input type="hidden" name="hidden" value="<?php echo $id ?>"/>
                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="update">
                    </div>
                </div>
            <?php endforeach;?>
        </form>
 
<script>
$(document).ready(function (){
    $("#frmupdate").submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'<?php echo base_url() ?>App/update',
            type:'POST',
            dataType:'json',
            data: $("#frmupdate").serialize()
        }).done(function (data){
            window.mydata = data;
                if(mydata['error'] !=""){
                    $(".errorresponse").html(mydata['error']);
                }
                else{
                $(".errorresponse").text('');
                $('#frmupdate')[0].reset();
                $("#response").html(mydata['success']);
                
                $.colorbox.close();
                $("#response").html(mydata['success']);
                }
        });
    });    
});

    
</script>
