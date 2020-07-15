<!DOCTYPE html>
<html lang="en">
    <title>MANAGER PAGE | Biofeedback South Africa</title>
<head>
<?php
    require "components/meta.php";
?>

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

<div class="manHead">
    <div>Manager</div>
    <div>Button</div>

</div>

<?php 

        echo '<br><div style="margin:auto;text-align:center;"><a class="mCard" href="dashboard.php">Back To Dashboard</a></div><br>';
        echo '<br><div style="margin:auto;text-align:center;display:flex;"><div style="width:33%;"></div><button style="margin:auto;" onclick="copy()">Copy All Emails</button><button style="margin:auto;" onclick="copyNon()">Copy Non-Members Emails</button><div style="width:33%;"></div></div>';
    
        require "components/tableSort.php";
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