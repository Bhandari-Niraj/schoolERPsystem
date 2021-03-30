<?php
class Staff extends Controller
{
    public function register()
    {

        $this->checkAdminLogin();

        $this->loadModel('staff');
        $staff = new staffModel();

        if (isset($_POST['btnRegister']))
        {
            $err = [];
            if (isset($_POST['name']) && !empty($_POST['name']))
            {
                $staff->name = $_POST['name'];

            }
            else
            {
                $err['name'] = "Enter the name";
            }

            if (isset($_FILES['photo']['name']) && !empty($_FILES['photo']['name']))
            {

                $pn = uniqid() . '_' . $_FILES['photo']['name'];
                $staff->photo = $pn;

            }
            else
            {
                $staff->photo = '';
            }
            if (isset($_POST['email']) && !empty($_POST['email']))
            {
                $staff->email = $_POST['email'];
            }
            else
            {
                $err['email'] = "Enter the Email";
            }
            if (isset($_POST['mobile_no']) && !empty($_POST['mobile_no']))
            {
                $staff->mobile_no = $_POST['mobile_no'];
            }
            else
            {
                $err['mobile_no'] = "Enter the Mobile Number";
            }
            if (isset($_POST['qualification']) && !empty($_POST['qualification']))
            {
                $staff->qualification = $_POST['qualification'];
            }
            else
            {
                $err['qualification'] = "Select Qualification";
            }

            if (isset($_POST['department']) && !empty($_POST['department']))
            {
                $staff->department = $_POST['department'];
            }
            else
            {
                $err['department'] = "Select Department";
            }

            if (isset($_POST['level']) && !empty($_POST['level']))
            {
                $staff->level = $_POST['level'];
            }
            else
            {
                $err['level'] = "Select Level";
            }

            $salt = $staff->salt = uniqid();
            if (isset($_POST['password']) && !empty($_POST['password']))
            {
                $staff->password = sha1($salt . $_POST['password']);
            }
            else
            {
                $err['password'] = "Enter Password";
            }
            $staff->status = $_POST['status'];
            $staff->last_login = date('Y-m-d h:i:s');

            $staffReg = $staff->register();

            if ($staffReg)
            {
                $this->view->message['sucess'] = 'staff register sucessfully';

                if (isset($_FILES['photo']['name']) && !empty($_FILES['photo']['name']))
                {
                    move_uploaded_file($_FILES['photo']['tmp_name'], 'public/images/' . $pn);
                }

            }
            else
            {
                $this->view->message['fail'] = 'staff cannot be Registered';
            }
        }
        $this->view->loadview('admin/staff_register');

    }

    function listAll()
    {
        $this->checkAdminLogin();
        $this->loadModel('staff');
        $staff = new staffModel();

        $staffList = $staff->selectAll();
        $this->view->staffData = $staffList;

        $this->view->loadview('admin/staff_detail');
    }

    public function staffRemove($id)
    {
        $this->checkAdminLogin();

        $this->loadModel('staff');
        $staff = new staffModel();

        $staff->id = $id;

        $staffById = $staff->staffSelectById($id);
        $name = $staffById[0]->name;

        $staffRemove = $staff->remove($id);
        if ($staffRemove)
        {
            $this->view->message['sucess'] = "staff Removed Sucessfully named  " . $name;
        }
        else
        {
            $this->view->message['fail'] = "Failed to Remove staff named  " . $name;
        }
        $this->listAll();
    }

