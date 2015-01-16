<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Item extends CI_Controller {

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
		$this->load->model('items');
		$this->css_array = array('bootstrapValidator.css','datepicker.css');
		$this->js_array = array('bootstrapValidator.min.js','jquery.form.js');
	}
	
	public function add()
	{	
		$this->category_array = $this->items->getCategory();
		
		$this->load->view('common/marketPlaceHeader');
		$this->load->view('item/add');
		$this->load->view('common/marketPlaceFooter');
	}
	public function imageUpload(){
		$this->load->view('item/imageUpload');
	}
	
	public function save(){
		$this->items->save();
	}
	
	public function edit($item_id=null){
		$this->category_array = $this->items->getCategory();
		$this->item= $this->items->getItem($item_id);
		
		
		$this->load->view('common/marketPlaceHeader');
		$this->load->view('item/edit');
		$this->load->view('common/marketPlaceFooter');
	}
	
	public function editSave($item_id=null){
		$this->items->editSave($item_id);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */