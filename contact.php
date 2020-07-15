<!DOCTYPE html>
<html lang="en">
    <title>CONTACT PAGE | Biofeedback South Africa</title>
<head>
<?php
    require "components/meta.php";
?>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"async defer></script>
    
</head>
<body>

<?php
    require_once 'SQL/dbconnect.php';
    require "components/header.php";
    require "components/topnav.php";

    if ($_SESSION["email_sent"] == 1) {
        echo '<script>swal("Sent!", "Email has been sent!", "success");</script>';
        $_SESSION["email_sent"] = 0;
    };

    

    if ($_SESSION["captcha_fail"] == 1) {
        echo '<script>swal("Error!", "Captcha Fail!", "warning");</script>';
        $_SESSION["captcha_fail"] = 0;
    };


?>

    <div style="text-align:center;border-bottom: 2px solid #02a7e3;">
        <div>
            <h1>Contact Us</h1>
        </div>
        <h4>Fill in all required fields</h4>
    </div>

        <div>
            <form id="captcha_form" class="contact1" action="PHP/contact_form.php" method="POST">
                <br>
                <input type="text" placeholder="Name" name="name" required>
                <br>
                <input type="email" placeholder="Email" name="email" required>
                <br>
                <input type="text" placeholder="Subject" name="subject" required>
                <br>
                <textarea style="min-height:7em;" name="message" placeholder="Enter Message..." required></textarea>
                <br>
                <div  style="margin:auto;width:305px;" class="g-recaptcha" data-sitekey="6Le4atkUAAAAAPN41zAu3ttXp2vIrcPTXg4gxZD0"></div>

                <input class="subBut" style="cursor:pointer;"  type="submit" value="SEND">
            </form>
        </div>


    <div class="spacer"></div>
    <div class="spacer"></div>


    <div style="text-align:center;border-bottom: 2px solid #02a7e3;">
        <h1 >BFSA Board Members</h1>
    </div>

    <div class="spacer"></div>

    <div class="row">
      <div class="mainDiv">
        <?php
            try {
                $stmt = $conn->prepare("SELECT * FROM `biofefqs_maindata`.`userdata` WHERE `board` = 1"); 
                $stmt->execute();
                $results = array();
                if ($stmt->execute()) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $results[] = $row;
                    }
                }
                for ($i = 0; $i < $stmt->rowcount(); $i++) {
                    if (($i % 4) == 0) {
                        echo "</div>";
                        echo '<div class="mainDiv">';
                    }
                    echo '<div class="column">';

                    if ($results[$i]["image"]) {
                        echo '<img class="userimg" src="uploads/',$results[$i]["image"],'">';
                    } else {
                        echo '<img class="userimg" src="Images/user.png">';
                    }
                    echo '<h1>',$results[$i]["name"],' ',$results[$i]["surname"],'</h1>';  
        

                   echo '</div>';


                }
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }     
          ?>
        </div>
    </div>

<?php
    require "components/footer.php";
?>