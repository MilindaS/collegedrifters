<?php
class Items extends CI_Model{

	public function __construct(){
		$this->load->database();
	}
	
	public function getCategory(){
		$sql = "SELECT * FROM tb_categories";
		$query = $this->db->query($sql); 
		return $query->result_array();
	}
	
	public function getItem($item_id){
		$sql = "SELECT * FROM tb_items INNER JOIN tb_categories ON  tb_categories.category_id = tb_items.item_category WHERE item_id=?";
		$params = array($item_id);
		$query = $this->db->query($sql,$params); 
		return $query->row_array();
	}
	
	public function save(){
		//print_r($_POST);
			$item_name = null;
			$item_description = null;
			$item_category = null;
			
			$item_price = null;
			$item_type = 0;
			$item_image = null;
			$session_data = $this->session->userdata('logged_in');
			$item_user_id =  $session_data['id'];
			
		if(isset($_POST['itemName']) AND $_POST['itemName']!=null ){
			$item_name = $_POST['itemName'];
		}
		if(isset($_POST['itemDesc']) AND $_POST['itemDesc']!=null ){
			$item_description = $_POST['itemDesc'];
		}
		
		
		if(isset($_POST['itemCategory']) AND $_POST['itemCategory']!=null ){
			$item_category = $_POST['itemCategory'];
		}
		
		
		if(isset($_POST['itemPrice']) AND $_POST['itemPrice']!=null ){
			$item_price = $_POST['itemPrice'];
		}
		if(isset($_POST['item_type']) AND $_POST['item_type']!=null ){
			$item_type = $_POST['item_type'];
		}	
		if(isset($_POST['itemImage']) AND $_POST['itemImage']!=null ){
			$item_image = $_POST['itemImage'];
			
			$source_path = "public/uploads/temp/".$item_image;
			$destination = "public/uploads/itempics/".$item_image;
			copy($source_path, $destination);
			$item_image = $destination;
			
			$this->recursiveRemoveDirectory('public/uploads/temp/',$item_user_id.'_');
		}
		
		
		
		
		$item_status = 1;
		
		$item_created_date = date('Y-m-d H:m:s');
		
		
		
		$sql = "INSERT INTO tb_items (
																item_name,
																item_description,
																item_price,
																item_type,
																item_category,
																item_image,
																item_user_id,
																item_status,
																item_created_date
																)
																VALUES(
																?,
																?,
																?,
																?,
																?,
																?,
																?,
																?,
																?
																)";
			$params = array(
										$item_name,
										$item_description,
										$item_price,
										$item_type,
										$item_category,
										$item_image,
										$item_user_id,
										$item_status,
										$item_created_date
										);
			$query = $this->db->query($sql,$params); 
			
			redirect(BASEURL.'item/add');	
			
	}
	
	
	public function editSave($item_id=null){
		//print_r($_POST);
			$item_id = $item_id;
			$item_name = null;
			$item_description = null;
			$item_category = null;
			
			$item_price = null;
			
			$item_image = null;
			$session_data = $this->session->userdata('logged_in');
			$item_user_id =  $session_data['id'];
			
		if(isset($_POST['item_name']) AND $_POST['item_name']!=null ){
			$item_name = $_POST['item_name'];
		}
		if(isset($_POST['item_description']) AND $_POST['item_description']!=null ){
			$item_description = $_POST['item_description'];
		}
		
		
		if(isset($_POST['item_category']) AND $_POST['item_category']!=null ){
			$item_category = $_POST['item_category'];
		}
		
		
		if(isset($_POST['item_price']) AND $_POST['item_price']!=null ){
			$item_price = $_POST['item_price'];
		}
		if(isset($_POST['itemImage']) AND $_POST['itemImage']!=null ){
			$item_image = $_POST['itemImage'];
			
			$source_path = "public/uploads/temp/".$item_image;
			$destination = "public/uploads/itempics/".$item_image;
			copy($source_path, $destination);
			$item_image = $destination;
			
			$this->recursiveRemoveDirectory('public/uploads/temp/',$item_user_id.'_');
			
			$sql = "UPDATE tb_items SET item_image = ? WHERE item_id = ?";
			$params = array(
										$item_image,
										$item_id
										);
			$query = $this->db->query($sql,$params); 
		}
		
		
		
		
		$item_status = 1;
		
		$item_created_date = date('Y-m-d H:m:s');
		
		
		
		$sql = "UPDATE tb_items SET
																item_name =? ,
																item_description =? ,
																item_price =? ,
																item_category =? ,
																item_user_id =? ,
																item_status =? ,
																item_created_date  =? 
																WHERE item_id = ?
																";
			$params = array(
										$item_name,
										$item_description,
										$item_price,
										$item_category,
										$item_user_id,
										$item_status,
										$item_created_date,
										$item_id
										);
			$query = $this->db->query($sql,$params); 
			
			redirect(BASEURL.'item/edit/'.$item_id);	
			
	}
	
	
	
	public function recursiveRemoveDirectory($directory,$pattern)
	{
		foreach(glob("{$directory}/*") as $file)
		{
			if(is_dir($file)) { 
				recursiveRemoveDirectory($file);
			} else {
				if (preg_match("/".$pattern."/",$file)) {
				  unlink($file);
				  
				}
			}
		}		
	}
	
}
?>