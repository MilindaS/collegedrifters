
<div class="content">
	<div class="container" >

		<div class="row">
			<div class="col-md-12">
				<ol class="breadcrumb">
				  <li><a href="<?php echo BASEURL;?>marketplace/listView">Home</a></li>
				  <li><a href="<?php echo BASEURL;?>profile/view">My Profile</a></li>
				  <li class="active">Edit Information</li>
				</ol>
			</div>
		</div>

		<div class="row" style="background:#E4E7EA;">
			<div class="col-md-12" style="padding:10px;">


				<div class="panel panel-default">
				  <div class="panel-body">

					<form class="form-horizontal" id="defaultForm" method="post" action="<?php echo BASEURL;?>profile/update">
						  <div class="form-group">
							<label class="col-sm-2 control-label" style="color:#525252;">First Name</label>
							<div class="col-sm-10">
							  <input type="text" class="form-control" name="user_firstName" placeholder="Enter First Name" value="<?php echo $this->user['user_firstName'];?>">
							</div>
						  </div>

							<div class="form-group">
							<label class="col-sm-2 control-label" style="color:#525252;">Last Name</label>
							<div class="col-sm-10">
							  <input type="text" class="form-control" name="user_lastName" placeholder="Enter Last Name" value="<?php echo $this->user['user_lastName'];?>">
							</div>
						  </div>

						  <div class="form-group">
							<label class="col-sm-2 control-label" style="color:#525252;">Email</label>
							<div class="col-sm-10">
							  <input type="email" class="form-control" name="user_email" placeholder="Enter Email : Sample@abc.edu" value="<?php echo $this->user['user_email'];?>">
							</div>
						  </div>

						  <div class="form-group">
							<label class="col-sm-2 control-label" style="color:#525252;"></label>
							<div class="col-sm-10">
							  <input type="checkbox"name="user_email_visibility" value="1" <?php if($this->user['user_email_visibility']==1){ echo 'checked="checked"';};?>> Hide	Email to public
							</div>
						  </div>

						  <div class="form-group">
							<label class="col-sm-2 control-label" style="color:#525252;">Date of Birth</label>
							<div class="col-sm-10">
							  <input type="text" class="form-control" name="user_dob" placeholder="Enter Date of Birth : MM-DD-YYYY" value="<?php echo date('m-d-Y',strtotime($this->user['user_dob']));?>">
							</div>
						  </div>

						  <div class="form-group">
							<label class="col-sm-2 control-label" style="color:#525252;">Mobile Number</label>
							<div class="col-sm-10">
							  <input type="text" class="form-control" name="user_mobile" placeholder="Enter Mobile Number" value="<?php echo $this->user['user_mobile'];?>">
							</div>
						  </div>

						    <div class="form-group">
							<label class="col-sm-2 control-label" style="color:#525252;"></label>
							<div class="col-sm-10">
							  <input type="checkbox" name="user_mobile_visibility" value="1"  <?php if($this->user['user_mobile_visibility']==1){ echo 'checked="checked"';};?>> Hide Mobile number to public
							</div>
						  </div>

							  <div class="form-group">
							<label class="col-sm-2 control-label" style="color:#525252;">City </label>
							<div class="col-sm-10">
							  <input type="text" class="form-control" name="user_city" placeholder="Enter City " value="<?php echo $this->user['user_city'];?>">
							</div>
						  </div>
						  <div class="form-group">
							<label class="col-sm-2 control-label" style="color:#525252;">State</label>
							<div class="col-sm-10">
							  <input type="text" class="form-control" name="user_state" placeholder="Enter State" value="<?php echo $this->user['user_state'];?>">
							</div>
						  </div>
							<div class="form-group">
							<label class="col-sm-2 control-label" style="color:#525252;">Zip Code</label>
							<div class="col-sm-10">
							  <input type="text" class="form-control" name="user_zip" placeholder="Enter State" value="<?php echo $this->user['user_zip'];?>">
							</div>
						  </div>
						  <div class="form-group">
							<label class="col-sm-2 control-label" style="color:#525252;">School Name</label>
							<div class="col-sm-10">
							  <input type="text" class="form-control" name="user_school" placeholder="Enter School Name" value="<?php echo $this->user['user_school'];?>">
							</div>
						  </div>


						  <div class="form-group" id="bePass">
							<label class="col-sm-2 control-label" style="color:#525252;">Password</label>
							<div class="col-sm-10">
							  <a class="btn btn-default btn-sm"><span class="glyphicon glyphicon-edit"></span>&nbsp;&nbsp;&nbsp;Change Password</a>
							</div>
						  </div>

						  <div class="form-group onPass">
							<label class="col-sm-2 control-label" style="color:#525252;">Password</label>
							<div class="col-sm-10">
							  <input type="password" class="form-control" name="user_password" placeholder="Enter 6 character password" >
							</div>
						  </div>

						  <div class="form-group onPass">
							<label class="col-sm-2 control-label" style="color:#525252;">Re type Password</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" name="repassword" placeholder="Re enter password">
							</div>
						  </div>

						  <div class="form-group">
							<label class="col-sm-2 control-label" style="color:#525252;">Notification Alerts</label>
							<div class="col-sm-10">
								<div class="checkbox" style='margin-left:10px;font-size:13px;'>
									<label>
										<input type="checkbox" name="user_notification[]" value="text" <?php if($this->user['user_notification']==1 OR $this->user['user_notification']==3){ echo 'checked="checked"';};?> /> Receive via Text Message
									</label>
								</div>
								<div class="checkbox" style='margin-left:10px;font-size:13px;'>
									<label>
										<input type="checkbox" name="user_notification[]" value="email" <?php if($this->user['user_notification']==2 OR $this->user['user_notification']==3){ echo 'checked="checked"';};?> /> Receive via Email
									</label>
								</div>
							</div>
						  </div>



						<div class="form-group">
							<label class="col-sm-2 control-label" style="color:#525252;">Profile Picture</label>
							<div class="col-sm-10">
								<a id="uploadImage" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-picture"></span>&nbsp;&nbsp;&nbsp;Add</a>
							</div>
						</div>



						  <div class="row" style="margin-bottom:15px;">
							<div class="col-md-offset-2 col-sm-offset-2 col-md-10">
								<div id='preview' style="float:left;padding:10px;">
									<?php if($this->user['user_pic']!=null){
												echo "<img src='".BASEURL.$this->user['user_pic']."' style='max-width:200px;width:100%;' class='preview'>";
										}
									?>


								</div>
							</div>
						  </div>

						  <div class="form-group">
							<label class="col-sm-2 control-label" style="color:#525252;">Bio</label>
							<div class="col-sm-10">
							  <textarea class="form-control" rows="3" name="user_gig"><?php echo $this->user['user_gig'];?></textarea>
							</div>
						  </div>


						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit"  class="btn btn-primary" style="width:100px;">Save</button>

							</div>
						</div>

				</form>
			</div>
		</div>


			</div>

		</div>
	</div>
