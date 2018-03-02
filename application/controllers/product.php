<?php 
class Product extends CI_Controller{

	function addproduct(){
		$user = $this->session->userdata('user');
		$this->load->view('header', array("user"=>$user));

		$name = $this->input->post("product-name");
		$quantity = $this->input->post("product-quantity");
		$price = $this->input->post("product-price");
		$img =$this->input->post("img");

		$config['upload_path'] = './uploads';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']     = '10000000000';
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$this->upload->do_upload();

		$this->load->library('form_validation');
		$this->form_validation->set_rules(
			'product-name', 'product-name','required',
			array(
				'required'  => 'Խնդրում ենք լրացնել %s Դաշտը:',
			)
		);
		$this->form_validation->set_rules(
			'product-quantity', 'product-quantity','required',
			array(
				'required'  => 'Խնդրում ենք լրացնել %s Դաշտը:',
			)
		);
		$this->form_validation->set_rules(
			'product-price', 'product-price','required',
			array(
				'required'  => 'Խնդրում ենք լրացնել %s Դաշտը:',
			)
		);

		if ($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error',validation_errors());
			$this->load->view('addproducts');
			$this->load->view('footer');

		}else{
			$this->load->model('ProductsModel');
			$user_img = !empty($this->session->userdata('img')) ? $this->session->userdata('img') : 'none';
			$this->ProductsModel->addProduct(array(
				'product_name' => $name,	
				'quantity' => $quantity,
				'price' => $price,
				'img' => $this->upload->data('file_name'),
				'user_id' => $this->session->userdata('user')->id
			));
			redirect("product/all");
		}
	}

	function all($id=false){
			$this->load->model('ProductsModel');
			$this->load->model('UserModel');
		if(!empty($this->session->userdata('user'))){
			$user = $this->session->userdata('user');
			$this->load->view('header',array("user"=>$user));
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
			$data=$this->UserModel->findUserProduct($id);

			$this->load->view('allproducts',array("data"=> $product,"id"=>$id));	
			$this->load->view('footer');
		}else{
			$this->load->model('ProductsModel');
			$product = $this->ProductsModel->findAllProducts();
			$this->load->view('simpleheader');
			$this->load->view('allproducts',array("all"=> $product));
			$this->load->view('footer');
		}
	}


	// function findUserProducts(){
	// 	$y = $this->UserModel->findUserProduct();
	// 	$this->load->view('allproducts',array("x"=> ));	
	// }


}
?>