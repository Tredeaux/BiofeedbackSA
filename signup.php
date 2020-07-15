<!DOCTYPE html>
<html lang="en">
    <title>SIGNUP PAGE | Biofeedback South Africa</title>
<head>
<?php
    require "components/meta.php";
?>
</head>
<body>

<?php
    require_once 'SQL/dbconnect.php';
    require "components/header.php";
    require "components/topnav.php";

    if ($_SESSION["login_err"] == 1) {
        echo '<script>swal("Error!", "Wrong details!", "error");</script>';
        $_SESSION["login_err"] = 0;
    };

    if ($_SESSION["reg_success"] == 1) {
        echo '<script>swal("Success!", "Account has been registered!", "success");</script>';
        $_SESSION["reg_success"] = 0;
    };

    if ($_SESSION["dont_exist"] == 1) {
        echo '<script>swal("Error!", "Email does not exist!", "error");</script>';
        $_SESSION["dont_exist"] = 0;
    };

    if ($_SESSION["email_exist"] == 1) {
        echo '<script>swal("Error!", "Email already taken!", "error");</script>';
        $_SESSION["email_exist"] = 0;
    };

    if ($_SESSION["name_exist"] == 1) {
        echo '<script>swal("Error!", "Username already taken!", "error");</script>';
        $_SESSION["name_exist"] = 0;
    };

    if ($_SESSION["login_err_uname"] == 1) {
        echo '<script>swal("Error!", "Email does not exist!", "error");</script>';
        $_SESSION["login_err_uname"] = 0;
    };

    if ($_SESSION["success_reset"] == 1) {
        echo '<script>swal("Reset email has been sent!", "Go check your email! It might take a few minutes and check your spam folder as well.", "success");</script>';
        $_SESSION["success_reset"] = 0;
    };

?>

    <div>
    <div style="text-align:center;">

    <button id="myBtn">Forgot password</button>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <form method="POST"  action="PHP/forgot.php">
    <h1>Enter you email</h1>
    <input type="email" name="email" placeholder="Enter Email" required>
    <br>
    <input class="subBut" style="cursor:pointer;"  type="submit" value="Submit">
    </form>
  </div>

</div>

<script>
    // Get the modal
    var modal = document.getElementById('myModal');
    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    // When the user clicks the button, open the modal 
    btn.onclick = function() {
      modal.style.display = "block";
    }
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
</script>

    <div class="contact1">
        <h1>LOGIN</h1>
        <form  action="PHP/login.php" method="POST">
            <input type="email" name="name" placeholder="Enter Email" required>
            <br>
            <input type="password" name="password" placeholder="Enter Password" required>
            <br>
            <input class="subBut" style="cursor:pointer;"  type="submit" value="LOGIN">
            <br>
        </form>
    </div>
    </div>
    </div>

<br>

    <div>
    <div style="text-align:center;">
    <div class="contact1">
        <h1>REGISTER</h1>
        <form  action="PHP/register.php" method="POST">
            <!-- <input type="text" name="uname" pattern="^[^\s]+$" title="Characters And Numbers allowed, No Spaces" placeholder="Enter Userame" required> -->
            <br>
            <input type="email" name="email" placeholder="Enter Email" required>
            <br>
            <script>
                $(document).ready(function() {
                  $("#psw2").keyup(validate);
                });
                function validate() {
                    var password1 = $("#psw1").val();
                    var password2 = $("#psw2").val();

                    if(password1 == password2) {
                         $("#validate-status").text("Passwords match");        
                    }
                    else {
                        $("#validate-status").text("Passwords do not match");  
                    }
                }
            </script>
            <input id="psw1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" type="password" name="password" placeholder="Enter Password" required>
            <br>
            <input id="psw2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" type="password" name="password2" placeholder="Enter Password Again" required>
            <br>
            <p id="validate-status"></p>
            <br>
            <input type="checkbox" name="permission" required>Allow BFSA to use your information provided
            <br><br>
            <input class="subBut" style="cursor:pointer;"  type="submit" value="REGISTER">
        </form>
    </div>
    </div>
    </div>
<br>

<?php
    require "components/footer.php";
?>