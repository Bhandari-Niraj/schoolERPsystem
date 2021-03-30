<?php

class SectionModel extends Model
{
	function register()
	{
	    $sql ="Insert into class (name, numeric_name) Values ('$this->name', '$this->nname')";
		return $this->insert($sql);
	}

	function selectAll()
	{
		$sql="Select * from class";
		return $this->select($sql);
	}

	function remove()
	{
		$sql = "Delete from class where id = '$this->id'";
		return $this->delete($sql);
	}

	function classSelectById()
	{
		$sql="Select * from class where id = '$this->id'";
		return $this->select($sql);

	}

	function edit()
	{
		$sql = " Update class set name='$this->name', numeric_name = '$this->nname' where id ='$this->id' ";
		return $this->update($sql);
	}

	function RegSection()
	{
	   $sql ="Insert into section (name, class_id, teacher_id) Values ('$this->name', '$this->class', '$this->teacher')";
		return $this->insert($sql);
	}

	function SelectAllSection()
	{
		$sql = "Select * from section";
		return $this->select($sql);
	}

	function sectionSelectById()
	{
		$sql="Select * from class where id = '$this->id'";
		return $this->select($sql);
	}


	function sectionClassSelectById()
	{
		$sql="Select * from section where id = '$this->id'";
		return $this->select($sql);
	}

	function sectionRemove()
	{
	    $sql = "Delete from section where id = '$this->id'";
		return $this->delete($sql);
	}

	function EditSection()
	{
       $sql = " Update section set name='$this->name', class_id = '$this->class', teacher_id='$this->teacher' where id ='$this->id' ";
		return $this->update($sql);
	}

	function selectSectionByStaffId()
	{
		$sql ="Select * from section where teacher_id = '$this->id'";
		return $this->select($sql);
	}
  
    function selectClassByNumName()
    {
    	$sql ="Select * from class where numeric_name = '$this->numeric_name'";
		return $this->select($sql);

    }

}

?>