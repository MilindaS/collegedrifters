<div class="row" style="margin-top:10px;padding:0px;">
            <div class="col-md-12">
                <ol class="breadcrumb">
                  <li><a href="<?php echo BASEURL;?>admin/dash">Dash</a></li>
                  <li class="active">Users</li>
                </ol>
            </div>
        </div>
<div class="row" >
<div class="col-md-12">
<div class="panel panel-default admin-body" >
  <div class="panel-body">
  <div class="admin-body-page-name">Users</div>
    <table class="table table-striped">
		<thead>
        	<tr class="active" >
            	<th >First Name</th>
                <th class="hidden-xs">Last Name</th>
                <th class="hidden-xs" >Email</th>
                <th class="hidden-xs">City</th>
                <th class="hidden-xs">State</th>
                <th >Action</th>
			</tr>
        </thead>
        <tbody>
        <?php foreach($user_data as $user){?>
        	<tr>
            	<td><?php echo $user->user_firstName;?></td>
                <td class="hidden-xs"><?php echo $user->user_lastName;?></td>
                <td class="hidden-xs"><?php echo $user->user_email;?></td>
                <td class="hidden-xs"><?php echo $user->user_city;?></td>
                <td class="hidden-xs"><?php echo $user->user_state;?></td>
            	<td>
					<a class="btn edit" href="<?php echo BASEURL;?>admin/user/<?php echo $user->user_id;?>">View</a>
                    <button type="button" class="btn delete user_delete_pop" id="<?php echo $user->user_id;?>">Delete</button>
            	</td>
            </tr>
           <?php }
            ?>
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
                <li <?php if($page==$i){ echo 'class="active"';}?>><a href="<?php echo BASEURL;?>admin/users/<?php echo $i?>" ><?php echo $i?></a></li>
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
  $('.user_delete_pop').click(function(){

          $.post("<?php echo BASEURL;?>admin/deleteUserPopup",
                  {
                    id:$(this).attr('id'),
                  },
                  function(data,status){

                    data = $.parseJSON(data)[0];

                    $('#user_del_name').html('&#9899;&nbsp'+data.user_firstName);
                    $('#user_del_id').val(data.user_id);

                    $('#admin_modal_del').modal('show')
                  }
                );
        });
  $('#delete_user_cnfm').click(function(){
          var user_del_id = $('#user_del_id').val();
          
          $.post("<?php echo BASEURL;?>admin/deleteUserSave",
                  {
                    id:user_del_id
                  },
                  function(data,status){
                    $('#admin_modal_del').modal('hide');
                    window.location.reload(true);
                  }
                );
        });
  });
</script>

<form class="form-horizontal" id="admin_form_del">
<div class="modal fade" id="admin_modal_del">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Are you really sure about delete this user!</h4>
      </div>
      <div class="modal-body">
        <div id="user_del_name"></div>
      </div>
      <input type="hidden" id="user_del_id">
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" id="delete_user_cnfm">Delete</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</form>