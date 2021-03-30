<?php  include_once('header.php');?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Section Edit Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Section Edit Form</li>
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
               
                <h3 class="card-title"><i class="fas fa-plus"></i> Edit Section</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="<?php echo base_url(); ?>section/edit_section/<?php echo $this->sData->id; ?>" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="className">Section name</label>
                    <input type="input" class="form-control" name="name" placeholder="Class Name" value="<?php echo $this->sData->name; ?>">
                  </div>

                   <div class="form-group ">
                     <label for="inputQualification">Class</label>
                     <select class="form-control custom-select" name="class" >

                         <?php foreach ($this->secData as $sd) {
                                if ($sd->id == $this->sData->class_id) {  ?>
                                  <option value="<?php echo $sd->id; ?>" selected=""><?php echo $sd->numeric_name;?></option>
                                      <?php  }else{ ?>
                                      <option value="<?php  echo $sd->id; ?>"><?php echo $sd->numeric_name;?></option>
                                               <?php   }
                                                }
                                              ?> 

                     </select>

                     <div class="form-group">
                     <label for="inputQualification">Teacher</label>
                     <select class="form-control custom-select" name="teacher" select="<?php echo $this->staffData->name; ?>" >

                       <?php foreach ($this->staffData as $std) {
                                if ($std->id == $this->sData->teacher_id) {  ?>
                                  <option value="<?php echo $std->id; ?>" selected=""><?php echo $std->name;?></option>
                                      <?php  }else{ ?>
                                      <option value="<?php  echo $std->id; ?>"><?php echo $std->name;?></option>
                                               <?php   }
                                                }
                                              ?>  






                     </select>
                   </div>


              </div>
                  
             
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="btnEdit">Edit Section</button>
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
               
                <h3 class="card-title">Class Section Detail</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                   <div style="overflow-x:auto;">
          <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                  <th>Class</th>   
                <th>Section</th>
                <th>Teacher</th>
                <th>Action</th>
            </
        </thead>
        <tbody>
            <?php foreach ($this->classDetail as $cd) {  ?>
                   <tr>
                    
                     <td>
                      <?php foreach ($this->secData as $sd) { 
                        if ($cd->class_id == $sd->id) {
                           echo $sd->name. ' ('.$sd->numeric_name.')';
                        }
                      }
                      ?>
                     </td>
                     <td><?php echo $cd->name; ?></td>
                    <td><?php foreach ($this->staffData as $std) { 
                        if ($cd->teacher_id == $std->id) {
                           echo $std->name;
                        }
                      }
                      ?>
                      </td>
                    
                    <td>
                      <a href="<?php echo base_url(); ?>section/edit_section/<?php echo $cd->id ?>" class="btn btn-info"><i class="fas fa-pen"></i> Edit</a> 
                        <a href="<?php echo base_url() ?>section/sectionRemove/<?php echo $cd->id ?>" class="btn btn-danger "onclick="return confirm('Are you sure, you want to delete <?php echo $sd->name; ?> from Class Database?')">
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