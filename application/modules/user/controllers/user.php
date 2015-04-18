<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MX_Controller {

	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('mdl_user');
	}
	public function doLogin(){
		$this->mdl_user->doLogin();
	}
	public function doLogout(){
		$this->mdl_user->doLogout();	
	}
	public function recoverPasswordSM(){
		$this->mdl_user->recoverPasswordSM();	
	}
	public function changePassword(){
		$this->mdl_user->changePassword();
	}
	public function doRegister(){
		$this->mdl_user->doRegister();
	}

	public function activate($user_id,$user_notification){
		$this->mdl_user->activate($user_id,$user_notification);
	}

	function get($order_by){
		$this->load->model('mdl_user');
		$query = $this->mdl_user->get($order_by);
		return $query;
	}

	function get_with_limit($limit,$offset,$order_by){
		$this->load->model('mdl_user');
		$query = $this->mdl_user->get_with_limit($limit,$offset,$order_by);
		return $query;
	}

	function get_where($id){
		$this->load->model('mdl_user');
		$query = $this->mdl_user->get_where($id);
		return $query;
	}

	function get_where_custom($col,$value){
		$this->load->model('mdl_user');
		$query = $this->mdl_user->get_where_custom($col,$value);
		return $query;
	}

	function _insert($data){
		$this->load->model('mdl_user');
		$this->mdl_user->_insert($data);
	}

	function _update($id,$data){
		$this->load->model('mdl_user');
		$this->mdl_user->_update($id,$data);
	}

	function _delete($id){
		$this->load->model('mdl_user');
		$this->mdl_user->_delete($id);
	}

	function count_where($column,$value){
		$this->load->model('mdl_user');
		$count = $this->mdl_user->count_where($column,$value);
		return $count;
	}
	function count_all(){
		$this->load->model('mdl_user');
		$count = $this->mdl_user->count_all();
		return $count;
	}

	function get_max(){
		$this->load->model('mdl_user');
		$max_id = $this->mdl_user-> get_max();
		return $max_id;

	}

	function _custom_query($mysql_query){
		$this->load->model('mdl_user');
		$query = $this->mdl_user->_custom_query($mysql_query);
		return $query;

	}



}
