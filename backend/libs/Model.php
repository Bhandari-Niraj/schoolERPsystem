<?php
 class Model {
 	var $conn;
 	function connect(){
 	 $this->conn = new mysqli('localhost','root','','db_school');
 	  if ($this->conn->connect_errno != 0) {
      die('Error in database Connection: '. $conn->connect_error);
         }
 	}

 	function insert($sql){
 	 $this->connect();
 	 $this->conn->query($sql);

 	 if ($this->conn->insert_id != 0 && $this->conn->affected_rows == 1) {
 	    return $this->conn->insert_id; 	 
 	 }else{
 	 	return false;
 	 }	
 	}

 	function update($sql){
 	  $this->connect();

 	 if ($this->conn->query($sql)) {
 	 	return true;
 	 }else{
 	 	return false;
 	  }
 	}
 	

 	function delete($sql){
 	 $this->connect();

 	 if ($this->conn->query($sql)) {
 	 	return true;
 	 }else{
 	 	return false;
 	 }

 	}

 	function select($sql){
 	 $this->connect();
 	 $res = $this->conn->query($sql);
 	 $data = array();

 	 if ($res->num_rows > 0) {
 	 	while ($sdata = $res->fetch_object()) {
 	 		array_push($data, $sdata);
 	 	}
 	 }
 	 return $data;
 	}

 	
 }



?>