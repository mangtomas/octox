<?php

class main extends MVC_controller{
	
	public function __construct(){
		parent::__construct();
		if(islogin()==false){
					redirect('main');
			}
		
	}
	public function index(){
		$data['x'] = 1;
		$this->load->render('cms/dashboard_',$data,array('head_','footer_'));
		
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
		
		$this->load->render('cms/cms_information',$data,array('head_','footer_'));
	}
	
	public function aboutcms(){
	$this->load->render('cms/cms_about',$data,array('head_','footer_'));
	}
	
	
}