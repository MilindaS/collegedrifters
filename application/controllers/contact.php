<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

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
	 
	public function form()
	{
		$this->css_array = array('flexslider.css','bootstrapValidator.css');
		$this->js_array = array('jquery.flexslider-min.js','bootstrapValidator.min.js');
		$this->load->view('common/marketPlaceHeader');
		$this->load->view('contact/form');
		$this->load->view('common/marketPlaceFooter');
	}
	
	public function email(){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$comments = $_POST['comments'];
		
		if(!isset($_POST['name']) OR !isset($_POST['email']) OR !isset($_POST['comments'])){
			redirect(BASEURL.'/contact/form');
		}
		
		$this->load->library('email');

		$this->email->from($email , $name);
		$this->email->to('collegedrifters@gmail.com');
		//$this->email->cc('another@another-example.com');
		//$this->email->bcc('them@their-example.com');

		$this->email->subject('Comments From College Drifters');
		$this->email->message($comments);

		$this->email->send();

		redirect(BASEURL.'/contact/form');
		
	}
	
	
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */