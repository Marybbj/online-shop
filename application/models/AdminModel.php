<?php
class AdminModel extends CI_Model{
	private $table = "products";

	function findProducts($id){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('products', 'users.id = products.user_id');
		$this->db->where("user_id",$id['id']);
		return $this->db->get()->result();
	}
	
}
?>