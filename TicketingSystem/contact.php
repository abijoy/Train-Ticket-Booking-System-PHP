<?php
session_start();

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
<!--                <li class="nav-item">
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

        <h3 align="center">Contact Us</h3>
        <div class="container mr-auto">
          <div class="card-body"><div class="table-responsive"><table class="table" border=""><tbody><tr><td rowspan="3">For refund of unsuccessful purchases and card charging issues
                                    </td> <td colspan="2">VISA/MASTER Cards</td> <td>16234<br>+88-02-8331040</td></tr> <tr><td colspan="2">Rocket / DBBL Nexus Cards</td> <td width="275">16216</td></tr> <tr><td colspan="2">bKash</td> <td width="275">16247</td></tr> <tr><td>For refund of successfully purchased tickets</td> <td colspan="3">Visit your originating station ( Name of the Station From which
                                        you
                                        wanted to travel ) and contact the refund counter
                                    </td></tr> <tr><td>For Technical Support</td> <td colspan="2">Tech Support Team</td> <td colspan="1" width="275">
                                        online-ticket@ttms.com<br>
                                        +880-1401168806<br><span style="font-size: 8px;">(9:00 AM to 6:00 PM)</span></td></tr></tbody></table></div></div>
                                      </div>


        <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

  </body>
</html>
