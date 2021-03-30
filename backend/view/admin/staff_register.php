
<?php  include_once('header.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Staff Register</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
           <?php if (isset($this->message['sucess'])) { ?>
            <div class="alert alert-success" role="alert">
              <?php echo $this->message['sucess']; ?>
            </div>
           <?php }elseif(isset($this->message['fail'])){  ?>
              <div class="alert alert-danger" role="alert">
              <?php echo  $this->message['fail'] ; ?>
            </div>
           <?php } ?>
           
        
          <h3 class="card-title">Register New Staff</h3>
           
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
           <form action="<?php echo base_url(); ?>staff/register" method="POST" enctype="multipart/form-data" id="teacher_register">
                <div class="card-body">
                 <div class="row">
                <div class="form-group col-sm-6">
                <label for="name">Staff Name</label>
                <input type="text" id="name" class="form-control" name="name" required="">
              </div>
               <div class="form-group col-sm-6">
                <label>Photo</label>
                <input type="file" id="photo" class="form-control" name="photo" required="">
                </div>
                </div>

                <div class="row">
              <div class="form-group col-sm-6">
                <label for="inputEmail">Email</label>
                <input type= "Email" class="form-control" name='email' required="">
              </div>
            
               <div class="form-group col-sm-6">
                <label for="inputMobile">Mobile Number</label>
                <input type="number"  class="form-control" name="mobile_no" required="">
              </div>
            </div>

            <div class="row">
              <div class="form-group col-sm-6">
                <label for="inputQualification">Highest Academic Qualification</label>
                <select class="form-control custom-select" name="qualification" >
                  <option>PHD</option>
                  <option>Master</option>
                  <option selected>Bachelor</option>
                </select>
              </div>

               <div class="form-group col-sm-6">
                <label for="inputDepartment">Department</label>
                <select class="form-control custom-select" name="department" >
                  <option selected>Academic</option>
                  <option>Account</option>
                  <option >Human Resource</option>
                  <option >Library</option>
                  <option >Non-Technical</option>
                </select>
              </div>
            </div>
         
          <div class="row">
              <div class="form-group col-sm-6">
                <label for="inputQualification">Staff Level</label>
                <select class="form-control custom-select" name="level" >
                  <option selected>1</option>
                  <option>2</option>
                  <option >3</option>
                   <option >4</option>
                    <option >5</option>
                </select>
              </div>
              <div class="form-group col-sm-6">
                <label for="inputPassword">Password</label>
                <input type="Password"  class="form-control" name="password" required="">
              </div>
            </div>

              <div class="form-group">
                <label>Status</label>
                  <input type="radio" name="status" value="1" checked="">Active
                  <input type="radio" name="status" value="0"> De-Active
              </div>
                    </div>
                  </div>
              
                <!-- /.card-body -->
                <div class="card-footer">
                 <input type="submit" value="Register" class="btn btn-success float-right" name="btnRegister">
                </div>
              </form>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include_once('footer.php'); ?>