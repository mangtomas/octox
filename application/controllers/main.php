<?php

class main extends MVC_controller{
	
	public function __construct(){
		parent::__construct();
			if(islogin()==true){
				if($this->session->_get('role_id')==1){
					redirect('cms');
				}
			}
	}
	public function index(){
		$this->load->render('common/header_guest');
		$this->load->render('login_');
		$this->load->render('common/footer_guest');
	}
	
	public function login(){
	$this->load->model(array('validate'));
		if(isset($_POST['usersubmit'])){
			$uname = r_string($_POST['userlogin']);
			$pass = r_string($_POST['userauth']);
			$result = $this->validate->user($uname,$pass);
			if(is_array($result)){
				$result['islogin'] = true;
				$this->session->_set($result);
					if($result['role_id']==1){
							redirect('cms');
						}else{
							redirect('users');
					}
				
				}else{
				$data['error'] = "Invalid Username of Password.";
			}
		}
		
		$this->load->render('common/header_guest');
		$this->load->render('login_',$data);
		$this->load->render('common/footer_guest');
	
	}
	
	public function logout(){
		$this->session->_destroy();
		redirect('main');
	
	}
	
	
}