<?php

class form{

	public function post(){
		$_post = array();
			foreach( $_POST as $varname => $value ){
				$val = ($value=='on') ? 1 : $value;
				$_post[$varname] = r_string($val);
			
			}
		return $_post;
	}


}