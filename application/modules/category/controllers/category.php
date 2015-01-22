<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends MX_Controller {

	function __construct(){
		parent::__construct();
	}
	
	function get($order_by){
		$this->load->model('mdl_category');
		$query = $this->mdl_category->get($order_by);
		return $query;
	}
	
	function get_with_limit($limit,$offset,$order_by){
		$this->load->model('mdl_category');
		$query = $this->mdl_category->get_with_limit($limit,$offset,$order_by);
		return $query;
	}
	
	function get_where($id){
		$this->load->model('mdl_category');
		$query = $this->mdl_category->get_where($id);
		return $query;
	}
	
	function get_where_custom($col,$value){
		$this->load->model('mdl_category');
		$query = $this->mdl_category->get_where_custom($col,$value);
		return $query;
	}
	
	function _insert($data){
		$this->load->model('mdl_category');
		$this->mdl_category->_insert($data);
	}
	
	function _update($id,$data){
		$this->load->model('mdl_category');
		$this->mdl_category->_update($id,$data);
	}
	
	function _delete($id){
		$this->load->model('mdl_category');
		$this->mdl_category->_delete($id);
	}
	
	function count_where($column,$value){
		$this->load->model('mdl_category');
		$count = $this->mdl_category->count_where($column,$value);
		return $count;
	}
	
	function count_all(){
		$this->load->model('mdl_category');
		$count = $this->mdl_category->count_all();
		return $count;
	}
	function get_max(){
		$this->load->model('mdl_category');
		$max_id = $this->mdl_category-> get_max();
		return $max_id;
		
	}
	
	function _custom_query($mysql_query){
		$this->load->model('mdl_category');
		$query = $this->mdl_category->_custom_query($mysql_query);
		return $query;
		
	}
	

        
}
