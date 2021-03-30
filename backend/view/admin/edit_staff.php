
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
              <li class="breadcrumb-item active">Edit Teacher</li>
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
           
        
          <h3 class="card-title">Update Teacher Detail</h3>
           
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
           <form action="<?php echo base_url(); ?>staff/edit_staff/<?php echo $this->staffData->id; ?>" method="POST" enctype="multipart/form-data" id="teacher_register" >
                <div class="card-body">
                 <div class="row">
                <div class="form-group col-sm-6">
                <label for="name">Teacher Name</label>
                <input type="text" id="name" class="form-control" name="name" required="" value="<?php echo $this->staffData->name; ?>">
              </div>
               <div class="form-group col-sm-6">
                <label>New Photo</label>
                <input type="file" id="photo" class="form-control" name="photo"  value="<?php echo $this->staffData->photo; ?>">
                </div>
                </div>

                <div class="row">
              <div class="form-group col-sm-6">
                <label for="inputEmail">Email</label>
                <input type= "Email" class="form-control" name='email' required="" value="<?php echo $this->staffData->email; ?>">
              </div>
            
               <div class="form-group col-sm-6">
                <label for="inputMobile">Mobile Number</label>
                <input type="number"  class="form-control" name="mobile_no" required="" value="<?php echo $this->staffData->mobile_no; ?>">
              </div>
            </div>

            <div class="row">
              <div class="form-group col-sm-6">
                <label for="inputQualification">Highest Academic Qualification</label>
                <select class="form-control custom-select" name="qualification" value="<?php echo $this->staffData->academic_qualification; ?>" >
                  <option>PHD</option>
                  <option>Master</option>
                  <option >Bachelor</option>
                </select>
              </div>


               <div class="form-group col-sm-6">
                <label for="inputDepartment">Department</label>
                <select class="form-control custom-select" name="department" >
                  <option><?php echo $this->staffData->department ?></option>
                  <option >Academic</option>
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
                <select class="form-control custom-select" name="level" value="<?php echo $this->staffData->level; ?>">
                  <?php if ($this->staffData->level ) { ?>
                    <option ><?php echo $this->staffData->level ?></option>
                  <?php } ?>
                 <option>1</option>
                  <option>2</option>
                  <option >3</option>
                   <option >4</option>
                    <option >5</option>
                </select>
              </div>
         
             
              
            </div>

              <div class="form-group">
                <label>Status</label>
                <?php if ($this->staffData->status = 1) { ?>
                  <input type="radio" name="status" value="1" checked="">Active
                  <input type="radio" name="status" value="0"> De-Active
                
                <?php  }else{ ?>
                  <input type="radio" name="status" value="1">Active
                  <input type="radio" name="status" value="0" checked=""> De-Active

             <?php   } ?>
                  
              </div>
                    </div>
                  </div>
              
                <!-- /.card-body -->
                <div class="card-footer">
                 <input type="submit" value="Edit" class="btn btn-success float-right" name="btnEdit">
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