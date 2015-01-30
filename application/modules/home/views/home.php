<!-- <div class="marketBackground"></div> -->

<div class="cdTopLinkBar">
		<div class="container-fluid">

			<div class="row">
				<div class="col-lg-4 col-md-3 col-xs-12 col-sm-3">
					<ul class="cdTopList list-unstyled">
						<a href="http://collegedrifters.com/" id="collegeDriftHomeLink"><li>College<span style="color:#B4100A">Drifters</span></li></a>
						<a data-toggle="modal" data-target=".bs-example-modal-lg" style="margin-right:0px;cursor:pointer;margin-top:5px;"><li>About</li></a>
					</ul>


				</div>
				<div class="col-lg-8 col-md-9 hidden-xs col-sm-9">
					<ul class="cdTopList cdTopList2">
						<li>Connect with us  &nbsp;&nbsp;
							<a href="https://www.facebook.com/collegedrifters" target="_blank"><img src="<?php echo BASEURL;?>public/images/socialMedia/facebook.png"  style="width:18px;" alt="" /></a>&nbsp;&nbsp;
							<a href="https://twitter.com/collegedrifters" target="_blank"><img src="<?php echo BASEURL;?>public/images/socialMedia/twitter.png"  style="width:18px;" alt="" /></a>&nbsp;&nbsp;
							<a href="http://instagram.com/collegedrifters" target="_blank"><img src="<?php echo BASEURL;?>public/images/socialMedia/instagram.png"  style="width:18px;" alt="" /></a>&nbsp;&nbsp;
							<a href="http://www.youtube.com/" target="_blank"><img src="<?php echo BASEURL;?>public/images/socialMedia/youtube.png"  style="width:38px;" alt="" /></a>&nbsp;&nbsp;
						</li>
						<li><img src="<?php echo BASEURL;?>public/images/socialMedia/gmail.png"  style="width:18px;" alt="" />&nbsp;&nbsp;Email : collegedrifters@gmail.com</li>											
					</ul>
				</div>
			</div>
		</div>
	</div>


<div class="container welcomeCont">
	<div class="row">
		<div class="col-md-12">
			<h1 id="mainText" class="text-center"><img src="<?php BASEURL;?>public/images/logo.png" style="width:100%;max-width:400px;" alt="" /></h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h3 id="tagText" class="text-center">Buy, sell, and exchange items with other college students</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">

			<?php
				if($this->session->userdata('logged_in')){
			?>
			<center><a class='btn btn-primary cdBtn' href="<?php BASEURL;?>marketplace/listView">Go to Marketplace</a></center>
			<?php
				}
				else{
				?>
				<center><a class='btn btn-warning cdBtn' href="<?php BASEURL;?>login/registerView">Sign Up</a><a class='btn btn-primary cdBtn' href="<?php BASEURL;?>login/loginView">Login</a></center>
				<?php
				}
			?>
		</div>
	</div>
	<div class="row" style="margin-top:20px;">
		<div class="col-md-offset-3 col-md-6">
		
		  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				  <!-- Indicators -->
				  <ol class="carousel-indicators" style="bottom:-10px;">
				   <?php $slider = modules::run('slider/get','slide_id')->result();
				  $counter = 0;
				  foreach ($slider as $slide) {
				  	
				  
				  ?>
				    <li data-target="#carousel-example-generic" data-slide-to="<?php echo $counter;?>" class="<?php if($counter==0){echo 'active';}?>"></li>
				     <?php   $counter ++; } ?>
				  </ol>
				 
				  <!-- Wrapper for slides -->
				  <div class="carousel-inner">
				  <?php $slider = modules::run('slider/get','slide_id')->result();
				  $counter = 1;
				  foreach ($slider as $slide) {
				  	
				  
				  ?>
				  	<a href="<?php echo $slide->slide_url;?>" target="_blank">
				    <div class="item <?php if($counter==1){echo 'active';}?>">
				      <img src="<?php echo BASEURL.$slide->slide_img;?>" alt="..." width="100%" style="height:100px;">
				      <div class="carousel-caption">
				          <h3 style="position:relative;top:40px;color:black;"><?php echo $slide->slide_caption;?></h3>
				      </div>
				    </div>
				    </a>
				    
				    <?php   $counter ++; } ?>
				  </div>
				 
				  <!-- Controls -->
				  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
				    <span class="glyphicon glyphicon-chevron-left"></span>
				  </a>
				  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
				    <span class="glyphicon glyphicon-chevron-right"></span>
				  </a>
				</div> <!-- Carousel -->
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