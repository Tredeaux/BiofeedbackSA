<?php
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
    ?>

<div id="width" <?php if ($_SESSION["admin"] == 1) { echo 'style="border:5px solid red;"';} ?> class="width">
    <div class="header">
        <img id="top" alt="BiofeedbackSA Logo" style="height:12vh;width:auto;" src="Images/Logo_1.png">
        <p class="header_1">The Biofeedback Association of South Africa</p>
    </div>