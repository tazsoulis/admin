<input class="awesomplete" list="mylist" />
<datalist id="mylist">
  <option>Ada</option>
  <option>Java</option>
  <option>JavaScript</option>
  <option>Brainfuck</option>
  <option>LOLCODE</option>
  <option>Node.js</option>
  <option>Ruby on Rails</option>
</datalist>


<div class="row spacer-100">
  <div class="col m10 offset-m1 ">
    <div class="card-panel grey lighten-5 z-depth-1">
      <div class="row valign-wrapper">
          <div class="col m12 ">
            <h5 class="valign center-align ">Display Items</h5>
            <div class=" row ">
              <div class="col m3 right">
                <form role="search" action="<?= base_url('search')?>" method="get">
                  <div class="input-field">
                    <input type="text"
                            autocomplete="off"
                            class="form-control awesomplete"
                            list="mylist" 

                            name="q" 
                     id="search" type="search" required>
                      <datalist id="mylist">
                              <option>Ada</option>
                              <option>Java</option>
                              <option>JavaScript</option>
                              <option>Brainfuck</option>
                              <option>LOLCODE</option>
                              <option>Node.js</option>
                              <option>Ruby on Rails</option>
                            </datalist>
                    <label for="search"><i class="material-icons">search</i><a href="search"></a></label>
                    <i class="material-icons">close</i>
                  </div>
                </form>
              </div>
            </div>
            <table class="highlight centered spacer-50">
              <thead >
                <tr class="centered">
                  <th data-field="check">check</th>
                  <th data-field="id">id</th>
                  <th data-field="name">Brand</th>
                  <th data-field="title">Title</th>
                  <th data-field="discription">Description</th>
                  <th data-field="image">Image</th>
                  <th data-field="edit">Edit</th>
                  <th data-field="delete">Delete</th>
                </tr>
              </thead>
              <tbody id="fillgrid">
               
              </tbody>
            </table>
          </div>    
      </div>
    </div>
  </div>
</div>


 <script>

$(document).ready(function (){
    //fill data
    var btnedit='';
    var btndelete = '';
        fillgrid();
    
    function fillgrid(){
        $("#loader").show();
        $.ajax({
            url:'<?php echo base_url() ?>App/fillgrid',
            type:'GET'
        }).done(function (data){
            $("#fillgrid").html(data);
            $("#loader").hide();
            btnedit = $("#fillgrid .btnedit");
            btndelete = $("#fillgrid .btndelete");
            var deleteurl = btndelete.attr('href');
            var editurl = btnedit.attr('href');
            //delete record
            btndelete.on('click', function (e){
                e.preventDefault();
                var deleteid = $(this).data('id');
                swal({   title: "Are you sure?",   text: "You will not be able to recover this record again!",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "Yes, delete it!",   cancelButtonText: "No, cancel it!",   closeOnConfirm: false,   closeOnCancel: false }, function(isConfirm){   if (isConfirm) {  $("#loader").show();
                    $.ajax({
                    url:deleteurl,
                    type:'POST' ,
                    data:'id='+deleteid
                    }).done(function (data){
                    $("#response").html(data);
                    $("#loader").hide();
                    fillgrid();
                    });     
                    swal("Deleted!", "Your file has been deleted.", "success");   } else {     swal("Cancelled", "Your file is still safe :)", "error");   } });  
            });
            
            //edit record
            btnedit.on('click', function (e){
                e.preventDefault();
                var editid = $(this).data('id');
                $.colorbox({
                href:"<?php echo base_url()?>App/edit/"+editid,
                top:50,
                width:500,
                onClosed:function() {fillgrid();}
                });
            });  
        });
    }
});
</script>
