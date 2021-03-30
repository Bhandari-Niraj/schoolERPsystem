<?php

class EventModel extends Model
{
	public function create()
	{
		 $sql = "Insert into event(name, participants, start, end, description) Values('$this->name','$this->participants','$this->start','$this->end','$this->description')";
		return $this->insert($sql);
	}

	public function selectAllEvent()
	{
		$sql = "Select * from event";
		return $this->select($sql);
	}

	public function remove()
	{
		$sql = "Delete from event where id = '$this->id'";
		return $this->delete($sql);
	}

	function eventSelectById()
	{
		$sql = "Select * from event where id ='$this->id'";
		return $this->select($sql);
	}
	

}

?>