<?php
class user extends MVC_model{
	public function __construct(){
	parent::__construct();

	}
	
	public function info($id){
		$info = $this->crud->read('SELECT email_address,firstname,lastname,contact_number,mobile_number,company_name,address FROM _users WHERE user_id=:id',array('id'=>$id),true);
		return $info;
	}
	
	
	public function changepassword($id,$old,$pass){
	//fetch old password
		$info = $this->crud->read('SELECT varKey,password FROM _users WHERE user_id = :id',array(':id'=>$id),true);
		$this->hash->hash_encryption($info['varKey']);
		$password = $this->hash->decrypt($info['password']);
		if($password==$old){
			//if password is match create new key for new password
				$vars = $this->hash->varkeydump();
				$this->hash->hash_encryption($vars);
				$data['varKey'] = r_string($vars);
				$data['password'] =  $this->hash->encrypt($pass);
				$data['date_updated'] =  date('Y-m-d H:i:s');
				return $this->crud->update('_users',$data,array('user_id'=>$id));
			}else{
			return false;
		}	
	}
	
	public function email($id,$email,$password){
			$info = $this->crud->read('SELECT varKey,password FROM _users WHERE user_id = :id',array(':id'=>$id),true);
		$this->hash->hash_encryption($info['varKey']);
		$passworddb = $this->hash->decrypt($info['password']);
		if($password==$passworddb){
			//if password is match create new key for new password
				$data['email_address'] = $email;
				$data['date_updated'] =  date('Y-m-d H:i:s');
				return $this->crud->update('_users',$data,array('user_id'=>$id));
			}else{
			return false;
		}	
	}
	
	public function changeinformation($id,$vals){
		return $this->crud->update('_users',$vals,array('user_id'=>$id));
	}
}