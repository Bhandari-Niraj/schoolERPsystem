<?php  include_once('header.php');?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Subject</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Subject</li>
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
               
                <h3 class="card-title"><i class="fas fa-plus"></i>Edit Class</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="<?php echo base_url(); ?>admin/edit_subject/<?php echo $this->subjectData->id; ?>" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="className">name</label>
                    <input type="input" class="form-control" name="name" placeholder="Class Name" value="<?php echo $this->subjectData->name; ?>">
                  </div>
                
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="btnEdit">Edit Subject</button>
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
               <?php if (isset($this->message['sucessEdit'])) { ?>
            <div class="alert alert-success" role="alert">
              <?php echo $this->message['sucessEdit']; ?>
            </div>
           <?php }elseif(isset($this->message['failEdit'])){ ?>
             <div class="alert alert-danger" role="alert">
              <?php echo  $this->message['failEdit'] ; ?>
            </div>
          <?php } ?>

           <?php if (isset($this->message['sucessDel'])) { ?>
            <div class="alert alert-success" role="alert">
              <?php echo $this->message['sucessDel']; ?>
            </div>
           <?php }elseif(isset($this->message['failDel'])){  ?>
              <div class="alert alert-danger" role="alert">
              <?php echo  $this->message['failDel'] ; ?>
            </div>
           <?php } ?>
              <div class="card-header">
               
                <h3 class="card-title">List of Classes</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                   <div style="overflow-x:auto;">
          <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>      
                <th>Name</th>
                <th>Action</th>
            </
        </thead>
        <tbody>
            <?php foreach ($this->sData as $sd) { ?>
                   <tr>
                    <td><?php echo $sd->id; ?></td>
                   
                     <td><?php echo $sd->name; ?></td>
                    
                    <td>
                     <a href="<?php echo base_url(); ?>admin/edit_subject/<?php echo $sd->id ?>" class="btn btn-info"><i class="fas fa-pen"></i> Edit</a> 
                        <a href="<?php echo base_url() ?>admin/subjectRemove/<?php echo $sd->id ?>" class="btn btn-danger "onclick="return confirm('Are you sure, you want to delete <?php echo $sd->name; ?> from subject Database?')">
                          <i class="fa fa-trash"></i> Delete</a>
                     </td> 

                 <?php } ?>
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