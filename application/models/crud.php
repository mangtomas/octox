
<?php
class crud extends MVC_model{
	//mangtomas crud
	
	public function __construct(){
		parent::__construct();
	}
	public function create($tbl,$vals = array()){
		$query = $this->db->prepare('INSERT INTO '.$tbl.' ('.implode(', ',array_keys($vals)).') VALUES (:'.implode(', :',array_keys($vals)).')');
		$query->execute($vals);
	return $this->db->lastInsertId();
	}
	
	public function read($query,$vals = array(),$assoc =false){
		$query = $this->db->prepare($query);
		$query->execute($vals);
		return ($assoc==true) ? $query->fetch(PDO::FETCH_ASSOC) : $query->fetchAll();
	}
	public function update($tbl,$flds= array(),$con = array()){
		$sql = 'UPDATE '.$tbl.' SET '.implode('=?, ',array_keys($flds)).'=? WHERE '.implode('=?',array_keys($con)).'=?';
		$query = $this->db->prepare($sql);
		//echo 'UPDATE '.$table.' SET '.implode(' = ?',array_keys($flds)).' = ? WHERE '.implode(' = ?',array_keys($con)).' = ?';
		return $query->execute(array_merge(array_values($flds),array_values($con)));
	}
	public function delete($tbl,$con = array()){
		$query = $this->db->prepare('DELETE FROM '.$tbl.' WHERE '.implode('=?',array_keys($con)).'=?');
		return $query->execute(array_values($con));
	}
	
	public function get_row($tablename,$flds,$con = false,$operation = 'AND'){
		$sql = 'SELECT '.$tbl.' '.implode(',',array_values($flds)).' FROM '.$tablename.' WHERE '.implode('=? '.$operation.' ',array_keys($con)).'=?';
		$query = $this->db->prepare($sql);
		$query->execute(array_merge(array_values($con)));
		$result = $query->fetch(PDO::FETCH_ASSOC);
		
		//initialize to array to store multiple values
		$x = array();
		foreach($result as $key=>$val){
				$x[$key] = $val;
			}
		return $x;
	}
}