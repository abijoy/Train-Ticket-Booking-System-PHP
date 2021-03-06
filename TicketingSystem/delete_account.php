<?php 
session_start();

?>


<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
	 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
	 <style type="text/css">
	 	.navbar-light .navbar-nav .nav-link {
	 	    color: #007bff;
	 	}
	 	.container, .card{
	 	  background: #FDF6EC !important;
	 	}
	 	.container .navbar{
	 	  background: #ECFDF6 !important;
	 	}
	 </style>
	<title>Train Ticket Booking System</title>
</head>
<body>
	<h1 align="center">Train Ticket Booking System</h1>
	<div class="container mr-auto">
	  <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
	            <ul class="navbar-nav mr-auto">
	              <li class="nav-item active">
	                <a class="nav-link" href="index.php"><b>Home |</b></a>
	              </li>
	              <?php if(isset($_SESSION['loggedIn'])): ?>
	                <li class="nav-item">
	                  <p style="padding: 8px;">Welcome <?=$_SESSION['fullname']?> | </p>
	                </li>
	                <li class="nav-item">
	                  <a class="nav-link" href="dashboard.php">Dashboard |</a></p>
	                </li>
	                <li class="nav-item">
	                  <a class="nav-link" href="logout.php">logout |</a></p>
	                </li>
	                <?php else: ?>
	                  <li class="nav-item">
	                    <a class="nav-link" href="login.php">login | </a>
	                  </li>
	                  <li class="nav-item">
	                    <a class="nav-link" href="register.php">register |</a>
	                  </li>
	                <?php endif ?>
	              </li>
<!-- 	              <li class="nav-item">
	                <a class="nav-link" href="about.php">About | </a>
	              </li> -->
	              <li class="nav-item">
	                <a class="nav-link" href="contact.php">Contact Us</a>
	              </li>
	            </ul>
	        </nav>
	  </div>
	<hr>

	<div class="container mr-auto">
	<div class="container-fluid">
	      <div class="row">
	        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
	          <div class="sidebar-sticky">
	            <ul class="nav flex-column">
	              <li class="nav-item">
	                <a class="nav-link active" href="dashboard.php">
	                  Dashboard
	                </a>
	              </li>
<!-- 	              <li class="nav-item">
	                <a class="nav-link" href="pre_purchases.php">
	                  Previous purchases
	                </a>
	              </li> -->
	              <li class="nav-item">
	                <a class="nav-link" href="edit_account.php">
	                  Edit Account
	                </a>
	              </li>
	              <li class="nav-item">
	                <a class="nav-link" href="delete_account.php">
	                  Delete Account
	                </a>
	            </ul>
	          </div>
	        </nav>

	        <main role="main" class="col-md-10 ml-sm-auto col-lg-10 px-4"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
	          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	            <h4 class="h4">Delete Account</h4>
	            </div>
	            	<div class="card bg-light">
	            		<article class="card-body mx-auto" style="max-width: 400px;">
	            		<p class="alert"><b>Are You Sure To delete your account? </b><br><span>
	            			<a href="dashboard.php"><button type="button" class="btn btn-success">Go Back</button></a></span>
	            		<span>
	            		  <a href="delete.php"><button type="button" class="btn btn-danger">Delete</button></a></span>
	            		</p>
	            		</div>
	            	</article>
	          		</div>

	          <canvas class="my-4 w-100 chartjs-render-monitor" id="myChart" width="779" height="328" style="display: block; width: 779px; height: 328px;"></canvas>
	      </div>
	    </div>
	</div>
	 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

  </body>
</html>