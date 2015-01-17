<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_message extends CI_Model {

	function __construct(){
		parent::__construct();
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
