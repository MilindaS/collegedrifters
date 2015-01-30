<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_slider extends CI_Model {

	function __construct(){
		parent::__construct();
	}
	
	function get_table(){
		$table = "tb_slider";
		return $table;
	}
	function save(){
		$slide_img = null;
		$slide_id = null;
		$slide_url = null;
		$slide_caption = "";
		$data_banner = "";
		$session_data = $this->session->userdata('logged_in');
		$item_user_id = $session_data['id'];

		if(isset($_POST['slide_id']) AND $_POST['slide_id']!=null ){
			$slide_id = $_POST['slide_id'];
		}
		if(isset($_POST['slide_url']) AND $_POST['slide_url']!=null ){
			$slide_url = $_POST['slide_url'];
		}
		if(isset($_POST['slide_caption']) AND $_POST['slide_caption']!=null ){
			$slide_caption = $_POST['slide_caption'];
		}
		if(isset($_POST['itemImage']) AND $_POST['itemImage']!=null ){
			$slide_img = $_POST['itemImage'];

			$source_path = "public/uploads/temp/".$slide_img;
			$destination = "public/uploads/itempics/".$slide_img;
			copy($source_path, $destination);
			$slide_img = $destination;

			$this->recursiveRemoveDirectory('public/uploads/temp/',$item_user_id.'_');

			$data_banner = array('slide_img'=>$slide_img);
			if($slide_id!="" || !is_null($slide_id)){
				$this->_update($slide_id,$data_banner);
			}
		}
		$data = array('slide_url'=>$slide_url,'slide_caption'=>$slide_caption);
		if($slide_id!="" || !is_null($slide_id)){
			$this->_update($slide_id,$data);
		}else{
			$this->_insert($data);
			if($data_banner!=""){
				$this->_update($this->db->insert_id(),$data_banner);
			}
		}
		redirect(BASEURL.'admin/featuredSch');
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
		$this->db->where('slide_id',$id);
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
		$this->db->where('slide_id',$id);
		$this->db->update($table,$data);
	}
	
	function _delete($id){
		$table = $this->get_table();
		$this->db->where('slide_id',$id);
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
		$this->db->select_max('slide_id');
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
