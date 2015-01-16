<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Messege extends CI_Controller {

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
		$this->css_array = array('bootstrapValidator.css','datepicker.css');
		$this->js_array = array('bootstrapValidator.min.js','jquery.form.js');
		$this->load->model('messeges');
	}
	public function email()
	{
		//echo 1;
		$this->messeges->saveMessege();
		$session_data = $this->session->userdata('logged_in');
		$user_details = $this->messeges->getUserDetails($session_data['id']);
		$user_name = $session_data['username'];
		
		
		if(isset($_POST['adholder_email']) AND $_POST['adholder_email']!=null){
			$adholder_email = $_POST['adholder_email'];
		}
		else{
			return false;
		}
		if(isset($_POST['adholder_name']) AND $_POST['adholder_name']!=null){
			$adholder_name = $_POST['adholder_name'];
		}
		else{
			return false;
		}
		
		if(isset($_POST['message']) AND $_POST['message']!=null){
			$message = $_POST['message'];
		}
		else{
			return false;
		}
		if(isset($_POST['request_item_type']) AND $_POST['request_item_type']!=null){
			if($_POST['request_item_type']==1){
				$adholder_name = "Admin";
				$adholder_email = "collegedrifters@gmail.com";
			}
		}
		
				
		$this->load->library('email');
		$config['charset'] = 'utf-8';
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'html';
		$this->email->initialize($config);
		$this->email->from('collegedrifters@gmail.com', 'CollegeDrifters');
		$this->email->to($adholder_email);
		//$this->email->to('hlsmilinda@gmail.com');
		
		
		$this->email->subject('CollegeDrifters Alerts');
		$message_html = '<html>
								  <head>
									
								  </head>
								  <body style="font-family:calibri,sans-serif;font-size:16px;color:black;">
									<h3>Hi '.$adholder_name.',</h3>
									<p style="width:400px;">
										'.$message.'
									</p><br />
									<span><strong>From:</strong>'.$user_name.'</span><br />
									<span><strong>Email:</strong>'.$user_details['user_email'].'</span>
								  </body>
								</html>
								';
		$this->email->message($message_html);

		$this->email->send();
		
		
		/*
		
		$this->load->library('email');

		$this->email->from('rockmakas@gmail.com', 'Your Name');
		$this->email->to('hlsmilinda@gmail.com');
		//$this->email->cc('another@another-example.com');
		//$this->email->bcc('them@their-example.com');

		$this->email->subject('Email Test');
		$this->email->message('Testing the email class.');

		$this->email->send();
	*/
		redirect(BASEURL.'/marketplace/listView');
	}
	
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */