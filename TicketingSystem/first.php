
<h1 align="center">MovieCo Database</h1>


<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "movieco";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM movie";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo "Total number of movies: " . $result->num_rows . "</br>";
    /*
    while($row = $result->fetch_assoc()) {
        echo "MOVIE_NUM: " . $row["MOVIE_NUM"] . " MOVIE_NAME: " . $row["MOVIE_TITLE"] . " MOVIE_YEAR: " . $row["MOVIE_YEAR"]. " - GENRE: " . $row["MOVIE_GENRE"]. "<br>";
    }
    */
} else {
    echo "0 results";
}
$conn->close();
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <title>Hello, world!</title>
  </head>
  <body>

    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">MOVIE_NUM</th>
      <th scope="col">MOVIE_TITLE</th>
      <th scope="col">YEAR</th>
      <th scope="col">GENRE</th>
    </tr>
  </thead>
  <tbody>
  	<?php foreach ($result as $row): ?>

    <tr>
      <th scope="row"><?=$row['MOVIE_NUM']?></th>
      <td><?=$row['MOVIE_TITLE']?></td>
      <td><?=$row['MOVIE_YEAR']?></td>
      <td><?=$row['MOVIE_GENRE']?></td>
    </tr>
   <?php endforeach; ?>

  </tbody>
</table>
	<div class="container">
	  <div class="row">
	      <div class="col-7 col-md-5">

	        <label>Select with Search</label>
	        <select class="selectpicker" data-live-search="true">
	          <option data-tokens="ketchup mustard">Hot Dog, Fries and a Soda</option>
	          <option data-tokens="mustard">Burger, Shake and a Smile</option>
	          <option data-tokens="frosting">Sugar, Spice and all things nice</option>
	        </select>

	        
	      </div>
	  </div>
	</div>
	<button>baal</button>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  </body>
</html>