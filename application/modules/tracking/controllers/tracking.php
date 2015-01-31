<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tracking extends MX_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('mdl_tracking');
	}
	function track(){
		$visitor_ip = GetHostByName($_SERVER['REMOTE_ADDR']);
		$visitor_browser = $this->getBrowserType();
		$visitor_hour = date("h");
		$visitor_minute = date("i");
		$visitor_day = date("d");
		$visitor_month = date("m");
		$visitor_date = date('Y-m-d');
		$visitor_year = date("Y");
		$visitor_refferer = isset($_SERVER['HTTP_REFERER']) ? GetHostByName($_SERVER['HTTP_REFERER']) : null;
		$visited_page = $this->selfURL();

		$data = array(
			'visitor_ip'=>$visitor_ip,
			'visitor_browser'=>$visitor_browser,
			'visitor_hour'=>$visitor_hour,
			'visitor_minute'=>$visitor_minute,
			'visitor_date'=>$visitor_date,
			'visitor_day'=>$visitor_day,
			'visitor_month'=>$visitor_month,
			'visitor_year'=>$visitor_year,
			'visitor_refferer'=>$visitor_refferer,
			'visitor_page'=>$visited_page,
			);
		$this->_insert($data);

	}
	function getBrowserType () {
		if (!empty($_SERVER['HTTP_USER_AGENT']))
		{
		   $HTTP_USER_AGENT = $_SERVER['HTTP_USER_AGENT'];
		}
		else if (!empty($HTTP_SERVER_VARS['HTTP_USER_AGENT']))
		{
		   $HTTP_USER_AGENT = $HTTP_SERVER_VARS['HTTP_USER_AGENT'];
		}
		else if (!isset($HTTP_USER_AGENT))
		{
		   $HTTP_USER_AGENT = '';
		}
		if (preg_match('/Opera/i', $HTTP_USER_AGENT))
		{
		   $browser_agent = 'opera';
		}
		else if (preg_match('/MSIE/i', $HTTP_USER_AGENT))
		{

		   $browser_agent = 'ie';
		}
		else if (preg_match('/Netscape/i', $HTTP_USER_AGENT))
		{

		   $browser_agent = 'netscape';
		}
		else if  (preg_match('/Firefox/i', $HTTP_USER_AGENT))
		{

		   $browser_agent = 'mozilla';
		}
		else if  (preg_match('/Chrome/i', $HTTP_USER_AGENT))
		{

		   $browser_agent = 'chrome';
		}
		else
		{
		   $browser_version = 0;
		   $browser_agent = 'other';
		}
		return $browser_agent;
	}
	function selfURL() {
		$s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : "";
		$protocol = $this->strleft(strtolower($_SERVER["SERVER_PROTOCOL"]), "/").$s;
		$port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]);
		return $protocol."://".$_SERVER['SERVER_NAME'].$port.$_SERVER['REQUEST_URI'];
	}

	function strleft($s1, $s2) { return substr($s1, 0, strpos($s1, $s2)); }

	function uniqueTracking(){
		return $this->get_group_by('visitor_ip')->result();
	}

	function allHits(){
		return $this->get('track_id')->result_array();
	}

	function get_group_by($col){
		$query = $this->mdl_tracking->get_group_by($col);
		return $query;
	}
	function get($order_by){
		$query = $this->mdl_tracking->get($order_by);
		return $query;
	}

	function get_with_limit($limit,$offset,$order_by){

		$query = $this->mdl_tracking->get_with_limit($limit,$offset,$order_by);
		return $query;
	}

	function get_where($id){

		$query = $this->mdl_tracking->get_where($id);
		return $query;
	}

	function get_where_custom($col,$value){

		$query = $this->mdl_tracking->get_where_custom($col,$value);
		return $query;
	}

	function _insert($data){

		$this->mdl_tracking->_insert($data);
	}

	function _update($id,$data){

		$this->mdl_tracking->_update($id,$data);
	}

	function _delete($id){

		$this->mdl_tracking->_delete($id);
	}

	function count_where($column,$value){

		$count = $this->mdl_tracking->count_where($column,$value);
		return $count;
	}
	function count_all(){

		$num_rows = $this->mdl_tracking->count_all();
		return $num_rows;
	}

	function get_max(){
		$max_id = $this->mdl_tracking->get_max();
		return $max_id;
	}

	function _custom_query($mysql_query){

		$query = $this->mdl_tracking->_custom_query($mysql_query);
		return $query;

	}



}
