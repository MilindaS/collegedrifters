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
							<input type="text" class="form-control" name="city" placeholder="City" style="width:100%;" >
							<input type="text" class="form-control" name="state" placeholder="State"   style="width:100%;">
							<input type="text" class="form-control" name="minPrice" placeholder="$ Min">
							<input type="text" class="form-control" name="maxPrice" placeholder="$ Max">
								<select class="form-control" name="category" >
													<option value="">Select a Category</option>
													<?php foreach($this->category_array as $category){?>
													<option value="<?php echo $category['category_id']?>"><?php echo $category['category_name']?></option>
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

								<p class="postedAdContent" style="min-height:50px;"><?php echo substr($item['item_description'],0,300);?>&nbsp;&nbsp;<a href="<?php echo BASEURL;?>marketplace/itemView/<?php echo $item['item_id'];?>" class="btn btn-warning btn-xs">Read More</a></p>

								<div class="row">
									<div class="col-md-12">
										Tags :
										<span class="label label-primary"><?php echo $item['category_name'];?></span>

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

<div class="row">
	<div class="col-md-12">
		<ul class="pagination pull-right">
			<?php for($i=1;$i<=$this->total_items;$i++){?>
				<li <?php if($this->page==$i){ echo 'class="active"';}?>><a href="<?php echo BASEURL;?>marketplace/listView/<?php echo $i?>" ><?php echo $i?></a></li>
			<?php }?>
		</ul>
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
