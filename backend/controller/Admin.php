<?php

class Admin extends Controller{

	Public function login(){
      if (isset($_POST['btnLogin'])) {
      	 
         $this->loadModel('admin');
      	 $admin = new AdminModel();
      	$err = [];
      	if (isset($_POST['email']) && !empty($_POST['email'])) {
      		$admin->email = $_POST['email'];
      	}else{
      		$err['email'] = 'Enter Email';
      	}

      	if (isset($_POST['password']) && !empty($_POST['password'])) {
      		$admin->password = $_POST['password'];
      	}else{
      		$err['password'] = 'Enter Password';
      	}

      	if (count($err) == 0) {
      		$adminData= $admin->getAdminByEmail();
          


      		if ($adminData) {
             $adminData = $adminData[0];
      		    $salt = $adminData->salt;
      		     $np = sha1($salt.$admin->password);

      		    if ($adminData->password == $np) {
                session_start();
      		    	$_SESSION['name'] = $adminData->name;
      		    	$_SESSION['email'] = $adminData->email;
      		      $_SESSION['success_message'] ="Login Success"; 
            

      		    	$this->redirect('admin/timetable');

      		    }else{
      		    	$errmsg= "Password Doesnot Match";
      		    }

      		}else{
      			$errmsg= "Email Doesnot Match";
      		}

      	}
      }

        $this->view->loadview('admin/login');
	}

    public function dashboard(){
      $this->checkAdminLogin();
    	 $this->view->loadview('admin/dashboard');
       
    }


    public function add_subject(){
      $this->checkAdminLogin();
      $this->loadModel('admin');
      $admin = new AdminModel();

      $subData = $admin->selectAllSubject();
      $this->view->sData = $subData;

      if (isset($_POST['btnAdd'])) {
         $err =[];
         if (isset($_POST['name']) && !empty($_POST['name'])) {
            $admin->name = $_POST['name'];
         }else{
          $err['name'] = 'Enter Subject Name';
        }

        if (count($err)== 0) {
           $subStatus = $admin->addSubject();

            if ($subStatus)
             {
                $this->view->message['sucess'] = 'Subject Added sucessfully';
                $this->add_subject();
              }
             else
             {
                $this->view->message['fail'] = 'Subject cannot be Added';
             }
        }

      }

      $this->view->loadview('admin/subject');
    }

    function subjectRemove($id)
    {
      $this->checkAdminLogin();
      $this->loadModel('admin');
      $admin = new adminModel();
      $admin->id = $id;

      $subjectById = $admin->selectSubjectById($id);
        $name = $subjectById[0]->name;

      $subData = $admin->remove($id);
      if ($subData)
        {
            $this->view->message['sucessDel'] = "Subject Removed Sucessfully named  " . $name;
        }
        else
        {
            $this->view->message['failDel'] = "Failed to Remove Subject named  " . $name;
        }
         $this->add_subject();
    }


    function edit_subject($id)
    {
      $this->checkAdminLogin();
        $this->loadModel('admin');
        $admin = new adminModel();
        $admin->id = $id;

        $subData = $admin->selectAllSubject();
        $this->view->sData = $subData;

        $subjectById = $admin->selectSubjectById($id);
        $this->view->subjectData = $subjectById[0];

        if (isset($_POST['btnEdit']))
        {
            $err = [];
            if (isset($_POST['name']) && !empty($_POST['name']))
            {
                $admin->name = $_POST['name'];

            }
            else
            {
                $err['name'] = "Enter the name";
            }
            

            if (count($err)==0) {
              $subjectEdit = $admin->edit();

             if ($subjectEdit)
             {
                $this->view->message['sucessEdit'] = 'subject Updated sucessfully';
                $this->add_subject();
                
              }
             else
             {
                $this->view->message['failEdit'] = 'subject cannot be Updated';
             }
            }
    
       }
       $this->view->loadview('admin/subject_edit');

    }

    public function timetable()
    {
      $this->checkAdminLogin();
      $this->loadModel('admin');
      $admin = new adminModel();

      $admin->timetableData = $admin->selectAllTimetable();
      $this->view->ttData = $admin->timetableData;

        $admin->subjectData = $admin->selectAllSubject();
        $this->view->subjectData = $admin->subjectData;

        $this->loadModel('section');
        $section = new sectionModel();

        $section->classData = $section->selectAll();
        $this->view->classData = $section->classData;

        $section->sectionData = $section->selectAllSection();
        $this->view->sectionData = $section->sectionData;


        $this->loadModel('staff');
        $staff = new staffModel();

        $staff->staffData = $staff->selectStaffByDepartment();
        $this->view->staffData = $staff->staffData;


      $this->view->loadview('admin/timetable');

    }

