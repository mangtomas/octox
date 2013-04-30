<?php

class role extends MVC_controller{
	
	public function __construct(){
		parent::__construct();
		if(islogin()==false){
					redirect('main');
			}
		
	}
	public function index(){
		if(isset($_POST['_delete'])){
				$id = $_POST['id'];
					$result = $this->crud->read("SELECT role_id FROM _users WHERE role_id=:id",array('id'=>$id));
					if(empty($result)){
						$result = $this->crud->delete('_role',array('role_id' => $id));
						$result = $this->crud->delete('_permission',array('role_id' => $id));
						echo 1;
					}else{
						echo 0;
					} 
				return false;
			}
	
		$data['userRole'] =  $this->crud->read('SELECT _r.role,_r.role_id,_p.permission_id,_p._create,_p._read,_p._update,_p._delete,_p.export FROM _role as _r,_permission as _p WHERE _r.role_id=_p.role_id');
		$this->load->render('cms/role_',$data,array('head_','footer_'));
	}
	
	public function create(){
		
		$this->load->libraries(array('form'));
		if(isset($_POST['role'])){
			$role = $permission = $this->form->post();
			unset($role['_read']);
			unset($role['_update']);
			unset($role['_create']);
			unset($role['_delete']);
			unset($permission['role']);
			$role_id = $this->crud->create('_role',$role);
			$permission['role_id'] = $role_id;
			$role_id = $this->crud->create('_permission',$permission);
		}
		
		$this->load->render('cms/role_create',$data,array('head_','footer_'));
	}
	
	public function edit($id = false){
		$key = explode("==",$id[0]);
		$data['id'] = $key;
		$this->load->render('cms/role_edit',$data,array('head_','footer_'));
	}
}