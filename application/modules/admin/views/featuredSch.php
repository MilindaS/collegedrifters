<div class="row" style="margin-top:10px;padding:0px;">
            <div class="col-md-12">
                <ol class="breadcrumb">
                  <li><a href="<?php echo BASEURL;?>admin/dash">Dash</a></li>
                  <li class="active">Featured Schools</li>
                </ol>
            </div>
        </div>
<div class="row" >
<div class="col-md-12">
<div class="panel panel-default admin-body" >
  <div class="panel-body">
  <div class="admin-body-page-name">Featured Schools Slider</div>
     <div class="admin-body-page-sub-name">Slider <button type="button" class="btn add" id="add_slide_new_btn">Add New</button></div>
    <table class="table table-striped">
		<thead>
        	<tr class="active" >
            	<th >Image</th>
                <th class="hidden-xs">URL</th>
                <th class="hidden-xs">Caption</th>
                <th class="action">Action</th>
			</tr>
        </thead>
        <tbody>
        <?php foreach($slide_data as $slider){?>
        	<tr>
            	<td>
                <img src="<?php echo BASEURL.$slider->slide_img;?>" alt="" style="width:100%;max-width:400px;"/>
              </td>
                <td class="hidden-xs"><?php echo $slider->slide_url;?></td>
                 <td class="hidden-xs"><?php echo $slider->slide_caption;?></td>
                <td>
					<button type="button" class="btn edit slider_edit" id="<?php echo $slider->slide_id;?>">Edit</button>
          <button type="button" class="btn delete slider_delete" id="<?php echo $slider->slide_id;?>">Delete</button>
            	</td>
            </tr>
            <?php } ?>
		</tbody>
    </table>
  </div>
</div>
  </div>
</div>
<script>
    $(document).ready(function(){
        $('.slider_edit').click(function(){
              $.post("<?php echo BASEURL;?>admin/editSliderPopup",
                  {
                    id:$(this).attr('id'),
                  },
                  function(data,status){
                    //alert("Data: " + data + "\nStatus: " + status);
                    data = $.parseJSON(data)[0];
                    //console.log(data.slide_id);
                    $('#slide_id').val(data.slide_id);
                    $('#slide_url').val(data.slide_url);
                    //$('#slide_img').val(data.slide_img);
                    $('#slide_caption').val(data.slide_caption);
                    $("#preview").html('<img src="<?php echo BASEURL;?>'+data.slide_img+'" alt="" style="width:100%;max-width:200px;"/>');


                    // $('#smlink_url').val(data.smlinks_url);
                    $('#slider_modal').modal('show')
                  }
                );
        });
        $('#add_slide_new_btn').click(function(){
          $("#preview").html('');
          $('#change_type').html('Add');
          $('#slide_caption').val('');
          $('#slide_url').val('');
          $('#slider_modal').modal('show')
        });
        $('.slider_delete').click(function(){
            $.post("<?php echo BASEURL;?>admin/editSliderPopup",
                  {
                    id:$(this).attr('id'),
                  },
                  function(data,status){
                    //alert("Data: " + data + "\nStatus: " + status);
                    data = $.parseJSON(data)[0];
                    //console.log(data);
                    $('#slider_del_name').html('<img src="<?php echo BASEURL."'+data.slide_img+'"?>" alt="" width="100%"/>');
                    $('#slider_del_id').val(data.slide_id);

                    //$('#smlink_url').val(data.smlinks_url);
                    $('#slider_modal_del').modal('show')
                  }
                );
        });

          $('#delete_slide_cnfm').click(function(){
            var item_del_id = $('#slider_del_id').val();

            $.post("<?php echo BASEURL;?>admin/deleteSlide",
                    {
                      id:item_del_id
                    },
                    function(data,status){
                      $('#slider_modal_del').modal('hide');
                      window.location.reload(true);
                    }
                  );
          });
    });


</script>



<form class="form-horizontal" id="slider_form_del">
<div class="modal fade" id="slider_modal_del">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Are you really sure about delete this!</h4>
      </div>
      <div class="modal-body">
        <div id="slider_del_name"></div>
      </div>
      <input type="hidden" id="slider_del_id">
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" id="delete_slide_cnfm">Delete</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</form>




<form class="form-horizontal" id="defaultForm" method="post" action="<?php echo BASEURL;?>slider/save">

<div class="modal fade" id="slider_modal">
<input type="hidden" name="slide_id" val="" id="slide_id">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><span id="change_type">Edit</span> Custom Ad</h4>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="slide_url" class="col-sm-3 col-xs-3 control-label" style="color:#525252;">Banner URL</label>
              <div class="col-sm-9 col-xs-9">
                <input type="text" class="form-control" id="slide_url" name="slide_url" placeholder="Enter URL">
              </div>
          </div>
          <div class="form-group">
            <label for="slide_caption" class="col-sm-3 col-xs-3 control-label" style="color:#525252;">Banner Caption</label>
              <div class="col-sm-9 col-xs-9">
                <input type="text" class="form-control" id="slide_caption" name="slide_caption" placeholder="Enter URL">
              </div>
          </div>
           <div class="form-group">
              <label for="inputtext3" class="col-sm-3 col-xs-3 control-label" style="color:#525252;">Banner Image</label>
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
        <button type="submit" class="btn btn-primary">Update</button>
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

$('#photoimg').change( function(){
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
        
            slide_url: {
                validators: {
                    notEmpty: {
                        message: 'Slide URL'
                    }
                }
            }
      }

  });


});
</script>