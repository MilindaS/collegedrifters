<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MX_Controller {

	function __construct(){
		parent::__construct();
		session_start();
		$this->load->module('home');
	}
	
	public function loginView($errorLogin=null)
	{

		if($this->session->userdata('logged_in')){
			redirect(BASEURL.'marketplace/listView', 'refresh');
		}

		$css_array = array('bootstrapValidator.css','datepicker.css');
		$js_array = array('bootstrapValidator.min.js');
		$this->errorLogin = $errorLogin;

		$this->home->header($css_array,$js_array);
		$this->load->view('login');
		$this->home->footer();
	}

	public function doLogin(){
		$this->load->module('user');
		$this->user->doLogin();
	}

	public function registerView()
	{
		$css_array = array('bootstrapValidator.css','datepicker.css');
		$js_array = array('bootstrapValidator.min.js','bootstrap-datepicker.js');
		$this->home->header($css_array,$js_array);
		$this->load->view('registerView');
		$this->home->footer();
	}

	public function doRegister(){
		$this->user->doRegister();
	}

	public function activationPending(){
		$css_array = array('bootstrapValidator.css','datepicker.css');
		$js_array = array('bootstrapValidator.min.js','bootstrap-datepicker.js');
		$this->home->header($css_array,$js_array);
		$this->load->view('activationPending');
		$this->home->footer();
	}

	function logout()
	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect(BASEURL.'login/loginView', 'refresh');
	}

	public function activate($user_id=null,$user_notification=null){
		$this->user->activate($user_id,$user_notification);
	}
	public function alreadyMember(){
		$css_array = array('bootstrapValidator.css','datepicker.css');
		$js_array = array('bootstrapValidator.min.js','bootstrap-datepicker.js');
		$this->home->header($css_array,$js_array);
		$this->load->view('alreadyMember');
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
