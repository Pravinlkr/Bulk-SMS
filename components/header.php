<!doctype html>
<html lang="en">
  <head>
  	<title>SMS Hub</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="./css/style.css">
        <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
        </div>
				<div class="p-4">
		  		<h1><a href="./" class="logo">SMS Hub <span>Personalized SMS Solutions</span></a></h1>
	        <ul class="list-unstyled components mb-5">
	          <li>
	            <a href="./"><span class="fa fa-home mr-3"></span> Home</a>
	          </li>
	          <li>
	              <a href="singlesms.php"><span class="fa fa-user mr-3"></span> Single SMS</a>
	          </li>
	          <li>
              <a href="bulksms.php"><span class="fa fa-envelope mr-3"></span> Bulk SMS</a>
	          </li>
              <li>
              <a href="settings.php"><span class="fa fa-cogs mr-3"></span> Settings</a>
	          </li>
			  <?php
					session_start();
					if(!isset($_SESSION["username"])){
				?>
	          <li>
              <a href="login.php"><span class="fa fa-sign-in mr-3"></span> Login</a>
	          </li>
			  <?php } else{ ?>
	          <li>
              <a href="logout.php"><span class="fa fa-sign-out mr-3"></span> Logout</a>
	          </li>
			  <?php } ?>
	        </ul>


	        <div class="footer">
	        	<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> | All rights reserved</i> <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
	        </div>

	      </div>
    	</nav>
