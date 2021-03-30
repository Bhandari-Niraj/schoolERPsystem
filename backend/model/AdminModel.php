<?php

class AdminModel extends Model{
	function getAdminByEmail(){
	    $sql = "Select * from admin where email = '$this->email' ";
		return $this->select($sql);

	}

	function selectAllSubject()
	{
		$sql = "Select * from subject";
		return $this->select($sql);
	}

    function addSubject()
    {
    	$sql = "Insert into subject (name) VALUES ('$this->name')";
    	return $this->insert($sql);
    }

    function selectSubjectById()
    {
    	$sql = "select * from subject where id = '$this->id'";
    	return $this->select($sql);
    }

    function remove()
    {
    	$sql = "Delete from subject where id = '$this->id' ";
    	return $this->delete($sql);
    }

    function edit()
    {
    	$sql = "Update subject set name='$this->name' where id = '$this->id'";
    	return $this->update($sql);
    }

    function add_timetable()
    {
        $sql = "Insert into timetable ( sectionclass_id, subject_id, teacher_id, start, end) VALUES ( '$this->section','$this->subject','$this->teacher','$this->start','$this->end')";
        return $this->insert($sql);
    }

    function selectAllTimetable()
    {
        $sql = "Select * from timetable";
        return $this->select($sql);
    }

    function removeTimetable()
    {
        $sql = "Delete from timetable where id = '$this->id'";
        return $this->delete($sql);
    }


    function selectTimetableById()
    {
        $sql = "Select * from timetable where id = '$this->id'";
        return $this->select($sql);
    }
}

?>