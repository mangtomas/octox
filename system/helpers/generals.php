<?php

/*
	@return string
	@params	string
*/
function base_url($curl=false){
	$http = 'http';
	
			// check for secure connection
		if (isset($_SERVER["HTTPS"])){
				if ($_SERVER["HTTPS"] == "on"){
					$http .= "s";
				}
			}
	
		$http .= "://";

		if ($_SERVER["SERVER_PORT"] != "80"){
			$http = str_replace('[0-9A-Za-z]',$http);
			$http .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"];
			
		}else{
			$http .= $_SERVER["SERVER_NAME"];
		}

		$base = ltrim($_SERVER['REQUEST_URI'],'/');
		$base = explode('/', $base);

		return ($curl==true) ? $http.'/'.$base[0].'/'.$curl : $http.'/'.$base[0].'/';

}

function html5($title = false){
	echo "<!DOCTYPE html>\n<html lang=\"en\">\n<head><meta charset=\"utf-8\" />\n<title>".(($title) ? $title : null)."</title>\n";
}

function redirect($url,$ref = false){
	return header('location:'.base_url($url));
}

function icon($where = false){
$icon = "<link type='icon/image' rel='icon' href='".base_url($where)."' />";
echo $icon;
}

function body_open($params = false){
$params = ($params) ? " ".$params : null;
$body = "</head><body".$params.">";
return $body;
}

function css($where,$var = array()){
	foreach ($var as $value) {
		echo "\n<link type='text/css' href='".base_url($where.$value.'.css')."' rel='stylesheet' media='all'/>";
	}

}

function javascript($where,$var = array()){
	foreach ($var as $value) {
		echo "\n<script type='text/javascript' src='".base_url($where.$value.'.js')."'/></script>";
	}
}

function curl(){
	global $config;
		$curl = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
		$base_url = $config['base_url'];// 'http://localhost/mvc/';
		$url = str_replace($base_url,'',$curl);
		$x = explode('/',$url);	
		if($x[1] == ""){
			$method = "index";
		}else{
			$method = $x[1];
		}	
		return $method;
}

function img($dir,$class,$id,$style){
	return "<img src='".base_url().$dir."' class='".$class."' id='".$id."' style='".$style."' />";
}

function readmore($text,$limit,$string = false){
	return substr($text,0,$limit).$string;
}

function r_string($string){
	return strip_tags($string);
}

function r_md5($string){
	return md5(r_string($string));
}

function r_sha($string){
	return sha1(r_string($string));
}
function _controller(){
	$route = new route;
	return $route->getController();
}
function _method(){
	$route = new route;
	return $route->getMethod();
}

function genKey($id){
	$mvc =& getInstance();
	$vars = $mvc->hash->varkeydump();
	$mvc->hash->hash_encryption($vars);
	$id = $mvc->hash->encrypt($id);
	return $vars."==".$id;
}
