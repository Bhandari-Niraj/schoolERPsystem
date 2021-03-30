<?php  include_once('header.php');?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Assignment/Question</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">assignment</li>
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
               
                <h3 class="card-title"><i class="fas fa-plus"></i> Add New Assignment or Question</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="<?php echo base_url(); ?>staff/question" method="POST" id="teacher_register" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="className">Class</label>
                    <select class="form-control custom-select" name="class" >
                      <?php foreach ($this->secData as $sd) { ?>
                        <option value="<?php echo $sd->id; ?>"><?php echo $sd->numeric_name; ?></option>
                     <?php } ?>
                        
                       
                     
                     </select>

                  </div>

                   <div class="form-group ">
                     <label for="inputType">Type</label>
                     <select class="form-control custom-select" name="type" required="" >
                        <option>Assignment</option>
                        <option>Question</option>
                     
                     </select>

                     <div class="form-group">
                     <label for="inputQuestion">Question</label>
                     <textarea class="form-control"  rows="4" name="question" required=""></textarea>
                   </div>

                    <div class="form-group">
                    <label for="className">Assignment</label>
                    <input type="file" class="form-control" name="assignmentFile" >
                  </div>


              </div>
                  
             
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="btnAdd">Add Assignment</button>
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
               <?php if (isset($this->message['sucessDel'])) { ?>
            <div class="alert alert-success" role="alert">
              <?php echo $this->message['sucessDel']; ?>
            </div>
           <?php } elseif(isset($this->message['failDel'])){  ?>
              <div class="alert alert-danger" role="alert">
              <?php echo  $this->message['failDel'] ; ?>
            </div>
           <?php } ?>
              <div class="card-header">
               
                <h3 class="card-title">Class Section Detail</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                   <div style="overflow-x:auto;">
          <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                  <th>Class</th>   
                <th>Type</th>
                <th>Question</th>
                <th>FIle</th>
                <th>Action</th>
            </
        </thead>
        <tbody>
            <?php foreach ($this->staffData as $sd) {  ?>
                   <tr>
                    
                     <td>
                      <?php foreach ($this->secData as $sed) { 
                        if ($sd->class_id == $sed->id) {
                           echo $sed->name. ' ('.$sed->numeric_name.')';
                        }
                      }
                      ?>
                     </td>
                     <td><?php echo $sd->type; ?></td>
                     <td><?php echo $sd->question; ?></td>
                    <td><embed  type="application/pdf" src="<?php echo base_url(); ?>public/images/<?php echo $sd->file; ?>" width='100' ></td>
                    
                    
                    <td>
                      <a href="<?php echo base_url(); ?>public/images/<?php echo $sd->file; ?>" class="btn btn-info"><i class="fas fa-pen"></i> Download</a> 
                        <a href="<?php echo base_url() ?>staff/questionRemove/<?php echo $sd->id ?>" class="btn btn-danger "onclick="return confirm('Are you sure, you want to delete  from Question Database?')">
                          <i class="fa fa-trash"></i> Delete</a>
                     </td> 

                 <?php     } ?>
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