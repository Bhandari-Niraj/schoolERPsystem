
<?php  include_once('header.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <a type="submit" name="Add"  class="btn btn-primary btn-sm" href="<?php echo base_url();?>staff/register"><i class="fas fa-plus"></i> Add New Staff</a>
            </ol>
          </div>
          <div class="col-sm-6">
          </div>
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
          <h3 class="card-title" text-align: center><b>List  of All  Staff</b></h3>

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
               
                <th>Email</th>
                <th>Phone Number</th>
                <th>Qualification</th>
                <th>Department</th>
                <th>Level</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->staffData as $sd) { ?>
                   <tr>
                    <td><?php echo $sd->name; ?></td>
                   
                     <td><?php echo $sd->email; ?></td>
                    <td><?php echo $sd->mobile_no; ?></td>
                    <td><?php echo $sd->academic_qualification; ?></td>
                    <td><?php echo $sd->department; ?></td>
                    <td><?php echo $sd->level; ?></td>
                    <td>
                      <a href="<?php echo base_url(); ?>staff/edit_staff/<?php echo $sd->id ?>" class="btn btn-info"><i class="fas fa-pen"></i> Edit</a> 
                        <a href="<?php echo base_url() ?>staff/staffRemove/<?php echo $sd->id ?>" class="btn btn-danger "onclick="return confirm('Are you sure, you want to delete <?php echo $sd->name; ?> from Staff Database?')">
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