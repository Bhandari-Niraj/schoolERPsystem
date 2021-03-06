<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo base_url() ?>public/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style type="text/css">
        .error{
          color:red;
        }

        .err{
          color:red;

          text-align: center;
        }

    </style>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index3.html" class="nav-link">Home</a>
      </li>
      
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-sun" style="font-size: 22px;"></i>
         
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          
          <div class="dropdown-divider"></div>
          
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url();?>Admin/update_profile" class="dropdown-item">
            <i class="fa fa-user fa-fw"></i> Update Profile
            
          </a>
          <div class="dropdown-divider"></div>
           <div class="dropdown-divider"></div>
          <a href="<?php echo base_url();?>Admin/update_profile" class="dropdown-item">
            <i class="fa fa-user fa-fw"></i> Change Password
            
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url();?>Login/logout" class="dropdown-item">
            <i class="fas fa-sign-out fa-fw"></i>Logout
            
          </a>
          <div class="dropdown-divider"></div>
          
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url(); ?>/staff/teacher_dashboard" class="brand-link">
      <img src="<?php echo base_url(); ?>public/dist/img/AdminLTELogo.png"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Teacher</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url(); ?>public/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php @session_start(); 
                           echo $_SESSION['id'].' '.$_SESSION['name'];  
           ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="<?php echo base_url();?>staff/teacher_dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>
            
          </li>
         
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fa fa-graduation-cap" aria-hidden="true"></i>
              <p>
                Manage Academics
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>student/attendance" class="nav-link">
                <i class='fas fa-book-reader'></i>
                  <p>Student Attendance</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url(); ?>staff/uploadMaterial/<?php @session_start(); 
                           echo $_SESSION['id']; ?>" class="nav-link">
                  <i class="fa fa-user" aria-hidden="true"></i>
                  <p>Upload Materials</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="<?php echo base_url(); ?>staff/checkTimetable/<?php @session_start(); 
                           echo $_SESSION['id']; ?>" class="nav-link">
                  <i class="fa fa-user" aria-hidden="true"></i>
                  <p>Check Timetable</p>
                </a>
              </li>
              
               <li class="nav-item">
                <a href="<?php echo base_url(); ?>staff/question" class="nav-link">
                  <i class="fa fa-user" aria-hidden="true"></i>
                  <p>Add Important Question</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url(); ?>staff/viewEvent" class="nav-link">
                  <i class="fa fa-user" aria-hidden="true"></i>
                  <p>View Events</p>
                </a>
              </li>

               <li class="nav-item">
                <a href="<?php echo base_url(); ?>staff/teacher_viewbook" class="nav-link">
                  <i class="fa fa-eye" aria-hidden="true"></i>
                  <p>View Library Books</p>
                </a>
              </li>
              
               <li class="nav-item">
                <a href="<?php echo base_url(); ?>staff/markStudent" class="nav-link">
                  <i class="fa fa-eye" aria-hidden="true"></i>
                  <p>Post Exam Marks</p>
                </a>
              </li>
              
              
              
            </ul>
          </li>
         
            <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fa fa-university" aria-hidden="true"></i>
              <p>
                 Personal 
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>staff/leave/<?php @session_start(); 
                           echo $_SESSION['id']; ?>" class="nav-link">
                <i class='fas fa-book-reader'></i>
                  <p>Apply For Leave</p>
                </a>
              </li>


              
            </ul>
          </li>


           </li>
            

         
        </ul>

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>