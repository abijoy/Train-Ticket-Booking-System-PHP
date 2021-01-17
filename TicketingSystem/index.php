<?php
session_start();
$_SESSION['username'] = "Bijoy";
//echo $_SESSION['fullname'];
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

$sql = "SELECT * FROM station";
$result = $conn->query($sql);

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
      .container{
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
    	
      <div class="container mr-auto">
            <h3>Route</h3>
          	<form action="available_trains.php" method="post">
	            <label>From</label>
	            <select class="selectpicker" data-live-search="true" name="selectFrom">
	              <?php foreach ($result as $row):?>
	              <option value=<?=$row['station_ID']?>><?=$row['name']?></option>
	              <?php endforeach;?>
	            </select>

	            <label>TO</label>

	            <select class="selectpicker" data-live-search="true" name="selectTo">
	              <?php foreach ($result as $row): ?>
	              <option value=<?=$row['station_ID']?>><?=$row['name']?></option>
	              <?php endforeach;?>
	            </select>
	            <br><br>
	            <label>Journey Date</label>
	            <input type="date" name="jdate">
              <label>Required Seat(s) </label>
              <select class="selectpicker" name="required_seats">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
	            <label>Class</label>
	            <select class="selectpicker" name="selectClass">
	            	<option value="S_CHAIR">S_CHAIR</option>
	              	<option value="SNIGDHA">SNIGDHA</option>
	              	<option value="AC_S">AC_S</option>
	            </select>
	            <input type="submit" name="submit" value="Find Trains">
	        </form>
      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

  </body>
</html>

