<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Marketplace extends MX_Controller {

	function __construct(){
		parent::__construct();
		//$this->load->model('marketplaces');
		$this->css_array = array('flexslider.css','bootstrapValidator.css');
		$this->js_array = array('jquery.flexslider-min.js','bootstrapValidator.min.js');
	}
	public function listView($page=null)
	 {	$this->page = $page;
	// 	$this->item_list = $this->marketplaces->getItemList($page);
	// 	$this->total_items = $this->marketplaces->getItemCount();
	// 	$this->category_array = $this->marketplaces->getCategory();

		$this->load->module('home');
		
		$this->home->marketPlaceHeader();
		$this->load->view('listView');
		$this->home->marketPlaceFooter();
	}
	public function localAds($page=null)
	{	$this->page = $page;
		$this->item_list = $this->marketplaces->getItemList($page,1);
		$this->total_items = $this->marketplaces->getLocalItemCount();
		$this->category_array = $this->marketplaces->getCategory();
		$this->load->view('common/marketPlaceHeader');
		$this->load->view('marketplace/localAds');
		$this->load->view('common/marketPlaceFooter');
	}
	public function search($city=null,$state=null,$minPrice=null,$maxPrice=null,$category=null){
		$this->category_array = $this->marketplaces->getCategory();
		$this->item_list = $this->marketplaces->getItemFilterdList();
		
		$this->load->view('common/marketPlaceHeader');
		$this->load->view('marketplace/search');
		$this->load->view('common/marketPlaceFooter');
		
	}	

	public function itemView($item_id){
		
		$this->item = $this->marketplaces->getItem($item_id);
		$this->category_array = $this->marketplaces->getCategory();
		$this->load->view('common/marketPlaceHeader');
		$this->load->view('marketplace/itemView');
		$this->load->view('common/marketPlaceFooter');
	}
	
	public function manage($page=null){
		$this->item_list = $this->marketplaces->getItemList($page);
		
		$this->category_array = $this->marketplaces->getCategory();
		$this->load->view('common/marketPlaceHeader');
		$this->load->view('marketplace/manage');
		$this->load->view('common/marketPlaceFooter');
	}
	
	public function removeAd($item_id){
		$this->item = $this->marketplaces->removeAd($item_id);
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
