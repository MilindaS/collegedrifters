<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rename extends MX_Controller {

	function __construct(){
		parent::__construct();
	}
	
	function get($order_by){
		$this->load->model('mdl_rename');
		$query = $this->mdl_rename->get($order_by);
		return $query;
	}
	
	function get_with_limit($limit,$offset,$order_by){
		$this->load->model('mdl_rename');
		$query = $this->mdl_rename->get_with_limit($limit,$offset,$order_by);
		return $query;
	}
	
	function get_where($id){
		$this->load->model('mdl_rename');
		$query = $this->mdl_rename->get_where($id);
		return $query;
	}
	
	function get_where_custom($col,$value){
		$this->load->model('mdl_rename');
		$query = $this->mdl_rename->get_where_custom($col,$value);
		return $query;
	}
	
	function _insert($data){
		$this->load->model('mdl_rename');
		$this->mdl_rename->_insert($data);
	}
	
	function _update($id,$data){
		$this->load->model('mdl_rename');
		$this->mdl_rename->_update($id,$data);
	}
	
	function _delete($id){
		$this->load->model('mdl_rename');
		$this->mdl_rename->_delete($id);
	}
	
	function count_where($column,$value){
		$this->load->model('mdl_rename');
		$count = $this->mdl_rename->count_where($column,$value);
		return $count;
	}
	
	
	function get_max(){
		$this->load->model('mdl_rename');
		$max_id = $this->mdl_rename-> get_max();
		return $max_id;
		
	}
	
	function _custom_query($mysql_query){
		$this->load->model('mdl_rename');
		$query = $this->mdl_rename->_custom_query($mysql_query);
		return $query;
		
	}
	

        
}