    public function create_timetable()
    {
        $this->checkAdminLogin();
        $this->loadModel('admin');
        $admin = new adminModel();
        $admin->subjectData = $admin->selectAllSubject();
        $this->view->subjectData = $admin->subjectData;

        $this->loadModel('section');
        $section = new sectionModel();

        $section->classData = $section->selectAll();
        $this->view->classData = $section->classData;

        $section->sectionData = $section->selectAllSection();
        $this->view->sectionData = $section->sectionData;


        $this->loadModel('staff');
        $staff = new staffModel();

        $staff->staffData = $staff->selectStaffByDepartment();
        $this->view->staffData = $staff->staffData;





        if (isset($_POST['btnAdd'])) 
        {
           $err= [];
           if (isset($_POST['class']) && !empty($_POST['class'])) 
           {
             $admin->class = $_POST['class'];
           }else
           {
             $err['class'] ='Enter Class name';
           }

           if (isset($_POST['section']) && !empty($_POST['section'])) 
           {
             $admin->section = $_POST['section'];
           }else
           {
             $err['section'] ='Enter Section name';
           }

            if (isset($_POST['subject']) && !empty($_POST['subject'])) 
           {
             $admin->subject = $_POST['subject'];
           }else
           {
             $err['section'] ='Enter Section name';
           }

           if (isset($_POST['teacher']) && !empty($_POST['teacher'])) 
           {
             $admin->teacher = $_POST['teacher'];
           }else
           {
             $err['teacher'] ='Enter Teacher name';
           }

           if (isset($_POST['start']) && !empty($_POST['start'])) 
           {
             $admin->start = $_POST['start'];
           }else
           {
             $err['start'] ='Enter Start time';
           }

           if (isset($_POST['end']) && !empty($_POST['end'])) 
           {
             $admin->end = $_POST['end'];
           }else
           {
             $err['end'] ='Enter End Time';
           }



           if (count($err)==0) 
           {
              $ttAdd = $admin->Add_timetable();
              if ($ttAdd)
             {
                $this->view->message['sucess'] = 'Timetable Added sucessfully';
               
              }
             else
             {
                $this->view->message['fail'] = 'Timetable cannot be Added. Try again.';
             }

           }
        }

      $this->view->loadview('admin/create_timetable');
    }

    function timetableRemove($id)
    {
      $this->checkAdminLogin();
      $this->loadModel('admin');
      $admin = new adminModel();
      $admin->id = $id;

      $timeData = $admin->removeTimetable($id);
      if ($timeData)
        {
            $this->view->message['sucess'] = "Timetable Removed Sucessfully";
        }
        else
        {
            $this->view->message['fail'] = "Failed to Remove Subject named  ";
        }
         $this->timetable();
 
    }

    function edit_timetable($id)
    {
      $this->checkAdminLogin();
        $this->loadModel('admin');
        $admin = new adminModel();

        $admin->id = $id;

        $admin->timetableData = $admin->selectTimetableById();
        $this->view->timeData = $admin->timetableData;

        $admin->subjectData = $admin->selectAllSubject();
        $this->view->subjectData = $admin->subjectData;

        $this->loadModel('section');
        $section = new sectionModel();

        $section->classData = $section->selectAll();
        $this->view->classData = $section->classData;

        $section->sectionData = $section->selectAllSection();
        $this->view->sectionData = $section->sectionData;


        $this->loadModel('staff');
        $staff = new staffModel();

        $staff->staffData = $staff->selectStaffByDepartment();
        $this->view->staffData = $staff->staffData;





        if (isset($_POST['btnEdit'])) 
        {
           $err= [];
           if (isset($_POST['class']) && !empty($_POST['class'])) 
           {
             $admin->class = $_POST['class'];
           }else
           {
             $err['class'] ='Enter Class name';
           }

           if (isset($_POST['section']) && !empty($_POST['section'])) 
           {
             $admin->section = $_POST['section'];
           }else
           {
             $err['section'] ='Enter Section name';
           }

            if (isset($_POST['subject']) && !empty($_POST['subject'])) 
           {
             $admin->subject = $_POST['subject'];
           }else
           {
             $err['section'] ='Enter Section name';
           }

           if (isset($_POST['teacher']) && !empty($_POST['teacher'])) 
           {
             $admin->teacher = $_POST['teacher'];
           }else
           {
             $err['teacher'] ='Enter Teacher name';
           }

           if (isset($_POST['start']) && !empty($_POST['start'])) 
           {
             $admin->start = $_POST['start'];
           }else
           {
             $err['start'] ='Enter Start time';
           }

           if (isset($_POST['end']) && !empty($_POST['end'])) 
           {
             $admin->end = $_POST['end'];
           }else
           {
             $err['end'] ='Enter End Time';
           }



           if (count($err)==0) 
           {
              $ttAdd = $admin->Edit_timetable();
              if ($ttAdd)
             {
                $this->view->message['sucess'] = 'Timetable Added sucessfully';
               
              }
             else
             {
                $this->view->message['fail'] = 'Timetable cannot be Added. Try again.';
             }

           }
        }

      $this->view->loadview('admin/edit_timetable');

    }

	
}











?>