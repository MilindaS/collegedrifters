<!--<div class="blendBackground"></div>-->

<?php echo modules::run('home/cdTopLinkBar'); ?>



<div class="container">


<div class="panel panel-primary cdLogin" >
	  <div class="panel-heading"><strong>Recover Password</strong></div>
	  <div class="panel-body" >

		<form id="defaultForm" method="post" action="<?php echo BASEURL;?>login/recoverPasswordSM">

			<div class="form-group ">
				<label class="control-label">Email</label>
				<input type="email" class="form-control"  name="email" placeholder="">
			</div>
			<?php if($this->errorLogin!=null){?>
			<div class="alert alert-danger" role="alert">This email is not belongs to collegedrifters !</div>
			<?php } ?>
			<div class="form-group">
			<button type="submit" class="btn btn-primary btn-block" name="signup" ><strong>Submit</strong></button>
			</div>
			<div class="form-group">
				<b style="font-size:12px;margin-left:50px;float:left;">
				Have an account? <a href="<?php echo BASEURL;?>login/loginView">Sign</a> in or <a href="<?php echo BASEURL;?>login/registerView">Sign up</a>
				</b>
			</div>
		</form>
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
            }
		}

	});




});

</script>

