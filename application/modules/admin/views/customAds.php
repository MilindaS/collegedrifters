<div class="row" style="margin-top:10px;padding:0px;">
            <div class="col-md-12">
                <ol class="breadcrumb">
                  <li><a href="<?php echo BASEURL;?>admin/dash">Dash</a></li>
                  <li class="active">Custom Ad</li>
                </ol>
            </div>
        </div>
<div class="row" >
<div class="col-md-12">
<div class="panel panel-default admin-body" >
  <div class="panel-body">
  <div class="admin-body-page-name">Custom Ads</div>
    <table class="table table-striped">
		<thead>
        	<tr class="active" >
            	<th >Image</th>
                <th class="hidden-xs">URL</th>
                <th class="action">Action</th>
			</tr>
        </thead>
        <tbody>
        <?php foreach($banner_data as $banner){?>
        	<tr>
            	<td>
                <img src="<?php echo BASEURL.$banner->banner_img;?>" alt="" style="width:100%;max-width:400px;"/>
              </td>
                <td class="hidden-xs"><?php echo $banner->banner_url;?></td>
                <td>
					<button type="button" class="btn edit banner_edit" id="<?php echo $banner->banner_id;?>">Edit</button>
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
        $('.banner_edit').click(function(){
              $.post("<?php echo BASEURL;?>admin/editBannerPopup",
                  {
                    id:$(this).attr('id'),
                  },
                  function(data,status){
                    //alert("Data: " + data + "\nStatus: " + status);
                    data = $.parseJSON(data)[0];
                    //console.log(data);
                    $('#banner_id').val(data.banner_id);
                    $('#banner_url').val(data.banner_url);
                    $("#preview").html('<img src="<?php echo BASEURL;?>'+data.banner_img+'" alt="" style="width:100%;max-width:200px;"/>');


                    // $('#smlink_url').val(data.smlinks_url);
                    $('#banner_modal').modal('show')
                  }
                );
        });

        $('#update_smlink').click(function(){
            var smlink_url = $('#smlink_url').val();
            var smlinks_id = $('#smlinks_id').val();
            var smlink_name = $('#smlink_name').val();

            $.post("<?php echo BASEURL;?>admin/editSmlinksSave",
                  {
                    smlinks_id:smlinks_id,
                    smlink_url:smlink_url,
                    smlink_name:smlink_name
                  },
                  function(data,status){
                    $('#smlink_modal').modal('hide');
                    window.location.reload(true);
                  }
                );
        });
    });


</script>








<form class="form-horizontal" id="defaultForm" method="post" action="<?php echo BASEURL;?>banner/save">

<div class="modal fade" id="banner_modal">
<input type="hidden" name="banner_id" val="" id="banner_id">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Custom Ad</h4>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="banner_url" class="col-sm-3 col-xs-3 control-label" style="color:#525252;">Banner URL</label>
              <div class="col-sm-9 col-xs-9">
                <input type="text" class="form-control" id="banner_url" name="banner_url" placeholder="Enter URL">
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
        banner_url: {
                validators: {
                    notEmpty: {
                        message: 'Banner URL'
                    }
                }
            }
      }

  });


});
</script>