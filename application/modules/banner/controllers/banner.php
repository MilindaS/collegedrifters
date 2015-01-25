<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Banner extends MX_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('mdl_banner');
	}
	function save(){
		$this->mdl_banner->save();
	}
	function get($order_by){

		$query = $this->mdl_banner->get($order_by);
		return $query;
	}

	function get_with_limit($limit,$offset,$order_by){

		$query = $this->mdl_banner->get_with_limit($limit,$offset,$order_by);
		return $query;
	}

	function get_where($id){

		$query = $this->mdl_banner->get_where($id);
		return $query;
	}

	function get_where_custom($col,$value){

		$query = $this->mdl_banner->get_where_custom($col,$value);
		return $query;
	}

	function _insert($data){

		$this->mdl_banner->_insert($data);
	}

	function _update($id,$data){

		$this->mdl_banner->_update($id,$data);
	}

	function _delete($id){

		$this->mdl_banner->_delete($id);
	}

	function count_where($column,$value){

		$count = $this->mdl_banner->count_where($column,$value);
		return $count;
	}
	function count_all(){

		$num_rows = $this->mdl_banner->count_all();
		return $num_rows;
	}

	function get_max(){

		$max_id = $this->mdl_banner-> get_max();
		return $max_id;

	}

	function _custom_query($mysql_query){

		$query = $this->mdl_banner->_custom_query($mysql_query);
		return $query;

	}



}
