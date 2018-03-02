<?php
class Auth{
	private $ci;

	function __construct(){
		$this->ci = &get_instance();
	}

	function is_logged_in($y){
		$user = $this->ci->session->userdata("user");
		$this->ci->load->model('ProductsModel');
		$data = $this->ci->ProductsModel->find(array("user_id"=> $user->id));
		if(!empty($user)){
			$this->ci->load->view('header',array("user"=>$user));
			$this->ci->load->view('profile',array("data"=>$data));
			$this->ci->load->view('footer');
		}else{
			redirect('user/login');
		}
	}

	function is_admin($y){
		$user = $this->ci->session->userdata("user");
		if($user->type == 1){
			redirect('admin/accept');
		}
	}





}
?>