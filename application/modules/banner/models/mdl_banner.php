<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_banner extends CI_Model {

	function __construct(){
		parent::__construct();
	}
	
	function get_table(){
		$table = "tb_custom_banner";
		return $table;
	}
	function save(){
		$item_image = null;
		$banner_id = null;
		$banner_url = null;
		$session_data = $this->session->userdata('logged_in');
		$item_user_id = $session_data['id'];

		if(isset($_POST['banner_id']) AND $_POST['banner_id']!=null ){
			$banner_id = $_POST['banner_id'];
		}
		if(isset($_POST['banner_url']) AND $_POST['banner_url']!=null ){
			$banner_url = $_POST['banner_url'];
		}
		if(isset($_POST['item_description']) AND $_POST['item_description']!=null ){
			$item_description = $_POST['item_description'];
		}
		if(isset($_POST['itemImage']) AND $_POST['itemImage']!=null ){
			$item_image = $_POST['itemImage'];

			$source_path = "public/uploads/temp/".$item_image;
			$destination = "public/uploads/itempics/".$item_image;
			copy($source_path, $destination);
			$item_image = $destination;

			$this->recursiveRemoveDirectory('public/uploads/temp/',$item_user_id.'_');

			$data_banner = array('banner_img'=>$item_image);
			$this->_update($banner_id,$data_banner);
		}
		$data = array('banner_url'=>$banner_url);
		$this->_update($banner_id,$data);
		redirect(BASEURL.'admin/customAds');
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
		$this->db->where('banner_id',$id);
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
		$this->db->where('banner_id',$id);
		$this->db->update($table,$data);
	}
	
	function _delete($id){
		$table = $this->get_table();
		$this->db->where('banner_id',$id);
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
		$this->db->select_max('banner_id');
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
