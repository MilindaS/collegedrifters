<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

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
		$this->load->model('profiles');
		$this->css_array = array('bootstrapValidator.css','datepicker.css');
		$this->js_array = array('bootstrapValidator.min.js','jquery.form.js');
	}
	public function view()
	{
		$this->user = $this->profiles->getUserInformation();
		$this->user_items_array = $this->profiles->getUserItems();
		$this->requested_items_array = $this->profiles->getRequestedItems();
		$this->unwatched =  $this->profiles->getUnWatchedCount();
		$this->load->view('common/marketPlaceHeader');
		$this->load->view('profile/view');
		$this->load->view('common/marketPlaceFooter');
	}
	
	public function itemRequest($request_id){
		
		$this->requested_item_array = $this->profiles->getRequestedItem($request_id);
		$this->profiles->updateRequestView($request_id);
		$this->load->view('common/marketPlaceHeader');
		$this->load->view('profile/itemRequest');
		$this->load->view('common/marketPlaceFooter');
	}
	
	public function edit($user_id)
	{
		$this->user = $this->profiles->getUserInformation($user_id);
		$this->load->view('common/marketPlaceHeader');
		$this->load->view('profile/edit');
		$this->load->view('common/marketPlaceFooter');
	}
	
	public function imageUpload(){
		$this->load->view('profile/imageUpload');
	}
	
	public function update(){
		$this->profiles->update();
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */