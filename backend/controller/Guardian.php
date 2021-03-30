<?php

class Guardian extends Controller
{
	function register()
	{
		$this->checkAdminLogin();
		$this->loadModel('guardian');
		$guardian = new GuardianModel();

		if (isset($_POST['btnRegister'])) 
		{
             print_r($_POST);
			$err = [];

			if (isset($_POST['name']) && !empty($_POST['name']))
            {
                $guardian->name = $_POST['name'];

            }
            else
            {
                $err['name'] = "Enter the name";
            }

            if (isset($_POST['email']) && !empty($_POST['email']))
            {
                $guardian->email = $_POST['email'];
            }
            else
            {
                $err['email'] = "Enter the Email";
            }
            if (isset($_POST['mobile_no']) && !empty($_POST['mobile_no']))
            {
                $guardian->mobile_no = $_POST['mobile_no'];
            }
            else
            {
                $err['mobile_no'] = "Enter the Mobile Number";
            }
             $salt = $guardian->salt = uniqid();
            if (isset($_POST['password']) && !empty($_POST['password']))
            {
                $guardian->password = sha1($salt . $_POST['password']);
            }
            else
            {
                $err['password'] = "Enter Password";
            }
            $guardian->status = $_POST['status'];
            $guardian->last_login = date('Y-m-d h:i:s');

            $guardianReg = $guardian->register();

            if ($guardianReg)
            {
                $this->view->message['sucess'] = 'Parents register sucessfully';

            }
            else
            {
                $this->view->message['fail'] = 'Parents cannot be Registered';
            }
		}


		$this->view->loadview('admin/guardian_register');
	}


	function viewAll()
	{   
		$this->checkAdminLogin();
		$this->loadModel('guardian');
        $guardian = new GuardianModel();

        $guardList = $guardian->selectAll();
        $this->view->guardData = $guardList;
		$this->view->loadview('admin/guardian_detail');
	}


	function guardianRemove($id)
	{
		$this->checkAdminLogin();
		$this->loadModel('guardian');
        $guardian = new GuardianModel();

        $guardian->id = $id;

        $guardianById = $guardian->guardianSelectById($id);
        $name = $guardianById[0]->name;

        $guardianRemove = $guardian->remove($id);
        if ($guardianRemove)
        {
            $this->view->message['sucess'] = "Parent Removed Sucessfully named  " . $name;
        }
        else
        {
            $this->view->message['fail'] = "Failed to Remove parent named  " . $name;
        }
        $this->viewAll();
	}


    public function edit_guardian($id)
    {
        $this->checkAdminLogin();

        $this->loadModel('guardian');
        $guardian = new guardianModel();

        $guardian->id = $id;

        $guardData = $guardian->guardianSelectById($id);
        $this->view->guardData = $guardData[0];

        if (isset($_POST['btnEdit']))
        {
            $err = [];
            if (isset($_POST['name']) && !empty($_POST['name']))
            {
                $guardian->name = $_POST['name'];

            }
            else
            {
                $err['name'] = "Enter the name";
            }


            if (isset($_POST['email']) && !empty($_POST['email']))
            {
                $guardian->email = $_POST['email'];
            }
            else
            {
                $err['email'] = "Enter the Email";
            }
            if (isset($_POST['mobile_no']) && !empty($_POST['mobile_no']))
            {
                $guardian->mobile_no = $_POST['mobile_no'];
            }
            else
            {
                $err['mobile_no'] = "Enter the Mobile Number";
            }

            $salt = $guardian->salt = uniqid();
            if (isset($_POST['password']) && !empty($_POST['password']))
            {
                $guardian->password = sha1($salt . $_POST['password']);
            }
            else
            {
                $guardian->password = $_POST['password'];
            }
            $guardian->status = $_POST['status'];
            $guardian->last_login = date('Y-m-d h:i:s');
            
                $guardianEdit = $guardian->Edit();

            if ($guardianEdit)
            {
                $this->view->message['sucessEdit'] = 'guardian Detail Updated sucessfully';

                $this->viewAll();

            }
            else
            {
                $this->view->message['fail'] = 'guardian Detail cannot be Updated';
            }
        }
        $this->view->loadview('admin/edit_guardian');

    }

    
}



?>