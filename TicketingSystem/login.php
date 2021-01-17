<?php
session_start();
$_SESSION['message'] = '';


$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "ttbs3";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
	$email=htmlspecialchars(trim($_POST['email']));
	$password=htmlspecialchars(trim($_POST['password']));
	if($username&&$password){
		$sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			# code...
			$user = $result->fetch_array(MYSQLI_ASSOC);
			$_SESSION['loggedIn'] = true;
			$_SESSION['user_ID'] = $user['user_ID'];
			$_SESSION['fullname'] = $user['fullname'];
			$_SESSION['email'] = $user['email'];
			$_SESSION['mobile_number'] = $user['mobile_number'];
			$_SESSION['NID'] = $user['NID'];
			if (isset($_SESSION['target_page'])) {
				header('Location:'.$_SESSION['target_page']);
			}
			else{
				header('Location:index.php');
			}
			
		}
		else{
			$_SESSION['message']='Wrong Email or Password';
		}
		
	}
	else {
		$_SESSION['message']='Please fill all the data';
	}
}


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

	<div class="card bg-light">
	<article class="card-body mx-auto" style="max-width: 400px;">
			<h4 class="card-title mt-3 text-center">Log In</h4>
			<p><?=$_SESSION['message']?></p>
			<form action="login.php" method="post">
			<div class="form-group input-group">
				<div class="input-group-prepend">
				    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
				 </div>
		        <input name="email" class="form-control" placeholder="email" type="email">
		    </div> <!-- form-group// -->

	    	<div class="form-group input-group">
	    		<div class="input-group-prepend">
	    		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
	    		 </div>
	            <input name="password" class="form-control" placeholder="password" type="password">
	        </div> <!-- form-group// -->
	        <div class="form-group">
	            <button type="submit" name="submit" class="btn btn-primary btn-block">Log in</button>
	        </div> <!-- form-group// --> 
	    </form>
	</article>
</div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

  </body>
</html>