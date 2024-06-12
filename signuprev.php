<?php
require_once("dbconfig.php");

// Get user input
$authuser = mysqli_real_escape_string($conn, $_POST['authuser']);
$rawPassword =md5( $_POST['passkey']);
$address = $_POST['address'];
$type = $_POST['type'];
$desc = $_POST['desc'];

// Hash the user password
$hashedPassword = password_hash($rawPassword, PASSWORD_BCRYPT);

// Prepare the SELECT query
$select_query = "SELECT * FROM medfacs WHERE authuser = ?";
$stmt = mysqli_prepare($conn, $select_query);
mysqli_stmt_bind_param($stmt, 's', $authuser);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);

if (mysqli_stmt_num_rows($stmt) > 0) {
    echo "Username already exists. Please choose another one.";
} else {
    // Insert new user into the database using prepared statements
    $insert_query = "INSERT INTO medfacs (authuser, pass, address, type, spec) VALUES (?, ?, ?, ?, ?)";
    $insert_stmt = mysqli_prepare($conn, $insert_query);
    mysqli_stmt_bind_param($insert_stmt, 'sssss', $authuser, $hashedPassword, $address, $type, $desc);

    if (mysqli_stmt_execute($insert_stmt)) {
        ?>
            <script>
         window.alert("Registration Successful");
         window.location.href = "index.php";
    </script>
        <?php
        // header("Location: index.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
