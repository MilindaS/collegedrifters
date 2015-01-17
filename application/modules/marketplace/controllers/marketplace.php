<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Marketplace extends MX_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('mdl_marketplace');
		$this->load->module('home');
		$this->css_array = array('flexslider.css','bootstrapValidator.css');
		$this->js_array = array('jquery.flexslider-min.js','bootstrapValidator.min.js');
	}
	public function listView($page=null)
	 {
	 	$this->page = $page;

	 	$this->item_list = $this->mdl_marketplace->getItemList($page);
	 	$this->total_items = $this->mdl_marketplace->getItemCount();
	 	$this->category_array = $this->mdl_marketplace->getCategory();

		$this->home->marketPlaceHeader();
		$this->load->view('listView');
		$this->home->marketPlaceFooter();
	}
	public function localAds($page=null)
	{	$this->page = $page;
		$this->item_list = $this->mdl_marketplace->getItemList($page,1);
		$this->total_items = $this->mdl_marketplace->getLocalItemCount();
		$this->category_array = $this->mdl_marketplace->getCategory();

		$this->home->marketPlaceHeader();
		$this->load->view('localAds');
		$this->home->marketPlaceFooter();
	}
	public function search($city=null,$state=null,$minPrice=null,$maxPrice=null,$category=null){
		$this->category_array = $this->mdl_marketplace->getCategory();
		$this->item_list = $this->mdl_marketplace->getItemFilterdList();

		$this->home->marketPlaceHeader();
		$this->load->view('search');
		$this->home->marketPlaceFooter();

	}

	public function itemView($item_id){

		$this->item = $this->mdl_marketplace->getItem($item_id);
		$this->category_array = $this->mdl_marketplace->getCategory();
		$this->home->marketPlaceHeader();
		$this->load->view('itemView');
		$this->home->marketPlaceFooter();
	}

	public function manage($page=null){
		$this->item_list = $this->mdl_marketplace->getItemList($page);

		$this->category_array = $this->mdl_marketplace->getCategory();
		$this->home->marketPlaceHeader();
		$this->load->view('manage');
		$this->home->marketPlaceFooter();
	}

	public function removeAd($item_id){
		$this->item = $this->mdl_marketplace->removeAd($item_id);
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
