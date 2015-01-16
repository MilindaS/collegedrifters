<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 3.2//EN">
<html lang="en">
  <head>
    <meta charset="utf-8">
	<title>College Drifters</title>

	<meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <link rel="stylesheet" href="<?php	echo BASEURL;?>public/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php	echo BASEURL;?>public/css/style.css">

	<?php

		if(isset($css_array)){

			foreach($css_array AS $item){
					echo '<link rel="stylesheet" href="'.BASEURL.'public/css/'.$item.'" type="text/css" />'."\n";
				}

		}

	?>

	<script src="<?php	echo BASEURL;?>public/js/jquery-1.11.0.min.js"></script>
	<script src="<?php	echo BASEURL;?>public/js/bootstrap.js"></script>

	<?php

	if(isset($js_array))
	{
		foreach($js_array AS $item){
				echo  '<script type="text/javascript"  src="'.BASEURL.'public/js/'.$item.'"  ></script>'."\n";

		}

	}

	?>
  </head>
  <body>
