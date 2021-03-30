
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
              <li class="breadcrumb-item active">Student Edit</li>
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
        
          <h3 class="card-title">Edit Student</h3>
           
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
           <form action="<?php echo base_url(); ?>student/edit_student/<?php echo $this->studData->id; ?>" method="POST" enctype="multipart/form-data" id="teacher_register">
                <div class="card-body">
                 <div class="row">
                <div class="form-group col-sm-6">
                <label for="name">Student Name</label>
                <input type="text" id="name" class="form-control" name="name" required="" value="<?php echo $this->studData->name; ?>" >
              </div>
               <div class="form-group col-sm-6">
                <label>Change Photo</label>
                <input type="file" id="photo" class="form-control" name="photo"  value="<?php echo $this->studData->photo; ?>"  placeholder="Click to change photo">
                </div>
                </div>

                <div class="row">
              <div class="form-group col-sm-6">
                <label for="inputEmail">Email</label>
                <input type= "Email" class="form-control" name='email' required="" value="<?php echo $this->studData->email; ?>">
              </div>
            
               <div class="form-group col-sm-6">
                <label for="inputMobile">Mobile Number</label>
                <input type="number"  class="form-control" name="mobile_no" required="" value="<?php echo $this->studData->mobile_no; ?>">
              </div>
            </div>

            <div class="row">
              <div class="form-group col-sm-6">
                <label for="inputQualification">Address</label>
                <input type= "text" class="form-control" name='address' required="" placeholder="City Name" value="<?php echo $this->studData->address; ?>"> 
              </div>

               <div class="form-group col-sm-6">
                <label for="inputDepartment">class</label>
                <input type="number" name="class" class="form-control" placeholder="O for k" min="0" max="12" required="" value="<?php echo $this->studData->class; ?>">
              </div>
            </div>
         
          <div class="row">
              <div class="form-group col-sm-6">
                <label for="inputQualification">Parent Email</label>
                 <input type= "Email" class="form-control" name='parent_email' required="" value="<?php echo $this->studData->parent_email; ?>">
              </div>
              
            </div>

              <div class="form-group">
                <label>Status</label>
                <?php if ($this->studData->status = 1) { ?>
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