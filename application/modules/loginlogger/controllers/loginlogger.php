<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Loginlogger extends MX_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('mdl_loginlogger');
	}
	function track($loginout=null){
		
		$session_data = $this->session->userdata('logged_in');
		$user_id = $session_data['id'];
		$user_key = $session_data['key'];

		
		if(count($this->get_where_custom('auth_log_key',$user_key)->result_array())>0){
			$data = array(
				'auth_logout_ts'=>date('Y-m-d H:i:s'),
			);
			
			$this->_update('auth_log_key',$user_key,$data);
		}else{
			if($user_id){
				$data = array(
				'auth_login_user_id'=>$user_id,
				'auth_login_ts'=>date('Y-m-d H:i:s'),
				'auth_log_key'=>$user_key
				);
				$this->_insert($data);
			}
		}

	}
	function selfURL() {
		$s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : "";
		$protocol = $this->strleft(strtolower($_SERVER["SERVER_PROTOCOL"]), "/").$s;
		$port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]);
		return $protocol."://".$_SERVER['SERVER_NAME'].$port.$_SERVER['REQUEST_URI'];
	}
	function get($order_by){

		$query = $this->mdl_loginlogger->get($order_by);
		return $query;
	}

	function get_with_limit($limit,$offset,$order_by){

		$query = $this->mdl_loginlogger->get_with_limit($limit,$offset,$order_by);
		return $query;
	}

	function get_where($id){

		$query = $this->mdl_loginlogger->get_where($id);
		return $query;
	}

	function get_where_custom($col,$value){

		$query = $this->mdl_loginlogger->get_where_custom($col,$value);
		return $query;
	}

	function get_group_by($col){
		$query = $this->mdl_tracking->get_group_by($col);
		return $query;
	}

	function _insert($data){

		$this->mdl_loginlogger->_insert($data);
	}

	function _update($where,$val,$data){

		$this->mdl_loginlogger->_update($where,$val,$data);
	}

	function _delete($id){

		$this->mdl_loginlogger->_delete($id);
	}

	function count_where($column,$value){

		$count = $this->mdl_loginlogger->count_where($column,$value);
		return $count;
	}
	function count_all(){

		$num_rows = $this->mdl_loginlogger->count_all();
		return $num_rows;
	}

	function get_max(){

		$max_id = $this->mdl_loginlogger-> get_max();
		return $max_id;

	}

	function _custom_query($mysql_query){

		$query = $this->mdl_loginlogger->_custom_query($mysql_query);
		return $query;

	}



}
