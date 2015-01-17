<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message extends MX_Controller {

	function __construct(){
		parent::__construct();
		$this->css_array = array('bootstrapValidator.css','datepicker.css');
		$this->js_array = array('bootstrapValidator.min.js','jquery.form.js');
		$this->load->model('mdl_message');
	}
	public function email()
	{
		//echo 1;
		$this->mdl_message->saveMessege();
		$session_data = $this->session->userdata('logged_in');
		$user_details = $this->mdl_message->getUserDetails($session_data['id']);
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

		redirect(BASEURL.'/marketplace/listView');
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
