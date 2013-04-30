<?php
class validate extends MVC_model{
	public function __construct(){
	parent::__construct();
	}
	
	public function user($uname,$pass){
	/*
	$vars = $this->hash->varkeydump();
	$password = "abc";
	$pass = $this->hash->hash_encryption($vars);
	$this->hash->encrypt($password);
			if($info>0){
				$mvc->hash->hash_encryption($info['key']);
				echo $password = $mvc->hash->decrypt($info['password']);
				
			}
	*/
	
		$mvc =& getInstance();
		$info = $mvc->crud->read('SELECT * FROM _users WHERE email_address = :user',array(':user'=>$uname),true);
				$mvc->hash->hash_encryption($info['varKey']);
			echo $password = $mvc->hash->decrypt($info['password']);
		if($info>0){
				$x['uid'] = $info['user_id'];
				$x['role_id'] = $info['role_id'];
				$x['email_address'] = $info['email_address'];
				$x['lastname'] = $info['lastname'];
				$x['firstnames'] = $info['firstname'];
				$result =  ($password==$pass)? $x :  false;
			}else{
				$result = false;
			}
			return ($result==false) ? false : $result;
		}
		
	
		
}

