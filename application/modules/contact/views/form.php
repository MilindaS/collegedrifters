<div class="content">
	<div class="container">

		<div class="row">
			<div class="col-md-12">
				<ol class="breadcrumb">
				  <li><a href="<?php echo BASEURL;?>marketplace/listView">Home</a></li>
				  <li class="active">Contact Us</li>
				</ol>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12">
				<h3 style="color:#53335E;padding:0px;margin:5px;font-weight:bold;">Contact Us</h3>
			</div>
		</div>

		<div class="row" >
			<div class="col-md-9">

				<div class="panel panel-default">
				  <div class="panel-body">

					<form class="form-horizontal" id="defaultForm" method="post" action="<?php echo BASEURL;?>contact/email">

						  <div class="form-group">

							<div class="col-sm-12">
							  <input type="text" class="form-control" name="name" placeholder="Name">
							</div>
						  </div>


								<div class="form-group">

							<div class="col-sm-12">
							  <input type="email" class="form-control" name="email" placeholder="Email">
							</div>
						  </div>


						  <div class="form-group">

							<div class="col-sm-12">
							  <textarea class="form-control" rows="10" placeholder="Comments" name="comments"></textarea>
							</div>
						  </div>





						  <div class="form-group">
							<div class="col-sm-12">
							  <button type="submit" class="btn btn-primary pull-right">Send Your Message</button>
							</div>
						  </div>


				</form>

					</div>
				</div>
			</div>


			<div class="col-md-3">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="well">
							<h4 style="font-weight:bold;color:#0F5959;">Contact Information</h4>
							<div class="row">
								<div class="col-md-12">
									<strong>Contact for</strong>
									<ul class="list-unstyled" style="margin-left:15px;">
										<li>Advertisement</li>
										<li>Sponsorship</li>
										<li>Questions</li>
										<li>Comments</li>
									</ul>
								</div>
							</div>
							<br />
							<div class="row">
								<div class="col-md-12">
									<strong>Email</strong>
									<p style="margin:5px;">collegedrifters@gmail.com</p>
								</div>
							</div>

							<br />
							<!-- <div class="row">
								<div class="col-md-12" >
									<strong style="display:none;">Call Us</strong>
									<p style="margin:5px;display:none;">7692161007 </p>
									<p><small>(college drifters support hotline for issues regarding stress, bullying, crime, financial aid concerns, etc)
									</small></p>
								</div>
							</div> -->
							<br />


							<div class="row">
								<div class="col-md-12">
									<strong>Follow us</strong>

									<ul class="list-unstyled" style="margin:5px;line-height:24px;">
										<li>&nbsp;&nbsp;<a href="https://www.facebook.com/collegedrifters" target="_blank"><img src="<?php echo BASEURL;?>public/images/socialMedia/facebook.png"  style="width:18px;" alt="" />&nbsp;&nbsp; Meet us @ Facebook</a></li>
										<li>&nbsp;&nbsp;<a href="https://twitter.com/collegedrifters" target="_blank"><img src="<?php echo BASEURL;?>public/images/socialMedia/twitter.png"  style="width:18px;" alt="" />&nbsp;&nbsp; Meet us @ Twitter</a></li>
										<li>&nbsp;&nbsp;<a href="http://instagram.com/collegedrifters" target="_blank"><img src="<?php echo BASEURL;?>public/images/socialMedia/instagram.png"  style="width:18px;" alt="" />&nbsp;&nbsp; Meet us @ Instagram</a></li>
									</ul>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>


		</div>


	</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
$('#defaultForm').bootstrapValidator({

        message: 'This is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: 'Name cannot be empty'
                    }
                }
            },
			email: {
                validators: {
                    notEmpty: {
                        message: 'Email cannot be empty'
                    }
                }
            },
			comments: {
                validators: {
                    notEmpty: {
                        message: 'Comment cannot be empty'
                    }
                }
            }
		}

	});
});
</script>