    public function edit_staff($id)
    {
        $this->checkAdminLogin();

        $this->loadModel('staff');
        $staff = new staffModel();

        $staff->id = $id;
        $staffData = $staff->staffSelectById($id);
        $this->view->staffData = $staffData[0];

        if (isset($_POST['btnEdit']))
        {
            $err = [];
            if (isset($_POST['name']) && !empty($_POST['name']))
            {
                $staff->name = $_POST['name'];

            }
            else
            {
                $err['name'] = "Enter the name";
            }

            if (isset($_FILES['photo']['name']) && !empty($_FILES['photo']['name']))
            {

                $pn = uniqid() . '_' . $_FILES['photo']['name'];
                $staff->photo = $pn;
                move_uploaded_file($_FILES['photo']['tmp_name'], 'public/images/' . $pn);
            }

            if (isset($_POST['email']) && !empty($_POST['email']))
            {
                $staff->email = $_POST['email'];
            }
            else
            {
                $err['email'] = "Enter the Email";
            }
            if (isset($_POST['mobile_no']) && !empty($_POST['mobile_no']))
            {
                $staff->mobile_no = $_POST['mobile_no'];
            }
            else
            {
                $err['mobile_no'] = "Enter the Mobile Number";
            }
            if (isset($_POST['qualification']) && !empty($_POST['qualification']))
            {
                $staff->qualification = $_POST['qualification'];
            }
            else
            {
                $err['qualification'] = "Select Qualification";
            }

            if (isset($_POST['department']) && !empty($_POST['department']))
            {
                $staff->department = $_POST['department'];
            }
            else
            {
                $err['department'] = "Select Department";
            }

            if (isset($_POST['level']) && !empty($_POST['level']))
            {
                $staff->level = $_POST['level'];
            }
            else
            {
                $err['level'] = "Select Level";
            }

            
            $staff->status = $_POST['status'];
            $staff->last_login = date('Y-m-d h:i:s');
            if (isset($_FILES['photo']['name']) && !empty($_FILES['photo']['name']))
            {

                $staffEdit = $staff->EditNewphoto();

            }
            else
            {
                $staffEdit = $staff->Edit();
            }

            if ($staffEdit)
            {
                $this
                    ->view->message['sucessEdit'] = 'staff Detail Updated sucessfully';

                $this->listAll();

            }
            else
            {
                $this
                    ->view->message['fail'] = 'staff Detail cannot be Updated';
            }
        }
        $this
            ->view->loadview('admin/edit_staff');
    }

    function attendance()
    {
        $this->checkAdminLogin();
        $this->loadModel('staff');
        $staff = new staffModel();
       $staff->date = date('Y-m-d');
           
        $staffList = $staff->selectAll();
        $this->view->staffData = $staffList;

        $attendanceCheck = $staff->selectAttendance();

        $this->view->attendData = $attendanceCheck;


        if (isset($_POST['present']) or isset($_POST['absent']))
        {
             
           if (isset($_POST['present'])) {
              $staff->id = '1';
           }elseif (isset($_POST['absent'])) {
              $staff->id = '0';
           }

         
            $staff->name = $_POST['name[]'];

            print_r($staff->name);

            $staff->date = date('Y-m-d');
            $staff->attend();
     
        }
        $this->view->loadview('admin/attendance');
    }

    function markPresent ($id)
    {
        $this->checkAdminLogin();
        $this->loadModel('staff');
        $staff = new staffModel();

        $staff->sid = $id;

        $staff->status = '1';
        $staff->date = date('Y-m-d');
        $attData = $staff->attend();
        if (isset($attData)) {
            $this->attendance();
        }else{
            echo "Technical Error";
             $this->attendance();
        }
    }

     function markAbsent ($id)
    {
        $this->checkAdminLogin();
        $this->loadModel('staff');
        $staff = new staffModel();

        $staff->sid = $id;

        $staff->status = '0';
        $staff->date = date('Y-m-d');
        $attData = $staff->attend();
        if (isset($attData)) {
            $this->attendance();
        }else{
            echo "Technical Error";
             $this->attendance();
        }

    }


