


<div class="content">
	<div class="container">

		<div class="row">
			<div class="col-md-12">
				<ol class="breadcrumb">
				  <li><a href="<?php echo BASEURL;?>marketplace/listView">Home</a></li>
				  <li class="active">Item View</li>
				</ol>
			</div>
		</div>

		<div class="row">






			<div class="col-md-12 col-xs-12">


				<div class="row">
					<div class="col-md-12">
					<div class="panel panel-default">
					  <div class="panel-body">
						<div class="row">
						<?php if($this->item['item_image']!=null){?>
							<div class="col-md-3">

								<img src="<?php if($this->item['item_image']!=null){echo BASEURL.$this->item['item_image'];}else{echo BASEURL."public/images/icon-no-image.png";}?>" alt="" width="100%"  />
							</div>
							<div class="col-md-9">
							<?php } else{?>
							<div class="col-md-12">
							<?php }?>
								<div class="row">
									<div class="col-md-12">
										<a href="<?php echo BASEURL;?>marketplace/itemView/<?php echo $this->item['item_id'];?>" class="postedAdName"><?php echo $this->item['item_name'];?></a> <span class="label label-primary postedAdPrice" >$ <?php echo $this->item['item_price'];?></span>
									</div>
								</div>

								<div class="row">
									<div class="col-md-12">
										<div class="postedAdAuthor"> <span class="glyphicon glyphicon-user" ></span>&nbsp; By <?php echo $this->item['user_firstName'];?> | On <?php echo   date("Y-M-d   g:i A", strtotime($this->item['item_created_date'])); ;?> </div>
									</div>
								</div>

								<p class="postedAdContent"><?php echo $this->item['item_description'];?></p>

								<div class="row">
									<div class="col-md-12">
										Tags :
										<span class="label label-primary"><?php echo $this->item['category_name'];?></span>

									</div>
								</div>

							</div>
							</div>
							<br />
							<?php if($this->session->userdata('logged_in')){?>
							<div class="row">
								<div class="col-md-3">

								</div>
								<div class="col-md-9">
									<a type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#myEmailModal" >Email</a>
									<!--<a type="button" class="btn btn-info pull-right" style="margin-right:5px;" data-toggle="modal" data-target="#myTextModal" >Text Message</a>-->
									<span class="pull-right" style="margin-right:10px;margin-top:5px;"><strong>Request Item via</strong></span>

								</div>
							</div>
<?php } ?>

						</div>
						</div>
					</div>
				</div>







	</div>
</div>





</div>
</div>






<div class="modal fade" id="myEmailModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
	<form id="defaultForm2" method="post" action="<?php echo BASEURL;?>messege/email">
      <div class="modal-header bg-primary" style="padding:10px 20px;border-radius:5px 5px 0px 0px;">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Reply Client Via Email</h4>
      </div>
      <div class="modal-body" >

			  <input type="hidden" name="adholder_email" value="<?php echo $this->item['user_email'];?>" />
			  <input type="hidden" name="adholder_name" value="<?php echo $this->item['user_firstName'];?>" />
			  <input type="hidden" name="request_item_id" value="<?php echo $this->item['item_id'];?>" />
			  <input type="hidden" name="request_item_type" value="<?php echo $this->item['item_type'];?>" />
			  <div class="form-group">
				<div class="row">
					<div class="col-md-12">
						<textarea rows="8" class="form-control" placeholder="Leave a Messege" name="message"></textarea>
					</div>
				</div>
			  </div>




      </div>
      <div class="modal-footer" style="padding:10px;">
        <button type="button" class="btn btn-default" data-dismiss="modal"><strong>Close</strong></button>
        <button type="submit" class="btn btn-success"><strong>Send Message</strong></button>
      </div>
	  </form>
    </div>
  </div>
</div>


<div class="modal fade" id="myTextModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
	<form id="defaultForm" method="post" action="<?php echo BASEURL;?>messege/text">
      <div class="modal-header bg-primary" style="padding:10px 20px;border-radius:5px 5px 0px 0px;">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Reply Client Via Text Message</h4>
      </div>
      <div class="modal-body" >




			  <div class="form-group">
				<div class="row">
					<div class="col-md-12">
						<textarea rows="8" class="form-control" placeholder="Leave a Messege" name="message"></textarea>
					</div>
				</div>
			  </div>




      </div>
      <div class="modal-footer" style="padding:10px;">
        <button type="button" class="btn btn-default" data-dismiss="modal"><strong>Close</strong></button>
        <button type="submit" class="btn btn-primary"  name="signup"><strong>Send Message</strong></button>
      </div>
	  </form>
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



	$(document).ready(function(){

	$('#defaultForm').bootstrapValidator({

        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            message: {
                validators: {
                    notEmpty: {
                        message: 'Message cannot be empty'
                    }
                }
            }
		}

	});

	$('#defaultForm2').bootstrapValidator({

        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            message: {
                validators: {
                    notEmpty: {
                        message: 'Message cannot be empty'
                    }
                }
            }
		}

	});


});
</script>
