<?php
	class MyLibrary{
		private $ci;

		function __construct(){
			$this->ci = &get_instance();
		}

		function view($y,$x=false){
			$this->ci->load->view('header',$x);
			$this->ci->load->view($y,$x);
			$this->ci->load->view('footer',$x);
		}
	}



?>