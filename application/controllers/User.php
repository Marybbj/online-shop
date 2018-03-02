<?php 
class User extends CI_Controller{

	function signup(){
		$msg = "Welcome to our site";
		$this->load->view("signup",array("msg"=> $msg));
		$this->load->view('footer');

	}

	function insert(){
		$name = $this->input->post("name");
		$surname = $this->input->post("surname");
		$email = $this->input->post("email");
		$pass =$this->input->post("pswd");
		$pass2 =$this->input->post("pswd2");

		$config['upload_path'] = './uploads';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']     = '10000000';
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$this->upload->do_upload();

		$this->load->library('form_validation');
		$this->form_validation->set_rules(
			'name', 'Name','required',
			array(
				'required'  => 'Խնդրում ենք լրացնել %s Դաշտը:',
			)
		);
		$this->form_validation->set_rules(
			'surname', 'Surname','required',
			array(
				'required'  => 'Խնդրում ենք լրացնել %s Դաշտը:',
			)
		);
		$this->form_validation->set_rules(
			'email', 'Email',
			'required|valid_email|is_unique[users.email]',
			array(
				'required'      => 'Խնդրում ենք լրացնել %s Դաշտը:',
				'valid_email'	=> '%s դաշտը չի պարունակում վավեր էլ-փոստի հասցե:',
				'is_unique[users.email]' => 'petqa chkrknvi',
			)
		);
		$this->form_validation->set_rules(
			'pswd', 'Password',
			'required|min_length[5]|max_length[12]',
			array(
				'required'    => 'Խնդրում ենք լրացնել %s Դաշտը:',
				'min_length'  => '%s ը պետք է լինի ամենաքիչը 5 նիշ:',
				'max_length'  => '%s ը պետք է լինի ամենաշատը 12 նիշ:',

			)
		);
		$this->form_validation->set_rules(
			'pswd2', 'Password Confirmation',
			'required|matches[pswd]',
			array(
				'required'      => 'Խնդրում ենք լրացնել %s Դաշտը:',
				'matches[pswd]' => 'ծածկագիրը և ծածկագրի կրկնումը պետք է լինի նույնը:',
			)
		);

		if ($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error',validation_errors());
			redirect('user/signup'); 	
		}else{
			$this->load->model('UserModel');
			$user_img = !empty($this->session->userdata('userfile')) ? $this->session->userdata('userfile') : 'none';

			$this->UserModel->insert(array(
				'name' => $name,
				'surname' => $surname,
				'email' => $email,
				'pass' => password_hash($pass,PASSWORD_DEFAULT),	
				'userfile' => $this->upload->data('file_name')
			));
			redirect("user/login");
		}
	}

	function login(){
		$this->load->view('login');
		$this->load->view('footer');
	}

	function logout(){
		$array_items = array('user', 'email');
		$this->session->unset_userdata($array_items);
		redirect('user/signup');
	}

	function auth(){
		$email = $this->input->post('email-signin');
		$pass = $this->input->post('pswd-signin');
		$this->load->model('UserModel');
		$data = $this->UserModel->find(array("email"=> $email));

		if(!empty($data)){
			$data = $data[0];
			if(password_verify($pass,$data->pass) && !empty($pass)){

				$remember = $this->input->post("remember");
				if($remember != NULL && !empty($remember)){
					setcookie('email',$email,time() + (86400 *30), "/");
					setcookie('pswd_signin',$pass,time() + (86400 *30), "/");
				}else{
					if(isset($_COOKIE['email'])){
						setcookie("email","");
					}if(isset($_COOKIE['pswd_signin'])){
						setcookie("pswd_signin","");
					}
				}

				$this->session->set_userdata("user",$data);
				$this->load->view('header');
				redirect('product/all');
				$this->load->view('footer');
			}else{
				$this->load->model('UserModel');
				$count = $data->false_pass;
				if($email){
					if( $count == "" || $count == "0" || $count == "1" || $count == "2"){
						$count = $count + 1;
						$false = $this->UserModel->falsePass(array("false_pass"=> $count),$email);
						$this->session->set_flashdata('error',"password-ը մուտքագրված է սխալ:");
					}else if($count >=3){
						$t = time();
						$time = $this->UserModel->time(array("block_time"=> $t),$email);
						$this->session->set_flashdata('error',"Դուք արգելափակվել եք 5ր․ password-ը 3անգամ սխալ մուտքագրելու համար:");

						$block_t =  $data->block_time;
						if($block_t >= $block_t + 300 ){
							$count = 0;
							$false = $this->UserModel->falsePass(array("false_pass"=> $count),$email);
						}
					}
				}
				redirect('user/login');	
			}
		}else{
			$this->session->set_flashdata('error',"Նման email-ով օգտատեր գոյություն չունի:");
			redirect('user/login'); 	
		}
	}

	function profile(){
		$this->auth->is_logged_in("");	
	}


	function edit(){
		$name = $this->session->userdata("user")->name;
		$surname = $this->session->userdata("user")->surname;
		$old_pass = $this->input->post("old-pass");
		$new_name = $this->input->post("name");
		$new_surname = $this->input->post("surname");
		$email=$this->session->userdata("user")->email;
		$new_pass =$this->input->post("new-pass");
		$new_pass2 =$this->input->post("new-pass2");
		$userfile = $this->input->post("file");
		$id = $this->session->userdata('user')->id;
		$this->load->model('UserModel');
		$data=$this->UserModel->find(array("email"=>$email));
		if(!empty($data)){
			$data=$data[0];
			if(empty($new_pass) && empty($new_pass2) ){
				$new_pass = $old_pass;
			}if(empty($new_name)){
				$new_name = $name;
			} if(empty($new_surname)){
				$new_surname = $surname;
			}if(empty($new_name) && empty($new_surname)){
				$new_name = $name;
				$new_surname = $surname;
			}
			$new_pass = password_hash($new_pass,PASSWORD_DEFAULT);
			if(password_verify($old_pass,$data->pass)){
				$this->load->model("UserModel");
				$data=$this->UserModel->edit($id,array("pass"=>$new_pass,"name"=>$new_name,"surname"=>$new_surname,"userfile"=>$userfile));
				$user = $this->session->userdata('user');
				$this->load->view('header',array("user"=>$user));
				$this->load->view('edit');
			}else{
				// $this->session->set_flashdata("error","password is incorrect");
				$user = $this->session->userdata('user');
				$this->mylibrary->view('edit',array("user"=>$user));	
			}
		}

		$this->load->library('form_validation');
		$this->form_validation->set_rules(
			'new-pass', 'New Password',
			'required|min_length[5]|max_length[12]',
			array(
				'required'    => 'Խնդրում ենք լրացնել %s Դաշտը:',
				'min_length'  => '%s ը պետք է լինի ամենաքիչը 5 նիշ:',
				'max_length'  => '%s ը պետք է լինի ամենաշատը 12 նիշ:',
			)
		);
		$this->form_validation->set_rules(
			'new-pass2', 'Confirm Password',
			'required|matches[new-pass]',
			array(
				'required'      => 'Խնդրում ենք լրացնել %s Դաշտը:',
				'matches[new-pass]' => 'ծածկագիրը և ծածկագրի կրկնումը պետք է լինի նույնը:',
			)
		);
		if ($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error',validation_errors());
		}else{
			// redirect('user/profile'); 	
		}
	}



}
?>