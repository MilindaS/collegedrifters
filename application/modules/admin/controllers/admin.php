<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MX_Controller {

	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in')){	redirect(BASEURL.'login/loginView', 'refresh');}

		$this->load->model('mdl_admin');
		$this->load->module('home');
		$this->load->module('user');
		$this->load->module('category');
		$this->load->module('item');
	}

	function dash(){
		$data['page_name'] = 'Dashboard';
		$data['item_count'] = $this->item->count_all();
		$data['user_count'] = $this->user->count_all();
		$css_array = array('odometer-theme-default.css');
		$js_array = array('odometer.min.js');
		$this->generateAdminTempalte('dash',$data,$css_array,$js_array);
	}
	function stat(){
		$this->generateAdminTempalte('statistics');
	}
	function pages(){
		$data['page_name'] = 'Pages';
		$this->generateAdminTempalte('pages',$data);
	}
	function categories($page=null){
		$per_page_user = 7;
		$active_page = $page;
		$page = ($page!=null) ? ($page-1) : 0;
		$page = $page*$per_page_user;
		$total_categories = $this->category->count_all();
		$data['iteratinons'] = ceil(($total_categories/$per_page_user));
		$data['category_data'] = $this->category->get_with_limit($per_page_user,$page,'category_id')->result();
		$data['page'] = $active_page;
		$this->generateAdminTempalte('categories',$data);
	}
	function featuredProd(){
		$data['featured_product_data'] = $this->item->get_where_custom('item_type',$page,'category_id')->result();
		$this->generateAdminTempalte('featured-products',$data);
	}
	function users($page=null){
		$data['page_name'] = 'Users';
		$per_page_user = 7;
		$active_page = $page;
		$page = ($page!=null) ? ($page-1) : 0;
		$page = $page*$per_page_user;
		$total_users = $this->user->count_all();
		$data['iteratinons'] = ceil(($total_users/$per_page_user));
		$data['user_data'] = $this->user->get_with_limit($per_page_user,$page,'user_id')->result();
		$data['page'] = $active_page;
		$this->generateAdminTempalte('users',$data);
	}
	function user($user_id=null){
		$data['user_data'] = $this->user->get_where($user_id)->result();
		$this->generateAdminTempalte('user/view',$data);
	}
	function smlinks($id=null){
		if($id){
			echo 1;
		}else{
			$this->load->module('smlinks');
			$data['links'] = $this->smlinks->get('smlinks_id')->result();
			$data['page_name'] = 'Social Media';
			$this->generateAdminTempalte('smlinks',$data);
		}
	}
	function editSmlinksPopup(){
		$smlinks_id =$_POST['id'];
		$this->load->module('smlinks');
		$link_data = $this->smlinks->get_where($smlinks_id)->result();
		$data = json_encode($link_data);
		echo $data;
	}
	function editCategoryPopup(){
		$category_id =$_POST['id'];
		$category_data = $this->category->get_where($category_id)->result();
		$data = json_encode($category_data);
		echo $data;
	}
	function deleteCategorySave(){
		$category_id =$_POST['id'];
		$this->category->_delete($category_id);
		return true;
	}
	function editSmlinksSave(){
		$smlinks_id = $_POST['smlinks_id'];
		$smlink_url = $_POST['smlink_url'];
		$smlink_name = $_POST['smlink_name'];
		$this->load->module('smlinks');
		$data = array(
               'smlinks_url' => $smlink_url,
               'smlinks_name' => $smlink_name
            );
		$this->smlinks->_update($smlinks_id,$data);
	}

	function editCategorySave(){
		$category_id = $_POST['category_id'];
		$category_name = $_POST['category_name'];
		$data = array(
               'category_name' => $category_name
            );
		if($category_id){
			$this->category->_update($category_id,$data);
		}
		else{
			$this->category->_insert($data);
		}
	}
	function generateAdminTempalte($page=null,$data=null,$css=null,$js=null){
		$this->home->header($css,$js);
		$this->load->view('admin-template-block-header',$data);
		$this->load->view($page,$data);
		$this->load->view('admin-template-block-footer');
		$this->home->footer();
	}







}
