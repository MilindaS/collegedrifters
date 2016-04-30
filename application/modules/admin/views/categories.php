<div class="row" style="margin-top:10px;padding:0px;">
            <div class="col-md-12">
                <ol class="breadcrumb">
                  <li><a href="<?php echo BASEURL;?>admin/dash">Dash</a></li>
                  <li class="active">Categories</li>
                </ol>
            </div>
        </div>
<div class="row">
<div class="col-md-12">
<div class="panel panel-default admin-body">
  <div class="panel-body">
  <div class="admin-body-page-name">Product Categories</div>
    <div class="admin-body-page-sub-name">Categories <button type="button" class="btn add" id="add_cat_new_btn">Add New</button></div>

    <table class="table table-striped">
		<thead>
        <tr class="active" >
          <th >Category Name</th>
          <th class="action">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($category_data as $category){?>
        	<tr>
            	<td><?php echo $category->category_name;?></td>
                <td>
					<button type="button" class="btn edit category_edit" id="<?php echo $category->category_id;?>">Edit</button>
          <button type="button" class="btn delete catetory_delete" id="<?php echo $category->category_id;?>">Delete</button>
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
              <a href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <?php for($i=1;$i<=$iteratinons;$i++){?>
                <li <?php if($page==$i){ echo 'class="active"';}?>><a href="<?php echo BASEURL;?>admin/dbmgt/<?php echo $i?>" ><?php echo $i?></a></li>
            <?php }?>
            <li>
              <a href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          </ul>
        </nav>
    </div>
</div>








<script>
    $(document).ready(function(){
        $('.category_edit').click(function(){
              $.post("<?php echo BASEURL;?>admin/editCategoryPopup",
                  {
                    id:$(this).attr('id'),
                  },
                  function(data,status){
                    //alert("Data: " + data + "\nStatus: " + status);
                    data = $.parseJSON(data)[0];
                    //console.log(data);
                    $('#category_name').val(data.category_name);
                    $('#category_id').val(data.category_id);

                    //$('#smlink_url').val(data.smlinks_url);
                    $('#category_modal').modal('show')
                  }
                );
        });

        $('#add_cat_new_btn').click(function(){
          $('#change_type').html('Add');
          $('#update_category').html('Add');
          $('#category_name').val('');
          $('#category_modal').modal('show')
        });

        $('#update_category').click(function(){
            var category_name = $('#category_name').val();
            var category_id = $('#category_id').val();


            $.post("<?php echo BASEURL;?>admin/editCategorySave",
                  {
                    category_id:category_id,
                    category_name:category_name
                  },
                  function(data,status){
                    $('#category_modal').modal('hide');
                    window.location.reload(true);
                  }
                );
        });

        $('.catetory_delete').click(function(){
          
          $.post("<?php echo BASEURL;?>admin/editCategoryPopup",
                  {
                    id:$(this).attr('id'),
                  },
                  function(data,status){
                    //alert("Data: " + data + "\nStatus: " + status);
                    data = $.parseJSON(data)[0];
                    //console.log(data);
                    $('#category__del_name').html('&#9899;&nbsp'+data.category_name);
                    $('#category__del_id').val(data.category_id);

                    //$('#smlink_url').val(data.smlinks_url);
                    $('#category_modal_del').modal('show')
                  }
                );
        });
        $('#delete_category_cnfm').click(function(){
          var category_id = $('#category__del_id').val();
          
          $.post("<?php echo BASEURL;?>admin/deleteCategorySave",
                  {
                    id:category_id
                  },
                  function(data,status){
                    $('#category_modal').modal('hide');
                    window.location.reload(true);
                  }
                );
        });


    });


</script>









<form class="form-horizontal" id="category_form">
<div class="modal fade" id="category_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><span id="change_type">Edit</span> Category</h4>
      </div>
      <div class="modal-body">


          <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 col-xs-3 control-label">Category <span class="hidden-xs">Name</span></label>
            <div class="col-sm-9 col-xs-9">
              <input type="text" id="category_name" class="form-control" placeholder="Name">
              <input type="hidden" id="category_id">
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="update_category">Update</button>
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
        <div id="category__del_name"></div>
      </div>
      <input type="hidden" id="category__del_id">
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" id="delete_category_cnfm">Delete</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</form>