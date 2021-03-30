<?php

Class View{
	public function loadview($name){
       $path = 'view/'.$name.'.php';
       require_once $path;
	}
}

?>