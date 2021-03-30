
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
          <h3 class="card-title">Title</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
           <div style="overflow-x:auto;">
          <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Subject</th>
                <th>Mark</th>
                <th>Grade</th>
          
        </thead>
        <tbody>
            <?php foreach ($this->borData as $bd) {  ?>
                   <tr>
                    
                    
                     <td><?php echo $bd->subject; ?></td>
                     <td><?php echo $bd->mark; ?></td>
                     <td><?php if ($bd->mark > 90) {
                       echo "HD";
                     }elseif ($bd->mark<= 90 && $bd->mark > 80  ) {
                       echo "HD";
                     }elseif ($bd->mark<= 80 && $bd->mark > 60 ) {
                        echo "Credit";
                     }elseif ($bd->mark<= 60 && $bd->mark >= 40 ) {
                        echo "Pass";
                     }elseif ($bd->mark < 40 ) {
                        echo "Fail";
                     } ?></td>
                    
                    
                 <?php     } ?>
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