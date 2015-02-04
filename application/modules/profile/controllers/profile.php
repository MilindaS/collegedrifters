<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends MX_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('mdl_profile');
		$this->load->module('home');
	}
	public function view($id=false)
	{
		if($id){
			$this->load->module('user');
			$data['user_id'] = $id;
			$data['user_data'] = $this->user->get_where($id)->result()[0];
			$this->home->marketPlaceHeader();
			$this->load->view('view',$data);
			$this->home->marketPlaceFooter();
		}else{
			$css_array = array('bootstrapValidator.css','datepicker.css');
			$js_array = array('bootstrapValidator.min.js','jquery.form.js');
			$this->user = $this->mdl_profile->getUserInformation();
			$this->user_items_array = $this->mdl_profile->getUserItems();
			$this->requested_items_array = $this->mdl_profile->getRequestedItems();
			$this->unwatched =  $this->mdl_profile->getUnWatchedCount();
			$this->home->marketPlaceHeader($css_array,$js_array);
			$this->load->view('view');
			$this->home->marketPlaceFooter();
		}
	}

	public function itemRequest($request_id)
	{
		$css_array = array('bootstrapValidator.css','datepicker.css');
		$js_array = array('bootstrapValidator.min.js','jquery.form.js');
		$this->requested_item_array = $this->mdl_profile->getRequestedItem($request_id);
		$this->mdl_profile->updateRequestView($request_id);
		$this->home->marketPlaceHeader($css_array,$js_array);
		$this->load->view('itemRequest');
		$this->home->marketPlaceFooter();
	}

	public function edit($user_id)
	{
		$css_array = array('bootstrapValidator.css','datepicker.css');
		$js_array = array('bootstrapValidator.min.js','jquery.form.js');
		$this->user = $this->mdl_profile->getUserInformation($user_id);
		$this->home->marketPlaceHeader($css_array,$js_array);
		$this->load->view('edit');
		$this->home->marketPlaceFooter();
	}

	public function imageUpload(){
		$this->load->view('imageUpload');
	}

	public function update(){
		$this->mdl_profile->update();
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
