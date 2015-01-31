<?php
modules::run('tracking/track');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 3.2//EN">
<html lang="en">
  <head>
    <meta charset="utf-8">
	<title>College Drifters</title>
	<meta name="description" content="The Mission for College Drifters is to provide college students with a direct platform to buy and sell items to each other. By utilizing this marketplace students can inform others of events, notes, books, and tickets." />
    <meta name="keywords" content="collegedrifters,collegedrifters marketplace,online marketplace,buy,sell,events, notes, books, tickets" />
	
    <meta name="viewport" content="width=device-width">
	<?php
		if(isset($meta_array) && !empty($meta_array)){
			foreach($meta_array AS $item){
				echo '<meta name="'.$item['name'].'" content="'.$item['content'].'" />';
				}
		}
	?>
	<?php
		if(isset($meta_og_array) && !empty($meta_og_array)){
			foreach($meta_og_array AS $item){
				echo '<meta property="'.$item['property'].'" content="'.$item['content'].'" />';
				}
		}
	?>

    <link rel="stylesheet" href="<?php	echo BASEURL;?>public/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php	echo BASEURL;?>public/css/style.css">
	<link rel="stylesheet" href="<?php	echo BASEURL;?>public/css/pill.css">

	<?php

		if(isset($css_array) && !empty($css_array)){

			foreach($css_array AS $item){
					echo '<link rel="stylesheet" href="'.BASEURL.'public/css/'.$item.'" type="text/css" />'."\n";
				}

		}

	?>

	<script src="<?php	echo BASEURL;?>public/js/jquery-1.11.0.min.js"></script>
	<script src="<?php	echo BASEURL;?>public/js/bootstrap.js"></script>
	<script src="<?php	echo BASEURL;?>public/js/jquery.scrollUp.min.js"></script>

	<?php

	if(isset($js_array) && !empty($js_array))
	{
		foreach($js_array AS $item){
				echo  '<script type="text/javascript"  src="'.BASEURL.'public/js/'.$item.'"  ></script>'."\n";

		}

	}

	?>
  </head>
  <body>


<script>
	$(function(){
  $.scrollUp();
});
</script>