     function login()
     {
       if (isset($_POST['btnLogin'])) {
         
         $this->loadModel('staff');
         $staff = new StaffModel();
        $err = [];
        if (isset($_POST['email']) && !empty($_POST['email'])) {
            $staff->email = $_POST['email'];
        }else{
            $err['email'] = 'Enter Email';
        }

        if (isset($_POST['password']) && !empty($_POST['password'])) {
            $staff->password = $_POST['password'];
        }else{
            $err['password'] = 'Enter Password';
        }

        if (count($err) == 0) {
            $staffData= $staff->getStaffByEmail();
        

            if ($staffData) {
             $staffData = $staffData[0];
                $salt = $staffData->salt;
                 $np = sha1($salt.$staff->password);

                 $np;

                if ($staffData->password == $np) {
                      
                session_start();
                    $_SESSION['id'] = $staffData->id;

                    $_SESSION['name'] = $staffData->name;
                    $_SESSION['email'] = $staffData->email;
                    $_SESSION['department'] = $staffData->department;



                  $_SESSION['success_message'] ="Login Success"; 
            
                 if ( $_SESSION['department']== 'Academic') 
                 {
                    $this->redirect('staff/viewEvent');
                 }elseif($_SESSION['department']== 'Account')
                 { 
                     $this->redirect('staff/account_dashboard');
                 }elseif($_SESSION['department']== 'Library')
                 { 
                     $this->redirect('staff/library_dashboard');
                 }elseif($_SESSION['department']== 'Human Resource')
                 { 
                     $this->redirect('staff/hr_dashboard');
                 }
             
                    

                }else{
                    $this->view->message['unsucess']= "Password Doesnot Match";

                }

            }else{
                $this->view->message['failpass']= "Email Doesnot Match";
            }

        }
      }
        $this->view->loadview('staff/login');
    }

  function teacher_dashboard()
  {
    $this->checkStaffLogin();
    $this->loadModel('staff');
    $staff = new StaffModel();
    

    $this->view->loadview('teacher/dashboard');
    
  }

  function viewEvent()
    {
        $this->checkStaffLogin();

        $this->loadModel('event');
        $event = new eventModel();

        $eventData = $event->selectAllEvent();

        $this->view->eveData = $eventData;

        $this->view->loadview('teacher/event');
    
  }

  function uploadMaterial($id)
  {
    $this->checkStaffLogin();
    $this->loadModel('staff');
    $staff = new StaffModel();
    $staff->id = $id;
    $staffData= $staff->selectAllFilesByStaff($id);
     $this->view->staffData = $staffData;




    $this->loadModel('section');
    $section = new SectionModel();
     $section->id = $id;
    
  
    $sectionData = $section->selectSectionByStaffId($id);

    $this->view->sectionData = $sectionData;

    $classData = $section->selectAll();
    $this->view->classData = $classData;

    if (isset($_POST['btnUpload'])) {

        $err = [];
        if (isset($_POST['class']) && !empty($_POST['class'])) {
           $staff->class = $_POST['class'];
        }else{
            $err['class'] = "Select Class you wanna upload file";
        }
        if (isset($_FILES['photo']['name']) && !empty($_FILES['photo']['name']))
            {

                $pn = uniqid() . '_' . $_FILES['photo']['name'];
                $staff->photo = $pn;

            }
            else
            {
                $err['photo'] = 'Please select file to upload';
            }
            

        if (count($err) ==0) {
           
           $uploadData= $staff->upload();
           if ($uploadData)
            {
                $this->view->message['sucess'] = 'File Uploaded sucessfully';

                if (isset($_FILES['photo']['name']) && !empty($_FILES['photo']['name']))
                {
                    move_uploaded_file($_FILES['photo']['tmp_name'], 'public/images/' . $pn);
                }

            }
            else
            {
                $this->view->message['fail'] = 'File cannot be Uploaded. Try again.';
            }
        }else{
             $this->view->message['fail'] = 'File cannot be Uploaded. Try again.';
        }


    }

    $this->view->loadview('teacher/material');

  }

