<?php 

class Student  extends Controller
{
    public function register()
    {

        $this->checkAdminLogin();

        $this->loadModel('student');
        $student = new studentModel();

        if (isset($_POST['btnRegister']))
        {   
            $err = [];
            if (isset($_POST['name']) && !empty($_POST['name']))
            {
                $student->name = $_POST['name'];

            }
            else
            {
                $err['name'] = "Enter the name";
            }

            if (isset($_FILES['photo']['name']) && !empty($_FILES['photo']['name']))
            {

                $pn = uniqid() . '_' . $_FILES['photo']['name'];
                $student->photo = $pn;

            }
            else
            {
                $student->photo = '';
            }
            if (isset($_POST['email']) && !empty($_POST['email']))
            {
                $student->email = $_POST['email'];
            }
            else
            {
                $err['email'] = "Enter the Email";
            }
            if (isset($_POST['mobile_no']) && !empty($_POST['mobile_no']))
            {
                $student->mobile_no = $_POST['mobile_no'];
            }
            else
            {
                $err['mobile_no'] = "Enter the Mobile Number";
            }
            if (isset($_POST['address']) && !empty($_POST['address']))
            {
                $student->address = $_POST['address'];
            }
            else
            {
                $err['address'] = "Enter the Address";
            }

            if (isset($_POST['class']) && !empty($_POST['class']))
            {
                $student->class = $_POST['class'];
            }
            else
            {
                $err['class'] = "Enter the Class";
            }
            
            if (isset($_POST['parent_email']) && !empty($_POST['parent_email']))
            {
                $student->parent_email = $_POST['parent_email'];
            }
            else
            {
                $err['parent_email'] = "Enter the Parent Email";
            }
            $salt = $student->salt = uniqid();
            if (isset($_POST['password']) && !empty($_POST['password']))
            {
                $student->password = sha1($salt . $_POST['password']);
            }
            else
            {
                $err['password'] = "Enter Password";
            }
            $student->status = $_POST['status'];
            $student->last_login = date('Y-m-d h:i:s');

            $studentReg = $student->register();

            if ($studentReg)
            {
                $this->view->message['sucess'] = 'Student register sucessfully';

                if (isset($_FILES['photo']['name']) && !empty($_FILES['photo']['name']))
                {
                    move_uploaded_file($_FILES['photo']['tmp_name'], 'public/images' . $pn);
                }

            }
            else
            {
                $this->view->message['fail'] = 'student cannot be Registered';
            }
        }
    	$this->view->loadview('admin/student_register');
    }

    public function viewAll()
    {
    	$this->checkAdminLogin();
        $this->loadModel('student');
        $student = new studentModel();

        $studList = $student->selectAll();
        $this->view->studData = $studList;


    	$this->view->loadview('admin/student_detail');
    }

    public function stdRemove($id)
    {
        $this->checkAdminLogin();

        $this->loadModel('student');
        $student = new studentModel();

        $student->id = $id;

        $studById = $student->studSelectById($id);
        $name = $studById[0]->name;

        $stdRemove = $student->remove($id);
        if ($stdRemove)
        {
            $this->view->message['sucess'] = "Student Removed Sucessfully named  " . $name;
        }
        else
        {
            $this->view->message['fail'] = "Failed to Remove student named  " . $name;
        }
        $this->viewAll();
    }

    public function edit_student($id)
    {
        $this->checkAdminLogin();

        $this->loadModel('student');
        $student = new studentModel();

        $student->id = $id;
        $studData = $student->studSelectById($id);
        $this->view->studData = $studData[0];

        if (isset($_POST['btnEdit']))
        {
            $err = [];
            if (isset($_POST['name']) && !empty($_POST['name']))
            {
                $student->name = $_POST['name'];

            }
            else
            {
                $err['name'] = "Enter the name";
            }

          
            if (isset($_POST['email']) && !empty($_POST['email']))
            {
                $student->email = $_POST['email'];
            }
            else
            {
                $err['email'] = "Enter the Email";
            }
            if (isset($_POST['mobile_no']) && !empty($_POST['mobile_no']))
            {
                $student->mobile_no = $_POST['mobile_no'];
            }
            else
            {
                $err['mobile_no'] = "Enter the Mobile Number";
            }
            if (isset($_POST['address']) && !empty($_POST['address']))
            {
                $student->address = $_POST['address'];
            }
            else
            {
                $err['address'] = "Enter the Address";
            }

            if (isset($_POST['class']) && !empty($_POST['class']))
            {
                $student->class = $_POST['class'];
            }
            else
            {
                $err['class'] = "Enter the Class";
            }
            
            if (isset($_POST['parent_email']) && !empty($_POST['parent_email']))
            {
                $student->parent_email = $_POST['parent_email'];
            }
            else
            {
                $err['parent_email'] = "Enter the Parent Email";
            }
            $salt = $student->salt = uniqid();
            
            $student->status = $_POST['status'];
            $student->last_login = date('Y-m-d h:i:s');

            if (count($err) ==0) {

                if (isset($_FILES['photo']['name']) && !empty($_FILES['photo']['name']))
            {
                $pn = uniqid() . '_' . $_FILES['photo']['name'];
                $student->photo = $pn;

                $studentEdit = $student->EditNewphoto();
                move_uploaded_file($_FILES['photo']['tmp_name'], 'public/images' . $pn);

            }
            else
            {
                $studentEdit = $student->Edit();
            }

            if ($studentEdit)
            {
                $this->view->message['sucessEdit'] = 'Student Detail Updated sucessfully';

                $this->viewAll();

            }
            else
            {
                $this->view->message['fail'] = 'Student Detail cannot be Updated';
            }
            }

           
        }
        $this->view->loadview('admin/edit_student');

    }


