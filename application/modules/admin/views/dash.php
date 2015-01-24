<div class="row">
	<div class="col-md-3">
		<div class="panel panel-default admin-dash-snippet">
		  <div class="panel-body">
		  <div id="total-visitor-snippet-title">TOTAL VISITORS</div>
		   <div id="total-visitor-to-date">27/08/2014 15:23</div>
		   <div id="total-visitor-count"  class="odometer"><center>0</center></div>
		  </div>
		</div>
	</div>

	<div class="col-md-3">
		<div class="panel panel-default admin-dash-snippet">
		  <div class="panel-body">
		  	<div class="row">
		  		<div class="col-md-5 col-xs-5 col-sm-5" id="total-item-snippet-img">

		  				<span class="glyphicon glyphicon-gift"></span>

		  		</div>
				<div class="col-md-7 col-xs-7 col-sm-7" id="total-item-snippet-text">
					<div id="total-item-count"><?php echo $item_count;?></div>
					<div id="total-item-snippet-title">Items</div>
					<div id="total-item-sub-title">In collegedrifters</div>
				</div>
		  	</div>
		  </div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="panel panel-default admin-dash-snippet">
		  <div class="panel-body">
		  	<div class="row">
		  		<div class="col-md-5 col-xs-5 col-sm-5" id="total-user-snippet-img">

		  				<span class="glyphicon glyphicon-user"></span>

		  		</div>
				<div class="col-md-7 col-xs-7 col-sm-7" id="total-user-snippet-text">
					<div id="total-user-count"><?php echo $user_count;?></div>
					<div id="total-user-snippet-title">Members</div>
					<div id="total-user-sub-title">In collegedrifters</div>
				</div>
		  	</div>
		  </div>
		</div>
	</div>

	<div class="col-md-3">
		<div class="panel panel-default admin-dash-snippet" id="snippet-green">
		  <div class="panel-body">
		  	<div class="row">
		  		<div class="col-md-5 col-xs-5 col-sm-5" id="total-time-snippet-img">
		  				<span class="glyphicon glyphicon-time"></span>
		  		</div>
				<div class="col-md-7 col-xs-7 col-sm-7" id="total-time-snippet-text">
					<div id="time-sinppet">10:48</div>
				</div>
		  	</div>
		  	<div class="row"><div class="col-md-12 col-sm-12 col-xs-12">
		  		<div id="date-sinppet">In collegedrifters</div>
		  	</div></div>
		  </div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default admin-dash-snippet">
		  <div class="panel-body">
		  	<div class="row">
		  		<div class="col-md-12">

		  		<div class="admin-customize-snippet-title">
		  			Customize
		  		</div>
		  		<div class="admin-customize-snippet-sub-title">
		  			Here is some shortcuts to manage site
		  			</div>
		  	</div>
		  	</div>

		  	<div class="row" id="get-start-init">
		  		<div class="col-md-12">
		  			<div class="row">
		  				<div class="col-md-4 col-sm-12 col-xs-12">
		  					<div id="get-started">Get Started</div>
		  					<div class="btn btn-primary btn-lg" id="visit-marketplace-button">Visit Marketplace</div>
		  				</div>
		  				<div class="col-md-4 col-sm-12 col-xs-12">
		  					<div id="get-started-action">Actions</div>
		  					<div id="action-content">
		  						<ul class="list-group">
		  							<li><span class="glyphicon glyphicon-book"></span><a href="">
		  								 Edit Pages
		  							</a></li>
		  							<li><span class="glyphicon glyphicon-user"></span><a href="">
		  								 Manage Users
		  							</a></li>
		  							<li><span class="glyphicon glyphicon-heart-empty"></span><a href="">
		  								 Edit Social Media Links
		  							</a></li>
		  						</ul>
		  					</div>
		  				</div>
		  				<div class="col-md-4 col-sm-12 col-xs-12"></div>
		  			</div>
		  		</div>
		  	</div>

		</div>
	</div>
</div>
</div>












<script>

setTimeout(function(){
    $('.odometer').html(162);
  }, 500);

$(document).ready(function(){

	startTime();


	var mydate=new Date()
    var year=mydate.getYear()

    if (year < 1000)
        year+=1900

    var day=mydate.getDay()
    var month=mydate.getMonth()
    var daym=mydate.getDate()

    if (daym<10)
        daym="0"+daym

    var dayarray=new Array("Sunday","Monday","Tuesday","Wednesday","Thursday",
                            "Friday","Saturday")
    var montharray=new Array("January","February","March","April","May","June",
                            "July","August","September","October","November","December")
    $('#date-sinppet').html(dayarray[day]+", "+montharray[month]+" "+daym+", "+year);
});

function startTime() {
    var today=new Date();
    var h=today.getHours();
    var m=today.getMinutes();
    var s=today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('time-sinppet').innerHTML = h+":"+m;
    var t = setTimeout(function(){startTime()},500);
}

function checkTime(i) {
    if (i<10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}
</script>