<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2020 <a href="http://adminlte.io">School</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>public/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>public/dist/js/demo.js"></script>
<script src="<?php echo base_url(); ?>public/plugins/validation/dist/jquery.validate.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>public/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>public/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>public/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script>
      $(function () {

        $('#teacher_register').validate();
      });


    $(document).ready(function() {
    $('#example').DataTable();
} );

    </script>
</body>
</html>
