<div class="row" style="margin-top:10px;padding:0px;">
            <div class="col-md-12">
                <ol class="breadcrumb">
                  <li><a href="<?php echo BASEURL;?>admin/dash">Dash</a></li>
                  <li class="active">Social Media</li>
                </ol>
            </div>
        </div>
<div class="row" >
<div class="col-md-12">
<div class="panel panel-default admin-body" >
  <div class="panel-body">
  <div class="admin-body-page-name">Social Media Links</div>
    <table class="table table-striped">
		<thead>
        	<tr class="active" >
            	<th >Name</th>
                <th class="hidden-xs">Link</th>
                <th class="action">Action</th>
			</tr>
        </thead>
        <tbody>
        <?php foreach($links as $link){?>
        	<tr>
            	<td><?php echo $link->smlinks_name;?></td>
                <td class="hidden-xs"><?php echo $link->smlinks_url;?></td>
                <td>
					<button type="button" class="btn edit smlink_edit" id="<?php echo $link->smlinks_id;?>">Edit</button>           
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
        $('.smlink_edit').click(function(){
              $.post("<?php echo BASEURL;?>admin/editSmlinksPopup",
                  {
                    id:$(this).attr('id'),
                  },
                  function(data,status){
                    //alert("Data: " + data + "\nStatus: " + status);
                    data = $.parseJSON(data)[0];
                    //console.log(data);
                    $('#smlink_name').val(data.smlinks_name);
                    $('#smlinks_id').val(data.smlinks_id);
                    
                    $('#smlink_url').val(data.smlinks_url);
                    $('#smlink_modal').modal('show')
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








<form class="form-horizontal" id="smlinks_form">
<div class="modal fade" id="smlink_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Social Media Link</h4>
      </div>
      <div class="modal-body">


          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Name :</label>
            <div class="col-sm-10">
              <input type="text" id="smlink_name" class="form-control" placeholder="Name">
              <input type="hidden" id="smlinks_id">
            </div>
          </div>
          <div class="form-group">
            <label for="smlink_url" class="col-sm-2 control-label">URL :</label>
            <div class="col-sm-10">
              <input type="text"  id="smlink_url" class="form-control" placeholder="URL">
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="update_smlink">Update</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</form>