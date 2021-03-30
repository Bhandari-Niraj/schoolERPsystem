
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
          <h3 class="card-title" text-align: center><b>List  of All  Books</b></h3>

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
                <th>ISBN</th>
               
                <th>Title</th>
                <th>Author</th>
                <th>Edition</th>
                <th>Publisher</th>
                <th>Publish Date</th>
                  <th>Copies</th>
                  <th>PDF Version</th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->bookData as $bd) { ?>
                   <tr>
                    <td><?php echo $bd->isbn; ?></td>
                    <td><?php echo $bd->title; ?></td>
                    <td><?php echo $bd->author;  ?></td>
                     <td><?php echo $bd->edition; ?></td>
                    <td><?php echo $bd->publisher; ?></td>
                    <td><?php echo $bd->publish_date; ?></td>
                    <td><?php echo $bd->copies; ?></td>
                    <td><embed  type="application/pdf" src="<?php echo base_url(); ?>public/books/<?php echo $bd->pdfbook; ?>" width='100' ></td>
                   

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