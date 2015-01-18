<?php
//print_r($user_data);?>
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
					<button type="button" class="btn edit">View</button>
                    <button type="button" class="btn delete">Delete</button>
            	</td>
            </tr>
           <?php }
            ?>
		</tbody>
    </table>
  </div>
</div>