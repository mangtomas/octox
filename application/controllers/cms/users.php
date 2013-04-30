<?php

class users extends MVC_controller{
	
	public function __construct(){
		parent::__construct();
		if(islogin()==false){
					redirect('main');
			}
		
	}
	public function index(){
	
		 $this->load->render('common/head_');
		$this->load->render('cms/users_');
		$this->load->render('common/footer_');
	}
}