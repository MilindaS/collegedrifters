<?php
$session_data = $this->session->userdata('logged_in');
$user_id = $session_data['id'];

$path = "public/uploads/temp/";


	$valid_formats = array("jpg", "png", "gif", "bmp");
	if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
		{
			$name = $_FILES['photoimg']['name'];
			$size = $_FILES['photoimg']['size'];
			
			if(strlen($name))
				{
					list($txt, $ext) = explode(".", $name);
					if(in_array($ext,$valid_formats))
					{
					if($size<(1024*1024))
						{
							$actual_image_name = time().".".$ext;
							$actual_image_name = $user_id."_".$actual_image_name;
							$tmp = $_FILES['photoimg']['tmp_name'];
							if(move_uploaded_file($tmp, $path.$actual_image_name))
								{
									echo "<img src='".BASEURL."public/uploads/temp/".$actual_image_name."' style='max-width:200px;width:100%;' class='preview'>
												<input type='hidden' class='form-control' value=".$actual_image_name." name='user_pic' />
												
												";
									
								}
							else
								echo "failed";
						}
						else
						echo "Image file size max 1 MB";					
						}
						else
						echo "Invalid file format..";	
				}
				
			else
				echo "Please select image..!";
				
			exit;
		}
?>