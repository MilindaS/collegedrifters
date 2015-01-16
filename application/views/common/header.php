<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 3.2//EN">
<html lang="en">
  <head>
    <meta charset="utf-8">
	<title>College Drifters</title>
	
	<meta name="description" content="">
    <meta name="viewport" content="width=device-width">
	
    <link rel="stylesheet" href="<?php	echo BASEURL;?>public/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php	echo BASEURL;?>public/css/style.css">
	<!--	First two css files calls in config file and other seperate in controller
    <link rel="stylesheet" href="<?php	//echo BASEURL;?>public/css/bootstrapValidator.css">
    <link rel="stylesheet" href="<?php	//echo BASEURL;?>public/css/datepicker.css">
	-->
	<?php
		
		if(isset($this->css_array)){
			
			foreach($this->css_array AS $item){
					echo '<link rel="stylesheet" href="'.BASEURL.'public/css/'.$item.'" type="text/css" />'."\n";
				}
				
		}	
		
	?>
	
	<script src="<?php	echo BASEURL;?>public/js/jquery-1.11.0.min.js"></script>
	<script src="<?php	echo BASEURL;?>public/js/bootstrap.js"></script>    
	
	<?php	
	
	if(isset($this->js_array))
	{	
		foreach($this->js_array AS $item){
				echo  '<script type="text/javascript"  src="'.BASEURL.'public/js/'.$item.'"  ></script>'."\n";
					
		}
				
	}	
		
	?>
	
	
    <!-- First two js files calls in config file and other seperate in controller
	<script src="<?php	//echo BASEURL;?>public/js/jquery-1.11.0.min.js"></script>
	<script src="<?php	//echo BASEURL;?>public/js/bootstrap.js"></script>    
    <script src="<?php	//echo BASEURL;?>public/js/bootstrapValidator.min.js"></script>
    <script src="<?php	//echo BASEURL;?>public/js/bootstrap-datepicker.js"></script>
	-->
	
  </head>
  <body>
