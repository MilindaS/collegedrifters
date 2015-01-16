<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Marketplace extends CI_Controller {

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
		$this->load->model('marketplaces');
		$this->css_array = array('flexslider.css','bootstrapValidator.css');
		$this->js_array = array('jquery.flexslider-min.js','bootstrapValidator.min.js');
	}
	public function listView($page=null)
	{	$this->page = $page;
		$this->item_list = $this->marketplaces->getItemList($page);
		$this->total_items = $this->marketplaces->getItemCount();
		$this->category_array = $this->marketplaces->getCategory();
		$this->load->view('common/marketPlaceHeader');
		$this->load->view('marketplace/listView');
		$this->load->view('common/marketPlaceFooter');
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
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */