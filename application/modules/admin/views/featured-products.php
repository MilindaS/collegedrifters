<div class="row" style="margin-top:10px;padding:0px;">
            <div class="col-md-12">
                <ol class="breadcrumb">
                  <li><a href="<?php echo BASEURL;?>admin/dash">Dash</a></li>
                  <li class="active">Featured Products</li>
                </ol>
            </div>
        </div>
<div class="row">
<div class="col-md-12">
<div class="panel panel-default admin-body">
  <div class="panel-body">
  <div class="admin-body-page-name">Featured Products</div>
    <div class="admin-body-page-sub-name">Products <button type="button" class="btn add" id="add_item_new_btn">Add New</button></div>

    <table class="table table-striped">
    <thead>
        <tr class="active" >
          <th >Product Name</th>
          <th >Product Price</th>
          <th class="action">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($featured_item_list as $product){?>
          <tr>
              <td><?php echo $product->item_name;?></td>
              <td><?php echo $product->item_price;?></td>
                <td>
          <button type="button" class="btn edit item_edit" id="<?php echo $product->item_id;?>">Edit</button>
          <button type="button" class="btn delete item_delete" id="<?php echo $product->item_id;?>">Delete</button>
              </td>
            </tr>
            <?php } ?>
    </tbody>
    </table>
  </div>
</div>
  </div>
</div>
<div class="row">
    <div class="col-md-12">
        <nav class="pull-right admin-nav">
          <ul class="pagination">
            <li>

            </li>
            <?php for($i=1;$i<=$iteratinons;$i++){?>
                <li <?php if($page==$i){ echo 'class="active"';}?>><a href="<?php echo BASEURL;?>admin/featuredProd/<?php echo $i?>" ><?php echo $i?></a></li>
            <?php }?>
            <li>

            </li>
          </ul>
        </nav>
    </div>
</div>








<script>
    $(document).ready(function(){
        $('.item_edit').click(function(){
              $.post("<?php echo BASEURL;?>admin/editItemPopup",
                  {
                    id:$(this).attr('id'),
                  },
                  function(data,status){
                    //alert("Data: " + data + "\nStatus: " + status);
                    data = $.parseJSON(data)[0];
                    //console.log(data);
                    $('#item_name').val(data.item_name);
                    $('#item_description').val(data.item_description);
                    $('#item_price').val(data.item_price);
                    $('#item_category').val(data.item_category);
                    $("#preview").html('<img src="<?php echo BASEURL;?>'+data.item_image+'" alt="" style="width:100%;max-width:200px;"/>');
                    $('#defaultForm').attr('action','<?php echo BASEURL;?>item/editSave/'+data.item_id);
                    $('#category_modal').modal('show')
                  }
                );
        });

        $('#add_item_new_btn').click(function(){
          $("#preview").html('');
          $('#change_type').html('Add');
          $('#update_category').html('Add');
          $('#category_name').val('');
          $('#category_modal').modal('show')
        });

        $('.item_delete').click(function(){

          $.post("<?php echo BASEURL;?>admin/editItemPopup",
                  {
                    id:$(this).attr('id'),
                  },
                  function(data,status){
                    //alert("Data: " + data + "\nStatus: " + status);
                    data = $.parseJSON(data)[0];
                    //console.log(data);
                    $('#item_del_name').html('&#9899;&nbsp'+data.item_name);
                    $('#item_del_id').val(data.item_id);

                    //$('#smlink_url').val(data.smlinks_url);
                    $('#category_modal_del').modal('show')
                  }
                );
        });
        $('#delete_item_cnfm').click(function(){
          var item_del_id = $('#item_del_id').val();

          $.post("<?php echo BASEURL;?>admin/deleteItem",
                  {
                    id:item_del_id
                  },
                  function(data,status){
                    $('#category_modal').modal('hide');
                    window.location.reload(true);
                  }
                );
        });


    });


</script>









