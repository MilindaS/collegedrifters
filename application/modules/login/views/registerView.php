<!--<div class="blendBackground"></div>-->

<?php echo modules::run('home/cdTopLinkBar'); ?>


<div class="container">
	<div class="panel panel-primary cdLogin reg" >
  <div class="panel-heading" ><strong>Registration</strong></div>
  <div class="panel-body" >
	<form id="defaultForm" method="post" action="<?php echo BASEURL;?>login/doRegister">
	
	<div class="form-group">
    <label class="control-label">First Name</label>
    <input type="text" class="form-control" name="firstName" placeholder="Enter First Name">
  </div>
  <div class="form-group">
    <label class="control-label">Last Name</label>
    <input type="text" class="form-control" name="lastName" placeholder="Enter Last Name">
  </div>
  <div class="form-group">
    <label class="control-label">Email</label>
    <input type="email" class="form-control" name="email" placeholder="Enter Email : Sample@abc.edu">
  </div>
  <div class="form-group">
    <label class="control-label">Date of Birth</label>		
		<!--<input type="text" class="form-control" id="dob" name="dob" placeholder="Enter Date of Birth : MM-DD-YYYY">-->
		<div class="row">
		<div class="col-md-12">
		<select class="form-control pull-left" name="month">
			<option value="">Month</option>
			<?php 
				$months = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
				$x=1;
				foreach ($months as $month){
			?>
			<option value="<?php echo $x;?>"><?php echo $month;?></option>
			<?php $x++; }?>
		</select>
		<select class="form-control pull-left"  name="date">
			<option value="">Date</option>
			<?php for ($i=1;$i<32;$i++){?>
			<option value="<?php echo $i;?>"><?php echo $i;?></option>
			<?php }?>
		</select>
		<select class="form-control pull-left" name="year">
			<option value="">Year</option>
			<?php for ($i=2014;$i>1800;$i--){?>
				<option value="<?php echo $i;?>"><?php echo $i;?></option>
			<?php }?>
		</select>
		</div>
		</div>
  </div>
  <div class="form-group">
    <label class="control-label">Mobile Number (Optional)</label>
    <input type="text" class="form-control" id="mobileNo" name="mobileNo" placeholder="Enter Mobile Number">
  </div>
  <div class="form-group">
    <label class="control-label" >City </label>
    <input type="text" class="form-control" name="city" placeholder="Enter City ">
  </div>
   <div class="form-group">
    <label class="control-label" >State</label>
    <input type="text" class="form-control" name="state" placeholder="Enter State">
  </div>
  <div class="form-group">
    <label class="control-label" >Zip Code</label>
    <input type="text" class="form-control" name="zip" placeholder="Enter Zip Code">
  </div>
  <div class="form-group">
    <label class="control-label">School Name</label>
    <input type="text" class="form-control" id="school" name="school" placeholder="Enter School Name">		
  </div>
  <div class="form-group">
    <label class="control-label">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Enter 6 character password">
  </div>
  <div class="form-group">
    <label class="control-label">Re type Password</label>
    <input type="password" class="form-control" name="repassword" placeholder="Re enter password">
  </div>
  
  
  <div class="form-group">
    <label class="control-label">Notification Alerts</label>
		<div class="checkbox" style='margin-left:10px;font-size:13px;'>
			<label>
				<input type="checkbox" name="notification[]" value="text" /> Receive via Text Message
            </label>
        </div>
        <div class="checkbox" style='margin-left:10px;font-size:13px;'>
			<label>
				<input type="checkbox" name="notification[]" value="email" /> Receive via Email
			</label>
        </div>
  </div>
	<hr />
	 <div class="form-group">
		<label class="control-label">Terms and Conditions</label>
		<div class="checkbox" style='margin-left:10px;font-size:13px;'>
			<label>
				<input type="checkbox" name="terms" value="terms" /> I Agree to the Terms and condtions <a data-toggle="modal" data-target="#useragreement">(Read)</a>
			</label>
        </div>
  </div>
  <div class="form-group">
  <button type="submit" class="btn btn-primary btn-block" style="float:right;"><strong>Register</strong></button>
  </div>

  <div class="form-group" >
  
	<b style="font-size:12px;float:left;margin-top:10px;width:100%;">
	<center>Already on CollegeDrifters ? <a href="<?php echo BASEURL;?>login/loginView">Sign in</a></center>
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






















