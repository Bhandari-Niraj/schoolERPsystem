
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
              <li class="breadcrumb-item active">Edit Timetable</li>
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
           <?php if (isset($this->message['sucess'])) { ?>
            <div class="alert alert-success" role="alert">
              <?php echo $this->message['sucess']; ?>
            </div>
           <?php }elseif(isset($this->message['fail'])){  ?>
              <div class="alert alert-danger" role="alert">
              <?php echo  $this->message['fail'] ; ?>
            </div>
           <?php } ?>
           
        
          <h3 class="card-title">Edit TimeTable</h3>
           
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
           <form action="<?php echo base_url(); ?>admin/create_timetable" method="POST" enctype="multipart/form-data" id="teacher_register">
                <div class="card-body">
                 <div class="row">
              <div class="form-group col-sm-6">
               <label for="class">Class</label>
               <select class="form-control custom-select" name="class" required="">
                <?php foreach ($this->sectionData as $sd) { 
                      foreach ($this->classData as $cd) {

                       
                        

                  ?>
                  <option value="<?php echo $sd->class_id; ?>" selected="">
                    <?php  if ($cd->id == $sd->class_id) {
                             echo $cd->numeric_name;  
                    } ?>
                  </option>
              
            <?php    } } ?>
                     </select>
                </div>
               
                 <div class="form-group col-sm-6">
               <label for="section">Section</label>
               <select class="form-control custom-select" name="section" required="">
                <?php foreach ($this->sectionData as $sd) {
                   if ($this->timeData->section_id == $sd->id) { ?>
                    <option value="<?php echo $sd->id; ?>" selected=""><?php echo $sd->name; ?></option>
                   <?php } else{ ?>
                    <option value="<?php echo $sd->id; ?>"><?php echo $sd->name; ?></option>
               <?php   }
                  ?>
                  
                <?php } ?>
                     </select>
                </div>
              </div>

                <div class="row">
                <div class="form-group col-sm-6">
               <label for="subject">Subject</label>
               <select class="form-control custom-select" name="subject" required="">
                <?php foreach ($this->subjectData as $sb) { ?>
                  <option value="<?php echo $sb->id; ?>"><?php echo $sb->name; ?></option>
                <?php } ?>
                     </select>
                </div>
            
               <div class="form-group col-sm-6">
               <label for="teacher">Teccher</label>
               <select class="form-control custom-select" name="teacher" required="" >
                <?php foreach ($this->staffData as $std) { ?>
                  <option value="<?php echo $std->id; ?>"><?php echo $std->name; ?></option>
                <?php } ?>
                     </select>
                </div>
              </div>

            <div class="row">
              <div class="form-group col-sm-6">
                <label for="start">Start</label>
                <input type= "time" class="form-control" name='start' required="" > 
              </div>

               <div class="form-group col-sm-6">
                <label for="end">End</label>
                <input type="time" name="end" class="form-control" required="">
              </div>
            </div>
        
      
                    </div>
                  </div>
              
                <!-- /.card-body -->
                <div class="card-footer">
                 <input type="submit" value="Edit Timetable" class="btn btn-success float-right" name="btnEdit">
                </div>
              </form>
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