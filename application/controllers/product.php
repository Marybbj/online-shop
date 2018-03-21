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

	function sortLow(){
		$user = $this->session->userdata('user');
		$this->load->model('ProductsModel');
		$data=$this->ProductsModel->sortLowPrice();
		$this->mylibrary->view('sortLow',array("user"=>$user,"data"=>$data));
	}

	function sortHigh(){
		$user = $this->session->userdata('user');
		$this->load->model('ProductsModel');
		$data=$this->ProductsModel->sortHighPrice();
		$this->mylibrary->view('sortHigh',array("user"=>$user,"data"=>$data));
	}

	function buy(){
		$this->load->model('UserModel');
		$this->load->model('ProductsModel');
		$seller_id = $this->input->post("seller_id");
		$data = $this->UserModel->find(array("id"=> $seller_id));
		$data = $data[0];

		$price = $this->input->post("price");
		$adminAmount = $price / 100 * 10;
		$sellerAmount = $price - $adminAmount;
		$id1 = $data->id;
		$id2 =  $this->session->userdata('user')->id;
		if($this->session->userdata('user')->amount - $price >= 0){

			$plus = $data->amount + $sellerAmount;
			$minus = $this->session->userdata('user')->amount - $price;
			$data1 = $this->UserModel->moneySeller($id1,array(
					"amount"=> $plus
				));

			$data2 = $this->UserModel->moneyBuyer($id2,array(
					"amount"=> $minus
				));
			
			$data3 = $this->UserModel->find(array("type"=> 1));
			$data3[0]->amount = $data3[0]->amount + $adminAmount;
			$data3 = $this->UserModel->moneySeller($data3[0]->id,array(
					"amount"=> $data3[0]->amount));

			$data = $this->UserModel->find(array("id"=> $id2));
			$this->session->set_userdata("user",$data[0]);
			
		}else{
		echo '<h1>NOT charged!</h1>';
		}

		require_once('./config.php');
		$token  = $_POST['stripeToken'];
		$email  = $_POST['stripeEmail'];

		$price = (round($price));
		$customer = \Stripe\Customer::create(array(
			'email' => $email,
			'source'  => $token
		));

		$charge = \Stripe\Charge::create(array(
			'customer' => $customer->id,
			'amount'   => $price,
			'currency' => 'usd'
		));

		$user = $this->session->userdata('user');
		redirect("product/all");
	}
	
}
?>