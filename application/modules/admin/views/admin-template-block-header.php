
<div class="container-fluid">

		<div class="row">
			<div class="col-md-2 col-sm-1 col-xs-2">
				<div class="row stack-head-nav">
					<div class="col-md-12">
						<span class="hidden-xs hidden-sm">College <b>Drifters</b></span>
						<span class="hidden-md hidden-lg"><span class="glyphicon glyphicon-th"></span></span>
					</div>
				</div>
			</div>
			<div class="col-md-10 col-sm-11 col-xs-10">
				<div class="row stack-head">
					<div class="col-md-4 col-sm-4 col-xs-6">
						<ol class="breadcrumb">
							<li><a href="<?php echo BASEURL;?>admin/dash"><span class="glyphicon glyphicon-home"></span></a></li>
							<li class="active"><?php echo isset($page_name)? $page_name:'';?></li>
						</ol>
					</div>
					<div class="col-md-8 col-sm-8 col-xs-6">
						<div class="pull-right">Admin |
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<span class="glyphicon glyphicon-cog"></span>
							</a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#"><span class="glyphicon glyphicon-log-out"></span>&nbsp;&nbsp;Logout</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="row">
			<div class="col-md-2 col-sm-1 col-xs-2">
				<div class="row stack-body-nav">
					<div class="row">
						<div class="col-md-12">
							<img id="stack-nav-greet-img" src="<?php echo BASEURL;?>public/images/profile-no-photo.png" alt="">
							<span id="stack-nav-greet" class="hidden-xs hidden-sm">Hello, Admin</span>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<ul>
								<a href="<?php echo BASEURL;?>admin/dash"><li><span class="glyphicon glyphicon-dashboard"></span><span class="hidden-xs hidden-sm">Dashboard</span></li></a>
								<a href="<?php echo BASEURL;?>admin/pages"><li><span class="glyphicon glyphicon-book"></span><span class="hidden-xs hidden-sm">Pages</span></li></a>
								<a href="<?php echo BASEURL;?>admin/users" ><li><span class="glyphicon glyphicon-user"></span><span class="hidden-xs hidden-sm">Users</span></li></a>
								<a href="<?php echo BASEURL;?>admin/smlinks"><li><span class="glyphicon glyphicon-heart-empty"></span><span class="hidden-xs hidden-sm">Social Media</span></li></a>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-10 col-sm-11 col-xs-10">
				<div class="row stack-body">
					<div class="col-md-12">