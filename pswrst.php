<!DOCTYPE html>
<html lang="en">
<title>PSWRST</title>
<head>
<?php
    require "components/meta.php";
?>
</head>
<body>

<?php
    require_once 'SQL/dbconnect.php';
    require "components/header.php";

    if ($_SESSION["email_sent"] == 1) {
        echo '<script>swal("Sent!", "Email has been sent!", "success");</script>';
        $_SESSION["email_sent"] = 0;
    };
?>



    <div style="text-align:center;border-bottom: 2px solid #02a7e3;">
        <div>
            <h1>RESET PASSWORD</h1>
        </div>
        <h4>Enter a new password</h4>
    </div>

        <div style="text-align:center;border-bottom: 2px solid #02a7e3;">
        <form method="POST" action="PHP/resetpsw.php" enctype="multipart/form-data">
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
                    <br><br><br>
                    <input id="psw1" style="width:85%;" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" type="password" name="psw1" placeholder="Enter New password" >
                    <br>
                    <input id="psw2" style="width:85%;" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" type="password" name="psw2" placeholder="Enter New password again" >
                    <br>
                    
             <p id="validate-status"></p>
                <br>
                    <input class="subBut" style="width:85%;" type="submit">
                    <br><br>
                </form>
        </div>


<?php
    require "components/footer.php";
?>
