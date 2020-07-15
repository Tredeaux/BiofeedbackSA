<!DOCTYPE html>
<html lang="en">
    <title>MANAGER PAGE | Biofeedback South Africa</title>
<head>
<?php

    require "components/meta.php";
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>


</head>
<body style="font-size:18px;">

<?php
    require_once 'SQL/dbconnect.php';

try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "<script> console.log('Connected To DB successfully');</script>"; 
    }
    catch(PDOException $e) {
        echo "<script> console.log('ERROR Conecting to DB');</script>";
    }

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $email = $_GET["user"];
    echo $email;

    try {
        $stmt = $conn->prepare("SELECT * FROM `biofefqs_maindata`.`userdata` WHERE `email` = :id"); 
        $stmt->execute([":id" => $email]);

        if ($stmt->execute()) {
            print_r($stmt->fetch(PDO::FETCH_ASSOC));
        }
    } catch(PDOException $e) {
        //echo "Error: " . $e->getMessage();
    }

?>
<div class="topnav" id="myTopnav">
    <a href="index.php">Back to Website</a>
</div>
<div style="text-align:center;width:100%;">
<form method="POST" action="PHP/edit_profile.php" enctype="multipart/form-data">
<label>Click on Update Location to get your Current Location</label><br>
<button id="locBut" type="button" onclick="getLocation()">Update Location</button><br>
<input type="hidden" name="long" id="long"/>
<input type="hidden" name="lat" id="lat"/>
<br><br>
<input class="subBut" style="width:85%;" type="submit">
</form>


<script>
    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
        document.getElementById("locBut").style.backgroundColor = "lime";
      } else { 
        alert("Geolocation is not supported by this browser.");
      }
    }
    function showPosition(position) {
        var long = document.getElementById("long");
        var lat = document.getElementById("lat");
        long.value = position.coords.longitude;
        lat.value = position.coords.latitude;
        alert("We saved your current location! Now you can submit");
    }
</script>

<?php

    require "components/footer.php";
?>