<form class="form-horizontal" id="defaultForm" method="post" action="<?php echo BASEURL;?>item/save">
<input type="hidden" name="featured_product" value="2">
<div class="modal fade" id="category_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><span id="change_type">Edit</span> Item</h4>
      </div>
      <div class="modal-body">
      
          <div class="form-group">
            <label for="item_name" class="col-sm-3 col-xs-3 control-label" style="color:#525252;">Item Name</label>
              <div class="col-sm-9 col-xs-9">
                <input type="text" class="form-control" id="item_name" name="item_name" placeholder="Enter Item Name">
              </div>
          </div>
          <div class="form-group">
              <label for="item_description" class="col-sm-3 col-xs-3 control-label" style="color:#525252;">Item Description</label>
              <div class="col-sm-9 col-xs-9">
                <textarea class="form-control" rows="3" id="item_description" name="item_description" placeholder="Enter Item Description"></textarea>
              </div>
              </div>


              <div class="form-group">
              <label for="item_category" class="col-sm-3 col-xs-3 control-label" style="color:#525252;">Item Category</label>
              <div class="col-sm-9 col-xs-9">
                <select name="item_category" id="item_category" class="form-control" >
                                    <option value="">Select a Category</option>
                  <?php foreach($category_data as $category)
                  {
                  ?>
                  <option value="<?php echo $category['category_id']?>"><?php echo $category['category_name']?></option>
                  <?php
                  }
                  ?>

                </select>


              </div>
              </div>

               <div class="form-group">
              <label for="item_price" class="col-sm-3 col-xs-3 control-label" style="color:#525252;">Item Price</label>
              <div class="col-sm-9 col-xs-9">
                <input type="text" class="form-control" id="item_price" name="item_price" placeholder="Enter Item Price : $">
              </div>
              </div>
              <div class="form-group">
              <label for="inputtext3" class="col-sm-3 col-xs-3 control-label" style="color:#525252;">Item Picture</label>
              <div class="col-sm-9 col-xs-9">
                <a id="uploadImage" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-picture"></span>&nbsp;&nbsp;&nbsp;Add</a>
              </div>
              </div>

               <div class="row" style="margin-bottom:15px;">
              <div class="col-md-offset-3 col-sm-offset-3 col-sm-9 col-xs-offset-3 col-xs-9 col-md-9">
                <div id='preview' style="float:left;border:solid 1px #dedede;padding:10px;"></div>
              </div>
              </div>

  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="update_item">Save</button>
        </div>
      
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</form>

<form class="form-horizontal" id="category_form_del">
<div class="modal fade" id="category_modal_del">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Are you really sure about delete this!</h4>
      </div>
      <div class="modal-body">
        <div id="item_del_name"></div>
      </div>
      <input type="hidden" id="item_del_id">
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" id="delete_item_cnfm">Delete</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</form>



<form id="imageform" method="post" enctype="multipart/form-data" action='<?php echo BASEURL;?>item/imageUpload' style="display:none;">
  Upload your image <input type="file" name="photoimg" id="photoimg" />
</form>

<script type="text/javascript" >
 $(document).ready(function() {

    $('#uploadImage').click(function(){
      $('#photoimg').trigger('click');
    });

            $('#photoimg').change( function()     {
                 $("#preview").html('');
          $("#preview").html('Loading..');
      $("#imageform").ajaxForm({
            target: '#preview'
    }).submit();

      });



  $('#defaultForm').bootstrapValidator({

        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
      item_name: {
                validators: {
                    notEmpty: {
                        message: 'Item Name cannot be empty'
                    }
                }
            },
      item_description: {
                validators: {
          notEmpty: {
                        message: 'Item Description cannot be empty'
                    }
                }
            },
            item_category: {
                validators: {
                    notEmpty: {
                        message: 'Item Category cannot be empty'
                    }
                }
            },
      item_price: {
                validators: {
                    notEmpty: {
                        message: 'Item Price cannot be empty'
                    },
          numeric: {
                        message: 'The value can contain only numbers'
                    }
                }
            },
    }

  });




});

</script>