<?php
class ProductsModel extends CI_Model{
	private $table = "products";

	function addProduct($obj){
		$this->db->insert($this->table,$obj);
	}

	function findAllProducts(){
		return $this->db->get($this->table)->result();
	}

	function find($arr){
		return $this->db->get_where($this->table, $arr)->result();
	}

	function updateType($data,$id){
		$this->db->where('id',$id);
		$this->db->update('products',$data);
	}

	function del($id){
		$this->db->delete('products', array('id' => $id));  
	}

	function topProduct($data,$id){
		$this->db->where('id',$id);
		$this->db->update('products',$data);
	}	

	function percentProducts($data,$id){
		$this->db->where('id',$id);
		$this->db->update('products',$data);
	}	
}

?>
