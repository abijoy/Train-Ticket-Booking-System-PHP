<?php
session_start();
if (!isset($_SESSION['loggedIn'])) {
  # code...
  $_SESSION['message'] = 'You must login first';
  $_SESSION['target_page'] = 'purchase.php';
  header('Location:login.php');
}
else {
  $_SESSION['payment_status'] = 'successful!';
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
          <nav class="navbar navbar-expand-lg navbar-light bg-light rounded" style="background-color: green;">
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
<!--                       <li class="nav-item">
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
        <h3>Make Payment:</h3>
        <a href="print_ticket.php">
          <img src="https://seeklogo.com/images/B/bkash-logo-FBB258B90F-seeklogo.com.png" width="180">
        </a>
        <a href="print_ticket.php">
          <img src="https://0.academia-photos.com/attachment_thumbnails/51358768/mini_magick20180819-16642-1a0ni9o.png?1534703818" width="180">
<!--           <img src="https://0.academia-photos.com/attachment_thumbnails/51358768/mini_magick20180819-16642-1a0ni9o.png?1534703818" width="180"> -->
        </a>
        <a href="print_ticket.php">
          <img src="https://www.dutchbanglabank.com/img/nexsus_pay_logo.png">
        </a>
        <a href="print_ticket.php">
          <img src="https://www.logolynx.com/images/logolynx/61/61dde25c6a7fb00513d2f3c0c042c051.jpeg" width="180" height="150">
        </a>
        
      </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

    </body>
</html>


