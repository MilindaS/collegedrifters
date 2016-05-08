<!-- <div class="marketBackground"></div> -->

<?php echo modules::run('home/cdTopLinkBar'); ?>

<div class="container-fluid"  style="background:#F0F0F0;">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<img src="<?php BASEURL;?>public/images/logo.png" style="width:100%;max-width:200px;padding-top:50px;" alt="" />
			</div>
			<div class="col-md-9"></div>
		</div>
		<nav class="navbar navbar-default homeNav">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#">About</a></li>
              <li><a href="#">Marketplace</a></li>
              <li><a href="#">Blog</a></li>
              <li><a href="#">Contact</a></li>
              
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
	</div>

</div>
<div class="container welcomeCont ">
	 



	<div class="row">
		<div class="col-md-3">
			<div class="list-group">
			 
			  <a href="#" class="list-group-item active">Computer</a>
			  <a href="#" class="list-group-item">Electronics</a>
			  <a href="#" class="list-group-item">Class Materials</a>
			  <a href="#" class="list-group-item">Notes</a>
			  <a href="#" class="list-group-item">Books</a>
			  <a href="#" class="list-group-item">Transportation</a>
			  <a href="#" class="list-group-item">Jobs</a>
			</div>
		</div>
		
		<div class="col-md-8">
			<div class="row">
				<div class="col-md-12">
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					  <!-- Indicators -->
					  <ol class="carousel-indicators">
					    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
					    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
					    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
					  </ol>

					  <!-- Wrapper for slides -->
					  <div class="carousel-inner" role="listbox">
					    <div class="item active">
					      <img src="<?php echo BASEURL.'/public/images/bannerxxe.png' ?>" style="width:100%;" alt="...">
					      <div class="carousel-caption">
					      </div>
					    </div>
					    <div class="item">
					      <img src="<?php echo BASEURL.'/public/images/bannerxxe.png' ?>" alt="...">
					      <div class="carousel-caption">
					      </div>
					    </div>
					  </div>

					  <!-- Controls -->
					  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
					    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					    <span class="sr-only">Previous</span>
					  </a>
					  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
					    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					    <span class="sr-only">Next</span>
					  </a>
					</div>
				</div>
			</div>	
			<div class="row"><br></div>
			<div class="row">
				<div class="col-md-12">
				<div class="panel panel-default">
				  <div class="panel-heading">Featured Products</div>
					  <div class="panel-body">
					    <div class="slideshow">
<?php
	foreach($featured_item_list as $item){
		// print_r($item);
	$category = modules::run('category/get_where',$item->item_category)->result_array();
?>
		<div style="border:1px solid #DDD;margin:5px;padding:8px;">
			<div class="row" style="min-height:150px;">
				<div class="col-md-12">
					<img src="<?php if($item->item_image!=null){echo BASEURL.$item->item_image;}else{echo BASEURL."public/images/icon-no-image.png";}?>" alt="" width="140px;height:180px;"  />	
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<span style="font-size:16px;"><?php echo $item->item_name; ?></span>
				</div>
			</div>
			<div class="row" style="height:50px;">
				<div class="col-md-12">
					<span style="font-size:12px;"><?php echo $item->item_description; ?></span>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12" style="font-size:11px;">
					Tags: &nbsp;<span class="label label-primary featured-category"><?php echo $category[0]['category_name'];?></span>
				</div>
			</div>
		</div>
		
<?php } ?>
<?php
	foreach($featured_item_list as $item){
		// print_r($item);
	$category = modules::run('category/get_where',$item->item_category)->result_array();
?>
		<div style="border:1px solid #DDD;margin:5px;padding:8px;">
			<div class="row" style="min-height:150px;">
				<div class="col-md-12">
					<img src="<?php if($item->item_image!=null){echo BASEURL.$item->item_image;}else{echo BASEURL."public/images/icon-no-image.png";}?>" alt="" width="140px;height:180px;"  />	
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<span style="font-size:16px;"><?php echo $item->item_name; ?></span>
				</div>
			</div>
			<div class="row" style="height:50px;">
				<div class="col-md-12">
					<span style="font-size:12px;"><?php echo $item->item_description; ?></span>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12" style="font-size:11px;">
					Tags: &nbsp;<span class="label label-primary featured-category"><?php echo $category[0]['category_name'];?></span>
				</div>
			</div>
		</div>
		
<?php } ?>

					       
					        <!--<div><img src="http://lorempixel.com/400/200/nature/IMAGE-04/"></div>
					        <div><img src="http://lorempixel.com/400/200/nature/IMAGE-05/"></div>
					        <div><img src="http://lorempixel.com/400/200/nature/IMAGE-06/"></div>
					        <div><img src="http://lorempixel.com/400/200/nature/IMAGE-07/"></div>
					        <div><img src="http://lorempixel.com/400/200/nature/IMAGE-08/"></div>
					        <div><img src="http://lorempixel.com/400/200/nature/IMAGE-09/"></div>
					        <div><img src="http://lorempixel.com/400/200/nature/IMAGE-10/"></div> -->
					    </div>
					  </div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
					  <div class="panel-heading">Latest Products</div>
					  <div class="panel-body">
						<?php
							foreach($featured_item_list as $item){
							$category = modules::run('category/get_where',$item->item_category)->result_array();
						?>
								<div style="border:1px solid #DDD;margin:5px;padding:8px;">
									<div class="row" style="min-height:150px;">
										<div class="col-md-12">
											<img src="<?php if($item->item_image!=null){echo BASEURL.$item->item_image;}else{echo BASEURL."public/images/icon-no-image.png";}?>" alt="" width="140px;height:180px;"  />	
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<span style="font-size:16px;"><?php echo $item->item_name; ?></span>
										</div>
									</div>
									<div class="row" style="height:50px;">
										<div class="col-md-12">
											<span style="font-size:12px;"><?php echo $item->item_description; ?></span>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12" style="font-size:11px;">
											Tags: &nbsp;<span class="label label-primary featured-category"><?php echo $category[0]['category_name'];?></span>
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
	








	<!-- <div class="row">
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
	</div> -->
	
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

<?php 

	//echo count(modules::run('tracking/uniqueTracking'));
	//echo count(modules::run('tracking/allHits'));

?>

<script>
$(document).ready(function(){
  	$(".slideshow").slick({
	    centerMode: true,
	  	centerPadding: '60px',
	  	slidesToShow: 3,
	  	responsive: [
		    {
		      breakpoint: 768,
		      settings: {
		        arrows: false,
		        centerMode: true,
		        centerPadding: '40px',
		        slidesToShow: 3
		      }
		    },
		    {
		      breakpoint: 480,
		      settings: {
		        arrows: false,
		        centerMode: true,
		        centerPadding: '40px',
		        slidesToShow: 1
		      }
		    }
		  ]
	});
});
</script>