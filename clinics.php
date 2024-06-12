<?php
require_once("dbconfig.php");
// You can fetch additional user data from the database if needed

$select_query="SELECT * FROM `medfacs` where type = 'clinic';";
$result = $conn->query($select_query);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinics</title>
    <!-- Favicon Goes Here-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
<!-- Bootstrap icons-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
<!-- Google fonts-->
<link rel="preconnect" href="https://fonts.gstatic.com" />
<link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap" rel="stylesheet" />
<!-- Core theme CSS (includes Bootstrap)-->
<link href="css/style.css" rel="stylesheet" />
<link rel="stylesheet" href="css/cardcss.css">
</head>
<body>

 <!-- Navigation-->
 <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm" id="mainNav">
        <div class="container px-5">
            <a class="navbar-brand" href="index.php">
                <img src="images/typographica.png" alt="Bootstrap" width="me-auto" height="24">
                
              </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="bi-list"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto me-4 my-3 my-lg-0">
                    <li class="nav-item"><a class="nav-link me-lg-3" href="hospitals.php" id="hospitalslink">Hospitals</a></li>
                    <li class="nav-item"><a class="nav-link me-lg-3" href="labs.php" id="labslink">Labs</a></li>
                    <li class="nav-item"><a class="nav-link me-lg-3" href="clinics.php" id="clinicslink">Clinics</a></li>
                </ul>
                <!-- <button class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0" data-bs-toggle="modal" data-bs-target="#feedbackModal">
                    <span class="d-flex align-items-center">
                        <i class="bi-chat-text-fill me-2"></i>
                        <span class="small">Book Appointment</span>
                    </span>
                </button> -->
                <ul class="navbar-nav ms-auto me-4 my-3 my-lg-0">
                    <li class="nav-item"><a class="nav-link me-lg-3" href="login.php" id="loginbtn">Login</a></li> 
                    </ul>
            </div>
        </div>
    </nav>

            <!-- Header Content-->
            <header class="masthead">
            <h2 class="text-center text-black font-alt mb-4">Clinics</h2>
            <div class="cards-body">
            <?php 
             if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                  echo ' 
                  <div class="card" style="width: 20rem;">
                  <div class="card-body">
          <h5 class="card-hName">'. $row['authuser'] .'</h5>
          <p class="card-desc">'. $row['spec'] .'</p>
          <p class="card-add">'. $row['address'] .'</p>
           <form action="request-callback.php" method="get">
          <input type="hidden" name="authuser" value="'. $row['authuser'].'">
           <button type="submit" class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0" data-bs-toggle="modal">
                    <span class="d-flex align-items-center">
                        <i class="bi-chat-text-fill me-2"></i>
                        <span class="small">Book Appointment</span>
                    </span>
                </button> </form>
        </div>
          </div>';
              }
          } else {
              echo "No data found.";
          }
            
            ?>

            </div>
        </header>
    
    <!-- Footer-->
    <footer class="bg-black text-center py-5">
    <div class="container px-5">
        <div class="text-white-50 small">
            <div class="mb-2">&copy; HealthHub Dev Incorp.</div>
            <a href="#!">Privacy</a>
            <span class="mx-1">&middot;</span>
            <a href="#!">Terms</a>
            <span class="mx-1">&middot;</span>
            <a href="#!">FAQ</a>
        </div>
    </div>
</footer>

</body>
</html>