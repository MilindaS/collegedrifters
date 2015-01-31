<script>
	$(document).ready(function(){
		$('.stack-body').css({'min-height':$(document).outerHeight()-40});
		$('.stack-body-nav').css({'min-height':$('.stack-body').outerHeight()})
		$(document).scroll(function() {
		  $('.stack-body-nav').css({'min-height':$('.stack-body').outerHeight()})
		});
	});
</script>

<div class="container-fluid">

		<div class="row">
			<div class="col-md-2 col-sm-1 col-xs-2">
				<div class="row stack-head-nav">
					<div class="col-md-12">
						<span class="hidden-xs hidden-sm"><a href="<?php echo BASEURL;?>admin/dash">College <b>Drifters</b></a></span>
						<span class="hidden-md hidden-lg"><a href="<?php echo BASEURL;?>admin/dash"><span class="glyphicon glyphicon-home"></span></a></span>
					</div>
				</div>
			</div>
			<div class="col-md-10 col-sm-11 col-xs-10">
				<div class="row stack-head">
					<div class="col-md-4 col-sm-4 col-xs-7">

					</div>
					<div class="col-md-8 col-sm-8 col-xs-5">
						<div class="pull-right">Admin |
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<span class="glyphicon glyphicon-cog"></span>
							</a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="<?php echo BASEURL;?>marketplace/listView"><span class="glyphicon glyphicon-transfer"></span>&nbsp;&nbsp;Marketplace</a></li>
								<li><a href="<?php echo BASEURL;?>login/logout"><span class="glyphicon glyphicon-log-out" ></span>&nbsp;&nbsp;&nbsp;Logout</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="row" >
			<div class="col-md-2 col-sm-1 col-xs-2" >
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
								<a href="<?php echo BASEURL;?>admin/dash" data-toggle="tooltip" title="Dashboard"><li><span class="glyphicon glyphicon-dashboard"></span><span class="hidden-xs hidden-sm">Dashboard</span></li></a>
								<!-- <a href="<?php //echo BASEURL;?>admin/pages" data-toggle="tooltip" title="Pages"><li><span class="glyphicon glyphicon-book"></span><span class="hidden-xs hidden-sm">Pages</span></li></a> -->
								<a href="<?php echo BASEURL;?>admin/users" data-toggle="tooltip" title="Users"><li><span class="glyphicon glyphicon-user"></span><span class="hidden-xs hidden-sm">Users</span></li></a>
								<a href="<?php echo BASEURL;?>admin/smlinks" data-toggle="tooltip" title="Social Media"><li><span class="glyphicon glyphicon-heart-empty"></span><span class="hidden-xs hidden-sm">Social Media</span></li></a>
								<a href="<?php echo BASEURL;?>admin/categories" data-toggle="tooltip" title="Categories"><li><span class="glyphicon glyphicon-hdd"></span><span class="hidden-xs hidden-sm hidden-md ">Categories</span></li></a>
								<a href="<?php echo BASEURL;?>admin/stat" data-toggle="tooltip" title="Statistics"><li><span class="glyphicon glyphicon-stats"></span><span class="hidden-xs hidden-sm hidden-md ">Site Statistics</span></li></a>
								<a href="<?php echo BASEURL;?>admin/googleAnalytic" data-toggle="tooltip" title="Statistics"><li><span class="glyphicon glyphicon-globe"></span><span class="hidden-xs hidden-sm hidden-md ">Google Analytics</span></li></a>
								<a href="<?php echo BASEURL;?>admin/featuredProd" data-toggle="tooltip" title="Featured Products"><li><span class="glyphicon glyphicon-gift"></span><span class="hidden-xs hidden-sm hidden-md ">Featured Products</span></li></a>
								<a href="<?php echo BASEURL;?>admin/customAds" data-toggle="tooltip" title="Featured Products"><li><span class="glyphicon glyphicon-usd"></span><span class="hidden-xs hidden-sm hidden-md ">Custom Ads</span></li></a>
								<a href="<?php echo BASEURL;?>admin/featuredSch" data-toggle="tooltip" title="Featured Products"><li><span class="glyphicon glyphicon-sound-stereo"></span><span class="hidden-xs hidden-sm hidden-md ">Featured Schools</span></li></a>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-10 col-sm-11 col-xs-10">
				<div class="row stack-body" >
					<div class="col-md-12 scrolly">