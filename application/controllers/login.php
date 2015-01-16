<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); 
class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
		parent::__construct();
		$this->load->model('user');
	}
	
	
	public function loginView($errorLogin=null)
	{
		
		if($this->session->userdata('logged_in')){
			redirect(BASEURL.'marketplace/listView', 'refresh');
		}

		$this->css_array = array('bootstrapValidator.css','datepicker.css');
		$this->js_array = array('bootstrapValidator.min.js');
		$this->errorLogin = $errorLogin;
		$this->load->view('common/header');	
			
		$this->load->view('login/loginView');		
		$this->load->view('common/footer');
	}
	
	public function doLogin(){
		$this->user->doLogin();
	}
	
	public function registerView()
	{	
		$this->css_array = array('bootstrapValidator.css','datepicker.css');
		$this->js_array = array('bootstrapValidator.min.js','bootstrap-datepicker.js');
		$this->load->view('common/header');
		$this->load->view('login/registerView');
		$this->load->view('common/footer');
	}
	
	public function doRegister(){
		$this->user->doRegister();
	}
	
	public function activationPending(){
		$this->css_array = array('bootstrapValidator.css','datepicker.css');
		$this->js_array = array('bootstrapValidator.min.js','bootstrap-datepicker.js');
		$this->load->view('common/header');
		$this->load->view('login/activationPending');
		$this->load->view('common/footer');
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
		$this->load->view('common/header');
		$this->load->view('login/alreadyMember');
		$this->load->view('common/footer');
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */