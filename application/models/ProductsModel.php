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

	function sortHighPrice(){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('products','users.id = products.user_id');
		$this->db->order_by('price','DESC');
		return $this->db->get()->result();
	}

		function sortLowPrice(){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('products','users.id = products.user_id');
		$this->db->order_by('price');
		return $this->db->get()->result();
	}

}
?>