  public function fileRemove($id)
    {
        $this->checkStaffLogin();

        $this->loadModel('staff');
        $staff = new staffModel();

        $staff->id = $id;

      

        $fileRemove = $staff->fileRemove($id);
        if ($fileRemove)
        {
            $this->view->message['sucess'] = "FIle Removed Sucessfully";
        }
        else
        {
            $this->view->message['fail'] = "Failed to Remove file ";
        }
        $this->uploadMaterial($id);
    }
   

    function question()
    {

         $this->checkAdminLogin();

         $this->loadModel('staff');
         $staff = new staffModel();

         $staffData = $staff->selectAllQuestion();
         $this->view->staffData =$staffData;

         $this->loadModel('section');
         $section = new sectionModel();

         $secData = $section->selectAll();
         $this->view->secData = $secData;

         if (isset($_POST['btnAdd'])) {
            $err = [];
            if (isset($_POST['class']) && !empty($_POST['class'])) {
                $staff->class = $_POST['class'];
            }else{
                $err['class'] = "Select the class";
            }
            if (isset($_POST['type']) && !empty($_POST['type'])) {
                $staff->type = $_POST['type'];
            }else{
                $err['type'] = "Select the type";
            }
            if (isset($_POST['question']) && !empty($_POST['question'])) {
                $staff->question = $_POST['question'];
            }else{
                $err['question'] = "Select the question";
            }
            if (isset($_FILES['assignmentFile']['name']) && !empty($_FILES['assignmentFile']['name']))
            {

                $pn = uniqid() . '_' . $_FILES['assignmentFile']['name'];
                $staff->assignmentFile = $pn;

            } else{
                $staff->assignmentFile = '';
            }
            
            

        if (count($err) ==0) {
           
           $questionData= $staff->addQuestion();
           if ($questionData)
            {
                $this->view->message['sucess'] = 'Question/Assignment added sucessfully';

                if (isset($_FILES['assignmentFile']['name']) && !empty($_FILES['assignmentFile']['name']))
                {
                    move_uploaded_file($_FILES['assignmentFile']['tmp_name'], 'public/images/' . $pn);
                }

            }
            else
            {
                $this->view->message['fail'] = 'File cannot be Uploaded';
            }
        

         }
    }
    
    $this->view->loadview('teacher/question');
   }

   public function questionRemove($id)
    {
        $this->checkStaffLogin();

        $this->loadModel('staff');
        $staff = new staffModel();

        $staff->id = $id;

      

        $questionRemove = $staff->questionRemove($id);
        if ($questionRemove)
        {
            $this->view->message['sucessDel'] = "Question Removed Sucessfully";
            $this->question();
        }
        else
        {
            $this->view->message['failDel'] = "Failed to Remove Question ";
        }
       }

        Public function checkTimetable($id)
        {
            $this->checkStaffLogin();
            $this->loadModel('staff');
            $staff = new staffModel();
            $staff->id = $id;
            $ttData = $staff->selectAllTimetable($id);

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


            $this->view->ttData = $ttData;


            $this->view->loadview('teacher/timetable');
        }
        
    
        public function leave($id)
        {
            $this->checkStaffLogin();
            $this->loadModel('staff');
            $staff = new staffModel();
              $staff->id = $id;

            $staffData = $staff->selectLeave($id);
            $this->view->staffData = $staffData;
             if (isset($_POST['btnApply'])) {
            $err = [];
            $staff->id = $id;

            if (isset($_POST['letter']) && !empty($_POST['letter'])) {
                $staff->letter = $_POST['letter'];
            }else{
                $err['letter'] = "Enter Letter Content";
            }
            if (isset($_POST['day']) && !empty($_POST['day'])) {
                $staff->day = $_POST['day'];
            }else{
                $err['day'] = "Enter Days for leave";
            }
            if (isset($_POST['start']) && !empty($_POST['start'])) {
                $staff->start = $_POST['start'];
            }else{
                $err['start'] = "Select the Start Date";
            }
            
            if (count($err) == 0) {
                $leaveApplication = $staff->applyLeave($id);
                 if ($leaveApplication)
        {
            $this->view->message['sucess'] = "Leave Application Suceed";
        }
        else
        {
            $this->view->message['fail'] = "Failed to apply for leave ";
        }
            }
        }
            $this->view->loadview('teacher/leave');

        }

