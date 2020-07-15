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


</head>
<body>

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

    if (empty($_SESSION) || $_SESSION["admin"] == 0) {
        echo "<script>window.location = 'https://biofeedbacksa.co.za/index.php';</script>";
    }
?>

    <div class="topnav" id="myTopnav">
        <a href="dashboard.php">Back to Dashboard</a>
    </div>

<div style="border:1px solid black;padding:10px;text-align:center;background-color:white;">
   <h4>Order Table by:</h4>
    <?php
    require "components/tableSort.php";
    ?>
    <br>
    <h4>Copy Emails:</h4>
    <button style="margin:auto;" onclick="copyNon()">Copy Non-Members Emails</button>
    <button style="margin:auto;" onclick="copy()">Copy All Emails</button>
   
</div>

<?php 

        // echo '<br><div style="margin:auto;text-align:center;"><a class="mCard" href="dashboard.php">Back To Dashboard</a></div><br>';
        require "components/table.php";
    ?>

<?php
    try {

        $stmt = $conn->prepare("SELECT * FROM `biofefqs_maindata`.`userdata`"); 
        $stmt->execute();
        $results = array();
        if ($stmt->execute()) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $results[] = $row;
            }
        }
        $emails = "";

        for ($i = 0; $i < $stmt->rowcount(); $i++) {
        $emails .= "  " . $results[$i]["email"];
        }
    echo '<input style="margin:auto;width:10%;" type="text" value="',$emails,'" id="emailList">';

    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    echo '<script>
        function copy() {
        var copyText = document.getElementById("emailList");
        copyText.select();
        document.execCommand("copy");
        alert("Copied!");
        }
        </script>';

        try {

            $stmt = $conn->prepare("SELECT * FROM `biofefqs_maindata`.`userdata`WHERE `member` = 0 AND `member` = 1"); 
            $stmt->execute();
            $results = array();
            if ($stmt->execute()) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $results[] = $row;
                }
            }
            $emails2 = "";
        
            for ($i = 0; $i < $stmt->rowcount(); $i++) {
            $emails2 .= "  " . $results[$i]["email"];
            }
        echo '<input style="margin:auto;width:10%;" type="text" value="', $emails2 ,'" id="emailList2">';
        
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        echo '<script>
            function copyNon() {
            var copyText2 = document.getElementById("emailList2");
            copyText2.select();
            document.execCommand("copy");
            alert("Copied!");
            }
            </script>';
?>

<?php
    require "components/footer.php";
?>