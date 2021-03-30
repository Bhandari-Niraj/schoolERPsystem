
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
              <li class="breadcrumb-item active">Add Book</li>
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
           
        
          <h3 class="card-title">Add New Book</h3>
           
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
           <form action="<?php echo base_url(); ?>staff/library_dashboard" method="POST" enctype="multipart/form-data" id="teacher_register">
                <div class="card-body">
                 <div class="row">
                <div class="form-group col-sm-6">
                <label for="name">ISBN</label>
                <input type="text" id="name" class="form-control" name="isbn" required="">
              </div>
              <div class="form-group col-sm-6">
                <label for="name">Title</label>
                <input type="text" id="name" class="form-control" name="title" required="">
              </div>
              
                </div>

                <div class="row">
              <div class="form-group col-sm-6">
                <label for="inputEmail">Author Name</label>
                <input type= "text" class="form-control" name='author' required="">
              </div>
            
               <div class="form-group col-sm-6">
                <label for="inputMobile">Edition</label>
                <input type="number"  class="form-control" name="edition" required="">
              </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-6">
                <label for="inputMobile">Publisher</label>
                <input type="text"  class="form-control" name="publisher" required="">
              </div>

                 <div class="form-group col-sm-6">
                <label for="inputMobile">Publish Date</label>
                <input type="date"  class="form-control" name="publish_date" required="">
              </div>
            </div>
         
          <div class="row">
               <div class="form-group col-sm-6">
                <label for="inputMobile">Copies</label>
                <input type="number"  class="form-control" name="copies" required="">
              </div>
             
               <div class="form-group col-sm-6">
                <label for="inputMobile">PDF format</label>
                <input type="file"  class="form-control" name="book" >
              </div>
            </div>

                <!-- /.card-body -->
                <div class="card-footer">
                 <input type="submit" value="Add Book" class="btn btn-success float-right" name="btnAdd">
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