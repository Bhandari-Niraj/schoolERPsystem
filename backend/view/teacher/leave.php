
<?php  include_once('header.php');?><?php  include_once('header.php');?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Apply for leave</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">leave</li>
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
               
                <h3 class="card-title"><i class="fas fa-plus"></i> Apply for leave</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="<?php echo base_url(); ?>staff/question" method="POST" id="teacher_register" enctype="multipart/form-data">
                <div class="card-body">
                  
                  <div class="form-group">
                     <label for="inputQuestion">Letter</label>
                     <textarea class="form-control"  rows="6" name="letter" required=""></textarea>
                   </div>

                    <div class="form-group">
                    <label for="className">Days</label>
                    <input type="number" class="form-control" name="day" placeholder="Enter the number of days you want leave"  required=""  min="1">
                  </div>

                   <div class="form-group">
                <label for="inputStart">Start Date</label>
                <input type="date"  class="form-control" name="start" required="">
              </div>
          


              </div>
                  
             
                 
            
                <!-- /.card-body -->

                <div class="card-footer">
                   <button type="submit" class="btn btn-primary" name="btnApply">Apply Leave</button>
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
               <?php if (isset($this->message['sucessDel'])) { ?>
            <div class="alert alert-success" role="alert">
              <?php echo $this->message['sucessDel']; ?>
            </div>
           <?php } elseif(isset($this->message['failDel'])){  ?>
              <div class="alert alert-danger" role="alert">
              <?php echo  $this->message['failDel'] ; ?>
            </div>
           <?php } ?>
              <div class="card-header">
               
                <h3 class="card-title">Class Section Detail</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                   <div style="overflow-x:auto;">
          <table id="example" class="table table-striped table-bordered" style="width:100%">
       <thead>
            <tr>
                  <th>Letter</th>   
                <th>Days</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
            </
        </thead>
        <tbody>
           <?php foreach ($this->staffData as $sd) { ?>
                   <tr>
                    
                     <td>
                      <?php echo $sd->letter; ?>
                     </td>
                     <td><?php echo $sd->day; ?></td>
                     <td><?php echo $sd->start_date; ?></td>
                    <td><?php echo $sd->status; ?></td>
                    
                    <td>
                        <a href="<?php echo base_url() ?>staff/leaveRemove/<?php echo $sd->id ?>" class="btn btn-danger "onclick="return confirm('Are you sure, you want to delete  from Leave Database?')">
                          <i class="fa fa-trash"></i> Delete</a>
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

 