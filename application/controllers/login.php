<?php
class login extends MVC_controller{
	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
		$this->load->render('common/header_guest');
		$this->load->render('common/footer_');
	
	}

}