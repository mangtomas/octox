<?php
class api extends MVC_controller{
	
	public function __construct(){
		parent::__construct();
	}
	public function index(){
	echo "oops";
	}
	
	public function users($id = false){
		$jsodn = "";
		$jsodn .= "{rows: [";
		$json .= ",";
		$json .= "\n{";
		$json .= "date:'1',";
		$json .= "cell:['ctr'";
		$json .= ",'check'";
		$json .= ",'action'";
		$json .= ",'roomname'";
		$json .= ",'activated'";
		$json .= ",'sdfsd']";
		$json .= "}";
		$json .= "]\n";
		$json .= "}";
		echo $json;
	}
	
	

}