<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body style="background-image: url('images/login-image1.jpg');">
    <div class="main-page">
    

        <div class="login-rect">
            <img src="images/typographica.png" alt="" height="24" width="auto">
            <b class="login-text">LOGIN</b>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <label class="mobile-text" for="userid">Name</label>
            <input class="input" type="text" id="userid" name="authuser" placeholder="Enter your User ID" style="top: 138px; left: 54px;">

            <label class="otp-text" for="passkey">Passkey</label>
            <input class="input" type="password" id="passkey" name="passkey" placeholder="Enter your Passkey" class="input" style="top: 236px; left: 54px;">
                
            <!-- <div class="forgot-pwd" id="pwd">Forgot Password?</div> -->

            <button type="submit" class="otp-btn">Login</button>
                                                        <!-- After generating OTP {Send OTP}, btn name chenged to {Confirm OTP} -->
                                                        </form>
            <div class="signup">
                <label class="signup-label">Do you own/operate a medical facility?</label>
                <a href="signup.php">Sign Up</a>
            </div>
            

        </div>
    </div>
    <?php
session_start();
require_once("dbconfig.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['authuser']);
    $password = md5($_POST['passkey']);

    $query = "SELECT pass, type FROM medfacs WHERE authuser = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($storedHashedPassword, $role);
    $stmt->fetch();

    var_dump($storedHashedPassword); // Debug: Check what's stored in the password variable
    var_dump(password_verify($password, $storedHashedPassword)); // Debug: Verify password comparison


    if ($storedHashedPassword && password_verify($password, $storedHashedPassword)) {
        $_SESSION['username'] = $username;
        $_SESSION['type'] = $type;
        header("Location: authdash.php"); // Redirect to the manager dashboard
        exit();
    } else {
        header("Location: index.php?loginFailed=true"); // Redirect to login page with a flag indicating failed login
        exit();
    }

    $stmt->close();
}

mysqli_close($conn);
?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>