
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
              <li class="breadcrumb-item active">Blank Page</li>
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
          <h3 class="card-title"><?php echo $_SESSION['name']; ?> TimeTable</h3>
             
          <div class="card-tools">
            
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
                <th>Start</th>
                <th>End</th>
                
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
                    <td><?php  echo $td->start; ?></td>
                     <td><?php  echo $td->end; ?></td>
                   
                    
                    

                 <?php $i++; } ?>
        </tbody>
        <tfoot>
         
        </tfoot>
    </table>
            </div>
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