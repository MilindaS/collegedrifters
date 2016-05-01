<div class="cdTopLinkBarForMarket">
		<div class="container-fluid">

			<div class="row">
				<div class="col-lg-4 col-md-3 col-sm-3 col-xs-8 ">
					<ul class="cdTopList list-unstyled">
						<a href="<?php echo BASEURL; ?>" id="collegeDriftHomeLink"><li>College<span style="color:#B4100A">Drifters</span></li></a>
						<a data-toggle="modal" data-target=".bs-example-modal-lg" style="margin-right:0px;cursor:pointer;margin-top:5px;"><li>About</li></a>
					</ul>


				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 hidden-xs ">
					<ul class="cdTopList cdTopList2">
						<li>Connect with us  &nbsp;&nbsp;
							<a href="https://www.facebook.com/collegedrifters" target="_blank"><img src="<?php echo BASEURL;?>public/images/socialMedia/facebook.png"  style="width:18px;" alt="" /></a>&nbsp;&nbsp;
							<a href="https://twitter.com/collegedrifters" target="_blank"><img src="<?php echo BASEURL;?>public/images/socialMedia/twitter.png"  style="width:18px;" alt="" /></a>&nbsp;&nbsp;
							<a href="http://instagram.com/collegedrifters" target="_blank"><img src="<?php echo BASEURL;?>public/images/socialMedia/instagram.png"  style="width:18px;" alt="" /></a>&nbsp;&nbsp;
							<a href="http://www.youtube.com/" target="_blank"><img src="<?php echo BASEURL;?>public/images/socialMedia/youtube.png"  style="width:38px;" alt="" /></a>&nbsp;&nbsp;
						</li>
						<li class="hidden-sm hidden-md"><img src="<?php echo BASEURL;?>public/images/socialMedia/gmail.png"  style="width:18px;" alt="" />&nbsp;&nbsp;Email : collegedrifters@gmail.com</li>
					</ul>
				</div>

				<div class="col-lg-2 col-md-3 col-sm-3 col-xs-4">
					<?php if($this->session->userdata('logged_in')){ 
						$session_data = $this->session->userdata('logged_in');
						$exploded_url = explode('/',uri_string());
						?>
						<div class="pull-right"><?php echo $session_data['username'];?>  |
								<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="cursor:pointer;">
									<span class="glyphicon glyphicon-cog"></span>
								</a>
								<ul class="dropdown-menu" role="menu">
								<li><a href="<?php echo BASEURL;?>profile/view"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;&nbsp;Profile</a></li>
									<?php if($session_data['usertype']==1){?><li><a href="<?php echo BASEURL;?>admin/dash"><span class="glyphicon glyphicon-transfer"></span>&nbsp;&nbsp;Dashboard</a></li><?php } ?>
									<li><a href="<?php echo BASEURL;?>login/logout"><span class="glyphicon glyphicon-log-out" ></span>&nbsp;&nbsp;&nbsp;Logout</a></li>
								</ul>
						</div>

					<?php }else{ ?>
						<div class="pull-right"><a href="<?php echo BASEURL;?>login/loginView">Sign in</a>
						</div>
					<?php } ?>

					
				</div>

			</div>

		</div>
	</div>