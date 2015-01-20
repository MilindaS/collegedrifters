<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MX_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('mdl_admin');
		$this->load->module('home');
		$this->load->module('user');
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
	function users($page=null){
		$data['page_name'] = 'Users';
		$per_page_user = 7;
		$active_page = $page;
		$page = ($page!=null) ? ($page-1) : 0;
		$page = $page*$per_page_user;
		$total_users = $this->user->count_all();
		$data['iteratinons'] = ceil(($total_users/$per_page_user));
		$data['user_data'] = $this->user->get_with_limit($per_page_user,$page,'user_id')->result();
		$data['page'] = $active_page;
		$this->generateAdminTempalte('users',$data);
	}
	function user($user_id=null){
		$data['user_data'] = $this->user->get_where($user_id)->result();
		$this->generateAdminTempalte('user/view',$data);
	}
	function smlinks($id=null){
		if($id){
			echo 1;
		}else{
			$this->load->module('smlinks');
			$data['links'] = $this->smlinks->get('smlinks_id')->result();
			$data['page_name'] = 'Social Media';
			$this->generateAdminTempalte('smlinks',$data);
		}
	}
	function editSmlinksPopup(){
		$smlinks_id =$_POST['id'];
		$this->load->module('smlinks');
		$link_data = $this->smlinks->get_where($smlinks_id)->result();
		$data = json_encode($link_data);
		echo $data;
	}
	function editSmlinksSave(){
		$smlinks_id = $_POST['smlinks_id'];
		$smlink_url = $_POST['smlink_url'];
		$smlink_name = $_POST['smlink_name'];
		$this->load->module('smlinks');
		$data = array(
               'smlinks_url' => $smlink_url,
               'smlinks_name' => $smlink_name
            );
		$this->smlinks->_update($smlinks_id,$data);
		
	}
	function generateAdminTempalte($page=null,$data=null,$css=null,$js=null){
		$this->home->header($css,$js);
		$this->load->view('admin-template-block-header',$data);
		$this->load->view($page,$data);
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
