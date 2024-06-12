<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/signup-patient.css">
    <title>SignUp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body style="background-image: url('images/signup-img.jpg');">
    <div class="main-page">
        <!-- <img src="bg1.jpg"> -->

        <div class="login-rect">
            <b class="login-text">Sign Up As A Medical Facility</b>
<form action="signuprev.php" method="post">
            <!-- Name -->
            <input class="input" type="text" id="authuser" name="authuser" placeholder="Name" style="top: 138px; left: 54px;">

            <!-- Gender -->
            <div class="select-gender">
                <label class="type">Type:- </label>

                <input type="radio" id="hospital" name="type" value="hospital">
                <label for="hospital">Hospital</label>

                <input type="radio" id="clinic" name="type" value="clinic">
                <label for="clinic">Clinic</label>
                
                <input type="radio" id="labs" name="type" value="labs">
                <label for="labs">Labs</label>
            </div>
            
       
            <input class="input" type="text" id="address" name="address" placeholder="Address" class="input" style="top: 230px; left: 54px;" required>    
            
            <!-- City -->
            <input class="input" type="text" id="desc" name="desc" placeholder="Description/Speciality" class="input" style="top: 280px; left: 54px;" required>
                
            <input class="input" type="password" id="passkey" name="passkey" placeholder="Enter password" class="input" style="top: 325px; left: 54px;" required>

            <input class="input" type="password" id="confpasskey" placeholder="Confirm password" class="input" onkeyup="validate_password()" style="top: 375px; left: 54px;" required>
            <script>
        function validate_password() {
 
            let pass = document.getElementById('passkey').value;
            let confirm_pass = document.getElementById('confpasskey').value;
            if (pass != confirm_pass) {
                document.getElementById('wrong_pass_alert').style.color = 'red';
                document.getElementById('wrong_pass_alert').innerHTML
                    = '☒ Use same password';
                document.getElementById('create').disabled = true;
                document.getElementById('create').style.opacity = (0.4);
            } else {
                document.getElementById('wrong_pass_alert').style.color = 'green';
                document.getElementById('wrong_pass_alert').innerHTML =
                    '🗹 Password Matched';
                document.getElementById('create').disabled = false;
                document.getElementById('create').style.opacity = (1);
            }
        }
 
        function wrong_pass_alert() {
            if (document.getElementById('pass').value != "" &&
                document.getElementById('confirm_pass').value != "") {
                alert("Your response is submitted");
            } else {
                alert("Please fill all the fields");
            }
        }
    </script>
<span id="wrong_pass_alert"></span>

            <!-- LOGIN -->
            <button type="submit" class="login-btn" style="top: 420px;" onclick="wrong_pass_alert()">SIGN UP</button>
                                                        <!-- After generating OTP {Send OTP}, btn name chenged to {Confirm OTP} -->

</form>   

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>