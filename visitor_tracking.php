<?php
require_once('visitors_connections.php');//the file with connection code and functions
//get the required data

$visitor_ip = GetHostByName($_SERVER['REMOTE_ADDR']);
$visitor_browser = getBrowserType();
$visitor_hour = date("h");
$visitor_minute = date("i");
$visitor_day = date("d");
$visitor_month = date("m");
$visitor_year = date("Y");
$visitor_refferer = isset($_SERVER['HTTP_REFERER']) ? GetHostByName($_SERVER['HTTP_REFERER']) : null;


$visited_page = selfURL();

//write the required data to database
mysql_select_db($database_visitors, $visitors);
$sql = "INSERT INTO siteviewslog (visitor_ip, visitor_browser, visitor_hour,
 visitor_minute, visitor_date, visitor_day, visitor_month, visitor_year, 
 visitor_refferer, visitor_page) VALUES ('$visitor_ip', '$visitor_browser', 
 '$visitor_hour', '$visitor_minute', null, '$visitor_day', '$visitor_month', 
 '$visitor_year', '$visitor_refferer', '$visited_page')";
$result = mysql_query($sql) or trigger_error(mysql_error(),E_USER_ERROR);?>