    function leaveRemove($id)
    {
        $this->checkStaffLogin();

        $this->loadModel('staff');
        $staff = new staffModel();

        $staff->id = $id;

        $delData = $staff->deleteLeave($id);
        if ($delData)
        {
            $this->view->message['sucess'] = "Leave Removed Sucessfully";
        }
        else
        {
            $this->view->message['fail'] = "Failed to Remove leave ";
        }
        $this->leave($id);

    }

    function library_dashboard()
    {
            $this->checkStaffLogin();
            $this->loadModel('staff');
            $staff = new staffModel();
         if (isset($_POST['btnAdd']))
        {
            $err = [];
            if (isset($_POST['isbn']) && !empty($_POST['isbn']))
            {
                $staff->isbn = $_POST['isbn'];

            }
            else
            {
                $err['isbn'] = "Enter the ISBN";
            }

           
            if (isset($_POST['title']) && !empty($_POST['title']))
            {
                $staff->title = $_POST['title'];
            }
            else
            {
                $err['titel'] = "Enter the Title";
            }
            if (isset($_POST['author']) && !empty($_POST['author']))
            {
                $staff->author = $_POST['author'];
            }
            else
            {
                $err['author'] = "Enter the Author Name";
            }
            if (isset($_POST['edition']) && !empty($_POST['edition']))
            {
                $staff->edition = $_POST['edition'];
            }
            else
            {
                $err['edition'] = "Select Edition for Book";
            }

            if (isset($_POST['publisher']) && !empty($_POST['publisher']))
            {
                $staff->publisher = $_POST['publisher'];
            }
            else
            {
                $err['publisher'] = "Enter Publisher detail";
            }

            if (isset($_POST['publish_date']) && !empty($_POST['publish_date']))
            {
                $staff->publish_date = $_POST['publish_date'];
            }
            else
            {
                $err['publish_date'] = "Enter Publish Date";
            }

            if (isset($_POST['copies']) && !empty($_POST['copies']))
            {
                $staff->copies = $_POST['copies'];
            }
            else
            {
                $err['copies'] = "Enter Number of Copies";
            }

           
           
          

             if (isset($_FILES['book']['name']) && !empty($_FILES['book']['name']))
            {

                $pn = uniqid() . '_' . $_FILES['book']['name'];
                $staff->book = $pn;

            }
            else
            {
                $staff->book = '';
            }
            
            if (count($err) == 0) {
        

            $bookAdd = $staff->book_add();

            if ($bookAdd)
            {
                $this->view->message['sucess'] = 'Book Added sucessfully to Database';

                if (isset($_FILES['book']['name']) && !empty($_FILES['book']['name']))
                {
                    move_uploaded_file($_FILES['photo']['tmp_name'], 'public/books/' . $pn);
                }

            }
            else
            {
                $this->view->message['fail'] = 'Book cannot be Added to database';
            }
        }
       
    }
     $this->view->loadview('librarian/add_book');   

}


    public function view_book()
    {

        $this->checkStudentLogin();
        $this->loadModel('student');
        $student = new StudentModel();

        $bookData = $student->selectAllBook();
        $this->view->bookData = $bookData;

        $this->view->loadview('librarian/view_book');
    }

     public function bookRemove($id)
    {
        $this->checkStaffLogin();

        $this->loadModel('staff');
        $staff = new staffModel();

        $staff->id = $id;

      

        $bookDelete= $staff->bookDelete($id);
        if ($bookDelete)
        {
            $this->view->message['sucess'] = "Book Removed Sucessfully";
            $this->view_book();
        }
        else
        {
            $this->view->message['fail'] = "Failed to Remove Book ";
        }
       }
     
