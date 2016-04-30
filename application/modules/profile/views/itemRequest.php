
<div class="content">
	<div class="container" style="min-height:800px;">
		
		<div class="row">
			<div class="col-md-12">
				<ol class="breadcrumb">
				  <li><a href="<?php echo BASEURL;?>marketplace/listView">Home</a></li>
				  <li><a href="<?php echo BASEURL;?>profile/view">My Profile</a></li>
				  <li class="active">College Drifters Message</li>
				</ol>
			</div>
		</div>
		
		
		<div class="row">
			<div class="col-xs-12">
				<h3 style="color:#53335E;padding:0px;margin:5px;font-weight:bold;">College Drifters Message</h3>
			</div>
		</div>
		
		<div class="row" >
			<div class="col-md-12" style="padding:10px;">
				
				
				<div class="panel panel-default">
				  <div class="panel-body">
					
					
					<form class="form-horizontal" id="defaultForm" >
						  
						  <div class="form-group">
							<label for="itemName" class="col-sm-2 control-label" style="color:#525252;">Name</label>
							<div class="col-sm-10">
							  <input type="text" class="form-control" id="itemName" name="itemName" placeholder="Not Available" value="<?php echo $this->requested_item_array['user_firstName'];?>" readonly>
							</div>
						  </div>
						  <div class="form-group">
							<label for="itemName" class="col-sm-2 control-label" style="color:#525252;">Email</label>
							<div class="col-sm-10">
							  <input type="text" class="form-control" id="itemName" name="itemName" placeholder="Not Available" value="<?php echo $this->requested_item_array['user_email'];?>" readonly>
							</div>
						  </div>
							  <div class="form-group">
							<label for="itemName" class="col-sm-2 control-label" style="color:#525252;">Mobile Number</label>
							<div class="col-sm-10">
							  <input type="text" class="form-control" id="itemName" name="itemName" placeholder="Not Available" value="<?php echo $this->requested_item_array['user_mobile'];?>" readonly>
							</div>
						  </div>
								
						  <div class="form-group">
							<label for="itemDesc" class="col-sm-2 control-label" style="color:#525252;">Message</label>
							<div class="col-sm-10">
							  <textarea class="form-control" rows="3" id="itemDesc" name="itemDesc" placeholder="Not Available" readonly><?php echo $this->requested_item_array['request_user_messege'];?></textarea>
							</div>
						  </div>
						  
						   <div class="form-group">
							<label for="itemName" class="col-sm-2 control-label" style="color:#525252;">Requested Date</label>
							<div class="col-sm-10">
							  <input type="text" class="form-control" id="itemName" name="itemName" placeholder="Not Available" value="<?php echo date('Y-m-d',strtotime($this->requested_item_array['request_created_date']));?>" readonly>
							</div>
						  </div>
					
						  
					
						
				  
				</form>
					
				  </div>
				</div>
						
			</div>
			
		</div>
	</div>
</div>