<div class="modal fade bs-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="useragreement" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="padding:10px;">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>	
      <img src="<?php echo BASEURL;?>public/images/logo.png" alt="" style="width:100%;max-width:200px;" />
	 
	  <p style="padding:0px 20px;">
	   <div style="font-size:20px;font-weight:bold;padding:10px 0px"> Terms and conditions</div>
		This Privacy Policy governs the manner in which College Drifters, LLC collects, uses, maintains and 
		discloses information collected from users (each, a "User") of the www.collegedrifters.com website ("Site"). 
		This privacy policy applies to the Site and all products and services offered by College Drifters, LLC.
	<br />
	<br />
	<strong>Personal identification information</strong>
	<br />
	We may collect personal identification information from Users in a variety of ways, including, but not limited to, 
	when Users visit our site, register on the sitefill out a formrespond to a survey and in connection with other activities, 
	services, features or resources we make available on our Site. Users may be asked for, as appropriate, name, email address, 
	mailing address, phone number, credit card information,
	<br />
	Users may, however, visit our Site anonymously.
	<br />
	We will collect personal identification information from Users only if they voluntarily submit such information to us. 
	Users can always refuse to supply personally identification information, except that it may prevent them from engaging in certain Site related activities.
	<br />
	<br />
	<strong>
		Non-personal identification information
	</strong>
	<br />
	We may collect non-personal identification information about Users whenever they interact with our Site. 
	Non-personal identification information may include the browser name, the type of computer and technical information about 
	Users means of connection to our Site, such as the operating system and the Internet service providers utilized and other similar information.
	<br />
	<br />
	<strong>
		Web browser cookies
	</strong>
	<br />
	Our Site may use "cookies" to enhance User experience. User's web browser places cookies on their hard drive for record-keeping purposes 
	and sometimes to track information about them. User may choose to set their web browser to refuse cookies, or to alert you when cookies are 
	being sent. If they do so, note that some parts of the Site may not function properly.
	<br />
	<br />
	<strong>
		How we use collected information
	</strong>
	<br />	
	College Drifters, LLC collects and uses Users personal information for the following purposes:
	<br />
    <em>To improve customer service</em>
	<br />
    Your information helps us to more effectively respond to your customer service requests and support needs.
	<br />
    <em>To personalize user experience</em>
	<br />
    We may use information in the aggregate to understand how our Users as a group use the services and resources provided on our Site.
	<br />
    <em>To improve our Site</em>
	<br />
    We continually strive to improve our website offerings based on the information and feedback we receive from you.
	<br />
    <em>To process transactions</em>
	<br />
    We may use the information Users provide about themselves when placing an order only to provide service to that order. 
	We do not share this information with outside parties except to the extent necessary to provide the service.
	<br />
    <em>To administer a content, promotion, survey or other Site feature</em>
	<br />
    To send Users information they agreed to receive about topics we think will be of interest to them.
	<br />
    <em>To send periodic emails</em>
	<br />
    The email address Users provide for order processing, will only be used to send them information and 
	updates pertaining to their order. It may also be used to respond to their inquiries, and/or other requests or questions. 
	If User decides to opt-in to our mailing list, they will receive emails that may include company news, updates, related product or 
	service information, etc. If at any time the User would like to unsubscribe from receiving future emails, we include detailed unsubscribe 
	instructions at the bottom of each email or User may contact us via our Site.
	<br />
	<br />
	<strong>
		How we protect your information	
	</strong>
	<br />
	We adopt appropriate data collection, storage and processing practices and security measures to protect against unauthorized access, 
	alteration, disclosure or destruction of your personal information, username, password, transaction information and data stored on our Site.
	<br />
	Our Site is also in compliance with PCI vulnerability standards in order to create as secure of an environment as possible for Users.
	<br />
	<br />
	<strong>
		Third party websites
	</strong>
	<br />
	Users may find advertising or other content on our Site that link to the sites and services of our partners, suppliers, advertisers, sponsors,
	licensors and other third parties. We do not control the content or links that appear on these sites and are not responsible for the practices employed by 
	websites linked to or from our Site. In addition, these sites or services, including their content and links, may be constantly changing. These sites and 
	services may have their own privacy policies and customer service policies. Browsing and interaction on any other website, including websites which have a
	link to our Site, is subject to that website\'s own terms and policies.
	<br />
	<br />
	<strong>
		Advertising
	</strong>
	<br />
	Ads appearing on our site may be delivered to Users by advertising partners, who may set cookies. 
	These cookies allow the ad server to recognize your computer each time they send you an online advertisement 
	to compile non personal identification information about you or others who use your computer. This information allows ad networks to, 
	among other things, deliver targeted advertisements that they believe will be of most interest to you. This privacy policy does not cover the use of
	cookies by any advertisers.
	<br />
	<br />
	<strong>
		Google Adsense
	</strong>
	<br />
	Some of the ads may be served by Google. Google\'s use of the DART cookie enables it to serve ads to Users based on their visit to our 
	Site and other sites on the Internet. DART uses "non personally identifiable information" and does NOT track personal information about you,
	such as your name, email address, physical address, etc. You may opt out of the use of the DART cookie by visiting the 
	Google ad and content network privacy policy at http://www.google.com/privacy_ads.html
	<br />
	<br />
	<strong>
		Compliance with children\'s online privacy protection act
	</strong>
	<br />
	Protecting the privacy of the very young is especially important. For that reason, we never collect or maintain information at our Site
	from those we actually know are under 13, and no part of our website is structured to attract anyone under 13.
	<br />
	<br />
	<strong>
		Changes to this privacy policy
	</strong>
	<br />
		College Drifters, LLC has the discretion to update this privacy policy at any time. When we do, revise the updated date at the bottom of this page,. 
		We encourage Users to frequently check this page for any changes to stay informed about how we are helping to protect the personal information we collect. 
		You acknowledge and agree that it is your responsibility to review this privacy policy periodically and become aware of modifications.
		<br />
		<br />
		<strong>
			Your acceptance of these terms
		</strong>
		<br />
			By using this Site, you signify your acceptance of this policy and terms of service.
			If you do not agree to this policy, please do not use our Site. Your continued use of the Site following the posting of changes to this policy will be deemed 
			your acceptance of those changes.
		<br />
		<br />
		<strong>
			Contacting us
		</strong>
		<br />
			If you have any questions about this Privacy Policy, the practices of this site, or your dealings with this site, please contact us at:
		<br />
		College Drifters, LLC
		<br />
		<a href="http://www.collegedrifters.com">www.collegedrifters.com</a>
		<br />
			collegedrifters@gmail.com
		<br />
		
	  </p>
    </div>
  </div>
