
<?php
session_start();
//echo $_SESSION['username'];
$_SESSION['jdate'] = $_POST['jdate'];
$_SESSION['required_seats'] = $_POST['required_seats'];
//echo "string";
$fs = $_POST['selectFrom'];
$ts = $_POST['selectTo'];
$seat = $_POST['selectClass'];
$jdate = $_POST['jdate'];
$bs = 0;
$seat1 = $seat.'/';
// echo $seat1;

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

// getting route_ID
$sql = "SELECT route_ID FROM route WHERE From_station='$fs' AND To_station='$ts'";
$route = $conn->query($sql);
$row2 = $route->fetch_array(MYSQLI_NUM);
$_SESSION['route_ID'] = $row2[0];
$route_ID = $row2[0];
// echo "route: ".$_SESSION['route_ID'];

// getting the 
$sql = "SELECT name FROM station WHERE station_ID='$fs'";
$sql2= "SELECT name FROM station WHERE station_ID='$ts'";
$station_names1 = $conn->query($sql);
$station_names2 = $conn->query($sql2);

$sn1 = $station_names1->fetch_array(MYSQLI_ASSOC);
$sn2 = $station_names2->fetch_array(MYSQLI_ASSOC);

$From_station = $sn1['name'];
$To_station = $sn2['name'];

//echo $row2[0];

$sql2 = "SELECT DISTINCT train_ID FROM trainroute WHERE route_ID=$row2[0]";
$avail_trains = $conn->query($sql2);


$trains = array();
$props = array();
$final_arr = array();

foreach ($avail_trains as $row) {
    # code...
    array_push($trains, $row['train_ID']);
    $t = $row['train_ID'];
    // echo " ".$t." ";
    $sql2 = "SELECT COUNT(*) AS BS FROM booked WHERE train_ID='$t' AND route_ID='$route_ID' AND seat_name='$seat1' AND date='$jdate'";
    $result8 = $conn->query($sql2);
    if ($result8) {
      # code...
      $bsArr = $result8->fetch_array(MYSQLI_ASSOC);
      $bs = $bsArr['BS'];
      // echo $bs;
    }
    //print_r($t);
    
    //echo $t."\n";

    // inserting train name
    $sql = "SELECT train_name FROM train WHERE train_ID=$t";
    $result = $conn->query($sql);
    $row3 = $result->fetch_array(MYSQLI_ASSOC);
    $final_arr[$row['train_ID']]['name'] = $row3['train_name'];

    $r = $row2[0];
    $sql = "SELECT dep_time, arrival_time FROM schedule WHERE train_ID=$t AND route_ID=$r";
    $result = $conn->query($sql);
    $row3 = $result->fetch_array(MYSQLI_ASSOC);
    $final_arr[$row['train_ID']]['dep_time'] = $row3['dep_time'];
    $final_arr[$row['train_ID']]['arrival_time'] = $row3['arrival_time'];


    $sql = "SELECT * FROM seat_and_price WHERE train_ID=$t AND route_ID=$r AND seat_name='$seat'";
    $result = $conn->query($sql);
    $row3 = $result->fetch_array(MYSQLI_ASSOC);
    $final_arr[$row['train_ID']]['seat_name'] = $row3['seat_name'];
    $final_arr[$row['train_ID']]['total_seat'] = (int)$row3['total_seat'] - $bs;
    $final_arr[$row['train_ID']]['price'] = $row3['price'];


    // dep and arrival station infos
    $final_arr[$row['train_ID']]['From_station'] = $From_station;
    $final_arr[$row['train_ID']]['To_station'] = $To_station;
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

    <title>Train Ticket Booking System</title>
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
<!--                 <li class="nav-item">
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

    <h1>Available Trains: <?php echo $avail_trains->num_rows?></h1>


    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Train Name</th>
          <th scope="col">Departure Time</th>
          <th scope="col">Arrival Time</th>
          <th scope="col">Seat Name</th>
          <th scope="col">Avaiable Seats</th>
          <th scope="col">Fare</th>
          <th scope="col">Purchase</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($final_arr as $train_ID => $train): ?>
            <!-- <?=strtotime($train['dep_time'])?> -->
            <tr>
              <td><?=$train['name']?></td>
              <td><?=$train['dep_time']?></td>
              <td><?=$train['arrival_time']?></td>
              <td><?=$train['seat_name']?></td>
              <td><?=$train['total_seat']?></td>
              <td><?=$train['price']?></td>
              <td>
                  <form method='post' action="selected_seats.php?">
                      <input type="hidden" name="train_ID" value="<?=$train_ID?>">
                      <input type='hidden' name='train_name' value=<?=$train['name']?>/>
                      <input type='hidden' name='dep_time' value=<?=$train['dep_time']?>/>
                      <input type='hidden' name='arrival_time' value=<?=$train['arrival_time']?>/>
                      <input type='hidden' name='seat_name' value=<?=$train['seat_name']?>/>
                      <input type='hidden' name='price' value=<?=$train['price']?>/>
                      <input type='hidden' name='From_station' value=<?=$train['From_station']?>/>
                      <input type='hidden' name='To_station' value=<?=$train['To_station']?>/>
                      <?php if($train['total_seat']>0): ?>
                        <button type='submit'>Confirm</button>
                      <?php else: ?>
                        <button type='submit' disabled="">Confirm</button>
                      <?php endif?>
                  </form>
              </td>
            </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>



        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

    </body>
</html>

