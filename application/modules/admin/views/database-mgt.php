<div class="row">
<div class="col-md-12">
<div class="panel panel-default admin-body">
  <div class="panel-body">
  <div class="admin-body-page-name">Database Management</div>
    <div class="admin-body-page-sub-name">Categories</div>
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
					<button type="button" class="btn edit smlink_edit" id="<?php echo $category->category_id;?>">Edit</button>           
          <button type="button" class="btn delete">Delete</button>
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