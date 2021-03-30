
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
              <li class="breadcrumb-item active">Create Event</li>
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
           
        
          <h3 class="card-title">Create New Event</h3>
           
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
           <form action="<?php echo base_url(); ?>event/create" method="POST" enctype="multipart/form-data" id="teacher_register">
                <div class="card-body">
                 <div class="row">
                <div class="form-group col-sm-6">
                <label for="name">Name</label>
                <input type="text" id="name" class="form-control" name="name" required="">
              </div>

              <div class="form-group col-sm-6">
                <label for="participants">Participants</label>
                <input type="text" id="participants" class="form-control" name="participants" required="">
              </div>
              
        
            </div>
            <div class="row">
               <div class="form-group col-sm-6">
                <label for="inputStart">Start</label>
                <input type="datetime-local"  class="form-control" name="start" required="">
              </div>
          

              <div class="form-group col-sm-6">
                <label for="inputEnd">End</label>
                <input type="datetime-local"  class="form-control" name="end" required="">
              </div>
            </div>

         <div class="form-group col-sm-6">
                        <label>Description</label>
                        <textarea class="form-control" rows="3" placeholder="Enter Event Details" name="description"></textarea>
                      </div>
     

              
              
                    </div>
                  </div>
              
                <!-- /.card-body -->
                <div class="card-footer">
                 <input type="submit" value="Create" class="btn btn-success float-right" name="btnCreate">
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