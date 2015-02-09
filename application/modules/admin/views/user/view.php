<div class="row">
<div class="col-md-12">
<div class="panel panel-default admin-body">
  <div class="panel-body">



					<form class="form-horizontal" id="defaultForm" method="post" action="<?php echo BASEURL;?>profile/update">
<?php foreach($user_data as $user){?>
						<div class="row" style="margin-bottom:15px;">
							<div class="col-md-offset-2 col-sm-offset-2 col-md-10">
								<div id='preview' style="float:left;padding:10px;">
									<?php if($user->user_pic!=null){
												echo "<img src='".BASEURL.$user->user_pic."' style='max-width:200px;width:100%;' class='preview'>";
										}
									?>


								</div>
							</div>
						  </div>

						  <div class="form-group">
							<label class="col-sm-2 control-label" style="color:#525252;">First Name</label>
							<div class="col-sm-10">
							  <input type="text" class="form-control" name="user_firstName" placeholder="Enter First Name" value="<?php echo $user->user_firstName;?>">
							</div>
						  </div>

							<div class="form-group">
							<label class="col-sm-2 control-label" style="color:#525252;">Last Name</label>
							<div class="col-sm-10">
							  <input type="text" class="form-control" name="user_lastName" placeholder="Enter Last Name" value="<?php echo $user->user_lastName;?>">
							</div>
						  </div>

						  <div class="form-group">
							<label class="col-sm-2 control-label" style="color:#525252;">Email</label>
							<div class="col-sm-10">
							  <input type="email" class="form-control" name="user_email" placeholder="Enter Email : Sample@abc.edu" value="<?php echo $user->user_email;?>">
							</div>
						  </div>



						  <div class="form-group">
							<label class="col-sm-2 control-label" style="color:#525252;">Date of Birth</label>
							<div class="col-sm-10">
							  <input type="text" class="form-control" name="user_dob" placeholder="Enter Date of Birth : MM-DD-YYYY" value="<?php echo date('m-d-Y',strtotime($user->user_dob));?>">
							</div>
						  </div>

						  <div class="form-group">
							<label class="col-sm-2 control-label" style="color:#525252;">Mobile Number</label>
							<div class="col-sm-10">
							  <input type="text" class="form-control" name="user_mobile" placeholder="Enter Mobile Number" value="<?php echo $user->user_mobile;?>">
							</div>
						  </div>

						  <div class="form-group">
							<label class="col-sm-2 control-label" style="color:#525252;">City </label>
							<div class="col-sm-10">
							  <input type="text" class="form-control" name="user_city" placeholder="Enter City " value="<?php echo $user->user_city;?>">
							</div>
						  </div>
						  <div class="form-group">
							<label class="col-sm-2 control-label" style="color:#525252;">State</label>
							<div class="col-sm-10">
							  <input type="text" class="form-control" name="user_state" placeholder="Enter State" value="<?php echo $user->user_state;?>">
							</div>
						  </div>
							<div class="form-group">
							<label class="col-sm-2 control-label" style="color:#525252;">Zip Code</label>
							<div class="col-sm-10">
							  <input type="text" class="form-control" name="user_state" placeholder="Enter State" value="<?php echo $user->user_zip;?>">
							</div>
						  </div>
						  <div class="form-group">
							<label class="col-sm-2 control-label" style="color:#525252;">School Name</label>
							<div class="col-sm-10">
							  <input type="text" class="form-control" name="user_school" placeholder="Enter School Name" value="<?php echo $user->user_school;?>">
							</div>
						  </div>



						  <div class="form-group">
							<label class="col-sm-2 control-label" style="color:#525252;">Notification Alerts</label>
							<div class="col-sm-10">
								<div class="checkbox" style='margin-left:10px;font-size:13px;'>
									<label>
										<input type="checkbox" name="user_notification[]" value="text" <?php if($user->user_notification==1 OR $user->user_notification==3){ echo 'checked="checked"';};?> /> Receive via Text Message
									</label>
								</div>
								<div class="checkbox" style='margin-left:10px;font-size:13px;'>
									<label>
										<input type="checkbox" name="user_notification[]" value="email" <?php if($user->user_notification==2 OR $user->user_notification==3){ echo 'checked="checked"';};?> /> Receive via Email
									</label>
								</div>
							</div>
						  </div>


						  <div class="form-group">
							<label class="col-sm-2 control-label" style="color:#525252;">Bio</label>
							<div class="col-sm-10">
							  <textarea class="form-control" rows="3" name="user_gig"><?php echo $user->user_gig;?></textarea>
							</div>
						  </div>


<?php }?>
				</form>




</div>
</div>


</div>
</div>