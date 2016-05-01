<?php
modules::run('tracking/track');
if(!$this->session->userdata('logged_in')){	redirect(BASEURL.'login/loginView', 'refresh');}

$session_data = $this->session->userdata('logged_in');
$exploded_url = explode('/',uri_string());
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 3.2//EN">
<html lang="en">
  <?php echo modules::run('home/metaHeader'); ?>
  <body>
  <div class="container-full" >

	<!--First row-->

	<?php echo modules::run('home/cdTopLinkBarForMarket'); ?>


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
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>	
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





<script>
	$(function(){
  $.scrollUp();
});
</script>