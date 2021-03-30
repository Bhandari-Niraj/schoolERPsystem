<?php

class StaffModel extends Model{

	public function register(){
        $sql = "Insert into staff (name, photo, email, mobile_no, academic_qualification, department, level, salt, password, status, last_login) VALUES('$this->name', '$this->photo', '$this->email', '$this->mobile_no', '$this->qualification', '$this->department','$this->level', '$this->salt', '$this->password', '$this->status', '$this->last_login')";
        return $this->insert($sql);

	}

	public function selectAll(){
       $sql = "Select * from staff";
       return $this->select($sql);
	}

	public function selectStaffByDepartment(){
       $sql = "Select * from staff where department = 'Academic'";
       return $this->select($sql);
	}
	
	
	public function remove(){	
		$sql = "Delete from staff where id ='$this->id' ";
		return $this->delete($sql);
	}

	public function staffSelectById(){
	  $sql = "Select * from staff where id ='$this->id'";
       return $this->select($sql);
	}

	public function edit(){
       $sql = "Update staff set name ='$this->name', email ='$this->email', mobile_no = '$this->mobile_no', academic_qualification = '$this->qualification', department='$this->department', level='$this->level', status='$this->status' where id ='$this->id' ";
      return $this->update($sql);
	}

	public function editNewphoto(){
		$sql = "Update staff set name ='$this->name', photo = '$this->photo' email ='$this->email', mobile_no = '$this->mobile_no', academic_qualification = '$this->qualification',  status='$this->status' where id ='$this->id' ";
      return $this->update($sql);

	}

	public function attend()
	{
       $sql= "Insert into staff_attendance(staff_id, status, attend_date) Values('$this->sid', '$this->status', '$this->date') ON DUPLICATE KEY UPDATE staff_id='$this->sid', status ='$this->status', attend_date = '$this->date' ";
      return $this->insert($sql);
	}

	public function selectAttendance()
	{
		 $sql = "Select * from staff_attendance where attend_date = '$this->date'";
		return $this->select($sql);
	}

	public function getStaffByEmail()
	{
		$sql = "Select * from staff where email = '$this->email' ";
		return $this->select($sql);
	}

	public function upload()
	{
		$sql = "Insert into material(class_id, file, uploaded_by) Values('$this->class', '$this->photo', '$this->id')";
		return $this->insert($sql);
	}

	public function selectAllFilesByStaff()
	{
	    $sql = "Select * from material where uploaded_by = '$this->id' ";
		return $this->select($sql);
	}

	public function getStaffById()
	{
		$sql = "Select * from staff where id = '$this->id' ";
		return $this->select($sql);
	}

	public function fileRemove()
	{
		$sql ="Delete from material where id = '$this->id' ";
		return $this->delete($sql);
	}

	    public function addQuestion()
	{
		$sql = "Insert into question(class_id, type, question, file) Values('$this->class', '$this->type', '$this->question', '$this->assignmentFile')";
		return $this->insert($sql);
	}

	public function selectAllQuestion()
	{
		$sql = "Select * from question";
		return $this->select($sql);
	}

	public function questionRemove()
	{
		$sql = "Delete from question where id='$this->id'";
		return $this->delete($sql);
	}
	
	public function selectAllTimetable()
	{
	     $sql = "Select * from timetable where teacher_id = '$this->id'";
		return $this->select($sql);

	}
	public function applyLeave()
	{
		 $sql = "Insert into staff_leave( letter, day, start_date, staff_id) Values('$this->letter', '$this->day', '$this->start', '$this->id')";
		return $this->insert($sql);
	}

	public function selectLeave()
	{
		 $sql = "Select * from staff_leave where staff_id = '$this->id'";
		return $this->select($sql);
	}

	public function deleteLeave()
	{
		$sql = "Delete from staff_leave where id='$this->id'";
		return $this->delete($sql);
	}

	public function book_add(){
     $sql = "Insert into book (isbn, title, author, edition,  publish_date, publisher, copies, pdfbook) VALUES('$this->isbn', '$this->title', '$this->author', '$this->edition', '$this->publish_date', '$this->publisher','$this->copies', '$this->book')";
    return $this->insert($sql);
}
   public function bookDelete()
   {
   	$sql = "Delete from book where id='$this->id' ";
   	return $this->delete($sql);
   }

   public function borrowAdd()
	{
		 $sql = "Insert into borrow( isbn, name, card_no, date) Values('$this->isbn', '$this->name', '$this->number', '$this->date')";
		return $this->insert($sql);
	}

	public function selectAllBorrow()
	{
		$sql = "Select * from borrow";
		return $this->select($sql);

	}

	function removeBorrower()
	{
		$sql = " Delete from borrow where id ='$this->id'";
		return $this->delete($sql);
	}

	function markMe()
	{
		$sql = "Insert into mark( student_id, name, subject, mark) Values('$this->id','$this->name', '$this->subject', '$this->mark')";
		return $this->insert($sql);
	}

	function selectAllMark()
	{
		$sql = "Select * from mark";
		return $this->select($sql);

	}

	function markDelete()
	{

		$sql = " Delete from mark where id ='$this->id'";
		return $this->delete($sql);

	}

}



?>