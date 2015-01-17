<div class="blendBackground"></div>

<div class="cdTopLinkBar">
		<div class="container-fluid">

			<div class="row">
				<div class="col-lg-4 col-md-3 col-xs-12 col-sm-3">
					<ul class="cdTopList list-unstyled">
						<a href="http://collegedrifters.com/" id="collegeDriftHomeLink"><li>College<span style="color:#B4100A">Drifters</span></li></a>
						<a data-toggle="modal" data-target=".bs-example-modal-lg" style="margin-right:0px;"><li>About</li></a>
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



<div class="container">


<div class="panel panel-primary cdLogin" >
	  <div class="panel-heading"><strong>Login</strong></div>
	  <div class="panel-body" >

		<form id="defaultForm" method="post" action="<?php echo BASEURL;?>login/doLogin">

			<div class="form-group ">
				<label class="control-label">Email</label>
				<input type="email" class="form-control"  name="email" placeholder="Sample@abc.edu">
			</div>
			<div class="form-group">
				<label class="control-label">Password</label>
				<input type="password" class="form-control" name="password" placeholder="Password">
			</div>
			<?php if($this->errorLogin!=null){?>
			<div class="alert alert-danger" role="alert">Email and Password are Incorrect !</div>
			<?php } ?>
			<button type="submit" class="btn btn-primary btn-block" name="signup" ><strong>Login</strong></button>
		</form>
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
<script type="text/javascript">
$(document).ready(function(){
$('input[name="email"]').focus(function(){
	$('.alert-danger').fadeOut();
});
$('input[name="password"]').focus(function(){
	$('.alert-danger').fadeOut();
});


	$('#defaultForm').bootstrapValidator({

        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            email: {
                validators: {
                    notEmpty: {
                        message: 'Email cannot be empty'
                    },
					emailAddress: {
                        message: 'The is not a valid email address'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'Password cannot be empty'
                    }
                }
            }
		}

	});




});

</script>

