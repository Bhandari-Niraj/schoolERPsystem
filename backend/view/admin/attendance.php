
<?php  include_once('header.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
            
        <div class="card-header">
          <?php if (isset($this->message['sucessEdit'])) { ?>
            <div class="alert alert-success" role="alert">
              <?php echo $this->message['sucessEdit']; ?>
            </div>
           <?php } ?>

           <?php if (isset($this->message['sucess'])) { ?>
            <div class="alert alert-success" role="alert">
              <?php echo $this->message['sucess']; ?>
            </div>
           <?php }elseif(isset($this->message['fail'])){  ?>
              <div class="alert alert-danger" role="alert">
              <?php echo  $this->message['fail'] ; ?>
            </div>
           <?php } ?>
          <h3 class="card-title" text-align: center><b>Attendance Dashboard</b></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            
          </div>
        </div>
        <div class="card-body">

          <div style="overflow-x:auto;">
         
          <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>I.D</th>
                <th>Name</th>
                <th>Photo</th>
                <th>Email</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php  foreach ($this->staffData as $sd) {
          
             ?>
                   <tr>
                    <td><?php echo $sd->id; ?></td>
                    <td><?php echo $sd->name; ?></td>
                    <td><img src="<?php echo base_url(); ?>public/images/<?php echo $sd->photo; ?>" alt="<?php echo $sd->name; ?>" width='100' ></td>
                   
                     <td><?php echo $sd->email; ?> </td>
                   
                    <td>
                      <?php
                         foreach ($this->attendData as $ad) {
                           if ($ad->staff_id == $sd->id) {
                              if ($ad->status == 1) { ?>
                               <div class="alert alert-success" role="alert"></div>
                              <?php }elseif($ad->status == 0){ ?>
                               <div class="alert alert-danger" role="alert"></div>
                          <?php  }
                         }
                       }
                       ?>
                     </td> 
                     <td>
                       <a href="<?php echo base_url(); ?>staff/markPresent/<?php echo $sd->id; ?>"><input type="submit" value="Present" class="btn btn-success float-left" name="present"></a>

                       <a href="<?php echo base_url(); ?>staff/markAbsent/<?php echo $sd->id; ?>"><input type="submit" value="Absent" class="btn btn-danger float-right" name="absent">
                     </td>
                   </tr>

                 <?php  } ?>
        </tbody>
        <tfoot>
        </tfoot>
    </table>

            </div>
            
  
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