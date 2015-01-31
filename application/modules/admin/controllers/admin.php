<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MX_Controller {

	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in')){	redirect(BASEURL.'login/loginView', 'refresh');}
		$session_data = $this->session->userdata('logged_in');
		if($session_data['usertype']!=1){redirect(BASEURL.'marketplace/listView', 'refresh');}

		$this->load->model('mdl_admin');
		$this->load->module('home');
		$this->load->module('user');
		$this->load->module('category');
		$this->load->module('item');

	}
	function googleAnalytic(){
		$this->generateAdminTempalte('googleAnalytic');
	}
	function dash(){
		$data['page_name'] = 'Dashboard';
		$data['item_count'] = $this->item->count_all();
		$data['user_count'] = $this->user->count_all();
		$css_array = array('odometer-theme-default.css');
		$js_array = array('odometer.min.js');
		$this->generateAdminTempalte('dash',$data,$css_array,$js_array);
	}
	function featuredSch(){
		$css_array = array('bootstrapValidator.css','datepicker.css');
		$js_array = array('bootstrapValidator.min.js','jquery.form.js');
		$this->load->module('slider');
		$data['slide_data'] = $this->slider->get('slide_id')->result();
		$this->generateAdminTempalte('featuredSch',$data,$css_array,$js_array);
	}
	function customAds(){
		$css_array = array('bootstrapValidator.css','datepicker.css');
		$js_array = array('bootstrapValidator.min.js','jquery.form.js');
		$this->load->module('banner');
		$data['banner_data'] = $this->banner->get('banner_id')->result();
		$this->generateAdminTempalte('customAds',$data,$css_array,$js_array);
	}
	function stat(){
		$this->generateAdminTempalte('statistics');
	}
	function pages(){
		$data['page_name'] = 'Pages';
		$this->generateAdminTempalte('pages',$data);
	}
	function editBannerPopup(){
		$banner_id =$_POST['id'];
		$this->load->module('banner');
		$banner_data = $this->banner->get_where($banner_id)->result();
		$data = json_encode($banner_data);
		echo $data;
	}
	function editSliderPopup(){
		$slide_id =$_POST['id'];
		$this->load->module('slider');
		$banner_data = $this->slider->get_where($slide_id)->result();
		$data = json_encode($banner_data);
		echo $data;
	}
	function categories($page=null){
		$per_page_user = 7;
		$active_page = $page;
		$page = ($page!=null) ? ($page-1) : 0;
		$page = $page*$per_page_user;
		$total_categories = $this->category->count_all();
		$data['iteratinons'] = ceil(($total_categories/$per_page_user));
		$data['page'] = $active_page;

		$data['category_data'] = $this->category->get_with_limit($per_page_user,$page,'category_id')->result();
		$this->generateAdminTempalte('categories',$data);
	}
	function featuredProd($page=null){
		$css_array = array('bootstrapValidator.css','datepicker.css');
		$js_array = array('bootstrapValidator.min.js','jquery.form.js');
		$per_page_prod = 7;
		$active_page = $page;
		$page = ($page!=null) ? ($page-1) : 0;
		$page = $page*$per_page_prod;
		$total_prod = $this->item->_custom_query("SELECT * from tb_items WHERE item_type=2 ORDER BY item_id DESC")->num_rows();
		$data['iteratinons'] = ceil(($total_prod/$per_page_prod));
		$data['page'] = $active_page;
		$data['featured_item_list'] = $this->item->_custom_query("SELECT * from tb_items WHERE item_type=2 ORDER BY item_id DESC")->result();
		$data['category_data'] = $this->category->get('category_id')->result_array();
		$this->generateAdminTempalte('featured-products',$data,$css_array,$js_array);
	}
	function editItemPopup(){
		$item_id =$_POST['id'];
		$item_data = $this->item->get_where($item_id)->result();
		$data = json_encode($item_data);
		echo $data;
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
	function deleteUserPopup(){
		$user_id =$_POST['id'];
		$user_data = $this->user->get_where($user_id)->result();
		$data = json_encode($user_data);
		echo $data;
	}
	function deleteCategorySave(){
		$category_id =$_POST['id'];
		$this->category->_delete($category_id);
		return true;
	}
	function deleteUserSave(){
		$user_id =$_POST['id'];
		$this->user->_delete($user_id);
		return true;
	}
	function deleteItem(){
		$item_id =$_POST['id'];
		$this->item->_delete($item_id);
		return true;
	}
	function deleteSlide(){
		$slide_id =$_POST['id'];
		$this->load->module('slider');
		$this->slider->_delete($slide_id);
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