</div>

<form id="imageform" method="post" enctype="multipart/form-data" action='<?php echo BASEURL;?>profile/imageUpload' style="display:none;">
	Upload your image <input type="file" name="photoimg" id="photoimg" />
</form>





<script type="text/javascript">
$(document).ready(function(){

	$('#uploadImage').click(function(){
			$('#photoimg').trigger('click');
		});

            $('#photoimg').change( function()			{
			           $("#preview").html('');
			    $("#preview").html('Loading..');
			$("#imageform").ajaxForm({
						target: '#preview'
		}).submit();

			});



	$('.onPass').hide();

	$('#bePass').click(function(){
		$(this).hide();
		$('.onPass').fadeIn();
	});

	$('#defaultForm').bootstrapValidator({

        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },

        fields: {
			user_firstName: {
                validators: {
                    notEmpty: {
                        message: 'First Name cannot be empty'
                    }
                }
            },
			user_dob: {
                validators: {
					notEmpty: {
                        message: 'Date of birth cannot be empty'
                    },
                   date: {
                        format: 'MM-DD-YYYY',
                        message: 'The value is not a valid date : MM-DD-YYYY'
                    }
                }
            },
            user_email: {
                validators: {
                    notEmpty: {
                        message: 'Email cannot be empty'
                    },
					emailAddress: {
                        message: 'The is not a valid email address'
                    }
                }
            },
			user_mobile:{
				validators: {

                }
			},
			repassword: {
                validators: {
                    identical: {
                        field: 'user_password',
                        message: 'The password and its confirm are not the same'
                    },
					notEmpty: {
                        message: 'The password and its confirm are not the same'
                    },
					stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The password and its confirm are not the same'
                    },
                }
            },
            user_password: {
                validators: {
                    notEmpty: {
                        message: 'Password cannot be empty'
                    },
					stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The password must be more than 6 characters'
                    },
					identical: {
                        field: 'repassword',
                        message: 'The password and its confirm are not the same'
                    }
                }
            },
			user_school: {
                validators: {
                    notEmpty: {
                        message: 'School cannot be empty'
                    }
                }
            },
			user_city: {
                validators: {
                    notEmpty: {
                        message: 'City cannot be empty'
                    }
                }
            },
			user_state: {
                validators: {
                    notEmpty: {
                        message: 'State cannot be empty'
                    }
                }
            },
            user_zip:{
            	 validators: {
                    notEmpty: {
                        message: 'Zip cannot be empty'
                    }
                }
            }
		}
	});



});

</script>

