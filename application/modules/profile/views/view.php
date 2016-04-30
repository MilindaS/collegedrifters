<?php
if(isset($user_id)){
	//echo $user_id;
	//print_r($user_data);
?>
<div class="content">
	<div class="container">

		<div class="row">
			<div class="col-md-12">
				<ol class="breadcrumb">
				  <li><a href="<?php echo BASEURL;?>marketplace/listView">Home</a></li>
				  <li class="active"><?php echo $user_data->user_firstName;?>'s Profile</li>
				</ol>
			</div>
		</div>

		
		<div class="row">

			<div class="col-md-2" style="padding:15px;">
				<div class="panel panel-default">
					<div class="panel-body">
						<center><?php if($user_data->user_pic==null){ echo '<a href=" '.BASEURL.'profile/edit/'.$user_data->user_id.' " >';}?><img src="<?php if($user_data->user_pic!=null){ echo BASEURL.$user_data->user_pic; }else{ echo BASEURL;?>public/images/profile-no-photo.png<?php } ?>" alt="..." style="width:100%;max-width:160px;box-shadow:0px 0px 5px rgba(0,0,0,0.5);"><?php if($user_data->user_pic==null){ echo '</a>';}?></center>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-body">
						<h4>About <?php echo $user_data->user_firstName;?></h4>
						<p>
							<?php echo substr($user_data->user_gig,0,400);?>
						</p>
					</div>
				</div>
			</div>

			<div class="col-md-10" style="padding:15px;padding-top:0px;">
				<div class="row">
					<div class="col-md-12" >
						<div  >
							<h3><?php echo $user_data->user_firstName." ".$user_data->user_lastName;?></h3>
							<h5><span class="glyphicon glyphicon-map-marker"></span> <?php echo $user_data->user_city." , ".$user_data->user_state." , ".$user_data->user_zip;?></h5>
							<?php if($user_data->user_email_visibility!=1){ ?><h5><span class="glyphicon glyphicon-envelope"></span>&nbsp;&nbsp;<?php echo $user_data->user_email;?></h5><?php } ?>
							<?php if($user_data->user_mobile_visibility!=1){ ?><h5 ><span class="glyphicon glyphicon-phone"></span> <?php echo $user_data->user_mobile;?></h5><?php } ?>
							<h5 ><span class="glyphicon glyphicon-book"></span> <?php echo $user_data->user_school;?></h5>
						</div>
					</div>
				</div>
			</div>
</div>
</div>
</div>
<?php
}else{
?>
<div class="content">
	<div class="container">

		<div class="row">
			<div class="col-md-12">
				<ol class="breadcrumb">
				  <li><a href="<?php echo BASEURL;?>marketplace/listView">Home</a></li>
				  <li class="active">My Profile</li>
				</ol>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12">
				<h3 style="color:#53335E;padding:0px;margin:5px;font-weight:bold;">My Profile</h3><a href="<?php echo BASEURL;?>profile/edit/<?php echo $this->user['user_id'];?>" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-edit"></span> Edit Information</a>
			</div>
		</div>
		<div class="row">

			<div class="col-md-2" style="padding:10px;">
				<div class="panel panel-default">
					<div class="panel-body">
						<center><?php if($this->user['user_pic']==null){ echo '<a href=" '.BASEURL.'profile/edit/'.$this->user['user_id'].' " >';}?><img src="<?php if($this->user['user_pic']!=null){ echo BASEURL.$this->user['user_pic']; }else{ echo BASEURL;?>public/images/profile-no-photo.png<?php } ?>" alt="..." style="width:100%;max-width:160px;box-shadow:0px 0px 5px rgba(0,0,0,0.5);"><?php if($this->user['user_pic']==null){ echo '</a>';}?></center>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-body">
						<h4>About me</h4>
						<p>
							<?php echo substr($this->user['user_gig'],0,400);?>
						</p>
					</div>
				</div>
			</div>

			<div class="col-md-10" style="padding:20px;padding-top:0px;">
				<div class="row">
					<div class="col-md-12" >
						<div  >
							<h3><?php echo $this->user['user_firstName']." ".$this->user['user_lastName'];?></h3>
							<h5><span class="glyphicon glyphicon-map-marker"></span> <?php echo $this->user['user_city']." , ".$this->user['user_state']." , ".$this->user['user_zip'];?></h5>
							<?php if($this->user['user_email_visibility']!=1){ ?><h5><span class="glyphicon glyphicon-envelope"></span>&nbsp;&nbsp;<?php echo $this->user['user_email'];?></h5><?php } ?>
							<?php if($this->user['user_mobile_visibility']!=1){ ?><h5 ><span class="glyphicon glyphicon-phone"></span> <?php echo $this->user['user_mobile'];?></h5><?php } ?>
							<h5 ><span class="glyphicon glyphicon-book"></span> <?php echo $this->user['user_school'];?></h5>
						</div>
					</div>
				</div>


				<div class="row">
					<div class="col-md-12" >
						<div class="panel panel-default">
							<div class="panel-body">

								<ul class="nav nav-pills" role="tablist">
									  <li class="active" ><a href="#home" role="tab" data-toggle="tab" >Posted Items</a></li>
									  <li><a href="#profile" role="tab" data-toggle="tab"><?php if(!empty($this->requested_items_array)){?><span class="badge" style="color:white;background:orange"><?php echo $this->unwatched;?></span><?php } ?>&nbsp;&nbsp;Requested Items by Customers</a></li>
								</ul>

								<!-- Tab panes -->
								<div class="tab-content">
								  <div class="tab-pane active" id="home" style="padding:5px;">

									<?php foreach($this->user_items_array as $item){?>
									<div class="row" style="background:#E3E3E3;padding:10px 0px;margin:5px;">
									<?php if($item['item_image']!=null){?>
										<div class="col-md-3">

								<img src="<?php if($item['item_image']!=null){echo BASEURL.$item['item_image'];}else{echo BASEURL."public/images/icon-no-image.png";}?>" alt="" width="100%"  />
							</div>
							<div class="col-md-9">
							<?php } else{?>
							<div class="col-md-12">
							<?php }?>
								<div class="row">
									<div class="col-md-12">
										<a href="<?php echo BASEURL;?>marketplace/itemView/<?php echo $item['item_id'];?>" class="postedAdName"><?php echo $item['item_name'];?></a> &nbsp; &nbsp; <a href="<?php echo BASEURL;?>item/edit/<?php echo $item['item_id'];?>" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-edit"></span> Edit Item</a> <span class="label label-primary postedAdPrice" >$ <?php echo $item['item_price'];?></span>
									</div>
								</div>

								<div class="row">
									<div class="col-md-12">
										<div class="postedAdAuthor"> <span class="glyphicon glyphicon-user" ></span>&nbsp; By <?php echo $item['user_firstName'];?> | On <?php echo   date("Y-M-d   g:i A", strtotime($item['item_created_date'])); ;?> </div>
									</div>
								</div>

								<p class="postedAdContent" style="min-height:50px;"><?php echo substr($item['item_description'],0,300);?>..</p>

								<div class="row">
									<div class="col-md-12">
										Tags :
										<span class="label label-primary"><?php echo $item['category_name'];?></span>

									</div>
								</div>

							</div>
									</div>

									<?php } ?>

								  </div>


								  <div class="tab-pane" id="profile" style="padding:5px;">

									 <?php foreach($this->requested_items_array as $item){?>
												<div class="row" style="background:#E3E3E3;padding:10px 0px;margin:5px;">
												<?php if($item['item_image']!=null){?>
													<div class="col-md-3">
											<img src="<?php if($item['item_image']!=null){echo BASEURL.$item['item_image'];}else{echo BASEURL."public/images/icon-no-image.png";}?>" alt="" width="100%"  />
										</div>
										<div class="col-md-9">
										<?php } else{?>
							<div class="col-md-12">
							<?php }?>
											<div class="row">
												<div class="col-md-12">
													<a class="postedAdName"><?php echo $item['item_name'];?></a> &nbsp; &nbsp; <a href="<?php echo BASEURL;?>profile/itemRequest/<?php echo $item['request_id'];?>" class="btn <?php  if($item['request_watched']==1){echo 'btn-default';}else{echo 'btn-warning';}?> btn-sm"><span class="glyphicon glyphicon-comment"></span> &nbsp;&nbsp;Show Request</a> <span class="label label-primary postedAdPrice" >$ <?php echo $item['item_price'];?></span>
												</div>
											</div>

											<div class="row">
												<div class="col-md-12">
													<div class="postedAdAuthor"> <span class="glyphicon glyphicon-user" ></span>&nbsp; By <?php echo $item['user_firstName'];?> | On <?php echo   date("Y-M-d   g:i A", strtotime($item['item_created_date'])); ;?> </div>
												</div>
											</div>

											<p class="postedAdContent" style="min-height:50px;"><?php echo substr($item['item_description'],0,300);?>..</p>

											<div class="row">
												<div class="col-md-12">
													Tags :
													<span class="label label-primary"><?php echo $item['category_name'];?></span>

												</div>
											</div>

										</div>
												</div>

												<?php } ?>

								  </div>


								</div>

							</div>
						</div>
					</div>
				</div>





			</div>

		</div>
	</div>
</div>
</div>
</div>
<?php
}
?>