</div>	






<script type="text/javascript">
$(document).ready(function(){

	$('#defaultForm').bootstrapValidator({
	
        message: '',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
			firstName: {
                validators: {
                    notEmpty: {
                        message: 'First Name cannot be empty'
                    }
                }
            },
			dob: {
                validators: {
					notEmpty: {
                        message: 'Date of birth cannot be empty'
                    },
                   date: {
                        format: 'MM-DD-YYYY',
                        message: 'The value is not a valid date : MM-DD-YYYY'
                    }
                }
            },
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
			mobileNo:{
				validators: {
                    digits: {
                        message: 'The value can contain only digits'
                    }
                }
			},
			repassword: {
                validators: {
                    identical: {
                        field: 'password',
                        message: 'The password and its confirm are not the same'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'Password cannot be empty'
                    },
					stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The password must be more than 6 characters'
                    },
					identical: {
                        field: 'repassword',
                        message: 'The password and its confirm are not the same'
                    }
                }
            },
			
			school: {
                validators: {
                    notEmpty: {
                        message: 'School cannot be empty'
                    }
                }
            },
			city: {
                validators: {
                    notEmpty: {
                        message: 'City or State cannot be empty'
                    }
                }
            },
			state: {
                validators: {
                    notEmpty: {
                        message: 'State cannot be empty'
                    }
                }
            },
            zip: {
                validators: {
                    notEmpty: {
                        message: 'Zip code cannot be empty'
                    }
                }
            },
			date: {
				threshold: 2,
                validators: {
                    notEmpty: {
                        message: ''
                    }
                }
            },month: {
				threshold: 3,
                validators: {
                    notEmpty: {
                        message: ''
                    }
                }
            },
			year: {
			threshold: 4,
                validators: {
                    notEmpty: {
                        message: ''
                    }
                }
            },
			terms: {
                validators: {
                    notEmpty: {
                        message: 'You have to agree to the conditions to proceed'
                    }
                }
            },
		}
		
	});
	
	
	
});

</script>

