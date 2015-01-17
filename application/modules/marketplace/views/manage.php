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
								<form action="<?php echo BASEURL;?>marketplace/removeAd/<?php echo $item['item_id'];?>" method="POST" onsubmit="return confirm('Do you really want to delete this ad ?');">
								<div class="row">
									<div class="col-md-12">
										<button type="submit" class="btn btn-default pull-right" style="margin-left:10px;"><span class="glyphicon glyphicon-trash" ></span>&nbsp;&nbsp;Delete Ad</button>
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

									</div>
								</div>
								</form>
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
