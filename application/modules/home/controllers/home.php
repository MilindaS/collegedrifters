<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MX_Controller {

	public function index()
	{
		$this->load->module('item');
		$data['featured_item_list'] = $this->item->_custom_query("SELECT * from tb_items WHERE item_type=2 ORDER BY item_id DESC LIMIT 0,4 ")->result();
		$meta_og_array = array(
	 		array('property'=>"og:title",'content'=>'@collegedrifters'),
	 		array('property'=>"og:url",'content'=>BASEURL),
	 		array('property'=>"og:type",'content'=>'website'),
	 		array('property'=>"og:description",'content'=>'The Mission for College Drifters is to provide college students with a direct platform to buy and sell items to each other. By utilizing this marketplace students can inform others of events, notes, books, and tickets.'),
	 		array('property'=>"og:image",'content'=>BASEURL.'public/images/logo.png'),
	 		);
		$this->header('','','',$meta_og_array);
		$this->load->view('home',$data);
		$this->footer();
	}

	public function header($css_array=null,$js_array=null,$meta_array=null,$meta_og_array=null){
		$data['css_array'] = $css_array;
		$data['js_array'] = $js_array;
		$data['meta_array'] = $meta_array;
		$data['meta_og_array'] = $meta_og_array;
		$this->load->view('header',$data);
	}

	public function metaHeader(){
		$this->load->view('metaHeader');
	}

	public function cdTopLinkBar(){
		$this->load->view('cdTopLinkBar');
	}
	public function cdTopLinkBarForMarket(){
		$this->load->view('cdTopLinkBarForMarket');
	}
	public function footer(){
		$this->load->view('footer');
	}

	public function marketPlaceHeader($css_array=null,$js_array=null,$meta_array=null,$meta_og_array=null){
		$data['css_array'] = $css_array;
		$data['js_array'] = $js_array;
		$data['meta_array'] = $meta_array;
		$data['meta_og_array'] = $meta_og_array;
		$this->load->view('marketPlaceHeader',$data);
	}
	public function marketPlacePublicHeader($css_array=null,$js_array=null,$meta_array=null,$meta_og_array=null){
		$data['css_array'] = $css_array;
		$data['js_array'] = $js_array;
		$data['meta_array'] = $meta_array;
		$data['meta_og_array'] = $meta_og_array;
		$this->load->view('marketPlacePublicHeader',$data);
	}

	public function marketPlaceFooter(){
		$this->load->view('marketPlaceFooter');
	}
}

