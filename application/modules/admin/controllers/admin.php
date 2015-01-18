<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MX_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('mdl_admin');
		$this->load->module('home');
	}

	function dash(){
		$data['page_name'] = 'Dashboard';
		$css_array = array('odometer-theme-default.css');
		$js_array = array('odometer.min.js');
		$this->generateAdminTempalte('dash',$data,$css_array,$js_array);
	}
	function pages(){
		$data['page_name'] = 'Pages';
		$this->generateAdminTempalte('pages',$data);
	}
	function users(){
		$data['page_name'] = 'Users';
		$this->generateAdminTempalte('users',$data);
	}
	function smlinks(){
		$data['page_name'] = 'Social Media';
		$this->generateAdminTempalte('smlinks',$data);
	}
	function generateAdminTempalte($page=null,$data=null,$css=null,$js=null){
		$this->home->header($css,$js);
		$this->load->view('admin-template-block-header',$data);
		$this->load->view($page);
		$this->load->view('admin-template-block-footer');
		$this->home->footer();
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
