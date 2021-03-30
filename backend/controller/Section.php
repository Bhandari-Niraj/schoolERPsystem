<?php

class Section extends Controller
{
	public function register()
	{
		$this->checkAdminLogin();

        $this->loadModel('section');
        $section = new sectionModel();

        $secData = $section->selectAll();
        $this->view->sData = $secData;

        if (isset($_POST['btnAdd']))
        {
            $err = [];
            if (isset($_POST['name']) && !empty($_POST['name']))
            {
                $section->name = $_POST['name'];

            }
            else
            {
                $err['name'] = "Enter the name";
            }
            if (isset($_POST['nname']) && !empty($_POST['nname']))
            {
                $section->nname = $_POST['nname'];

            }
            else
            {
                $err['nname'] = "Enter the numeric name";
            }

            if (count($err)==0) {
            	$sectData = $section->register();

             if ($sectData)
             {
                $this->view->message['sucess'] = 'Class Added sucessfully';
                $this->register();
              }
             else
             {
                $this->view->message['fail'] = 'Class cannot be Added';
             }
            }
		
	     }
	     $this->view->loadview('admin/classinfo');
    }

    public function classRemove($id)
    {
      $this->checkAdminLogin();
      $this->loadModel('section');
      $section = new sectionModel();
      $section->id = $id;

      $classById = $section->classSelectById($id);
        $name = $classById[0]->name;

      $secData = $section->remove($id);
      if ($secData)
        {
            $this->view->message['sucessDel'] = "Class Removed Sucessfully named  " . $name;
        }
        else
        {
            $this->view->message['failDel'] = "Failed to Remove Class named  " . $name;
        }
         $this->register();
    }


    public function edit_class($id)
    {
    	$this->checkAdminLogin();
        $this->loadModel('section');
        $section = new sectionModel();
        $section->id = $id;

        $classById = $section->classSelectById($id);
        $this->view->classData = $classById[0];

        $secData = $section->selectAll();
        $this->view->sData = $secData;

        if (isset($_POST['btnEdit']))
        {
            $err = [];
            if (isset($_POST['name']) && !empty($_POST['name']))
            {
                $section->name = $_POST['name'];

            }
            else
            {
                $err['name'] = "Enter the name";
            }
            if (isset($_POST['nname']) && !empty($_POST['nname']))
            {
                $section->nname = $_POST['nname'];

            }
            else
            {
                $err['nname'] = "Enter the numeric name";
            }

            if (count($err)==0) {
            	$classEdit = $section->edit();

             if ($classEdit)
             {
                $this->view->message['sucessEdit'] = 'Class Updated sucessfully';
                
              }
             else
             {
                $this->view->message['failEdit'] = 'Class cannot be Updated';
             }
            }
		
	     }
	     $this->view->loadview('admin/class_edit');
    }


    public function create()
    {
    	$this->checkAdminLogin();
        $this->loadModel('section');
        $section = new sectionModel();
         
        $this->view->secData = $section->selectAll();

        $this->loadModel('staff');
        $staff = new staffModel();
        $this->view->staffData = $staff->selectStaffByDepartment();

        $this->view->classDetail = $section->SelectAllSection();


        if (isset($_POST['btnAdd'])) 
        {
           $err= [];
           if (isset($_POST['name']) && !empty($_POST['name'])) 
           {
           	 $section->name = $_POST['name'];
           }else
           {
             $err['name'] ='Enter Section name';
           }

           if (isset($_POST['class']) && !empty($_POST['class'])) 
           {
           	 $section->class = $_POST['class'];
           }else
           {
             $err['class'] ='Enter Class name';
           }

           if (isset($_POST['teacher']) && !empty($_POST['teacher'])) 
           {
           	 $section->teacher = $_POST['teacher'];
           }else
           {
             $err['teacher'] ='Enter Teacher name';
           }

           if (count($err)==0) 
           {
           	  $secAdd = $section->RegSection();
           	  if ($secAdd)
             {
                $this->view->message['sucess'] = 'Section Added sucessfully';
               
              }
             else
             {
                $this->view->message['fail'] = 'Section cannot be Added. Try again.';
             }

           }
        }



    	$this->view->loadview('admin/section');
    }


    public function sectionRemove($id)
    {
      $this->checkAdminLogin();
      $this->loadModel('section');
      $section = new sectionModel();
      $section->id = $id;

      $sectionById = $section->sectionClassSelectById($id);
        $name = $sectionById[0]->name;

      $secData = $section->sectionRemove($id);
      if ($secData)
        {
            $this->view->message['sucessDel'] = "Section Removed Sucessfully named  " . $name;
        }
        else
        {
            $this->view->message['failDel'] = "Failed to Remove Section named  " . $name;
        }
         $this->create();
    }

    public function edit_section($id)
    {

    	$this->checkAdminLogin();
        $this->loadModel('section');
        $section = new sectionModel();
        $section->id = $id;
         
        $this->view->secData = $section->selectAll();

        $this->loadModel('staff');
        $staff = new staffModel();
        $this->view->staffData = $staff->selectStaffByDepartment();

         $sectionById = $section->sectionClassSelectById($id);
         $this->view->sData = $sectionById[0];

        $this->view->classDetail = $section->SelectAllSection();


        if (isset($_POST['btnEdit'])) 
        {
           $err= [];
           if (isset($_POST['name']) && !empty($_POST['name'])) 
           {
           	 $section->name = $_POST['name'];
           }else
           {
             $err['name'] ='Enter Section name';
           }

           if (isset($_POST['class']) && !empty($_POST['class'])) 
           {
           	 $section->class = $_POST['class'];
           }else
           {
             $err['class'] ='Enter Class name';
           }

           if (isset($_POST['teacher']) && !empty($_POST['teacher'])) 
           {
           	 $section->teacher = $_POST['teacher'];
           }else
           {
             $err['teacher'] ='Enter Teacher name';
           }

           if (count($err)==0) 
           {
           	  $secEdit = $section->EditSection();
           	  if ($secEdit)
             {
                $this->view->message['sucessEdit'] = 'Section Updated sucessfully';

                $this->create();
               
              }
             else
             {
                $this->view->message['failEdit'] = 'Section cannot be Update. Try again.';
             }

           }
        }
		
	     
	     $this->view->loadview('admin/section_edit');

    }

}



?>