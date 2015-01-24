<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Item extends MX_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('mdl_item');
		$this->load->module('home');

	}
	public function add()
	{
		$this->category_array = $this->mdl_item->getCategory();

		$css_array = array('bootstrapValidator.css','datepicker.css');
		$js_array = array('bootstrapValidator.min.js','jquery.form.js');
		$this->home->marketPlaceHeader($css_array,$js_array);
		$this->load->view('add');
		$this->home->marketPlaceFooter();
	}
	public function imageUpload(){
		$this->load->view('imageUpload');
	}

	public function save(){
		$this->mdl_item->save();
	}

	public function edit($item_id=null){
		$this->category_array = $this->mdl_item->getCategory();
		$this->item= $this->mdl_item->getItem($item_id);


		$css_array = array('bootstrapValidator.css','datepicker.css');
		$js_array = array('bootstrapValidator.min.js','jquery.form.js');
		$this->home->marketPlaceHeader($css_array,$js_array);
		$this->load->view('edit');
		$this->home->marketPlaceFooter();
	}

	public function editSave($item_id=null){
		$this->mdl_item->editSave($item_id);
	}
	function get($order_by){
		$query = $this->mdl_item->get($order_by);
		return $query;
	}

	function get_with_limit($limit,$offset,$order_by){
		$query = $this->mdl_item->get_with_limit($limit,$offset,$order_by);
		return $query;
	}

	function get_where($id){
		$query = $this->mdl_item->get_where($id);
		return $query;
	}

	function get_where_custom($col,$value){
		$query = $this->mdl_item->get_where_custom($col,$value);
		return $query;
	}

	function _insert($data){
		$this->mdl_item->_insert($data);
	}

	function _update($id,$data){
		$this->mdl_item->_update($id,$data);
	}

	function _delete($id){
		$this->mdl_item->_delete($id);
	}

	function count_where($column,$value){
		$count = $this->mdl_item->count_where($column,$value);
		return $count;
	}
	function count_all(){
		$num_rows = $this->mdl_item->count_all();
		return $num_rows;
	}

	function get_max(){
		$max_id = $this->mdl_item-> get_max();
		return $max_id;

	}

	function _custom_query($mysql_query){
		$query = $this->mdl_item->_custom_query($mysql_query);
		return $query;

	}



}
