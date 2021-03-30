<?php

CLass Controller{
	var $view;

	function __construct(){
		$this->view = new View();
	}
	
	public function checkAdminLogin(){
		@session_start();
		if (!isset($_SESSION['email'])) {
			$this->redirect('admin/login');
		}
	}

	public function checkStaffLogin(){
		@session_start();
		if (!isset($_SESSION['email'])) {
			$this->redirect('staff/login');
		}
	}

	public function checkStudentLogin(){
		@session_start();
		if (!isset($_SESSION['email'])) {
			$this->redirect('student/login');
		}
	}

	function redirect($path){
		$path = base_url() . $path;
		//header("location:$path");
		?>
		<script type="text/javascript">
			window.location = "<?php echo $path ?>";
		</script>

		<?php 
	}

	function loadModel($name, $admin=false){
		$name = ucfirst($name) .'Model';
		$mf ='model/' .$name . '.php';
		if (file_exists($mf)) {
		 	require_once $mf;
		 	$ob = new $name();
		 	return $ob;
		 }  else {
		 	echo "$name not found";
		 }
	}
}
?>