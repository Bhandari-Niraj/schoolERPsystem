
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
           <form action="<?php echo base_url(); ?>guardian/edit_guardian/<?php echo $this->guardData->id; ?>" method="POST" enctype="multipart/form-data" id="teacher_register">
                <div class="card-body">
                 <div class="row">
                <div class="form-group col-sm-6">
                <label for="name">Name</label>
                <input type="text" id="name" class="form-control" name="name" required="" value="<?php echo $this->guardData->name; ?>">
              </div>
              
              <div class="form-group col-sm-6">
                <label for="inputEmail">Email</label>
                <input type= "Email" class="form-control" name='email' required="" value="<?php echo $this->guardData->email; ?>" >
              </div>
            </div>
            <div class="row">
               <div class="form-group col-sm-6">
                <label for="inputMobile">Mobile Number</label>
                <input type="number"  class="form-control" name="mobile_no" required="" value="<?php echo $this->guardData->mobile_no; ?>">
              </div>
          

              <div class="form-group col-sm-6">
                <label for="inputPassword">Password</label>
                <input type="Password"  class="form-control" name="password" required="" value="<?php echo $this->guardData->password; ?>">
              </div>
            </div>
     

               <div class="form-group">
                <label>Status</label>
                <?php if ($this->guardData->status = 1) { ?>
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