<div id="advancedSearchBar" >
<div class="container">

	<div class="row">
		<div class="col-md-12" style="border:1px solid #DDD;">

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
							<input type="text" class="form-control" name="city" placeholder="City" style="width:100%;" >
							<input type="text" class="form-control" name="state" placeholder="State"   style="width:100%;">
							<input type="text" class="form-control" name="zip" placeholder="Zip"   style="width:100%;">
							<input type="text" class="form-control" name="school" placeholder="School"   style="width:100%;">
							<input type="text" class="form-control" name="minPrice" placeholder="$ Min">
							<input type="text" class="form-control" name="maxPrice" placeholder="$ Max">
								<select class="form-control" name="category" >
													<option value="">Select a Category</option>
													<?php foreach($category_array as $category){?>
													<option value="<?php echo $category->category_id;?>"><?php echo $category->category_name;?></option>
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
		<div class="col-md-12">
			<?php $banner = modules::run('banner/get_where',1)->result_array();
			$image_banner = is_file($banner[0]['banner_img']) ? $banner[0]['banner_img']:'public/images/graphic-design-banner.jpg';

			?>
			<center><a href="<?php echo $banner[0]['banner_url'];?>"><img src="<?php echo BASEURL.$image_banner;?>" alt="" style="width:98%;max-width:600px;padding:10px;"></a></center>


			<!-- //print_r() -->
		</div>
	</div>




		<div class="row">
			<div class="col-md-12 col-xs-12">
			<div class="panel panel-default">
<div class="panel-body">
<div class="admin-body-page-name">Featured Items</div>
<div class="row hidden-xs hidden-sm" style="padding:5px;">
<?php
foreach($featured_item_list as $item){
$category = modules::run('category/get_where',$item->item_category)->result_array();
	?>
		<div class="col-md-3" >
		<a href="<?php echo BASEURL;?>marketplace/itemView/<?php echo $item->item_id;?>" class="featured-product-a">
			<span class="label label-primary featured-category"><?php echo $category[0]['category_name'];?></span>
			<span class="label label-primary postedAdPrice featured-price">$ <?php echo $item->item_price;?></span>
			<img src="<?php if($item->item_image!=null){echo BASEURL.$item->item_image;}else{echo BASEURL."public/images/icon-no-image.png";}?>" alt="" width="100%"  />
		</a>
		</div>
<?php } ?>
</div>

<?php
if(empty($featured_item_list)){
	echo '<p class="bg-warning no-featured-item" >No Featured items yet</p>';

}
$counter = 0;
$limit_ct = 2;

foreach($featured_item_list as $item){
	$category = modules::run('category/get_where',$item->item_category)->result_array();
	if($counter%$limit_ct==0){ ?>
	<div class="row hidden-lg hidden-md">
<?php }
$counter ++;
?>

			<div class="col-sm-6 col-xs-6" style="padding:5px;">
			<a href="<?php echo BASEURL;?>marketplace/itemView/<?php echo $item->item_id;?>" class="featured-product-a">
				<span class="label label-primary featured-category"><?php echo $category[0]['category_name'];?></span>
				<span class="label label-primary postedAdPrice featured-price">$ <?php echo $item->item_price;?></span>
				<img src="<?php if($item->item_image!=null){echo BASEURL.$item->item_image;}else{echo BASEURL."public/images/icon-no-image.png";}?>" alt="" width="100%"  />
			</a>
			</div>
<?php if($counter%$limit_ct==0){ ?>
	</div>
<?php }} ?>


<?php if(!empty($featured_item_list)){?>
<div class="row">
	<div class="col-md-12 col-xs-12 col-sm-12" >
		<div class="pull-right" style="margin-right:10px;">
			<a href="" class="btn btn-default" style="display:none;">See More <span class="glyphicon glyphicon-chevron-right"></span></a>
		</div>
	</div>
</div>
<?php
}
?>
</div>
</div>





<div class="panel panel-default">
<div class="panel-body">
<div class="admin-body-page-name">All Products</div>
				<?php foreach($item_list as $item){
						$user = modules::run('user/get_where',$item->item_user_id)->result_array();
						$category = modules::run('category/get_where',$item->item_category)->result_array();
						//print_r($category );
						//print_r(($user));
				?>

				<div class="row">
					<div class="col-md-12">
					<div class="panel panel-default">
					  <div class="panel-body">
						<div class="row">
							<?php if($item->item_image!=null){?>
							<div class="col-md-3">
								<img src="<?php if($item->item_image!=null){echo BASEURL.$item->item_image;}else{echo BASEURL."public/images/icon-no-image.png";}?>" alt="" width="100%"  />
							</div>
							<div class="col-md-9">
							<?php } else{?>
							<div class="col-md-12">
							<?php }?>
								<div class="row">
									<div class="col-md-12">
										<a href="<?php echo BASEURL;?>marketplace/itemView/<?php echo $item->item_id;?>" class="postedAdName"><?php echo $item->item_name;?></a> <span class="label label-primary postedAdPrice" >$ <?php echo $item->item_price;?></span>
									</div>
								</div>

								<div class="row">
									<div class="col-md-12">
										<div class="postedAdAuthor"> <span class="glyphicon glyphicon-user" ></span>&nbsp; By <a href="<?php echo BASEURL;?>profile/view/<?php echo $user[0]['user_id'];?>"><?php echo $user[0]['user_firstName'];?></a> | On <?php echo   date("Y-M-d   g:i A", strtotime($item->item_created_date)); ;?> </div>
									</div>
								</div>

								<p class="postedAdContent" style="min-height:50px;"><?php echo substr($item->item_description,0,300);?>&nbsp;&nbsp;</p>

								<div class="row">
									<div class="col-md-12">
										Tags :
										<span class="label label-primary"><?php echo $category[0]['category_name'];?></span>
<a href="<?php echo BASEURL;?>marketplace/itemView/<?php echo $item->item_id;?>" class="btn btn-warning btn-sm pull-right">Read More</a>
										<!-- <div class="btn btn-sm pull-right fb-share-button" data-href="<?php //echo BASEURL;?>marketplace/itemView/<?php echo $item->item_id;?>" data-layout="button"></div> -->
									</div>
								</div>
								<div class="row" style="border-top:1px solid #DDD;margin-top:5px;">
									<div class="col-md-12">
										<div class="fb-share-button btn btn-sm pull-left" data-href="<?php echo BASEURL;?>marketplace/itemView/<?php echo $item->item_id;?>" data-layout="button_count"></div>
										<div style="float:left;margin-top:5px;">
											<a href="https://twitter.com/share" data-url="<?php echo BASEURL;?>marketplace/itemView/<?php echo $item->item_id;?>" >Tweet</a>
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




</div>
<div class="row">
	<div class="col-md-12">
		<ul class="pagination pull-right" style="margin:15px;">
			<?php for($i=1;$i<=$iteratinons;$i++){?>
                <li <?php if($page==$i){ echo 'class="active"';}?>><a href="<?php echo BASEURL;?>marketplace/listView/<?php echo $i?>" ><?php echo $i?></a></li>
            <?php }?>
		</ul>
	</div>
</div>


	</div>
	</div>
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