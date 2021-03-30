
<?php  include_once('header.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
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
          <h3 class="card-title" text-align: center><b>List of Events</b></h3>

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
                <th>Name</th>
               
                <th>Description</th>
                <th>Participants</th>
                <th>Start</th>
                <th>End</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->eveData as $ed) { ?>
                   <tr>
                    <td><?php echo $ed->name; ?></td>
                   
                     <td><?php echo $ed->description; ?></td>
                    <td><?php echo $ed->participants; ?></td>
                    <td><?php echo $ed->start; ?></td>
                    <td><?php echo $ed->end; ?></td>
                    <td>
                       
                        <a href="<?php echo base_url() ?>event/eventRemove/<?php echo $ed->id ?>" class="btn btn-danger "onclick="return confirm('Are you sure, you want to delete <?php echo $ed->name; ?> from Event Database?')">
                          <i class="fa fa-trash"></i> Delete</a>
                     </td> 

                 <?php } ?>
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