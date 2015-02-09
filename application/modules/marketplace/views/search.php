<div id="advancedSearchBar" >
<div class="container">

	<div class="row">
		<div class="col-md-12">

					<div class="navbar-header">
					  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#searchContetn" >
						<span class="sr-only">Toggle navigation</span>
						<span class="glyphicon glyphicon-search" ></span>
					  </button>
					  <span class="navbar-brand hidden-md" >
						Advanced Search
					  </span>
					</div>

					<div class="collapse navbar-collapse" id="searchContetn" >
					  	<form class="navbar-form navbar-left" role="search" method="POST" action="<?php echo BASEURL;?>marketplace/search">
						  <div class="form-group">
							<input type="text" class="form-control" name="city" placeholder="City"   style="width:100%;" value="<?php if(isset($_POST['city'])){echo $_POST['city'];}?>">
							<input type="text" class="form-control" name="state" placeholder="State"  value="<?php if(isset($_POST['state'])){echo $_POST['state'];}?>" style="width:100%;">
							<input type="text" class="form-control" name="zip" placeholder="Zip"   style="width:100%;" value="<?php if(isset($_POST['zip'])){echo $_POST['zip'];}?>">
							<input type="text" class="form-control" name="school" placeholder="School"   style="width:100%;" value="<?php if(isset($_POST['school'])){echo $_POST['school'];}?>">
							<input type="text" class="form-control" name="minPrice" placeholder="$ Min" value="<?php if(isset($_POST['minPrice'])){echo $_POST['minPrice'];}?>">
							<input type="text" class="form-control" name="maxPrice" placeholder="$ Max" value="<?php if(isset($_POST['maxPrice'])){echo $_POST['maxPrice'];}?>">
								<select class="form-control" name="category" >
													<option value="">Select a Category</option>
													<?php foreach($this->category_array as $category){?>
													<option value="<?php echo $category['category_id'];?>" <?php if(isset($_POST['category']) AND ($_POST['category']==$category['category_id']) ){echo 'selected';}?>><?php echo $category['category_name']?></option>
													<?php }?>
								</select>
						  </div>
						  <button type="submit" class="btn btn-default" ><span class="glyphicon glyphicon-search"></span>&nbsp;Search</button>
						</form>
					</div><!-- /.navbar-collapse -->



		</div>

	</div>

</div>
</div>

<div class="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-xs-12">

				<?php foreach($this->item_list as $item){?>
				<div class="row">
					<div class="col-md-12">
					<div class="panel panel-default">
					  <div class="panel-body">
						<div class="row">
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
										<a href="<?php echo BASEURL;?>marketplace/itemView/<?php echo $item['item_id'];?>" class="postedAdName"><?php echo $item['item_name'];?></a> <span class="label label-primary postedAdPrice" >$ <?php echo $item['item_price'];?></span>
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
<a href="<?php echo BASEURL;?>marketplace/itemView/<?php echo $item['item_id'];?>" class="btn btn-warning btn-sm pull-right">Read More</a>
										<!-- <div class="btn btn-sm pull-right fb-share-button" data-href="<?php //echo BASEURL;?>marketplace/itemView/<?php echo $item['item_id'];?>" data-layout="button"></div> -->
										<div class="fb-share-button btn btn-sm pull-right" data-href="<?php echo BASEURL;?>marketplace/itemView/<?php echo $item['item_id'];?>" data-layout="button_count"></div>
										<a href="https://twitter.com/share" class="twitter-share-button pull-right" data-url="<?php echo BASEURL;?>marketplace/itemView/<?php echo $item['item_id'];?>" >Tweet</a>
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






	</div>
</div>


</div>
</div>



















<script type="text/javascript">

    $(window).load(function(){
     $('#slider').flexslider({
        animation: "fade",
        controlNav: false,
        animationLoop: true,
        slideshow: true,
		slideshowSpeed: 3000,

        sync: "#carousel",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=626469300814228&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

<script>
// (function(d, s, id) {
//   var js, fjs = d.getElementsByTagName(s)[0];
//   if (d.getElementById(id)) return;
//   js = d.createElement(s); js.id = id;
//   js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
//   fjs.parentNode.insertBefore(js, fjs);
// }(document, 'script', 'facebook-jssdk'));

</script>


<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>