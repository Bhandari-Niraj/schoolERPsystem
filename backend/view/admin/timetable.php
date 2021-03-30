
<?php  include_once('header.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <a type="submit" name="Add"  class="btn btn-primary btn-sm" href="<?php echo base_url();?>admin/create_timetable"><i class="fas fa-plus"></i> Add New Timetable</a>
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
          <h3 class="card-title" text-align: center><b>TimeTable Management Dashboard</b></h3>

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
                <th>S.N</th>
               
                <th>Class</th>
                <th>Section</th>
                <th>Subject</th>
                <th>Teacher</th>
                <th>Start</th>
                <th>End</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; foreach ($this->ttData as $td) { ?>
                   <tr>
                    <td> <?php echo $i; ?></td>
                    <td>
                      <?php foreach ($this->sectionData as $sd)                               
                       {
                          foreach ($this->classData as $cd) {
                         if ($td->sectionclass_id == $sd->id) {
                          if ($sd->class_id == $cd->id) {
                            echo $cd->numeric_name;
                          }
                           
                         }
                      }} ?>
                    </td>
                    <td>
                      <?php foreach ($this->sectionData as $sd) {
                         if ($td->sectionclass_id == $sd->id) {
                           echo $sd->name;
                         }
                      } ?>
                    </td>
                    <td>
                      <?php foreach ($this->subjectData as $sub) {
                         if ($td->subject_id == $sub->id) {
                           echo $sub->name;
                         }
                      } ?>
                    </td>
                    <td>
                      <?php foreach ($this->staffData as $sd) {
                         if ($td->teacher_id == $sd->id) {
                           echo $sd->name;
                         }
                      } ?>
                    </td>
                    <td><?php  echo $td->start; ?></td>
                     <td><?php  echo $td->end; ?></td>
                   
                    
                    <td>
                      <!-- <a href="<?php echo base_url(); ?>admin/edit_timetable/<?php echo $td->id ?>" class="btn btn-info"><i class="fas fa-pen"></i> Edit</a>  -->
                        <a href="<?php echo base_url() ?>admin/timetableRemove/<?php echo $td->id ?>" class="btn btn-danger "onclick="return confirm('Are you sure, you want to delete  from timetable Database?')">
                          <i class="fa fa-trash"></i> Delete</a>
                     </td> 

                 <?php $i++; } ?>
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