<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php"); // Redirect to the login page if role is different or user not logged in
    exit();
}
$loggedInUser = $_SESSION['username'];

require_once("dbconfig.php");

$select_query="SELECT * FROM `callbacks` where authuser = '$loggedInUser';";
$result = $conn->query($select_query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dashboard-styles.css">
    <title>Document</title>

    <!-- Bootstrap CSS file -->
<style>
    @import url("css/style.css");
</style>

    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Google fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap"
        rel="stylesheet" />

</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm" id="mainNav">
        <div class="container px-5">
            <a class="navbar-brand" href="#">
                <img src="images/typographica.png" alt="Bootstrap" width="me-auto" height="24">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="bi-list"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto me-4 my-3 my-lg-0">
                        <b><li class="nav-item">Welcome, <?php echo $loggedInUser ; ?> </li></b>
                    </ul>
                <ul class="navbar-nav ms-auto me-4 my-3 my-lg-0">
                    <li class="nav-item"><a class="nav-link me-lg-3" href="logout.php" id="loginbtn">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Header Content-->
    <header class="masthead">
        <h2 class="text-center text-black font-alt mb-4">Callbacks Requested</h2>
        <div class="table-responsive">
            <?php   
            if ($result->num_rows > 0) {
            echo '<table class="table">
                <tr>
                    <th>Patient Name</th>
                    <th>E-Mail</th>
                    <th>Mobile No.</th>
                    <th>Date & Time</th>
                </tr>';
                while ($row = $result->fetch_assoc()) {
               echo '<tr>
                    <td>'. $row['meduser'].'</td>
                    <td>'. $row['email'].'</td>
                    <td>'. $row['mob'].'</td>
                    <td>
                       '. $row['datetime'].'
                    </td>
                </tr>';
                }
       echo '</table>';
    } else {
        echo "No data found.";
    }?>
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