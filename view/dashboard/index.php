
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">   
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Sydney Catholic School</title>
	<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/carousel/">

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>public/css/carousel.css" rel="stylesheet">
  </head>
  <body>

    <header>
	
	 <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
		<div class="name col-md-3">
	  <i class='fas fa-graduation-cap' style='font-size:48px;color:teal'></i>
        <a class="navbar-brand" href="#">Sydney <b>CATHOLIC</b><br> School</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
		</div>
		<div class="collapse navbar-collapse col-md-6" id="navbarCollapse">
			<div class="subnav">
    <button class="subnavbtn">Students </button>
    <div class="subnav-content">
      <a href="<?php echo base_url(); ?>backend/student/login">Current Student Login</a>
      
    </div>
  </div> 
  <div class="subnav">
    <button class="subnavbtn">Staffs </button>
    <div class="subnav-content">
      <a href="<?php echo base_url(); ?>backend/staff/login"> Current Staff Login</a>
     
      
    </div>
  </div> 
  <div class="subnav">
    <button class="subnavbtn">Study with us </button>
    <div class="subnav-content">
      <a href="#link1">Ranked among top schools</a>
      <a href="#link2">Quality education</a>
      <a href="#link3">Student support</a>
      <a href="#link4">Career oriented</a>
    </div>
  </div>
  <a href="#">Library</a>
  <a href="#">About us</a>
</div>
	<div class="search" col-md-3>
          <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
	</div>
        </div>
      </nav>
	  
    </header>

    
	

      <div id="myCarousel" class="carousel slide" data-ride="carousel" >
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
			<div class="carousel-item active">
				<img class="first-slide" src="<?php echo base_url(); ?>public/images/1st_slide.jpg" style="width:100%" alt="First slide" >
				<div class="container">
					<div class="carousel-caption text-left">
						<h1>Join us today</h1>
						<p>Mandela once said that education is the most powerful weapon which you can use to change the world. Everyone is looking to change the world, and why not take part in these movements? People are paying a ridiculous amount of money for education, as this industry is valued at $3 trillion. Most of this amount is now spent on online education.</p>
						<p><a class="btn btn-lg btn-primary" href="#" role="button">Enrol now</a></p>
					</div>
				</div>
			</div>
			<div class="carousel-item">
            <img class="second-slide" src="<?php echo base_url(); ?>public/images/2nd_slide.jpg" style="width:100%"  alt="Second slide">
            <div class="container">
              <div class="carousel-caption">
                <h1>Why Sydney Catholic?</h1>
                <p>elson Mandela once said that education is the most powerful weapon which you can use to change the world. Everyone is looking to change the world, and why not take part in these movements? People are paying a ridiculous amount of money for education, as this industry is valued at $3 trillion. Most of this amount is now spent on online education</p>
                <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
              </div>
            </div>
          </div>
			<div class="carousel-item">
            <img class="third-slide" src="<?php echo base_url(); ?>public/images/3rd_slide.jpg" style="width:100%"  alt="Third slide">
            <div class="container">
              <div class="carousel-caption text-right">
                <h1>Take a tour!</h1>
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
     


      <!-- Marketing messaging and featurettes
      ================================================== -->
      <!-- Wrap the rest of the page in another container to center all the content. -->

      <div class="container marketing">

        <!-- Three columns of text below the carousel -->
        <div class="row">
          <div class="col-lg-4">
            <h2>Contact us</h2>
            <p> Mandela once said that education is the most powerful weapon which you can use to change the world. Everyone is looking to change the world, and why not take part in these movements? People are paying a ridiculous amount of money for education, as this industry is valued at $3 trillion. Most of this amount is now spent on online education</p>
            
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            
            <h2>Ask any queries?</h2>
            <p>Mandela once said that education is the most powerful weapon which you can use to change the world. Everyone is looking to change the world, and why not take part in these movements? People are paying a ridiculous amount of money for education, as this industry is valued at $3 trillion. Most of this amount is now spent on online education</p>
            
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            
            <h2>Connect with us</h2>
            <p>Mandela once said that education is the most powerful weapon which you can use to change the world. Everyone is looking to change the world, and why not take part in these movements? People are paying a ridiculous amount of money for education, as this industry is valued at $3 trillion. Most of this amount is now spent on online education</p>
            
          </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
	 </div>
</div>
      <!-- FOOTER -->
      <footer class="container">
        <p class="float-right"><a href="#">Back to top</a></p>
        <p>&copy; 2017-2018 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>
    </main>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="<?php echo base_url(); ?>public/bootstrap/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="<?php echo base_url(); ?>public/bootstrap/assets/js/vendor/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>public/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="<?php echo base_url(); ?>public/bootstrap/assets/js/vendor/holder.min.js"></script>
  </body>
</html>
