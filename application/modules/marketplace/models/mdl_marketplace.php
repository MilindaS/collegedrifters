<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_marketplace extends CI_Model {

	function __construct(){
		parent::__construct();
	}
	public function getCustomList($per_page_item,$page){
		$sql = "SELECT * FROM tb_items
					INNER JOIN tb_users
					ON tb_items.item_user_id = tb_users.user_id
					WHERE tb_items.item_type = ? ORDER BY tb_items.item_created_date DESC LIMIT ?, ?
					";
		$params = array(0,$page,$per_page_item);
		$query = $this->db->query($sql,$params);
		return $query->result();
	}

	public function getItemList($page,$item_type=null){
		$counter = 5;
		$from = 0;
		$to = $counter;

		if($page!=null){
			$from = $page*$counter - $counter;
			$to = $page*$counter;
		}

		$sql = "SELECT * FROM tb_items
					INNER JOIN tb_categories
					ON tb_items.item_category = tb_categories.category_id
					INNER JOIN tb_users
					ON tb_items.item_user_id = tb_users.user_id";


		if($item_type !=null){
			$sql .= " WHERE tb_items.item_type = ? ORDER BY tb_items.item_created_date DESC LIMIT ?, ? ";
			$params = array($item_type,$from,$to);
		}
		else{
			$sql .= " ORDER BY tb_items.item_created_date DESC LIMIT ?, ?";
			$params = array($from,$to);
		}
		$query = $this->db->query($sql,$params);
		return $query->result_array();
	}
public function getFeaturedItemList($page,$item_type=null){
		$counter = 5;
		$from = 0;
		$to = $counter;

		if($page!=null){
			$from = $page*$counter - $counter;
			$to = $page*$counter;
		}

		$sql = "SELECT * FROM tb_items
					INNER JOIN tb_categories
					ON tb_items.item_category = tb_categories.category_id
					INNER JOIN tb_users
					ON tb_items.item_user_id = tb_users.user_id";


		if($item_type !=null){
			$sql .= " WHERE tb_items.item_type = ? ORDER BY tb_items.item_created_date DESC LIMIT ?, ? ";
			$params = array($item_type,$from,$to);
		}
		else{
			$sql .= " ORDER BY tb_items.item_created_date DESC LIMIT ?, ?";
			$params = array($from,$to);
		}
		$query = $this->db->query($sql,$params);
		return $query->result_array();
	}
	public function getItemCount(){
		$sql = "SELECT * FROM tb_items
					INNER JOIN tb_users
					ON tb_items.item_user_id = tb_users.user_id WHERE tb_items.item_type = 0
					";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}
	public function getLocalItemCount(){
		$sql = "SELECT * FROM tb_items
					INNER JOIN tb_categories
					ON tb_items.item_category = tb_categories.category_id
					INNER JOIN tb_users
					ON tb_items.item_user_id = tb_users.user_id
					WHERE tb_items.item_type = 1
					";
		$query = $this->db->query($sql);
		return $query->num_rows()/5;
	}

	public function getCategory(){
		$sql = "SELECT * FROM tb_categories";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function removeAd($item_id){
		$sql = "DELETE FROM tb_items WHERE  item_id = ?";
		$params = array($item_id);
		$query = $this->db->query($sql,$params);
		redirect(BASEURL.'marketplace/manage');
	}

	public function getItem($item_id){
		$sql = "SELECT * FROM tb_items
					INNER JOIN tb_categories
					ON tb_items.item_category = tb_categories.category_id
					INNER JOIN tb_users
					ON tb_items.item_user_id = tb_users.user_id
					WHERE item_id = ?
					";
		$params = array($item_id);
		$query = $this->db->query($sql,$params);
		return $query->row_array();
	}

public function getItemFilterdList(){

		$city = null;
		$state = null;
		$minPrice = 0;
		$maxPrice = 999999;
		$category = null;
		if(isset($_POST['city'])){
			$city =$_POST['city'];
		}
		if(isset($_POST['state'])){
			$state =$_POST['state'];
		}
		if(isset($_POST['minPrice'])){
			$minPrice =$_POST['minPrice'];
		}
		if(isset($_POST['maxPrice'])){
			$maxPrice =$_POST['maxPrice'];
		}
		if(isset($_POST['category'])){
			$category =$_POST['category'];
		}


		$sql = "SELECT * FROM tb_items
					INNER JOIN tb_categories
					ON tb_items.item_category = tb_categories.category_id
					INNER JOIN tb_users
					ON tb_items.item_user_id = tb_users.user_id
					";
		$params = array();
if(($_POST['zip'])!=null){
	if(($_POST['school'])!=null){
	if(($_POST['state'])!=null){
			if(($_POST['city'])!=null){
			if(($_POST['minPrice'])!=null){
				if(($_POST['maxPrice'])!=null){
					if(($_POST['category'])!=null){
						$sql .=	"WHERE tb_items.item_price BETWEEN ? AND ? AND  tb_users.user_city LIKE ? AND tb_users.user_state LIKE ? AND tb_items.item_category =? AND tb_users.user_school LIKE ? AND tb_users.user_zip LIKE ?";
						$params = array($_POST['minPrice'],$_POST['maxPrice'],'%'.$_POST['city'].'%','%'.$_POST['state'].'%',$_POST['category'],'%'.$_POST['school'].'%','%'.$_POST['zip'].'%');
					}
					else{
						$sql .=	"WHERE tb_items.item_price BETWEEN ? AND ? AND  tb_users.user_city LIKE ?  AND tb_users.user_state LIKE ? AND tb_users.user_school LIKE ? AND tb_users.user_zip LIKE ?";
						$params = array($_POST['minPrice'],$_POST['maxPrice'],'%'.$_POST['city'].'%','%'.$_POST['state'].'%','%'.$_POST['school'].'%','%'.$_POST['zip'].'%');
					}
				}
				else{
					if(($_POST['category'])!=null){
						$sql .=	"WHERE tb_items.item_price > ? AND  tb_users.user_city LIKE ? AND tb_items.item_category =? AND tb_users.user_state LIKE ? AND tb_users.user_school LIKE ? AND tb_users.user_zip LIKE ?";
						$params = array($_POST['minPrice'],'%'.$_POST['city'].'%',$_POST['category'],'%'.$_POST['state'].'%','%'.$_POST['school'].'%','%'.$_POST['zip'].'%');
					}
					else{
						$sql .=	"WHERE tb_items.item_price > ? AND  tb_users.user_city LIKE ? AND tb_users.user_state LIKE ? AND tb_users.user_school LIKE ? AND tb_users.user_zip LIKE ?";
						$params = array($_POST['minPrice'],'%'.$_POST['city'].'%','%'.$_POST['state'].'%','%'.$_POST['school'].'%','%'.$_POST['zip'].'%');
					}
				}
			}
			else{

				if(($_POST['maxPrice'])!=null){
					if(($_POST['category'])!=null){
						$sql .=	"WHERE tb_items.item_price < ? AND  tb_users.user_city LIKE ? AND tb_items.item_category =? AND tb_users.user_state LIKE ? AND tb_users.user_school LIKE ? AND tb_users.user_zip LIKE ?";
						$params = array($_POST['maxPrice'],'%'.$_POST['city'].'%',$_POST['category'],'%'.$_POST['state'].'%','%'.$_POST['school'].'%','%'.$_POST['zip'].'%');
					}
					else{
						$sql .=	"WHERE tb_items.item_price < ? AND  tb_users.user_city LIKE ? AND tb_users.user_state LIKE ? AND tb_users.user_school LIKE ? AND tb_users.user_zip LIKE ?";
						$params = array($_POST['maxPrice'],'%'.$_POST['city'].'%','%'.$_POST['state'].'%','%'.$_POST['school'].'%','%'.$_POST['zip'].'%');
					}
				}
				else{
					if(($_POST['category'])!=null){
						$sql .=	"WHERE tb_users.user_city LIKE ? AND tb_items.item_category =? AND tb_users.user_state LIKE ? AND tb_users.user_school LIKE ? AND tb_users.user_zip LIKE ?";
						$params = array('%'.$_POST['city'].'%',$_POST['category'],'%'.$_POST['state'].'%','%'.$_POST['school'].'%','%'.$_POST['zip'].'%');
					}
					else{
						$sql .=	"WHERE tb_users.user_city LIKE ? AND tb_users.user_state LIKE ? AND tb_users.user_school LIKE ? AND tb_users.user_zip LIKE ?";
						$params = array('%'.$_POST['city'].'%','%'.$_POST['state'].'%','%'.$_POST['school'].'%','%'.$_POST['zip'].'%');
					}
				}


			}
		}
		else{


				if(($_POST['minPrice'])!=null){
				if(($_POST['maxPrice'])!=null){
					if(($_POST['category'])!=null){
						$sql .=	"WHERE tb_items.item_price BETWEEN ? AND ? AND  tb_items.item_category =? AND tb_users.user_state LIKE ? AND tb_users.user_school LIKE ? AND tb_users.user_zip LIKE ?";
						$params = array($_POST['minPrice'],$_POST['maxPrice'],$_POST['category'] ,'%'.$_POST['state'].'%','%'.$_POST['school'].'%','%'.$_POST['zip'].'%');
					}
					else{
						$sql .=	"WHERE tb_items.item_price BETWEEN ? AND ? AND tb_users.user_state LIKE ? AND tb_users.user_school LIKE ? AND tb_users.user_zip LIKE ?";
						$params = array($_POST['minPrice'],$_POST['maxPrice'],'%'.$_POST['state'].'%','%'.$_POST['school'].'%','%'.$_POST['zip'].'%');
					}
				}
				else{
					if(($_POST['category'])!=null){
						$sql .=	"WHERE tb_items.item_price > ? AND tb_items.item_category =? AND tb_users.user_state LIKE ? AND tb_users.user_school LIKE ? AND tb_users.user_zip LIKE ?";
						$params = array($_POST['minPrice'],$_POST['category'],'%'.$_POST['state'].'%','%'.$_POST['school'].'%','%'.$_POST['zip'].'%');
					}
					else{
						$sql .=	"WHERE tb_items.item_price > ? AND tb_users.user_state LIKE ? AND tb_users.user_school LIKE ? AND tb_users.user_zip LIKE ?";
						$params = array($_POST['minPrice'],'%'.$_POST['state'].'%','%'.$_POST['school'].'%','%'.$_POST['zip'].'%');
					}
				}
			}
			else{

				if(($_POST['maxPrice'])!=null){
					if(($_POST['category'])!=null){
						$sql .=	"WHERE tb_items.item_price < ? AND tb_items.item_category =? AND tb_users.user_state LIKE ? AND tb_users.user_school LIKE ? AND tb_users.user_zip LIKE ?";
						$params = array($_POST['maxPrice'],$_POST['category'],'%'.$_POST['state'].'%','%'.$_POST['school'].'%','%'.$_POST['zip'].'%');
					}
					else{
						$sql .=	"WHERE tb_items.item_price < ? AND tb_users.user_state LIKE ? AND tb_users.user_school LIKE ? AND tb_users.user_zip LIKE ?";
						$params = array($_POST['maxPrice'],'%'.$_POST['state'].'%','%'.$_POST['school'].'%','%'.$_POST['zip'].'%');
					}
				}
				else{
					if(($_POST['category'])!=null){
						$sql .=	"WHERE tb_items.item_category =? AND tb_users.user_state LIKE ? AND tb_users.user_school LIKE ? AND tb_users.user_zip LIKE ?";
						$params = array($_POST['category'],'%'.$_POST['state'].'%','%'.$_POST['school'].'%','%'.$_POST['zip'].'%');
					}
					else{
						$sql .=	"WHERE tb_users.user_school LIKE ? AND tb_users.user_zip LIKE ?";
						$params = array('%'.$_POST['school'].'%','%'.$_POST['zip'].'%');
					}
				}


			}


		}

		}else{
		if(($_POST['city'])!=null){
			if(($_POST['minPrice'])!=null){
				if(($_POST['maxPrice'])!=null){
					if(($_POST['category'])!=null){
						$sql .=	"WHERE tb_items.item_price BETWEEN ? AND ? AND  tb_users.user_city LIKE ? AND tb_items.item_category =? AND tb_users.user_school LIKE ? AND tb_users.user_zip LIKE ?";
						$params = array($_POST['minPrice'],$_POST['maxPrice'],'%'.$_POST['city'].'%',$_POST['category'],'%'.$_POST['school'].'%','%'.$_POST['zip'].'%');
					}
					else{
						$sql .=	"WHERE tb_items.item_price BETWEEN ? AND ? AND  tb_users.user_city LIKE ? AND tb_users.user_school LIKE ? AND tb_users.user_zip LIKE ?";
						$params = array($_POST['minPrice'],$_POST['maxPrice'],'%'.$_POST['city'].'%','%'.$_POST['school'].'%','%'.$_POST['zip'].'%');
					}
				}
				else{
					if(($_POST['category'])!=null){
						$sql .=	"WHERE tb_items.item_price > ? AND  tb_users.user_city LIKE ? AND tb_items.item_category =? AND tb_users.user_school LIKE ? AND tb_users.user_zip LIKE ?";
						$params = array($_POST['minPrice'],'%'.$_POST['city'].'%',$_POST['category'],'%'.$_POST['school'].'%','%'.$_POST['zip'].'%');
					}
					else{
						$sql .=	"WHERE tb_items.item_price > ? AND  tb_users.user_city LIKE ? AND tb_users.user_school LIKE ? AND tb_users.user_zip LIKE ?";
						$params = array($_POST['minPrice'],'%'.$_POST['city'].'%','%'.$_POST['school'].'%','%'.$_POST['zip'].'%');
					}
				}
			}
			else{

				if(($_POST['maxPrice'])!=null){
					if(($_POST['category'])!=null){
						$sql .=	"WHERE tb_items.item_price < ? AND  tb_users.user_city LIKE ? AND tb_items.item_category =? AND tb_users.user_school LIKE ? AND tb_users.user_zip LIKE ?";
						$params = array($_POST['maxPrice'],'%'.$_POST['city'].'%',$_POST['category'],'%'.$_POST['school'].'%','%'.$_POST['zip'].'%');
					}
					else{
						$sql .=	"WHERE tb_items.item_price < ? AND  tb_users.user_city LIKE ? AND tb_users.user_school LIKE ? AND tb_users.user_zip LIKE ?";
						$params = array($_POST['maxPrice'],'%'.$_POST['city'].'%','%'.$_POST['school'].'%','%'.$_POST['zip'].'%');
					}
				}
				else{
					if(($_POST['category'])!=null){
						$sql .=	"WHERE tb_users.user_city LIKE ? AND tb_items.item_category =? AND tb_users.user_school LIKE ? AND tb_users.user_zip LIKE ?";
						$params = array('%'.$_POST['city'].'%',$_POST['category'],'%'.$_POST['school'].'%','%'.$_POST['zip'].'%');
					}
					else{
						$sql .=	"WHERE tb_users.user_city LIKE ? AND tb_users.user_school LIKE ? AND tb_users.user_zip LIKE ?";
						$params = array('%'.$_POST['city'].'%','%'.$_POST['school'].'%','%'.$_POST['zip'].'%');
					}
				}


			}
		}
		else{
				if(($_POST['minPrice'])!=null){
					if(($_POST['maxPrice'])!=null){
						if(($_POST['category'])!=null){
							$sql .=	"WHERE tb_items.item_price BETWEEN ? AND ? AND  tb_items.item_category =? AND tb_users.user_school LIKE ? AND tb_users.user_zip LIKE ?";
							$params = array($_POST['minPrice'],$_POST['maxPrice'],$_POST['category'],'%'.$_POST['school'].'%','%'.$_POST['zip'].'%');
						}
						else{
							$sql .=	"WHERE tb_items.item_price BETWEEN ? AND ? AND tb_users.user_school LIKE ? AND tb_users.user_zip LIKE ?";
							$params = array($_POST['minPrice'],$_POST['maxPrice'],'%'.$_POST['school'].'%','%'.$_POST['zip'].'%');
						}
					}
					else{
						if(($_POST['category'])!=null){
							$sql .=	"WHERE tb_items.item_price > ? AND tb_items.item_category =? AND tb_users.user_school LIKE ? AND tb_users.user_zip LIKE ?";
							$params = array($_POST['minPrice'],$_POST['category'],'%'.$_POST['school'].'%','%'.$_POST['zip'].'%');
						}
						else{
							$sql .=	"WHERE tb_items.item_price > ? AND tb_users.user_school LIKE ? AND tb_users.user_zip LIKE ?";
							$params = array($_POST['minPrice'],'%'.$_POST['school'].'%','%'.$_POST['zip'].'%');
						}
					}
				}
				else{

					if(($_POST['maxPrice'])!=null){
						if(($_POST['category'])!=null){
							$sql .=	"WHERE tb_items.item_price < ? AND tb_items.item_category =? AND tb_users.user_school LIKE ? AND tb_users.user_zip LIKE ?";
							$params = array($_POST['maxPrice'],$_POST['category'],'%'.$_POST['school'].'%','%'.$_POST['zip'].'%');
						}
						else{
							$sql .=	"WHERE tb_items.item_price < ?  AND tb_users.user_school LIKE ? AND tb_users.user_zip LIKE ?";
							$params = array($_POST['maxPrice'],'%'.$_POST['school'].'%','%'.$_POST['zip'].'%');
						}
					}
					else{
						if(($_POST['category'])!=null){
							$sql .=	"WHERE tb_items.item_category =? AND tb_users.user_school LIKE ? AND tb_users.user_zip LIKE ?";
							$params = array($_POST['category'],'%'.$_POST['school'].'%','%'.$_POST['zip'].'%');
						}
						else{
							$sql .=	"WHERE tb_users.user_school LIKE ? AND tb_users.user_zip LIKE ?";
							$params = array('%'.$_POST['school'].'%' ,'%'.$_POST['zip'].'%');
						}
					}


				}


			}
		}
	}else{
			if(($_POST['state'])!=null){
			if(($_POST['city'])!=null){
			if(($_POST['minPrice'])!=null){
				if(($_POST['maxPrice'])!=null){
					if(($_POST['category'])!=null){
						$sql .=	"WHERE tb_items.item_price BETWEEN ? AND ? AND  tb_users.user_city LIKE ? AND tb_users.user_state LIKE ? AND tb_items.item_category =? AND tb_users.user_zip LIKE ?";
						$params = array($_POST['minPrice'],$_POST['maxPrice'],'%'.$_POST['city'].'%','%'.$_POST['state'].'%',$_POST['category'],'%'.$_POST['zip'].'%');
					}
					else{
						$sql .=	"WHERE tb_items.item_price BETWEEN ? AND ? AND  tb_users.user_city LIKE ?  AND tb_users.user_state LIKE ? AND tb_users.user_zip LIKE ?";
						$params = array($_POST['minPrice'],$_POST['maxPrice'],'%'.$_POST['city'].'%','%'.$_POST['state'].'%','%'.$_POST['zip'].'%');
					}
				}
				else{
					if(($_POST['category'])!=null){
						$sql .=	"WHERE tb_items.item_price > ? AND  tb_users.user_city LIKE ? AND tb_items.item_category =? AND tb_users.user_state LIKE ? AND tb_users.user_zip LIKE ?";
						$params = array($_POST['minPrice'],'%'.$_POST['city'].'%',$_POST['category'],'%'.$_POST['state'].'%','%'.$_POST['zip'].'%');
					}
					else{
						$sql .=	"WHERE tb_items.item_price > ? AND  tb_users.user_city LIKE ? AND tb_users.user_state LIKE ? AND tb_users.user_zip LIKE ?";
						$params = array($_POST['minPrice'],'%'.$_POST['city'].'%','%'.$_POST['state'].'%','%'.$_POST['zip'].'%');
					}
				}
			}
			else{

				if(($_POST['maxPrice'])!=null){
					if(($_POST['category'])!=null){
						$sql .=	"WHERE tb_items.item_price < ? AND  tb_users.user_city LIKE ? AND tb_items.item_category =? AND tb_users.user_state LIKE ? AND tb_users.user_zip LIKE ?";
						$params = array($_POST['maxPrice'],'%'.$_POST['city'].'%',$_POST['category'],'%'.$_POST['state'].'%','%'.$_POST['zip'].'%');
					}
					else{
						$sql .=	"WHERE tb_items.item_price < ? AND  tb_users.user_city LIKE ? AND tb_users.user_state LIKE ? AND tb_users.user_zip LIKE ?";
						$params = array($_POST['maxPrice'],'%'.$_POST['city'].'%','%'.$_POST['state'].'%','%'.$_POST['zip'].'%');
					}
				}
				else{
					if(($_POST['category'])!=null){
						$sql .=	"WHERE tb_users.user_city LIKE ? AND tb_items.item_category =? AND tb_users.user_state LIKE ? AND tb_users.user_zip LIKE ?";
						$params = array('%'.$_POST['city'].'%',$_POST['category'],'%'.$_POST['state'].'%','%'.$_POST['zip'].'%');
					}
					else{
						$sql .=	"WHERE tb_users.user_city LIKE ? AND tb_users.user_state LIKE ? AND tb_users.user_zip LIKE ?";
						$params = array('%'.$_POST['city'].'%','%'.$_POST['state'].'%','%'.$_POST['zip'].'%');
					}
				}


			}
		}
		else{


				if(($_POST['minPrice'])!=null){
				if(($_POST['maxPrice'])!=null){
					if(($_POST['category'])!=null){
						$sql .=	"WHERE tb_items.item_price BETWEEN ? AND ? AND  tb_items.item_category =? AND tb_users.user_state LIKE ?  AND tb_users.user_zip LIKE ?";
						$params = array($_POST['minPrice'],$_POST['maxPrice'],$_POST['category'] ,'%'.$_POST['state'].'%','%'.$_POST['zip'].'%');
					}
					else{
						$sql .=	"WHERE tb_items.item_price BETWEEN ? AND ? AND tb_users.user_state LIKE ? AND tb_users.user_zip LIKE ?";
						$params = array($_POST['minPrice'],$_POST['maxPrice'],'%'.$_POST['state'].'%','%'.$_POST['zip'].'%');
					}
				}
				else{
					if(($_POST['category'])!=null){
						$sql .=	"WHERE tb_items.item_price > ? AND tb_items.item_category =? AND tb_users.user_state LIKE ? AND tb_users.user_zip LIKE ?";
						$params = array($_POST['minPrice'],$_POST['category'],'%'.$_POST['state'].'%','%'.$_POST['zip'].'%');
					}
					else{
						$sql .=	"WHERE tb_items.item_price > ? AND tb_users.user_state LIKE ? AND tb_users.user_zip LIKE ?";
						$params = array($_POST['minPrice'],'%'.$_POST['state'].'%','%'.$_POST['zip'].'%');
					}
				}
			}
			else{

				if(($_POST['maxPrice'])!=null){
					if(($_POST['category'])!=null){
						$sql .=	"WHERE tb_items.item_price < ? AND tb_items.item_category =? AND tb_users.user_state LIKE ? AND tb_users.user_zip LIKE ?";
						$params = array($_POST['maxPrice'],$_POST['category'],'%'.$_POST['state'].'%','%'.$_POST['zip'].'%');
					}
					else{
						$sql .=	"WHERE tb_items.item_price < ? AND tb_users.user_state LIKE ? AND tb_users.user_zip LIKE ?";
						$params = array($_POST['maxPrice'],'%'.$_POST['state'].'%','%'.$_POST['zip'].'%');
					}
				}
				else{
					if(($_POST['category'])!=null){
						$sql .=	"WHERE tb_items.item_category =? AND tb_users.user_state LIKE ? AND tb_users.user_zip LIKE ?";
						$params = array($_POST['category'],'%'.$_POST['state'].'%','%'.$_POST['zip'].'%');
					}
					else{
						$sql .=	"WHERE tb_users.user_zip LIKE ?";
						$params = array('%'.$_POST['zip'].'%');
					}
				}


			}


		}

		}else{
		if(($_POST['city'])!=null){
			if(($_POST['minPrice'])!=null){
				if(($_POST['maxPrice'])!=null){
					if(($_POST['category'])!=null){
						$sql .=	"WHERE tb_items.item_price BETWEEN ? AND ? AND  tb_users.user_city LIKE ? AND tb_items.item_category =? AND tb_users.user_zip LIKE ?";
						$params = array($_POST['minPrice'],$_POST['maxPrice'],'%'.$_POST['city'].'%',$_POST['category'],'%'.$_POST['zip'].'%');
					}
					else{
						$sql .=	"WHERE tb_items.item_price BETWEEN ? AND ? AND  tb_users.user_city LIKE ? AND tb_users.user_zip LIKE ?";
						$params = array($_POST['minPrice'],$_POST['maxPrice'],'%'.$_POST['city'].'%','%'.$_POST['zip'].'%');
					}
				}
				else{
					if(($_POST['category'])!=null){
						$sql .=	"WHERE tb_items.item_price > ? AND  tb_users.user_city LIKE ? AND tb_items.item_category =? AND tb_users.user_zip LIKE ?";
						$params = array($_POST['minPrice'],'%'.$_POST['city'].'%',$_POST['category'],'%'.$_POST['zip'].'%');
					}
					else{
						$sql .=	"WHERE tb_items.item_price > ? AND  tb_users.user_city LIKE ? AND tb_users.user_zip LIKE ?";
						$params = array($_POST['minPrice'],'%'.$_POST['city'].'%','%'.$_POST['zip'].'%');
					}
				}
			}
			else{

				if(($_POST['maxPrice'])!=null){
					if(($_POST['category'])!=null){
						$sql .=	"WHERE tb_items.item_price < ? AND  tb_users.user_city LIKE ? AND tb_items.item_category =? AND tb_users.user_zip LIKE ?";
						$params = array($_POST['maxPrice'],'%'.$_POST['city'].'%',$_POST['category'],'%'.$_POST['zip'].'%');
					}
					else{
						$sql .=	"WHERE tb_items.item_price < ? AND  tb_users.user_city LIKE ? AND tb_users.user_zip LIKE ?";
						$params = array($_POST['maxPrice'],'%'.$_POST['city'].'%','%'.$_POST['zip'].'%');
					}
				}
				else{
					if(($_POST['category'])!=null){
						$sql .=	"WHERE tb_users.user_city LIKE ? AND tb_items.item_category =? AND tb_users.user_zip LIKE ?";
						$params = array('%'.$_POST['city'].'%',$_POST['category'],'%'.$_POST['zip'].'%');
					}
					else{
						$sql .=	"WHERE tb_users.user_city LIKE ? AND tb_users.user_zip LIKE ?";
						$params = array('%'.$_POST['city'].'%','%'.$_POST['zip'].'%');
					}
				}


			}
		}
		else{
				if(($_POST['minPrice'])!=null){
					if(($_POST['maxPrice'])!=null){
						if(($_POST['category'])!=null){
							$sql .=	"WHERE tb_items.item_price BETWEEN ? AND ? AND  tb_items.item_category =? AND tb_users.user_zip LIKE ?";
							$params = array($_POST['minPrice'],$_POST['maxPrice'],$_POST['category'],'%'.$_POST['zip'].'%');
						}
						else{
							$sql .=	"WHERE tb_items.item_price BETWEEN ? AND ? AND tb_users.user_zip LIKE ?";
							$params = array($_POST['minPrice'],$_POST['maxPrice'],'%'.$_POST['zip'].'%');
						}
					}
					else{
						if(($_POST['category'])!=null){
							$sql .=	"WHERE tb_items.item_price > ? AND tb_items.item_category =? AND tb_users.user_zip LIKE ?";
							$params = array($_POST['minPrice'],$_POST['category'],'%'.$_POST['zip'].'%');
						}
						else{
							$sql .=	"WHERE tb_items.item_price > ? AND tb_users.user_zip LIKE ?";
							$params = array($_POST['minPrice'],'%'.$_POST['zip'].'%');
						}
					}
				}
				else{

					if(($_POST['maxPrice'])!=null){
						if(($_POST['category'])!=null){
							$sql .=	"WHERE tb_items.item_price < ? AND tb_items.item_category =? AND tb_users.user_zip LIKE ?";
							$params = array($_POST['maxPrice'],$_POST['category'],'%'.$_POST['zip'].'%');
						}
						else{
							$sql .=	"WHERE tb_items.item_price < ?  AND tb_users.user_zip LIKE ?";
							$params = array($_POST['maxPrice'],'%'.$_POST['zip'].'%');
						}
					}
					else{
						if(($_POST['category'])!=null){
							$sql .=	"WHERE tb_items.item_category =? AND tb_users.user_zip LIKE ?";
							$params = array($_POST['category'],'%'.$_POST['zip'].'%');
						}
						else{
							$sql .=	"WHERE tb_users.user_zip LIKE ?";
							$params = array('%'.$_POST['zip'].'%');
						}
					}


				}


			}
		}
		}
}























else{
if(($_POST['school'])!=null){
	if(($_POST['state'])!=null){
			if(($_POST['city'])!=null){
			if(($_POST['minPrice'])!=null){
				if(($_POST['maxPrice'])!=null){
					if(($_POST['category'])!=null){
						$sql .=	"WHERE tb_items.item_price BETWEEN ? AND ? AND  tb_users.user_city LIKE ? AND tb_users.user_state LIKE ? AND tb_items.item_category =? AND tb_users.user_school LIKE ?";
						$params = array($_POST['minPrice'],$_POST['maxPrice'],'%'.$_POST['city'].'%','%'.$_POST['state'].'%',$_POST['category'],'%'.$_POST['school'].'%');
					}
					else{
						$sql .=	"WHERE tb_items.item_price BETWEEN ? AND ? AND  tb_users.user_city LIKE ?  AND tb_users.user_state LIKE ? AND tb_users.user_school LIKE ?";
						$params = array($_POST['minPrice'],$_POST['maxPrice'],'%'.$_POST['city'].'%','%'.$_POST['state'].'%','%'.$_POST['school'].'%');
					}
				}
				else{
					if(($_POST['category'])!=null){
						$sql .=	"WHERE tb_items.item_price > ? AND  tb_users.user_city LIKE ? AND tb_items.item_category =? AND tb_users.user_state LIKE ? AND tb_users.user_school LIKE ?";
						$params = array($_POST['minPrice'],'%'.$_POST['city'].'%',$_POST['category'],'%'.$_POST['state'].'%','%'.$_POST['school'].'%');
					}
					else{
						$sql .=	"WHERE tb_items.item_price > ? AND  tb_users.user_city LIKE ? AND tb_users.user_state LIKE ? AND tb_users.user_school LIKE ?";
						$params = array($_POST['minPrice'],'%'.$_POST['city'].'%','%'.$_POST['state'].'%','%'.$_POST['school'].'%');
					}
				}
			}
			else{

				if(($_POST['maxPrice'])!=null){
					if(($_POST['category'])!=null){
						$sql .=	"WHERE tb_items.item_price < ? AND  tb_users.user_city LIKE ? AND tb_items.item_category =? AND tb_users.user_state LIKE ? AND tb_users.user_school LIKE ?";
						$params = array($_POST['maxPrice'],'%'.$_POST['city'].'%',$_POST['category'],'%'.$_POST['state'].'%','%'.$_POST['school'].'%');
					}
					else{
						$sql .=	"WHERE tb_items.item_price < ? AND  tb_users.user_city LIKE ? AND tb_users.user_state LIKE ? AND tb_users.user_school LIKE ?";
						$params = array($_POST['maxPrice'],'%'.$_POST['city'].'%','%'.$_POST['state'].'%','%'.$_POST['school'].'%');
					}
				}
				else{
					if(($_POST['category'])!=null){
						$sql .=	"WHERE tb_users.user_city LIKE ? AND tb_items.item_category =? AND tb_users.user_state LIKE ? AND tb_users.user_school LIKE ?";
						$params = array('%'.$_POST['city'].'%',$_POST['category'],'%'.$_POST['state'].'%','%'.$_POST['school'].'%');
					}
					else{
						$sql .=	"WHERE tb_users.user_city LIKE ? AND tb_users.user_state LIKE ? AND tb_users.user_school LIKE ?";
						$params = array('%'.$_POST['city'].'%','%'.$_POST['state'].'%','%'.$_POST['school'].'%');
					}
				}


			}
		}
		else{


				if(($_POST['minPrice'])!=null){
				if(($_POST['maxPrice'])!=null){
					if(($_POST['category'])!=null){
						$sql .=	"WHERE tb_items.item_price BETWEEN ? AND ? AND  tb_items.item_category =? AND tb_users.user_state LIKE ? AND tb_users.user_school LIKE ? ";
						$params = array($_POST['minPrice'],$_POST['maxPrice'],$_POST['category'] ,'%'.$_POST['state'].'%','%'.$_POST['school'].'%');
					}
					else{
						$sql .=	"WHERE tb_items.item_price BETWEEN ? AND ? AND tb_users.user_state LIKE ? AND tb_users.user_school LIKE ?";
						$params = array($_POST['minPrice'],$_POST['maxPrice'],'%'.$_POST['state'].'%','%'.$_POST['school'].'%');
					}
				}
				else{
					if(($_POST['category'])!=null){
						$sql .=	"WHERE tb_items.item_price > ? AND tb_items.item_category =? AND tb_users.user_state LIKE ? AND tb_users.user_school LIKE ?";
						$params = array($_POST['minPrice'],$_POST['category'],'%'.$_POST['state'].'%','%'.$_POST['school'].'%');
					}
					else{
						$sql .=	"WHERE tb_items.item_price > ? AND tb_users.user_state LIKE ? AND tb_users.user_school LIKE ?";
						$params = array($_POST['minPrice'],'%'.$_POST['state'].'%','%'.$_POST['school'].'%');
					}
				}
			}
			else{

				if(($_POST['maxPrice'])!=null){
					if(($_POST['category'])!=null){
						$sql .=	"WHERE tb_items.item_price < ? AND tb_items.item_category =? AND tb_users.user_state LIKE ? AND tb_users.user_school LIKE ?";
						$params = array($_POST['maxPrice'],$_POST['category'],'%'.$_POST['state'].'%','%'.$_POST['school'].'%');
					}
					else{
						$sql .=	"WHERE tb_items.item_price < ? AND tb_users.user_state LIKE ? AND tb_users.user_school LIKE ?";
						$params = array($_POST['maxPrice'],'%'.$_POST['state'].'%','%'.$_POST['school'].'%');
					}
				}
				else{
					if(($_POST['category'])!=null){
						$sql .=	"WHERE tb_items.item_category =? AND tb_users.user_state LIKE ? AND tb_users.user_school LIKE ? ";
						$params = array($_POST['category'],'%'.$_POST['state'].'%','%'.$_POST['school'].'%');
					}
					else{
						$sql .=	"WHERE tb_users.user_school LIKE ?";
						$params = array('%'.$_POST['school'].'%');
					}
				}


			}


		}

		}else{
		if(($_POST['city'])!=null){
			if(($_POST['minPrice'])!=null){
				if(($_POST['maxPrice'])!=null){
					if(($_POST['category'])!=null){
						$sql .=	"WHERE tb_items.item_price BETWEEN ? AND ? AND  tb_users.user_city LIKE ? AND tb_items.item_category =? AND tb_users.user_school LIKE ?";
						$params = array($_POST['minPrice'],$_POST['maxPrice'],'%'.$_POST['city'].'%',$_POST['category'],'%'.$_POST['school'].'%');
					}
					else{
						$sql .=	"WHERE tb_items.item_price BETWEEN ? AND ? AND  tb_users.user_city LIKE ? AND tb_users.user_school LIKE ? ";
						$params = array($_POST['minPrice'],$_POST['maxPrice'],'%'.$_POST['city'].'%','%'.$_POST['school'].'%');
					}
				}
				else{
					if(($_POST['category'])!=null){
						$sql .=	"WHERE tb_items.item_price > ? AND  tb_users.user_city LIKE ? AND tb_items.item_category =? AND tb_users.user_school LIKE ?";
						$params = array($_POST['minPrice'],'%'.$_POST['city'].'%',$_POST['category'],'%'.$_POST['school'].'%');
					}
					else{
						$sql .=	"WHERE tb_items.item_price > ? AND  tb_users.user_city LIKE ? AND tb_users.user_school LIKE ?";
						$params = array($_POST['minPrice'],'%'.$_POST['city'].'%','%'.$_POST['school'].'%');
					}
				}
			}
			else{

				if(($_POST['maxPrice'])!=null){
					if(($_POST['category'])!=null){
						$sql .=	"WHERE tb_items.item_price < ? AND  tb_users.user_city LIKE ? AND tb_items.item_category =? AND tb_users.user_school LIKE ?";
						$params = array($_POST['maxPrice'],'%'.$_POST['city'].'%',$_POST['category'],'%'.$_POST['school'].'%');
					}
					else{
						$sql .=	"WHERE tb_items.item_price < ? AND  tb_users.user_city LIKE ? AND tb_users.user_school LIKE ?";
						$params = array($_POST['maxPrice'],'%'.$_POST['city'].'%','%'.$_POST['school'].'%');
					}
				}
				else{
					if(($_POST['category'])!=null){
						$sql .=	"WHERE tb_users.user_city LIKE ? AND tb_items.item_category =? AND tb_users.user_school LIKE ?";
						$params = array('%'.$_POST['city'].'%',$_POST['category'],'%'.$_POST['school'].'%');
					}
					else{
						$sql .=	"WHERE tb_users.user_city LIKE ? AND tb_users.user_school LIKE ?";
						$params = array('%'.$_POST['city'].'%','%'.$_POST['school'].'%');
					}
				}


			}
		}
		else{
				if(($_POST['minPrice'])!=null){
					if(($_POST['maxPrice'])!=null){
						if(($_POST['category'])!=null){
							$sql .=	"WHERE tb_items.item_price BETWEEN ? AND ? AND  tb_items.item_category =? AND tb_users.user_school LIKE ?";
							$params = array($_POST['minPrice'],$_POST['maxPrice'],$_POST['category'],'%'.$_POST['school'].'%');
						}
						else{
							$sql .=	"WHERE tb_items.item_price BETWEEN ? AND ? AND tb_users.user_school LIKE ?";
							$params = array($_POST['minPrice'],$_POST['maxPrice'],'%'.$_POST['school'].'%');
						}
					}
					else{
						if(($_POST['category'])!=null){
							$sql .=	"WHERE tb_items.item_price > ? AND tb_items.item_category =? AND tb_users.user_school LIKE ? ";
							$params = array($_POST['minPrice'],$_POST['category'],'%'.$_POST['school'].'%');
						}
						else{
							$sql .=	"WHERE tb_items.item_price > ? AND tb_users.user_school LIKE ?";
							$params = array($_POST['minPrice'],'%'.$_POST['school'].'%');
						}
					}
				}
				else{

					if(($_POST['maxPrice'])!=null){
						if(($_POST['category'])!=null){
							$sql .=	"WHERE tb_items.item_price < ? AND tb_items.item_category =? AND tb_users.user_school LIKE ?";
							$params = array($_POST['maxPrice'],$_POST['category'],'%'.$_POST['school'].'%');
						}
						else{
							$sql .=	"WHERE tb_items.item_price < ?  AND tb_users.user_school LIKE ?";
							$params = array($_POST['maxPrice'],'%'.$_POST['school'].'%');
						}
					}
					else{
						if(($_POST['category'])!=null){
							$sql .=	"WHERE tb_items.item_category =? AND tb_users.user_school LIKE ?";
							$params = array($_POST['category'],'%'.$_POST['school'].'%');
						}
						else{
							$sql .=	"WHERE tb_users.user_school LIKE ?";
							$params = array('%'.$_POST['school'].'%');
						}
					}


				}


			}
		}
	}else{
			if(($_POST['state'])!=null){
			if(($_POST['city'])!=null){
			if(($_POST['minPrice'])!=null){
				if(($_POST['maxPrice'])!=null){
					if(($_POST['category'])!=null){
						$sql .=	"WHERE tb_items.item_price BETWEEN ? AND ? AND  tb_users.user_city LIKE ? AND tb_users.user_state LIKE ? AND tb_items.item_category =? ";
						$params = array($_POST['minPrice'],$_POST['maxPrice'],'%'.$_POST['city'].'%','%'.$_POST['state'].'%',$_POST['category']);
					}
					else{
						$sql .=	"WHERE tb_items.item_price BETWEEN ? AND ? AND  tb_users.user_city LIKE ?  AND tb_users.user_state LIKE ? ";
						$params = array($_POST['minPrice'],$_POST['maxPrice'],'%'.$_POST['city'].'%','%'.$_POST['state'].'%');
					}
				}
				else{
					if(($_POST['category'])!=null){
						$sql .=	"WHERE tb_items.item_price > ? AND  tb_users.user_city LIKE ? AND tb_items.item_category =? AND tb_users.user_state LIKE ?";
						$params = array($_POST['minPrice'],'%'.$_POST['city'].'%',$_POST['category'],'%'.$_POST['state'].'%');
					}
					else{
						$sql .=	"WHERE tb_items.item_price > ? AND  tb_users.user_city LIKE ? AND tb_users.user_state LIKE ? ";
						$params = array($_POST['minPrice'],'%'.$_POST['city'].'%','%'.$_POST['state'].'%');
					}
				}
			}
			else{

				if(($_POST['maxPrice'])!=null){
					if(($_POST['category'])!=null){
						$sql .=	"WHERE tb_items.item_price < ? AND  tb_users.user_city LIKE ? AND tb_items.item_category =? AND tb_users.user_state LIKE ? ";
						$params = array($_POST['maxPrice'],'%'.$_POST['city'].'%',$_POST['category'],'%'.$_POST['state'].'%');
					}
					else{
						$sql .=	"WHERE tb_items.item_price < ? AND  tb_users.user_city LIKE ? AND tb_users.user_state LIKE ? ";
						$params = array($_POST['maxPrice'],'%'.$_POST['city'].'%','%'.$_POST['state'].'%');
					}
				}
				else{
					if(($_POST['category'])!=null){
						$sql .=	"WHERE tb_users.user_city LIKE ? AND tb_items.item_category =? AND tb_users.user_state LIKE ? ";
						$params = array('%'.$_POST['city'].'%',$_POST['category'],'%'.$_POST['state'].'%');
					}
					else{
						$sql .=	"WHERE tb_users.user_city LIKE ? AND tb_users.user_state LIKE ? ";
						$params = array('%'.$_POST['city'].'%','%'.$_POST['state'].'%');
					}
				}


			}
		}
		else{


				if(($_POST['minPrice'])!=null){
				if(($_POST['maxPrice'])!=null){
					if(($_POST['category'])!=null){
						$sql .=	"WHERE tb_items.item_price BETWEEN ? AND ? AND  tb_items.item_category =? AND tb_users.user_state LIKE ?  ";
						$params = array($_POST['minPrice'],$_POST['maxPrice'],$_POST['category'] ,'%'.$_POST['state'].'%');
					}
					else{
						$sql .=	"WHERE tb_items.item_price BETWEEN ? AND ? AND tb_users.user_state LIKE ? ";
						$params = array($_POST['minPrice'],$_POST['maxPrice'],'%'.$_POST['state'].'%');
					}
				}
				else{
					if(($_POST['category'])!=null){
						$sql .=	"WHERE tb_items.item_price > ? AND tb_items.item_category =? AND tb_users.user_state LIKE ? ";
						$params = array($_POST['minPrice'],$_POST['category'],'%'.$_POST['state'].'%');
					}
					else{
						$sql .=	"WHERE tb_items.item_price > ? AND tb_users.user_state LIKE ? ";
						$params = array($_POST['minPrice'],'%'.$_POST['state'].'%');
					}
				}
			}
			else{

				if(($_POST['maxPrice'])!=null){
					if(($_POST['category'])!=null){
						$sql .=	"WHERE tb_items.item_price < ? AND tb_items.item_category =? AND tb_users.user_state LIKE ? ";
						$params = array($_POST['maxPrice'],$_POST['category'],'%'.$_POST['state'].'%');
					}
					else{
						$sql .=	"WHERE tb_items.item_price < ? AND tb_users.user_state LIKE ? ";
						$params = array($_POST['maxPrice'],'%'.$_POST['state'].'%');
					}
				}
				else{
					if(($_POST['category'])!=null){
						$sql .=	"WHERE tb_items.item_category =? AND tb_users.user_state LIKE ? ";
						$params = array($_POST['category'],'%'.$_POST['state'].'%');
					}
					else{
						$sql .=	"";
						$params = array();
					}
				}


			}


		}

		}else{
		if(($_POST['city'])!=null){
			if(($_POST['minPrice'])!=null){
				if(($_POST['maxPrice'])!=null){
					if(($_POST['category'])!=null){
						$sql .=	"WHERE tb_items.item_price BETWEEN ? AND ? AND  tb_users.user_city LIKE ? AND tb_items.item_category =? ";
						$params = array($_POST['minPrice'],$_POST['maxPrice'],'%'.$_POST['city'].'%',$_POST['category']);
					}
					else{
						$sql .=	"WHERE tb_items.item_price BETWEEN ? AND ? AND  tb_users.user_city LIKE ? ";
						$params = array($_POST['minPrice'],$_POST['maxPrice'],'%'.$_POST['city'].'%');
					}
				}
				else{
					if(($_POST['category'])!=null){
						$sql .=	"WHERE tb_items.item_price > ? AND  tb_users.user_city LIKE ? AND tb_items.item_category =? ";
						$params = array($_POST['minPrice'],'%'.$_POST['city'].'%',$_POST['category']);
					}
					else{
						$sql .=	"WHERE tb_items.item_price > ? AND  tb_users.user_city LIKE ? ";
						$params = array($_POST['minPrice'],'%'.$_POST['city'].'%');
					}
				}
			}
			else{

				if(($_POST['maxPrice'])!=null){
					if(($_POST['category'])!=null){
						$sql .=	"WHERE tb_items.item_price < ? AND  tb_users.user_city LIKE ? AND tb_items.item_category =? ";
						$params = array($_POST['maxPrice'],'%'.$_POST['city'].'%',$_POST['category']);
					}
					else{
						$sql .=	"WHERE tb_items.item_price < ? AND  tb_users.user_city LIKE ? ";
						$params = array($_POST['maxPrice'],'%'.$_POST['city'].'%');
					}
				}
				else{
					if(($_POST['category'])!=null){
						$sql .=	"WHERE tb_users.user_city LIKE ? AND tb_items.item_category =? ";
						$params = array('%'.$_POST['city'].'%',$_POST['category']);
					}
					else{
						$sql .=	"WHERE tb_users.user_city LIKE ? ";
						$params = array('%'.$_POST['city'].'%');
					}
				}


			}
		}
		else{
				if(($_POST['minPrice'])!=null){
					if(($_POST['maxPrice'])!=null){
						if(($_POST['category'])!=null){
							$sql .=	"WHERE tb_items.item_price BETWEEN ? AND ? AND  tb_items.item_category =? ";
							$params = array($_POST['minPrice'],$_POST['maxPrice'],$_POST['category']);
						}
						else{
							$sql .=	"WHERE tb_items.item_price BETWEEN ? AND ? ";
							$params = array($_POST['minPrice'],$_POST['maxPrice']);
						}
					}
					else{
						if(($_POST['category'])!=null){
							$sql .=	"WHERE tb_items.item_price > ? AND tb_items.item_category =? ";
							$params = array($_POST['minPrice'],$_POST['category']);
						}
						else{
							$sql .=	"WHERE tb_items.item_price > ? ";
							$params = array($_POST['minPrice']);
						}
					}
				}
				else{

					if(($_POST['maxPrice'])!=null){
						if(($_POST['category'])!=null){
							$sql .=	"WHERE tb_items.item_price < ? AND tb_items.item_category =? ";
							$params = array($_POST['maxPrice'],$_POST['category']);
						}
						else{
							$sql .=	"WHERE tb_items.item_price < ?  ";
							$params = array($_POST['maxPrice']);
						}
					}
					else{
						if(($_POST['category'])!=null){
							$sql .=	"WHERE tb_items.item_category =? ";
							$params = array($_POST['category']);
						}
						else{
							$sql .=	"";
							$params = array();
						}
					}


				}


			}
		}
		}
}



		$query = $this->db->query($sql,$params);
		return $query->result_array();


	}


	function get_table(){
		$table = "tablename";
		return $table;
	}

	function get($order_by){
		$table = $this->get_table();
		$this->db->order_by($order_by);
		$query = $this->db->get($table);
		return $query;
	}

	function get_with_limit($limit,$offset,$order_by){
		$table = $this->get_table();
		$this->db->limit($limit,$offset);
		$this->db->order_by($order_by);
		$query = $this->db->get($table);
		return $query;
	}

	function get_where($id){
		$table = $this->get_table();
		$this->db->where('id',$id);
		$query = $this->db->get($table);
		return $query;
	}

	function get_where_custom($col,$value){
		$table = $this->get_table();
		$this->db->where($col,$value);
		$query = $this->db->get($table);
		return $query;
	}

	function _insert($data){
		$table = $this->get_table();
		$this->db->insert($table,$data);
	}

	function _update($id,$data){
		$table = $this->get_table();
		$this->db->where('id',$id);
		$this->db->update($table,$data);
	}

	function _delete($id){
		$table = $this->get_table();
		$this->db->where('id',$id);
		$this->db->delete($table);
	}

	function count_where($column,$value){
		$table = $this->get_table();
		$this->db->where($column,$value);
		$query = $this->db->get($table);
		$num_rows = $query->num_rows();
		return $num_rows;
	}

	function count_all(){
		$table = $this->get_table();
		$query = $this->db->get($table);
		$num_rows = $query->num_rows();
		return $num_rows;
	}

	function get_max(){
		$table = $this->get_table();
		$this->db->select_max('id');
		$query = $this->db->get($table);
		$row = $query->row();
		$id = $row->id;
		return $id;
	}

	function _custom_query($mysql_query){
		$query = $this->db->query($mysql_query);
		return $query;
	}



}
