<?php
class UserModel extends CI_Model{
	private $table = "users";

	function insert($obj){
		$this->db->insert($this->table,$obj);
	}

	function findAll(){
		return $this->db->get($this->table)->result();
	}

	function find($arr){
		return $this->db->get_where($this->table, $arr)->result();
	}

	function edit($id, $data){
		$this->db->where(array("id" => $id));
		$this->db->update('users',$data);
	}

	function falsePass($email,$count){
		$this->db->where('email',$count);
		$this->db->update('users',$email);
	}	

	function time($x,$email){
		$this->db->where("email" , $email);
		$this->db->update('users',$x);
	}

	function findUserProduct($id){
		// $this->db->select('*');
		// $this->db->from($this->table);
		// $this->db->join('products', 'users.id = "$id" AND user_id = "$id"');

		//SELECT * from users join products on users.id = $id and user_id = $id
	}

}
?>