     public function teacher_viewbook()
     {

        $this->checkStudentLogin();
        $this->loadModel('student');
        $student = new StudentModel();

        $bookData = $student->selectAllBook();
        $this->view->bookData = $bookData;

        $this->view->loadview('teacher/view_book');

     }
    
    public function borrow()
    {
        $this->checkStudentLogin();
        $this->loadModel('staff');
        $staff = new staffModel();

        $this->view->borData = $staff->selectAllBorrow();


        if (isset($_POST['btnAdd'])) {
            
            $err = [];
            if (isset($_POST['isbn']) && !empty($_POST['isbn'])) {
               $staff->isbn = $_POST['isbn'];
            }else{
                $err ['isbn'] = "Enter ISBN";
            }
            if (isset($_POST['name']) && !empty($_POST['name'])) {
               $staff->name = $_POST['name'];
            }else{
                $err ['name'] = "Enter Name";
            }
            if (isset($_POST['number']) && !empty($_POST['number'])) {
               $staff->number = $_POST['number'];
            }else{
                $err ['number'] = "Enter Number";
            }
            if (isset($_POST['date']) && !empty($_POST['date'])) {
               $staff->date = $_POST['date'];
            }else{
                $err ['date'] = "Enter Date";
            }

            if (count($err) == 0) {

                $staffData = $staff->borrowAdd();
                if ($staffData)
                {
                    $this->view->message['sucess'] = "Borrower Added Sucessfully";
                    $this->borrow();
                }
                else
                {
                    $this->view->message['fail'] = "Failed to Add Borrower ";
                }
            }


        }

        $this->view->loadview('librarian/borrow');
    }

     public function borrowRemove($id)
    {
        $this->checkStaffLogin();

        $this->loadModel('staff');
        $staff = new staffModel();

        $staff->id = $id;

      

        $bookDelete= $staff->removeBorrower($id);
        if ($bookDelete)
        {
            $this->view->message['sucessDel'] = "Borrower Cleared Sucessfully";
            $this->borrow();
        }
        else
        {
            $this->view->message['fail'] = "Failed to Remove Borrower ";
        }
       }

       function markStudent()
       {
         $this->checkStudentLogin();
        $this->loadModel('staff');
        $staff = new staffModel();

        $this->view->borData = $staff->selectAllMark();


        if (isset($_POST['btnAdd'])) {
            
            $err = [];
            if (isset($_POST['name']) && !empty($_POST['name'])) {
               $staff->name = $_POST['name'];
            }else{
                $err ['name'] = "Enter name";
            }
             if (isset($_POST['id']) && !empty($_POST['id'])) {
               $staff->id = $_POST['id'];
            }else{
                $err ['id'] = "Enter id";
            }
            if (isset($_POST['subject']) && !empty($_POST['subject'])) {
               $staff->subject = $_POST['subject'];
            }else{
                $err ['subject'] = "Enter subject";
            }
            if (isset($_POST['mark']) && !empty($_POST['mark'])) {
               $staff->mark = $_POST['mark'];
            }else{
                $err ['mark'] = "Enter mark";
            }
           

            if (count($err) == 0) {

                $staffData = $staff->markMe();
                if ($staffData)
                {
                    $this->view->message['sucess'] = "Marks  Added Sucessfully";
                    $this->markStudent();
                }
                else
                {
                    $this->view->message['fail'] = "Failed to Add Marks ";
                }
            }


        }
        $this->view->loadView('teacher/mark_student');
       }

       public function removeMark($id)
    {
        $this->checkStaffLogin();

        $this->loadModel('staff');
        $staff = new staffModel();

        $staff->id = $id;

      

        $markDelete= $staff->markDelete($id);
        if ($markDelete)
        {
            $this->view->message['sucessDel'] = "Mark Removed Sucessfully";
            $this->markStudent();
        }
        else
        {
            $this->view->message['failDel'] = "Failed to Remove mark ";
        }
       }

}

?>