    Public function login(){
      if (isset($_POST['btnLogin'])) {
     
         $this->loadModel('student');
         $student = new StudentModel();
        $err = [];
        if (isset($_POST['email']) && !empty($_POST['email'])) {
            $student->email = $_POST['email'];
        }else{
            $err['email'] = 'Enter Email';
        }

        if (isset($_POST['password']) && !empty($_POST['password'])) {
            $student->password = $_POST['password'];
        }else{
            $err['password'] = 'Enter Password';
        }

        if (count($err) == 0) {
            $studentData= $student->getStudentByEmail();
          


            if ($studentData) {
             $studentData = $studentData[0];
                $salt = $studentData->salt;
                 $np = sha1($salt.$student->password);

          

                if ($studentData->password == $np) {
                session_start();
                     $_SESSION['id'] = $studentData->id; 
                    $_SESSION['name'] = $studentData->name;
                    $_SESSION['email'] = $studentData->email;
                    $_SESSION['class'] = $studentData->class;
                  $_SESSION['success_message'] ="Login Success"; 
            

                    $this->redirect('student/dashboard');

                }else{
                    $errmsg= "Password Doesnot Match";
                }

            }else{
                $errmsg= "Email Doesnot Match";
            }

        }
      }

        $this->view->loadview('student/login');
    }

function dashboard()
{
    $this->checkStudentLogin();
    $this->loadModel('student');
    $student = new StudentModel();

    $student->id = $_SESSION['id'];

    $studentData= $student->selectStudentById();
    $student->class= $studentData[0]->class;
     $this->view->studentData = $studentData[0];
 
    $this->loadModel('section');
    $section = new SectionModel();
    $section->numeric_name =  $student->class= $studentData[0]->class;
    $sectionData = $section->selectClassByNumName();

    $this->view->sectionData = $sectionData[0];
      


     
     
     $studentFile = $student->selectAllFileByClass();
     $this->view->studentFile = $studentFile;
      
      $this->loadModel('staff');
      $staff = new StaffModel();

      $staffData = $staff->selectAll();
      $this->view->staffData = $staffData;



 
   
    $this->view->loadview('student/dashboard');
}

function attendance()
    {
        $this->checkStaffLogin();
        $this->loadModel('student');
        $student = new StudentModel();
       $student->date = date('Y-m-d');
           
        $studentList = $student->selectAll();
        $this->view->studentData = $studentList;

        $attendanceCheck = $student->selectAttendance();

        $this->view->attendData = $attendanceCheck;


        if (isset($_POST['present']) or isset($_POST['absent']))
        {
             
           if (isset($_POST['present'])) {
              $student->id = '1';
           }elseif (isset($_POST['absent'])) {
              $student->id = '0';
           }

         
            $student->name = $_POST['name[]'];

            print_r($student->name);

            $student->date = date('Y-m-d');
            $student->attend();
     
        }
        $this->view->loadview('teacher/attendance');
    }
     function markPresent ($id)
    {
        $this->checkStaffLogin();
        $this->loadModel('student');
        $student = new studentModel();

        $student->sid = $id;

        $student->status = '1';
        $student->date = date('Y-m-d'); 
        $attData = $student->attend();
        if (isset($attData)) {
            $this->attendance();
        }else{
            echo "Technical Error";
             $this->attendance();
        }
    }

     function markAbsent ($id)
    {
        $this->checkStaffLogin();
        $this->loadModel('student');
        $student = new studentModel();

        $student->sid = $id;

        $student->status = '0';
        $student->date = date('Y-m-d');
        $attData = $student->attend();
        if (isset($attData)) {
            $this->attendance();
        }else{
            echo "Technical Error";
             $this->attendance();
        }

    }




 function event()
    {
        $this->checkStudentLogin();

        $this->loadModel('event');
        $event = new eventModel();

        $eventData = $event->selectAllEvent();

        $this->view->eveData = $eventData;

        $this->view->loadview('student/event'); 
  }


  function timetable($id)
  {
    $this->checkStudentLogin();

    $this->loadModel('student');
    $student = new studentModel();


    $this->loadModel('section');
    $section = new sectionModel();
    $section->classData = $section->selectAll();
            $this->view->classData = $section->classData;

            $section->sectionData = $section->selectAllSection();
            $this->view->sectionData = $section->sectionData;
    $ttData = $student->selectAllTimetable($id);
    $this->view->ttData = $ttData;

     $this->loadModel('staff');
     $staff = new staffModel();
     $staffData = $staff->selectAll();
     $this->view->staffData = $staffData;

     $this->loadModel('admin');
            $admin = new adminModel();

            $admin->subjectData = $admin->selectAllSubject();
            $this->view->subjectData = $admin->subjectData;

     $this->view->loadview('student/timetable');
  }

    public function attendance_status($id)
    {
        $this->checkStudentLogin();
        $this->loadModel('student');
        $student = new StudentModel();
        $student->id = $id;

        $studentData = $student->selectAttendanceByStudentId($id);
     
        $this->view->studentData = $studentData;

        $studentList = $student->selectStudentById();
         $this->view->studentname = $studentList[0]->name;
         

        $this->view->loadview('student/attendance');
    }

    function student_viewbook()
    {
        $this->checkStudentLogin();
        $this->loadModel('student');
        $student = new StudentModel();

        $bookData = $student->selectAllBook();
        $this->view->bookData = $bookData;

        $this->view->loadview('student/view_book');
    }

    function viewMark($id)
       {
         $this->checkStudentLogin();
        $this->loadModel('student');
        $student = new studentModel();

        $student->id = $id;

        $this->view->borData = $student->selectAllMarkByName();


        $this->view->loadView('student/mark');
       }


}

?>