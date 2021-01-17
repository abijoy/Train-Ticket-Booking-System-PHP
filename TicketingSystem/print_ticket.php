<?php
session_start();
$rs = (int)$_SESSION['required_seats'];
$maxSeat = 60 - $rs -1;
$seat1 = rand(1, $maxSeat) + $rs;
$seat2 = $seat1 + ($rs -1);
$seatRange = $seat1.' - '.$seat2;
$coachArr = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];
$coach = $coachArr[array_rand($coachArr)];
$fare = (int)$_SESSION['price'] * $rs ;
$vat = 50;
$totalFare = $fare + $vat;
$PIN = generateRandomString(6);
$required_seats = (int)$_SESSION['required_seats'];


//insert purchased ticket information in booked table
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

$train_ID = $_SESSION['train_ID'];
$route_ID = $_SESSION['route_ID'];
$user_ID = $_SESSION['user_ID'];
$seat_name = $_SESSION['seat_name'];
$jdate = $_SESSION['jdate'];

// getting route_ID
for ($i=0; $i<$required_seats ; $i++) { 
	# code...
	$sql = "INSERT INTO `booked` VALUES (NULL, '$train_ID', '$route_ID', '$user_ID', '$seat_name', '$jdate')";
	//$sql = "INSERT INTO `booked` VALUES (NULL, '13', '7', '1', 'S_CHAIR', '2020-02-01')";
	$result = $conn->query($sql);
}

function generateRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
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
    <title>My Ticket</title>
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
<!--                   <li class="nav-item">
                    <a class="nav-link" href="about.php">About | </a>
                  </li> -->
                  <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact Us</a>
                  </li>
                </ul>
            </nav>
      </div>
    <hr>
  	<h3 align="center" class="">Your purchased ticket information</h3>
  	<div class="container" id="printTicket">
  <table class="table table-sm table-hover border" style="background-color: #FDEDEC">
  <thead>
    <tr>
    	<h3>Ticket Information</h3>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Issue date & time</th>
      <td><?=date("Y-m-d H:i:s");?></td>
    </tr>
    <tr>
      <th scope="row">Journey Date and Deperture Time</th>
      <td><?=$_SESSION['jdate']." ".$_SESSION['dep_time']?></td>
    </tr>
    <tr>
      <th scope="row">Train Name</th>
      <td><?=$_SESSION['train_name']?></td>
    </tr>
    <tr>
    	<th scope="row">From Station</th>
    	<td><?=$_SESSION['From_station']?></td>
    </tr>
    <tr>
    	<th scope="row">To Station</th>
    	<td><?=$_SESSION['To_station']?></td>
    </tr>
    <tr>
    	<th scope="row">Class Name</th>
    	<td><?=$_SESSION['seat_name']?></td>
    </tr>
    <tr>
    	<th scope="row">Coach Name</th>
    	<td><?=$coach?></td>
    </tr>
    <tr>
    	<th scope="row">Seat Range</th>
    	<td><?=$seatRange?></td>
    </tr>
    <tr>
    	<th scope="row">PIN</th>
    	<td><?=$PIN?></td>
    </tr>
    <tr>
    	<th scope="row">Fare</th>
    	<td><?=$fare?> Tk.</td>
    </tr>
    <tr>
    	<th scope="row">Vat</th>
    	<td><?=$vat?> Tk.</td>
    </tr>
    <tr>
    	<th scope="row">Total Fare</th>
    	<td><?=$totalFare?> Tk.</td>
    </tr>
  </tbody>
</table>
	<table class="table table-sm table-hover border" style="background-color: #FDEDEC">
	<thead>
	  <tr>
	  	<h3>Personal Information</h3>
	  </tr>
	</thead>
	<tbody>
		<tr>
			<th scope="row">Name</th>
			<td><?=$_SESSION['fullname']?></td>
		</tr>
		<tr>
			<th scope="row">Email</th>
			<td><?=$_SESSION['email']?></td>
		</tr>
		<tr>
			<th scope="row">Mobile</th>
			<td><?=$_SESSION['mobile_number']?></td>
		</tr>
	</tbody>
	</table>
	</div>
	<div style="text-align: center;">
	  <button type="button" class="btn btn-primary" onclick="printDiv('printTicket')">Print</button>
	</div>




  		<script type="text/javascript">
  			function printDiv(divName) {
  			     var printContents = document.getElementById(divName).innerHTML;
  			     var originalContents = document.body.innerHTML;

  			     document.body.innerHTML = printContents;

  			     window.print();

  			     document.body.innerHTML = originalContents;
  			}
  		</script>


          <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

    </body>
</html>