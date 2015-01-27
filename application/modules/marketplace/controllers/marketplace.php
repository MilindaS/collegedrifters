<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Marketplace extends MX_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('mdl_marketplace');
		$this->load->module('home');
		$this->load->module('item');
		$this->load->module('category');
		$this->css_array = array('flexslider.css','bootstrapValidator.css');
		$this->js_array = array('jquery.flexslider-min.js','bootstrapValidator.min.js');
	}
	public function listView($page=null)
	 {
	 	$per_page_item = 5;
		$active_page = $page;
		$page = ($page!=null) ? ($page-1) : 0;
		$page = $page*$per_page_item;

		$total_items = $this->mdl_marketplace->getItemCount();

		$data['iteratinons'] = ceil(($total_items/$per_page_item));

		$data['item_list'] = $this->mdl_marketplace->getCustomList($per_page_item,$page);

	 	$data['featured_item_list'] = $this->item->_custom_query("SELECT * from tb_items WHERE item_type=2 ORDER BY item_id DESC LIMIT 0,4 ")->result();


	 	$data['page'] = $active_page;
	 	// $data['item_list'] = $this->item->getItemList($page);



	 	// $data['total_items'] = $this->mdl_marketplace->getItemCount();
	 	$data['category_array'] = $this->category->get('category_id')->result();;
	 	$meta_og_array = array(
	 		array('property'=>"og:title",'content'=>'College Drifters Item List'),
	 		array('property'=>"og:url",'content'=>BASEURL.'marketplace/listView'),
	 		array('property'=>"og:type",'content'=>'website'),
	 		array('property'=>"og:description",'content'=>'College Drifters Item List'),
	 		array('property'=>"og:image",'content'=>BASEURL.'public/images/logo.png'),
	 		);
	 	//print_r($data['meta_array']);
		$this->home->marketPlaceHeader('','','',$meta_og_array);
		$this->load->view('listView',$data);
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
		$description = ($this->item['item_description']) ? $this->item['item_description'] : "The Mission for College Drifters is to provide college students with a direct platform to buy and sell items to each other.";
		$image = ($this->item['item_image']) ? $this->item['item_image'] : 'public/images/logo.png';
		$title = ($this->item['item_name']) ? $this->item['item_name'] : 'College Drifters';
		$meta_og_array = array(
	 		array('property'=>"og:title",'content'=>$title),
	 		array('property'=>"og:url",'content'=>BASEURL.'marketplace/itemView/'.$item_id),
	 		array('property'=>"og:type",'content'=>	'website'),
	 		array('property'=>"og:description",'content'=>$description),
	 		array('property'=>"og:image",'content'=>BASEURL.$image),
	 		);
		$this->item = $this->mdl_marketplace->getItem($item_id);
		$this->category_array = $this->mdl_marketplace->getCategory();
		if($this->session->userdata('logged_in')){
			$this->home->marketPlaceHeader('','','',$meta_og_array);
		}else{
			$this->home->marketPlacePublicHeader('','','',$meta_og_array);
		}
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
