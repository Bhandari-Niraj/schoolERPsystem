
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
                  <th>Class</th>   
                <th>File</th>
                <th>Teacher</th>
                <th>Action</th>
            </
        </thead>
        <tbody>
            <?php foreach ($this->studentFile as $sf) {  ?>
                   <tr>
                    
                     <td>
                     <?php echo $this->sectionData->numeric_name; ?>
                     </td>
                     <td><embed  type="application/pdf" src="<?php echo base_url(); ?>public/images/<?php echo $sf->file; ?>" alt="<?php echo $sf->file; ?>" width='100' ></td>
                    <td><?php foreach ($this->staffData as $sd) {
                       if ($sf->uploaded_by == $sd->id) {
                        echo $sd->name;
                       }
                    } ?>
                      </td>
                    
                    <td>
                      <a href="<?php echo base_url(); ?>public/images/<?php echo $sf->file; ?>" class="btn btn-info"><i class="fas fa-pen"></i> Download</a> 
                        
                     </td> 

                 <?php     } ?>
        </tbody>
        <tfoot>
         
        </tfoot>
    </table>
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