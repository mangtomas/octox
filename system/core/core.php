<?php
/*
* Core file for the MVC framework
*
*/
if(!defined('APPS')) exit ('No direct access allowed');

//require the core files of the system
require_once APPS.'config/database'.EXT;
require_once APPS.'config/autoload'.EXT;
require_once APPS.'config/config'.EXT;
require_once CORE.'loader'.EXT;
require_once CORE.'mvc_controller'.EXT;
require_once CORE.'route'.EXT;
require_once CORE.'mvc_model'.EXT;
require_once CORE.'session'.EXT;

//return the mvc global object
function getInstance(){
	return MVC_controller::getInstance();
}

//create routing object
$route = new route();

//get the controller
$controller = $route->getController();

//get the method
$method = $route->getMethod();
//get the parameters
$params = $route->getArgs();



$dir = ($route->isDirExists()==true) ?  $route->isDirExists().DS : null;
$file = ROOT.APPS.'controllers'.DS.$dir.$controller.EXT;
if(file_exists($file)){
require_once $file;
$run = new $controller();
    if(method_exists($run, $method)){
		if(!empty($params)){
			$run->{$method}($params);
		}else{
			$run->{$method}();
		}
	}else{
	if($config['custom_error']==true){
		$errorfile = ROOT.APPS.'controllers'.DS.'error'.EXT;
			if(file_exists($errorfile)){
			require_once $errorfile;
			 $error = new error;
			 $error::index();
			 }else{
				$errorfile = 'Method : '.$dir.$controller."::".$method."()";
				require('error.php');
			 }
		}else{
			$errorfile = 'Method : '.$dir.$controller."::".$method."()";
				require('error.php');
		}
	}
}else{
	if($config['custom_error']==true){
	$errorfile = ROOT.APPS.'controllers'.DS.'error'.EXT;
	if(file_exists($errorfile)){
	require_once $errorfile;
	 $error = new error;
	 $error::index();
	 }else{
		$errorfile =($controller =='http:' || $controller=='https') ? 'Base url not set' : 'Custom error is not exists : error'.EXT;
		require('error.php');
	 }
	}else{
	$errorfile =($controller =='http:' || $controller=='https') ? 'Base url not set' : 'File : '.$dir.$controller.EXT;
	require('error.php');
	}
}

//require the controller
