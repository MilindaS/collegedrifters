<?

session_start();

$go = $_SESSION['facebookTime'];
	

$instagram = $_SESSION['instagram'];
echo '<center><h1>Facebook</h1></center>';
echo "<a href='http://collegedrifters.com/loginout.php'><h1>Login Out</h1></a>";
echo $go;
echo '<br> <center><h1>Instagram</h1></center><br>';
echo $instagram;
echo '<br> <br> <br><center><h1>Twitter</h1></center>';
?>

