
<?php  include_once('header.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <a type="submit" name="Add"  class="btn btn-primary btn-sm" href="<?php echo base_url();?>guardian/register"><i class="fas fa-plus"></i> Register Parent</a>
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
          <h3 class="card-title" text-align: center><b>List  of All  Parent</b></h3>

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
                <th>Status</th>
                <th>Action</th>
            </
        </thead>
        <tbody>
            <?php foreach ($this->guardData as $gd) { ?>
                   <tr>
                    <td><?php echo $gd->name; ?></td>
                   
                     <td><?php echo $gd->email; ?></td>
                    <td><?php echo $gd->mobile_no; ?></td>
                    <td><?php if ($gd->status == 1) {
                        echo "Active";
                    }else{
                      echo "Deactive";
                    } ?></td>
                    <td>
                      <a href="<?php echo base_url(); ?>guardian/edit_guardian/<?php echo $gd->id ?>" class="btn btn-info"><i class="fas fa-pen"></i> Edit</a> 
                        <a href="<?php echo base_url() ?>guardian/guardianRemove/<?php echo $gd->id ?>" class="btn btn-danger "onclick="return confirm('Are you sure, you want to delete <?php echo $sd->name; ?> from Staff Database?')">
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