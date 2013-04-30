<?php

class account extends MVC_controller{
	
	public function __construct(){
		parent::__construct();
		if(islogin()==false){
					redirect('main');
			}
		
		
	}
	public function index(){
		$this->load->render('common/head_');
		$this->load->render('cms/account_settings');
		$this->load->render('common/footer_');
		
	}
	
	public function settings(){
		
					/* $info = $this->crud->read('SELECT * FROM _users WHERE user_id = :id',array(':id'=>10),true);
					print_r($info);
					$this->hash->hash_encryption($info['varKey']);
							echo $password = $this->hash->decrypt($info['password']); */
							//$this->user->changepassword(10,'','abc'); 
						//	echo $this->crud->create('_users',array('lastname'=>'red'));
							//echo $this->db->lastInsertId();
	

	if(isset($_POST['changeemail'])){
		$email = r_string($_POST['inputEmail']);
		$password = r_string($_POST['inputPasswordx']);
			if(empty($email) || empty($password)){
				$data['message'] = "<div class='alert alert-error alert-fade'>Enter email and password.  <button type=\"button\" class=\"close fade\" data-dismiss=\"alert\">&times;</button></div>";
			}else{
				$result =  $this->user->email($this->session->_get('uid'),$email,$password);
			
			if($result==true){
				$data['message'] = "<div class='alert alert-success alert-fade'>Email is successfully changed.  <button type=\"button\" class=\"close fade\" data-dismiss=\"alert\">&times;</button></div>";
				}else{
				$data['message'] = "<div class='alert alert-error alert-fade'>Password is not match.  <button type=\"button\" class=\"close fade\" data-dismiss=\"alert\">&times;</button></div>";
			}
			
			}
	}
	if(isset($_POST['changepassword'])){
		$oldpassword = r_string($_POST['inputOldPassword']);
		$newpassword = r_string($_POST['newpassword']);
		
		if(empty($newpassword) || empty($newpassword)){
			$data['message'] = "<div class='alert alert-error alert-fade'>Please enter password.  <button type=\"button\" class=\"close fade\" data-dismiss=\"alert\">&times;</button></div>";
		}else{
		$result =  $this->user->changepassword($this->session->_get('uid'),$oldpassword,$newpassword);
			if($result==true){
				$data['message'] = "<div class='alert alert-success alert-fade'>Password is successfully changed.  <button type=\"button\" class=\"close fade\" data-dismiss=\"alert\">&times;</button></div>";
				}else{
			$data['message'] = "<div class='alert alert-error alert-fade'>Old Password is not match.  <button type=\"button\" class=\"close fade\" data-dismiss=\"alert\">&times;</button></div>";
			}
		}
	}
		$this->load->render('common/head_');
		$this->load->render('cms/account_settings',$data);
		$this->load->render('common/footer_'); 
	
	}
	
	public function information($id = false){
	$data['edit'] = $id[0];
		if(isset($_POST['changeinfomation'])){
			unset($_POST['changeinfomation']);
			if(empty($_POST['company_name']) || empty($_POST['address'])){
			$data['message'] = "<div class='alert alert-error alert-fade'>Please enter Company name and Address.  <button type=\"button\" class=\"close fade\" data-dismiss=\"alert\">&times;</button></div>";
			}else{
				$info = array();
				foreach($_POST as $key =>$val){
					$info[$key] = r_string($val);
				}
				$result = $this->user->changeinformation($this->session->_get('uid'),$info);
				if($result==true){
				$data['message'] = "<div class='alert alert-success alert-fade'>Information is successfully changed.  <button type=\"button\" class=\"close fade\" data-dismiss=\"alert\">&times;</button></div>";
					}else{
				$data['message'] = "<div class='alert alert-error alert-fade'>Problem updating information.  <button type=\"button\" class=\"close fade\" data-dismiss=\"alert\">&times;</button></div>";
				}
			}
		}
	
	$this->load->render('common/head_');
	$this->load->render('cms/account_information',$data);
	$this->load->render('common/footer_'); 
	
	}

	
}