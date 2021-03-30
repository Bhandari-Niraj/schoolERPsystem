<?php

class GuardianModel extends Model
{
	public function register()
	{
        $sql = "Insert into parent (name, email, mobile_no,  salt, password, status, last_login) VALUES('$this->name',  '$this->email', '$this->mobile_no',  '$this->salt', '$this->password', '$this->status', '$this->last_login')";
        return $this->insert($sql);

	}

	public function selectAll()
	{
       $sql = "Select * from parent";
       return $this->select($sql);
	}

	public function guardianSelectById()
	{
	  $sql = "Select * from parent where id ='$this->id'";
       return $this->select($sql);
	}

	public function remove()
	{	
		$sql = "Delete from parent where id ='$this->id' ";
		return $this->delete($sql);
	}

	public function edit()
	{
        $sql = "Update parent set name ='$this->name', email ='$this->email', mobile_no = '$this->mobile_no', password = '$this->password', status='$this->status' where id ='$this->id' ";
      return $this->update($sql);
	}



}


?>