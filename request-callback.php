<?php 
$authuser = $_GET['authuser'];
require_once("dbconfig.php");

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/request-callback.css" />
    <title>Request Page</title>
    
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
  </head>
  <body style="background-image: url(images/appoint.jpg);">

    <div class="formbold-main-wrapper">
      <!-- Author: FormBold Team -->
      <!-- Learn More: https://formbold.com -->

      <div>
        <b class="title-label">Request A Callback</b>      

      <div class="formbold-form-wrapper">

      <h3> <?php echo $authuser; ?></h3>
        
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
          <div class="formbold-mb-5">
            <label for="name" class="formbold-form-label"> Full Name </label>
            <input
              type="text"
              name="meduser"
              id="name"
              placeholder="Full Name"
              class="formbold-form-input"
            />
          </div>
          <input type="hidden" name="authuser" value="<?php echo $authuser; ?>">
          <div class="formbold-mb-5">
            <label for="phone" class="formbold-form-label">
              Phone Number
            </label>
            <input
              type="text"
              name="mob"
              id="phone"
              placeholder="Enter your phone number"
              class="formbold-form-input"
            />
          </div>
         
          <div class="formbold-mb-5">
            <label for="mail" class="formbold-form-label">
              E-Mail
            </label>
            <input
              type="email"
              name="email"
              id="mail"
              placeholder="Enter your E-Mail Address"
              class="formbold-form-input"
            />
          </div>

          <div>
            <button type="submit" class="formbold-btn">Request</button>
          </div>
        </form>
      </div>
    </div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
    <?php 

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $authuser = $_POST['authuser'];
   $meduser = $_POST['meduser'];
   $email = $_POST['email'];
   $mob = $_POST['mob'];
   
       // Insert new user into the database using prepared statements
       $insert_query = "INSERT INTO callbacks (authuser, meduser, email, mob) VALUES (?, ?, ?, ?)";
       $insert_stmt = mysqli_prepare($conn, $insert_query);
       mysqli_stmt_bind_param($insert_stmt, 'ssss', $authuser, $meduser, $email, $mob);
   
       if (mysqli_stmt_execute($insert_stmt)) {
           ?>
               <script>
           window.alert("Your Request has been submitted. Wait for sometime until you receive a callback for further information");
           window.location.href = "index.php";
       </script>
           <?php
           
       } else {
           echo "Error: " . mysqli_error($conn);
       
   }
  }
   mysqli_close($conn);
    ?>
  </body>
</html>