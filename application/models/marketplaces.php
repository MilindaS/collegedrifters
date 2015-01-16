<?php
class Marketplaces extends CI_Model{
	public function __construct(){
		$this->load->database();
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
																	ON tb_items.item_user_id = tb_users.user_id 
																	
																	";
		
		
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
																	INNER JOIN tb_categories 
																	ON tb_items.item_category = tb_categories.category_id
																	INNER JOIN tb_users 
																	ON tb_items.item_user_id = tb_users.user_id ORDER BY tb_items.item_created_date DESC
																	";
		$query = $this->db->query($sql); 
		return $query->num_rows()/5;
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
		
		
		/*
		if(isset($_POST)){
			$sql .= " WHERE ";
		}
		*/
		/*
		foreach($_POST as $field=>$value){
			/*
			if($field=='city'){
				$sql .=	" tb_users.user_city LIKE ?";
				$params = array('%'.$value.'%');
			}
			
			if($field=='minPrice'){
				if(in_array('city',$_POST)){
					$sql .= " AND ";
				}
				$sql .=	" tb_items.item_price < 10";
				array_push($params,$value);
				
			}
			*/
			/*
			if($field=='city'){
				if($field=='minPrice'){
					if($field=='minPrice'){
						if($field=='category'){
							$sql .=	"WHERE b_users.user_city LIKE ? AND tb_items.item_price BETWEEN ? AND ? AND  t AND tb_items.item_category =? ";
							$params = array('%'.$_POST['city'].'%',$_POST['minPrice'],$_POST['maxPrice'],$_POST['category']);
						}
					}
				}
			}
			
			
		}
		*/
		
		
		
		
		$query = $this->db->query($sql,$params); 
		return $query->result_array();
		
		
	}
}
?>