<?php
session_start();

$_SESSION['train_name'] = htmlspecialchars(trim($_POST['train_name'])) ;
$_SESSION['dep_time'] = htmlspecialchars(trim($_POST['dep_time']));
$_SESSION['arrival_time'] = htmlspecialchars(trim($_POST['arrival_time']));
$_SESSION['seat_name'] = htmlspecialchars(trim($_POST['seat_name']));
$_SESSION['price'] = htmlspecialchars(trim($_POST['price']));
$_SESSION['From_station'] = htmlspecialchars(trim($_POST['From_station']));
$_SESSION['To_station'] = htmlspecialchars(trim($_POST['To_station']));
$_SESSION['train_ID'] = htmlspecialchars(trim($_POST['train_ID']));

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

    <title>Train Ticket Booking System</title>
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
		<div class="card">
		<article class="card-body mx-auto" style="max-width: 400px;">
		<div class="container d-flex h-100">
		    <div class="row justify-content-center align-self-center">
				<div class="card font-weight-bold text-center " style="width: 18rem;">
				  <img class="card-img-top" src="https://kolorob.com.bd/wp-content/uploads/2019/10/Sonar-bangla-express-train.jpg" alt="Card image cap">
				  <div class="card-body">
				    <h5 class="card-title">Ticket Details</h5>
				    
				  </div>
				  <ul class="list-group list-group-flush">
				    <li class="list-group-item">Train: <?=$_POST['train_name']?></li>
				    <li class="list-group-item"><?=$_POST['From_station']?>--<?=$_POST['To_station']?></li>
				    
				    <li class="list-group-item">dep_time: <?=$_POST['dep_time']?></li>
				    <li class="list-group-item">arrival_time: <?=$_POST['arrival_time']?></li>
				    <li class="list-group-item">Seat: <?=$_POST['seat_name']?></li>
				    <li class="list-group-item">Fare: <?=$_POST['price']?></li>

				  </ul>
				  <div class="card-body">
				    <a href="purchase.php" class="card-link"><button type="submit">Purchase</button></a>
				  </div>
				</div>
			</div>
		</div>
		</div>
	</article>
</div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

    </body>
</html>
