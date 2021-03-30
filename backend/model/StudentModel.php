<?php

class StudentModel extends Model
{
	public function register()
	{
      $sql = "Insert into student (name, photo, email, mobile_no, address, class, parent_email, salt, password, status, last_login) VALUES('$this->name', '$this->photo', '$this->email', '$this->mobile_no', '$this->address', '$this->class','$this->parent_email', '$this->salt', '$this->password', '$this->status', '$this->last_login')";
       return $this->insert($sql);

	}

	public function selectAll()
	{
		 $sql= "Select * from student";
		return $this->select($sql);
	}

	public function remove()
	{	
		$sql = "Delete from student where id ='$this->id' ";
		return $this->delete($sql);
	}

	public function studSelectById()
	{
	  $sql = "Select * from student where id ='$this->id'";
       return $this->select($sql);
	}

	public function EditNewphoto()
	{
		$sql = "Update student set name ='$this->name', photo='$this->photo', email ='$this->email', mobile_no = '$this->mobile_no', address = '$this->address', class='$this->class', parent_email='$this->parent_email', status='$this->status' where id ='$this->id' ";

	}

	public function Edit()
	{
		$sql = "Update student set name ='$this->name', email ='$this->email', mobile_no = '$this->mobile_no', address = '$this->address', class='$this->class', parent_email='$this->parent_email', status='$this->status' where id ='$this->id' ";
      return $this->update($sql);
	}

	function getStudentByEmail()
	{
		$sql = "Select * from student where email = '$this->email' ";
		return $this->select($sql);
	}
	function selectStudentById()
	{
		$sql = "Select * from student where id = '$this->id' ";
		return $this->select($sql);
	}

	function selectAllFileByClass()
	{
		$sql = "Select * from material where class_id = '$this->class' ";
		return $this->select($sql);
	}

	function selectAttendance()
	{
		$sql = "Select * from student_attendance";
		return $this->select($sql);
	}

	public function attend()
	{
       $sql= "Insert into student_attendance(student_id, status, attend_date) Values('$this->sid', '$this->status', '$this->date') ON DUPLICATE KEY UPDATE student_id='$this->sid', status ='$this->status', attend_date = '$this->date' ";
      return $this->insert($sql);
	}

	public function selectAllTimetable()
	{
	    $sql = "Select * from timetable";
		return $this->select($sql);
	}

	function selectAttendanceByStudentId()
	{
		$sql ="Select * from student_attendance where student_id='$this->id' ";
		return $this->select($sql);   
	}

	function selectAllBook()
	{
		$sql = " Select * from book";
		return $this->select($sql);
	}

	function selectAllMarkByName()
	{
		$sql ="Select * from mark where name='$this->id' ";
		return $this->select($sql);   
	}




}


?>