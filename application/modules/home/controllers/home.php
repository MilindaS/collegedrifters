<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MX_Controller {

	public function index()
	{
		$this->header();
		$this->load->view('home');
		$this->footer();
	}

	public function header($css_array=null,$js_array=null){
		$data['css_array'] = $css_array;
		$data['js_array'] = $js_array;
		$this->load->view('header',$data);
	}

	public function footer(){
		$this->load->view('footer');
	}

	public function marketPlaceHeader($css_array=null,$js_array=null){
		$data['css_array'] = $css_array;
		$data['js_array'] = $js_array;
		$this->load->view('marketPlaceHeader',$data);
	}

	public function marketPlaceFooter(){
		$this->load->view('marketPlaceFooter');
	}
}

