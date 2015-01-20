<?php
//echo $iteratinons;
?>
<div class="row">
<div class="col-md-12">
<div class="panel panel-default admin-body">
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
                    <button type="button" class="btn delete">Delete</button>
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