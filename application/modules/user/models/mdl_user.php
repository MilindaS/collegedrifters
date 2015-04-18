<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_user extends CI_Model {

	function __construct(){
		parent::__construct();
	}
	public function doLogin(){

		$user_email = $_POST['email'];
		$user_password = sha1($_POST['password']);

		$sql = "SELECT * FROM tb_users WHERE user_email = ? AND user_password=? AND user_activation = ?";
		$query = $this->db->query($sql, array($user_email,$user_password,''));

		$result = $query->result();

		if ($query->num_rows() > 0)
		{
			$sess_array = array();
			foreach($result as $row)
			{
				$sess_array = array(
					'id' => $row->user_id,
					'username' => $row->user_firstName,
					'key' => intval(microtime(true)),
					'usertype'=>$row->user_type,
				);
			   $this->session->set_userdata('logged_in', $sess_array);
			   modules::run('loginlogger/track','login');
			}
			if($row->user_type=="1"){
				redirect(BASEURL.'admin/dash');
			}
			else{
				redirect(BASEURL.'marketplace/listView');
			}
		}
		else{
			redirect(BASEURL.'/login/loginView/errorLogin');
		}



	}
	public function doLogout(){
		modules::run('loginlogger/track','logout');
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect(BASEURL.'login/loginView', 'refresh');
	}
	public function doRegister(){
		//print_r($_POST);
			$user_firstName = null;
			$user_lastName = null;
			$user_email = null;

			$user_dob = null;
			$user_state = null;
			$user_mobile = null;
			$user_school = null;
			$user_zip = null;
			$user_password = null;
			$user_city = null;
			$user_notification = null;
			$user_activation = md5(uniqid(rand(), true));
		if(isset($_POST['firstName']) AND $_POST['firstName']!=null ){
			$user_firstName = $_POST['firstName'];
		}
		if(isset($_POST['lastName']) AND $_POST['lastName']!=null ){
			$user_lastName = $_POST['lastName'];
		}


		if(isset($_POST['email']) AND $_POST['email']!=null ){
			$user_email = $_POST['email'];
		}
		if(isset($_POST['dob']) AND $_POST['dob']!=null ){
			$user_dob = $_POST['dob'];
			$user_dob = date("Y-d-m", strtotime($user_dob));
		}

		if(isset($_POST['date']) AND $_POST['date']!=null AND isset($_POST['month']) AND $_POST['month']!=null  AND isset($_POST['year']) AND $_POST['year']!=null ){
			$user_dob = $_POST['year'].'-'.$_POST['date'].'-'.$_POST['month'];
			//$user_dob = date("Y-d-m", strtotime($user_dob));
		}
		if(isset($_POST['mobileNo']) AND $_POST['mobileNo']!=null ){
			$user_mobile = $_POST['mobileNo'];
		}

		if(isset($_POST['city']) AND $_POST['city']!=null ){
			$user_city = $_POST['city'];
		}
		if(isset($_POST['state']) AND $_POST['state']!=null ){
			$user_state = $_POST['state'];
		}
		if(isset($_POST['zip']) AND $_POST['zip']!=null ){
			$user_zip = $_POST['zip'];
		}
		if(isset($_POST['school']) AND $_POST['school']!=null ){
			$user_school = $_POST['school'];
		}

		if(isset($_POST['password']) AND $_POST['password']!=null ){
			$user_password = sha1($_POST['password']);
		}

		if(isset($_POST['notification']) AND !empty($_POST['notification']) ){
			if(count($_POST['notification'])==1){

				if (in_array("text", $_POST['notification'])) {
					$user_notification = 1;
				}
				else if (in_array("email", $_POST['notification'])) {
					$user_notification = 2;
				}
			}
			else if(count($_POST['notification'])==2){
				$user_notification = 3;
			}
		}

		$user_created_date = date('Y-m-d H:m:s');
		$user_type = 2;




		$sql = "SELECT * FROM tb_users  WHERE user_email =? ";
		$params = array($user_email);
		$query = $this->db->query($sql,$params);

		$result = $query->result();

		if ($query->num_rows() > 0)
		{
			redirect(BASEURL.'login/alreadyMember');
		}




		$sql = "INSERT INTO tb_users (
																user_firstName,
																user_lastName,
																user_email,
																user_dob,
																user_mobile,
																user_school,
																user_city,
																user_state,
																user_zip,
																user_password,
																user_type,
																user_notification,
																user_created_date,
																user_activation
																)
																VALUES(
																?,
																?,
																?,
																?,
																?,
																?,
																?,
																?,
																?,
																?,
																?,
																?,
																?,
																?
																)";
			$params = array(
										$user_firstName,
										$user_lastName,
										$user_email,
										$user_dob,
										$user_mobile,
										$user_school,
										$user_city,
										$user_state,
										$user_zip,
										$user_password,
										$user_type,
										$user_notification,
										$user_created_date,
										$user_activation
										);
			$query = $this->db->query($sql,$params);

			$query = $this->db->query("SELECT LAST_INSERT_ID() AS LSI");
			$result = $query->result();

			$last_inserted_id = $result[0]->LSI;

		$this->load->library('email');
		$config['charset'] = 'utf-8';
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'html';
		$this->email->initialize($config);
		$this->email->from('collegedrifters@gmail.com', 'CollegeDrifters');
		$this->email->to($user_email);
		//$this->email->cc('another@another-example.com');
		//$this->email->bcc('them@their-example.com');

		$this->email->subject('Thank you for joining with CollegeDrifters !');
		$message = '<html>
								  <head>

								  </head>
								  <body style="font-family:calibri,sans-serif;font-size:16px;color:black;">
									<h3>Hi '.$user_firstName.'</h3>
									<p>
										Thank you for registering to CollegeDrifters online
										marketplace !
										<br />
										Now you can buy, sell, and exchange items with other college
										students.
										<br />
										<br />
										To activate your account, please click on this link
										<br />
										<a href="'.BASEURL.'login/activate/'.$last_inserted_id.'/'.$user_activation.'">'.BASEURL.'/login/activate/'.$last_inserted_id.'/'.$user_activation.'</a>

										<br />
										<br />
										Have fun Drifting,
										<br />
										<a href="http://www.collegedrifters.com" style="text-decoration:none;"><span style="color: #9B539C;"><strong>College</strong></span><span style="color: #B4100A;"><strong>Drifters</strong></span></a>
									</p>
								  </body>
								</html>
								';
		$this->email->message($message);

		$this->email->send();

		redirect(BASEURL.'login/activationPending');


	}
	public function changePassword(){
		if(isset($_POST['password']) AND $_POST['password']!=null ){
			$user_password = sha1($_POST['password']);
		}
		if(isset($_POST['user_id']) AND $_POST['user_id']!=null ){
			$user_id = $_POST['user_id'];
		}
		if(isset($_POST['user_activation']) AND $_POST['user_activation']!=null ){
			$user_activation = $_POST['user_activation'];
		}

		$sql = "SELECT * FROM tb_users  WHERE user_id =? AND user_activation=?";
		$params = array($user_id,$user_activation);
		$query = $this->db->query($sql,$params);

		$result = $query->result();
		$result_array = $query->result_array();
		if ($query->num_rows() <= 0)
		{
			redirect(BASEURL.'login/recoverPasswordPinput/'.$user_id.'/'.$user_activation.'/err');
			exit();
		}

		$sql = "UPDATE tb_users SET user_activation=null,user_password=? WHERE(user_id =? AND user_activation=?) LIMIT 1";
		$params = array(
						$user_password,
						$user_id,
						$user_activation
						);
		$query = $this->db->query($sql,$params);
		$this->session->set_flashdata('passwordChnged', 'done');
		redirect(BASEURL.'login/loginView');
		exit();
	}
	public function recoverPasswordSM(){
		if(isset($_POST['email']) AND $_POST['email']!=null ){
			$user_email = $_POST['email'];
		}
		// $user_email = 'hlsmilinda@gmail.com';
		$sql = "SELECT * FROM tb_users  WHERE user_email =? ";
		$params = array($user_email);
		$query = $this->db->query($sql,$params);

		$result = $query->result();
		$result_array = $query->result_array();
		if ($query->num_rows() <= 0)
		{
			redirect(BASEURL.'login/forgotPasswordView/err');
			exit();
		}

		$user_firstName = $result_array[0]['user_firstName'];
		$user_id = $result_array[0]['user_id'];
		$user_activation = md5(uniqid(rand(), true));

		$sql = "UPDATE tb_users SET user_activation=? WHERE user_id =? LIMIT 1";
		$params = array(
						$user_activation,
						$user_id
						);
		$query = $this->db->query($sql,$params);
		

		$this->load->library('email');
		$config['charset'] = 'utf-8';
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'html';
		$this->email->initialize($config);
		$this->email->from('collegedrifters@gmail.com', 'CollegeDrifters');
		$this->email->to($user_email);
		//$this->email->cc('another@another-example.com');
		//$this->email->bcc('them@their-example.com');

		$this->email->subject('Reset Password on CollegeDrifters !');
		$message = '<html>
								  <head>

								  </head>
								  <body style="font-family:calibri,sans-serif;font-size:16px;color:black;">
									<h3>Hi '.$user_firstName.'</h3>
									<p style="font-size:12px;">
										We recently received a password reset request for your email address.
										<br />
										<br />
										If you would like to reset your password, please do so using the following link.
										<br />
										<a href="'.BASEURL.'login/recoverPasswordPinput/'.$user_id.'/'.$user_activation.'">'.BASEURL.'/login/recoverPasswordPinput/'.$user_id.'/'.$user_activation.'</a>

										<br />
										<br />
										If you didn\'t request a password reset, please ignore this email.
										<br />
										<br />
										<br />
										Have fun Drifting,
										<br />
										<a href="http://www.collegedrifters.com" style="text-decoration:none;"><span style="color: #9B539C;"><strong>College</strong></span><span style="color: #B4100A;"><strong>Drifters</strong></span></a>
									</p>
								  </body>
								</html>
								';
		$this->email->message($message);

		$this->email->send();

		redirect(BASEURL.'login/activationPending/email');

	}

	public function activate($user_id,$user_notification){
		if($user_id!=null AND $user_notification!=null){
			$sql = "UPDATE tb_users SET user_activation=NULL WHERE(user_id =? AND user_activation=?) LIMIT 1";
			$params = array(
										$user_id,
										$user_notification
										);
			$query = $this->db->query($sql,$params);




			$sql = "SELECT * FROM tb_users WHERE user_id = ?";
			$query = $this->db->query($sql, array($user_id));

			$result = $query->result();

			$sess_array = array();
			foreach($result as $row)
			{
				$sess_array = array(
					'id' => $row->user_id,
					'username' => $row->user_firstName,
					'key' => intval(microtime(true)),
					'usertype'=>$row->user_type,
				);
			   $this->session->set_userdata('logged_in', $sess_array);
			}

			$session_data = $this->session->userdata('logged_in');
			modules::run('loginlogger/track','login');
			redirect(BASEURL.'marketplace/listView');





		}
	}
	function get_table(){
		$table = "tb_users";
		return $table;
	}

	function get($order_by){
		$table = $this->get_table();
		$this->db->order_by($order_by);
		$query = $this->db->get($table);
		return $query;
	}

	function get_with_limit($limit,$offset,$order_by){
		$table = $this->get_table();
		$this->db->limit($limit,$offset);
		$this->db->order_by($order_by);
		$query = $this->db->get($table);
		return $query;
	}

	function get_where($id){
		$table = $this->get_table();
		$this->db->where('user_id',$id);
		$query = $this->db->get($table);
		return $query;
	}

	function get_where_custom($col,$value){
		$table = $this->get_table();
		$this->db->where($col,$value);
		$query = $this->db->get($table);
		return $query;
	}

	function _insert($data){
		$table = $this->get_table();
		$this->db->insert($table,$data);
	}

	function _update($id,$data){
		$table = $this->get_table();
		$this->db->where('user_id',$id);
		$this->db->update($table,$data);
	}

	function _delete($id){
		$table = $this->get_table();
		$this->db->where('user_id',$id);
		$this->db->delete($table);
	}

	function count_where($column,$value){
		$table = $this->get_table();
		$this->db->where($column,$value);
		$query = $this->db->get($table);
		$num_rows = $query->num_rows();
		return $num_rows;
	}

	function count_all(){
		$table = $this->get_table();
		$query = $this->db->get($table);
		$num_rows = $query->num_rows();
		return $num_rows;
	}

	function get_max(){
		$table = $this->get_table();
		$this->db->select_max('user_id');
		$query = $this->db->get($table);
		$row = $query->row();
		$id = $row->id;
		return $id;
	}

	function _custom_query($mysql_query){
		$query = $this->db->query($mysql_query);
		return $query;
	}



}
