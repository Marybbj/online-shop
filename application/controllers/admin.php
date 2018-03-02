<?php 
class Admin extends CI_Controller{

	function accept(){
		$this->load->model('ProductsModel');
		$this->load->model('UserModel');
		$product = $this->ProductsModel->findAllProducts();
		$user = $this->UserModel->findAll();
		foreach ($user as $u) {
			foreach ($product as $p) {
				if($p->user_id == $u->id){
					$p->name=$u->name;
					$p->surname=$u->surname;
				}
			}
		}

		foreach ($product as $p) {
			$myNumber = $p->price;
			$id = $p->id;
			$percentToGet = 30;
			$percentInDecimal = $percentToGet / 100;
			$percent = $percentInDecimal * $myNumber;
			$data=$this->ProductsModel->percentProducts(array("percent"=>$percent),$id);
		}

		$user = $this->session->userdata('user');
		$this->mylibrary->view('admin',array("data"=> $product,"user"=>$user));	
	}

	function save(){
		$this->load->model('ProductsModel');
		$id = $this->input->post("save");
		$data=$this->ProductsModel->updateType(array("type_product"=>1),$id);
		redirect('admin/accept');
	}

	function delete(){
		$this->load->model('ProductsModel');
		$id = $this->input->post("del");
		$data=$this->ProductsModel->del($id);
		redirect('admin/accept');
	}

	function top(){
		$this->load->model('ProductsModel');
		$id = $this->input->post("top");
		$data=$this->ProductsModel->topProduct(array("top_product"=>1),$id);
		redirect('product/all');	
	}


}
?>