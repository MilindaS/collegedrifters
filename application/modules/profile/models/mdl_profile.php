<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_profile extends CI_Model {

	function __construct(){
		parent::__construct();
	}
	public function getUserInformation($user_id=null){
		$session_data = $this->session->userdata('logged_in');

		if($user_id!=null){
			$user_id = $user_id;
		}
		else{
			$user_id = $session_data['id'];
		}

		$sql = "SELECT * FROM tb_users WHERE tb_users.user_id = ?
																	";
		$params = array($user_id);
		$query = $this->db->query($sql,$params);
		return $query->row_array();

	}

	public function getUnWatchedCount(){
		$session_data = $this->session->userdata('logged_in');
		$user_id = $session_data['id'];
		$sql = "SELECT * FROM tb_items
					INNER JOIN tb_categories
					ON tb_items.item_category = tb_categories.category_id
					INNER JOIN tb_users
					ON tb_items.item_user_id = tb_users.user_id
					INNER JOIN
					tb_requests_items
					ON tb_requests_items.request_item_id = tb_items.item_id
					WHERE tb_items.item_user_id = ? AND tb_requests_items.request_watched = ?
					";
		$params = array($user_id,0);
		$query = $this->db->query($sql,$params);

		return $query->num_rows();
	}

	public function updateRequestView($request_id){

	$sql = "UPDATE tb_requests_items SET request_watched = ? WHERE  request_id = ?";
	$params = array(1,$request_id);
	$query = $this->db->query($sql,$params);
	}


	public function getUserItems(){
		$session_data = $this->session->userdata('logged_in');
		$user_id = $session_data['id'];

		$sql = "SELECT * FROM tb_items
					INNER JOIN tb_categories
					ON tb_items.item_category = tb_categories.category_id
					INNER JOIN tb_users
					ON tb_items.item_user_id = tb_users.user_id
					WHERE tb_items.item_user_id = ? ORDER BY tb_items.item_created_date DESC
					";
		$params = array($user_id);
		$query = $this->db->query($sql,$params);
		return $query->result_array();
	}
	public function getRequestedItems(){
		$session_data = $this->session->userdata('logged_in');
		$user_id = $session_data['id'];
		$sql = "SELECT * FROM tb_items
					INNER JOIN tb_categories
					ON tb_items.item_category = tb_categories.category_id
					INNER JOIN tb_users
					ON tb_items.item_user_id = tb_users.user_id
					INNER JOIN
					tb_requests_items
					ON tb_requests_items.request_item_id = tb_items.item_id
					WHERE tb_items.item_user_id = ? ORDER BY tb_requests_items.request_watched,tb_requests_items.request_created_date DESC
					";
		$params = array($user_id);
		$query = $this->db->query($sql,$params);
		return $query->result_array();
	}

	public function getRequestedItem($request_id){
		$sql = "SELECT * FROM tb_requests_items
					INNER JOIN tb_users
					ON tb_requests_items.request_user_id = tb_users.user_id
					WHERE request_id =?
					";
		$params = array($request_id);
		$query = $this->db->query($sql,$params);
		return $query->row_array();
	}
	public function update(){
			$db_column_array = array('user_firstName','user_lastName','user_email','user_dob','user_mobile','user_city','user_state','user_zip','user_school','user_gig','user_email_visibility','user_mobile_visibility');

			$session_data = $this->session->userdata('logged_in');
			$user_id = $session_data['id'];
			//print_r($_POST);
			//return false;

			foreach($_POST as $field=>$value){
				if($value!=null){
					if(in_array($field,$db_column_array)){
						if($value != null){
							if($field=='user_dob'){
								$value = date('Y-d-m',strtotime($value));
							}
							$sql = "UPDATE tb_users SET  {$field}=? WHERE user_id = ?";
							$params = array($value,$user_id);
							$query = $this->db->query($sql,$params);
						}
					}

					if($field=='user_password'){
						if($value != null){
							$sql = "UPDATE tb_users SET  {$field}=? WHERE user_id = ?";
							$params = array(sha1($value),$user_id);
							$query = $this->db->query($sql,$params);
						}
						if(strlen($value)<6){
							redirect(BASEURL.'profile/edit/'.$user_id);
						}
					}




					if($field=='user_notification'){

						if(empty($value)){
							$user_notification = null;
						}
						if(count($value)==1){
							if (in_array("text", $value)) {
								$user_notification = 1;
							}
							else if (in_array("email", $value)) {
								$user_notification = 2;
							}
							else{
								$user_notification = null;
							}



						}
						else if(count($value)==2){
							$user_notification = 3;
						}

						$sql = "UPDATE tb_users SET  {$field}=? WHERE user_id = ?";
						$params = array($user_notification,$user_id);
						$query = $this->db->query($sql,$params);
					}




					if($field=='user_pic'){
						if($value != null){
						$item_image = $value;

						$source_path = "public/uploads/temp/".$item_image;
						$destination = "public/uploads/profpics/".$item_image;
						copy($source_path, $destination);
						$item_image = $destination;

						$this->recursiveRemoveDirectory('public/uploads/temp/',$user_id.'_');

						$sql = "UPDATE tb_users SET  {$field}=? WHERE user_id = ?";
						$params = array($item_image,$user_id);
						$query = $this->db->query($sql,$params);
						}
					}


				}


			}

			if(!isset($_POST['user_notification'])){
				$user_notification = null;
				$sql = "UPDATE tb_users SET  user_notification=? WHERE user_id = ?";
				$params = array($user_notification,$user_id);
				$query = $this->db->query($sql,$params);
			}


			if(!isset($_POST['user_email_visibility'])){
				$user_email_visibility = null;
				$sql = "UPDATE tb_users SET  user_email_visibility=? WHERE user_id = ?";
				$params = array($user_email_visibility,$user_id);
				$query = $this->db->query($sql,$params);
			}


			if(!isset($_POST['user_mobile_visibility'])){
				$user_mobile_visibility = null;
				$sql = "UPDATE tb_users SET  user_mobile_visibility=? WHERE user_id = ?";
				$params = array($user_mobile_visibility,$user_id);
				$query = $this->db->query($sql,$params);
			}


			redirect(BASEURL.'profile/edit/'.$user_id);
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
	function get_table(){
		$table = "tablename";
		return $table;
	}

	function get($order_by){
		$table = $this->get_table();
		$this->db->order_by($order_by);
		$query = $this->db->get($table);
		return $query;
	}

	function get_with_limit($limit,$offset,$order_by){
		$table = $this->get_table();
		$this->db->limit($limit,$offset);
		$this->db->order_by($order_by);
		$query = $this->db->get($table);
		return $query;
	}

	function get_where($id){
		$table = $this->get_table();
		$this->db->where('id',$id);
		$query = $this->db->get($table);
		return $query;
	}

	function get_where_custom($col,$value){
		$table = $this->get_table();
		$this->db->where($col,$value);
		$query = $this->db->get($table);
		return $query;
	}

	function _insert($data){
		$table = $this->get_table();
		$this->db->insert($table,$data);
	}

	function _update($id,$data){
		$table = $this->get_table();
		$this->db->where('id',$id);
		$this->db->update($table,$data);
	}

	function _delete($id){
		$table = $this->get_table();
		$this->db->where('id',$id);
		$this->db->delete($table);
	}

	function count_where($column,$value){
		$table = $this->get_table();
		$this->db->where($column,$value);
		$query = $this->db->get($table);
		$num_rows = $query->num_rows();
		return $num_rows;
	}

	function count_all(){
		$table = $this->get_table();
		$query = $this->db->get($table);
		$num_rows = $query->num_rows();
		return $num_rows;
	}

	function get_max(){
		$table = $this->get_table();
		$this->db->select_max('id');
		$query = $this->db->get($table);
		$row = $query->row();
		$id = $row->id;
		return $id;
	}

	function _custom_query($mysql_query){
		$query = $this->db->query($mysql_query);
		return $query;
	}



}
