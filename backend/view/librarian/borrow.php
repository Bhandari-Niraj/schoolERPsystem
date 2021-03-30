<?php  include_once('header.php');?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Borrow Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Borrow Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
               <?php if (isset($this->message['sucess'])) { ?>
            <div class="alert alert-success" role="alert">
              <?php echo $this->message['sucess']; ?>
            </div>
           <?php }elseif(isset($this->message['fail'])){  ?>
              <div class="alert alert-danger" role="alert">
              <?php echo  $this->message['fail'] ; ?>
            </div>
           <?php } ?>
              <div class="card-header">
               
                <h3 class="card-title"><i class="fas fa-plus"></i> Add New Borrower</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="<?php echo base_url(); ?>staff/borrow" method="POST" id='teacher_login'>
                <div class="card-body">
                  <div class="form-group ">
                    <label for="className">Book ISBN</label>
                    <input type="text" class="form-control" name="isbn"  required>
                  </div>
                 
        
                  <div class="form-group">
                    <label for="className">Borrower Name</label>
                    <input type="text" class="form-control" name="name"  required="">
                  </div>

                  <div class="form-group ">
                    <label for="className">Library Card Number</label>
                    <input type="number" class="form-control" name="number"  required="">
                  </div>

                  <div class="form-group">
                    <label for="className">Borrow Date</label>
                    <input type="date" class="form-control" name="date"  required="">
                  </div>

                  



                   


                  
             
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="btnAdd">Add Borrower</button>
                </div>
              </form>
            </div>
            <!-- /.card -->


          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">
            <!-- general form elements disabled -->
            <div class="card card-warning">
               <?php if (isset($this->message['sucessEdit'])) { ?>
            <div class="alert alert-success" role="alert">
              <?php echo $this->message['sucessEdit']; ?>
            </div>
           <?php } ?>

           <?php if (isset($this->message['sucessDel'])) { ?>
            <div class="alert alert-success" role="alert">
              <?php echo $this->message['sucessDel']; ?>
            </div>
           <?php }elseif(isset($this->message['failDel'])){  ?>
              <div class="alert alert-danger" role="alert">
              <?php echo  $this->message['failDel'] ; ?>
            </div>
           <?php } ?>
              <div class="card-header">
               
                <h3 class="card-title">Borrower List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                   <div style="overflow-x:auto;">
          <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                  <th>ISBN</th>   
                <th>NAME</th>
                <th>CARD NO</th>
                <th>DATE</th>
                <th>ACTION</th>
            </
        </thead>
        <tbody>
            <?php foreach ($this->borData as $bd) {  ?>
                   <tr>
                    
                     <td><?php echo $bd->isbn; ?></td>
                     <td><?php echo $bd->name; ?></td>
                     <td><?php echo $bd->card_no; ?></td>
                     <td><?php echo $bd->date; ?></td>
                    
                    <td>
                  
                        <a href="<?php echo base_url() ?>staff/borrowRemove/<?php echo $bd->id ?>" class="btn btn-danger "onclick="return confirm('Are you sure, you want to delete  from Borrow Database?')">
                          <i class="fa fa-trash"></i>Cleared</a>
                     </td> 

                 <?php     } ?>
        </tbody>
        <tfoot>
         
        </tfoot>
    </table>
            </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- general form elements disabled -->
           
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>


    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php  include_once('footer.php');?>