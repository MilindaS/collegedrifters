<?php
if(!$this->session->userdata('logged_in')){	redirect(BASEURL.'login/loginView', 'refresh');}

$session_data = $this->session->userdata('logged_in');
$exploded_url = explode('/',uri_string());
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 3.2//EN">
<html lang="en">
  <head>
    <meta charset="utf-8">
	<title>College Drifters</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <link rel="stylesheet" href="<?php	echo BASEURL;?>public/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php	echo BASEURL;?>public/css/style.css">
	<link rel="stylesheet" href="<?php	echo BASEURL;?>public/css/pill.css">
	<?php
		if(isset($css_array)){
			foreach($css_array AS $item){
					echo '<link rel="stylesheet" href="'.BASEURL.'public/css/'.$item.'" type="text/css" />'."\n";
				}
		}
	?>

	<script src="<?php	echo BASEURL;?>public/js/jquery-1.11.0.min.js"></script>
	<script src="<?php	echo BASEURL;?>public/js/bootstrap.js"></script>
	<script src="<?php	echo BASEURL;?>public/js/jquery.scrollUp.min.js"></script>
	<?php
	if(isset($js_array))
	{
		foreach($js_array AS $item){
				echo  '<script type="text/javascript"  src="'.BASEURL.'public/js/'.$item.'"  ></script>'."\n";
		}
	}
	?>


  </head>
  </head>
  <body>
  <div class="container-full" >

	<!--First row-->
	<div class="cdTopLinkBarForMarket">
		<div class="container-fluid">

			<div class="row">
				<div class="col-lg-4 col-md-3 col-sm-3 col-xs-8 ">
					<ul class="cdTopList list-unstyled">
						<a href="http://www.collegedrifters.com" id="collegeDriftHomeLink"><li>College<span style="color:#B4100A">Drifters</span></li></a>
						<a data-toggle="modal" data-target=".bs-example-modal-lg" style="margin-right:0px;"><li>About</li></a>
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
					<!-- <ul class="cdTopList cdTopList3" style="margin-left:-100px;">
						<li class="dropdown"><span class="glyphicon glyphicon-user"></span> |  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $session_data['username'];?> <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo BASEURL;?>profile/view"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;&nbsp;Profile</a></li>
								<li><a href="<?php echo BASEURL;?>login/logout"><span class="glyphicon glyphicon-off" ></span>&nbsp;&nbsp;&nbsp;Logout</a></li>
							</ul>
						</li>


					</ul> -->

					<div class="pull-right"><?php echo $session_data['username'];?>  |
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="cursor:pointer;">
								<span class="glyphicon glyphicon-cog"></span>
							</a>
							<ul class="dropdown-menu" role="menu">
							<li><a href="<?php echo BASEURL;?>profile/view"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;&nbsp;Profile</a></li>
								<?php if($session_data['usertype']==2){?><li><a href="<?php echo BASEURL;?>admin/dash"><span class="glyphicon glyphicon-transfer"></span>&nbsp;&nbsp;Dashboard</a></li><?php } ?>
								<li><a href="<?php echo BASEURL;?>login/logout"><span class="glyphicon glyphicon-log-out" ></span>&nbsp;&nbsp;&nbsp;Logout</a></li>
							</ul>
					</div>
				</div>

			</div>

		</div>
	</div>





	<!--Second row-->
	<div class="cdTopSiteNameBar">
		<div class="container">
			<div class="row">

				<nav class="navbar navbar-default cdNav" role="navigation">
				  <div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					  </button>
					 <span class="navbar-brand" ><img src="<?php echo BASEURL;?>public/images/logo.png" alt="" style="width:100%;max-width:180px;margin-top:-6%;"/></span>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" >
					  <ul class="nav navbar-nav">
						<li <?php if($exploded_url[0]=="marketplace" AND $exploded_url[1]!="localAds" AND $exploded_url[1]!="manage"){ echo 'class="active"';}?>><a href="<?php echo BASEURL;?>marketplace/listView">Home</a></li>
						<li <?php if($exploded_url[0]=="about"){ echo 'class="active"';}?> ><a  href="<?php echo BASEURL;?>about/marketplace" >About</a></li>
						<li <?php if($exploded_url[0]=="item" AND $exploded_url[1]!="edit"){ echo 'class="active"';}?> ><a href="<?php echo BASEURL;?>item/add">Post Item</a></li>
						<?php if( $session_data['id']==3 || $session_data['id']==10){?>
						<li <?php if($exploded_url[0]=="marketplace" AND $exploded_url[1]=="manage"){ echo 'class="active"';}?>><a href="<?php echo BASEURL;?>marketplace/manage">Manage Ads</a></li>
						<?php }?>
						<li <?php if($exploded_url[0]=="marketplace" AND $exploded_url[1]=="localAds"){ echo 'class="active"';}?> ><a href="<?php echo BASEURL;?>marketplace/localAds">Local Ads</a></li>
						<li <?php if($exploded_url[0]=="profile"){ echo 'class="active"';}else if($exploded_url[0]=="item" AND $exploded_url[1]=="edit"){ echo 'class="active"';}?>><a href="<?php echo BASEURL;?>profile/view">My Profile</a></li>
						<li <?php if($exploded_url[0]=="contact"){ echo 'class="active"';}?>><a href="<?php echo BASEURL;?>contact/form">Contact Us</a></li>
					  </ul>
					</div><!-- /.navbar-collapse -->

				  </div><!-- /.container-fluid -->
				</nav>










			</div>
		</div>
	</div>

</div>


<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="padding:10px;">
      <img src="<?php echo BASEURL;?>public/images/logo.png" alt="" style="width:100%;max-width:200px;" />
	  <p style="padding:40px 10px;">
		The Mission for College Drifters is to provide college students with a direct platform to buy and sell items to each other.
		By utilizing this marketplace students can inform others of events, notes, books, and tickets.
		Technology allows for the world to communicate and get information ten times faster than a newspaper or bulletin board.
		The goal of having students use College Drifters is to allow students to sell items to the same market without the information overload of other marketplaces
		on the World Wide Web and noise of social media. We hope you enjoy using this marketplace to connect with college students near you. In order to improve,
		we would love to hear your comments and concerns <a>collegedrifters@gmail.com</a>
		<br />

	  </p>
    </div>
  </div>
</div>



<div class="marketplaceBack"></div>

<script>
	$(function(){
  $.scrollUp();
});
</script>