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

    <div style="display:flex;">
    <div style="width:25%;"></div>
    <div style="width:100%;">

    <?php
        try {

            $stmt = $conn->prepare("SELECT * FROM `biofefqs_maindata`.`articles`"); 
            $stmt->execute();
            $results = array();
            if ($stmt->execute()) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $results1[] = $row;
                }
            }

            $articles = $stmt->rowcount();
            
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        try {

            $stmt = $conn->prepare("SELECT * FROM `biofefqs_maindata`.`publications`"); 
            $stmt->execute();
            $results = array();
            if ($stmt->execute()) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $results[] = $row;
                }
            }

            $publications = $stmt->rowcount();
            
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        try {

            $stmt = $conn->prepare("SELECT * FROM `biofefqs_maindata`.`faqs`"); 
            $stmt->execute();
            $results = array();
            if ($stmt->execute()) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $results[] = $row;
                }
            }

            $faq = $stmt->rowcount();
            
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        try {

            $stmt = $conn->prepare("SELECT * FROM `biofefqs_maindata`.`events` ORDER BY `cr_date`"); 
            $stmt->execute();
            $results = array();
            if ($stmt->execute()) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $res1[] = $row;
                }
            }

            $events = $stmt->rowcount();
            
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        
    
        try {
            $c1 = "name";
            $stmt = $conn->prepare("SELECT * FROM `biofefqs_maindata`.`userdata` ORDER BY $c1"); 
            $stmt->execute();
            $results = array();
            if ($stmt->execute()) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $results[] = $row;
                }
            }
            for ($i = 0; $i < $stmt->rowcount(); $i++) {
               if ($results[$i]["member"] == "0") {
                   $none++;
               }
               if ($results[$i]["member"] == "1") {
                $none++;
            }
               if ($results[$i]["member"] == "2") {
                $affiliate++;
            }
            if ($results[$i]["member"] == "3") {
                $student++;
            }
            if ($results[$i]["member"] == "4") {
                $associate++;
            }
            if ($results[$i]["member"] == "5") {
                $full++;
            }
            if ($results[$i]["admin"] == "1") {
                $admin++;
            }
            if ($results[$i]["board"] == "1") {
                $board++;
            }
            if ($results[$i]["practitioner"] == "1") {
                $practitioner++;
            }
            $users++;
            $nonPrac = $users - $practitioner;
        
                
            }
            echo "<div class='card' style='background-color:white;text-align:center;padding:10px;'>";
                echo "<h1>Users</h1>";
                echo "<div style='text-align:center;display:flex;'>";
                    echo "<div style='margin:auto;padding:10px;'>";
                    echo "<p style='font-size:25px;'>Admins</p>";
                    echo "<p style='font-size:30px;'>".$admin."</p>";
                    echo "</div>";
                    echo "<div style='margin:auto;padding:10px;'>";
                    echo "<p style='font-size:25px;'>Board Members</p>";
                    echo "<p style='font-size:30px;'>".$board."</p>";
                    echo "</div>";
                    echo "<div style='margin:auto;padding:10px;'>";
                    echo "<p style='font-size:25px;'>Practitioners</p>";
                    echo "<p style='font-size:30px;'>".$practitioner."</p>";
                    echo "</div>";
                    echo "<div style='margin:auto;padding:10px;'>";
                    echo "<p style='font-size:25px;'>Users</p>";
                    echo "<p style='font-size:30px;'>".$users."</p>";
                    echo "</div>";
                echo "</div>";
            echo "</div><br>";

            echo "<div class='card' style='background-color:white;text-align:center;padding:10px;'>";
            echo "<h1>Content</h1>";
            echo "<div style='text-align:center;display:flex;'>";
                echo "<div style='margin:auto;padding:10px;'>";
                echo "<p style='font-size:25px;'>Blog Posts</p>";
                echo "<p style='font-size:30px;'>".$articles."</p>";
                echo "</div>";
                echo "<div style='margin:auto;padding:10px;'>";
                echo "<p style='font-size:25px;'>Publications</p>";
                echo "<p style='font-size:30px;'>".$publications."</p>";
                echo "</div>";
                echo "<div style='margin:auto;padding:10px;'>";
                echo "<p style='font-size:25px;'>Faqs</p>";
                echo "<p style='font-size:30px;'>".$faq."</p>";
                echo "</div>";
                echo "<div style='margin:auto;padding:10px;'>";
                echo "<p style='font-size:25px;'>Events</p>";
                echo "<p style='font-size:30px;'>".$events."</p>";
                echo "</div>";
            echo "</div>";
        echo "</div>";


            echo "<br>";
            echo "<div style='background-color:white;text-align:center;'>";
            echo "
                <div style='display:flex;'>
                <div class='card'  style='margin-right:5px;width:50%;'>
                <h1>Memberships</h1>
                <canvas id='myChart'></canvas>
                </div>
                <div class='card'  style='margin-left:5px;width:50%;'>
                <h1>Practitioners</h1>
                <canvas id='myChart2'></canvas>
                </div>
                </div>
                <script>
                var ctx = document.getElementById('myChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: ['Full', 'Associate', 'Student', 'Affiliate', 'None'],
                        datasets: [{
                            label: '# of people',
                            data: [".$full.", ".$associate.", ".$student.", ".$affiliate.", ".$none."],
                            backgroundColor: [
                                '#E74A3B',
                                '#F6C23E',
                                '#4E73DF',
                                '#36B9CC',
                                '#858796'
                            ],
                            borderColor: [
                                'white',
                                'white',
                                'white',
                                'white',
                                'white'
                            ],
                            borderWidth: 5
                        }]
                    },
                   
                });
                var ctx = document.getElementById('myChart2').getContext('2d');
                var myChart2 = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: ['Practitioner', 'Non-Practitioners'],
                        datasets: [{
                            label: '# of people',
                            data: [".$practitioner.", ".$nonPrac."],
                            backgroundColor: [
                                '#E74A3B',
                                '#4E73DF'
                            ],
                            borderColor: [
                                'white',
                                'white'
                            ],
                            borderWidth: 5
                        }]
                    },
                   
                });
                </script>
                
                ";
                echo "</div>";


                
        } catch(PDOException $e) {
            
            echo "Error: " . $e->getMessage();
        }

    ?>

        </div>
        <div style="width:25%;"></div>
        </div>
<?php
    require "components/footer.php";
?>