<?php
class Messeges extends CI_Model{
	public function __construct(){
		$this->load->database();
	}
	
	public function saveMessege(){
		$session_data = $this->session->userdata('logged_in');
		
		$request_user_id = $session_data['id'];
		
		if(isset($_POST['request_item_id']) AND $_POST['request_item_id']!=null){
			$request_item_id = $_POST['request_item_id'];
		}
		else{
			return false;
		}
		if(isset($_POST['message']) AND $_POST['message']!=null){
			$request_user_messege = $_POST['message'];
		}
		else{
			return false;
		}
		
		$request_created_date = date('Y-m-d H:m:s');
		
		$sql = "INSERT INTO tb_requests_items (
																request_item_id,
																request_user_id,
																request_user_messege,
																request_created_date
																)
																VALUES(
																?,
																?,
																?,
																?
																)";
			$params = array(
										$request_item_id,
										$request_user_id,
										$request_user_messege,
										$request_created_date
										);
			$query = $this->db->query($sql,$params); 
		
	}
	
	public function getUserDetails($user_id){
		$sql = "SELECT * FROM tb_users
																	WHERE user_id = ?
																	";
		$params = array($user_id);
		$query = $this->db->query($sql,$params); 
		return $query->row_array();
	}
}
?>