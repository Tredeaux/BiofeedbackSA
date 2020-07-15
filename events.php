<!DOCTYPE html>
<html lang="en">
    <title>EVENTS PAGE | Biofeedback South Africa</title>
<head>
<?php
    require "components/meta.php";
?>
</head>
<body>

<?php
// sleep(10);
    require_once 'SQL/dbconnect.php';
    require "components/header.php";
    require "components/topnav.php";

    if ($_SESSION["del_event"] == 1) {
        echo '<script>swal("Success!", "Event has been deleted!", "success");</script>';
        $_SESSION["del_event"] = 0;
    };

?>


    <div style="text-align:center;border-bottom: 2px solid #02a7e3;">
        <div>
            <h1>Events</h1>
        </div>
        <h4>Click on a event to read</h4>
    </div>

        <div>
        <?php
                try {
                    $stmt = $conn->prepare("SELECT * FROM `biofefqs_maindata`.`events` ORDER BY `weight`, `id`"); 
                    $stmt->execute();
                    $results = array();
                    if ($stmt->execute()) {
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $results[] = $row;
                        }
                    }
                    for ($i = $stmt->rowcount()-1; $i >= 0;$i--) {
                        echo '  <script> 
                                    $(document).ready(function(){
                                        var flipFlop = 0;
                                    $("#flip',$results[$i]["id"],'").click(function(){
                                    if (flipFlop == 0) {
                                      $("#panel',$results[$i]["id"],'").slideDown("slow");
                                      flipFlop = 1;
                                    } else {
                                      $("#panel',$results[$i]["id"],'").slideUp("slow");
                                      flipFlop = 0;
                                    }
                                    });
                                    });
                                </script>';
                        echo '<div class="flip" id="flip',$results[$i]["id"],'">';
                        echo '<p style="padding: 1vh 1vh;">',$results[$i]["title"],'</p>';
                        echo '</div>';
                        echo '<div class="panel2" id="panel',$results[$i]["id"],'">';
                        if ($_SESSION["admin"] == 1) {
                            echo '<div style="display:flex;"><a class="delBut" onclick="return confirm(`Are you sure you want to delete this?`);" href="PHP/del_event.php?id=',$results[$i]["id"],'">DELETE</a><br>';
                            echo '<a style="margin-left:20px;" class="editBut" onclick="return confirm(`Are you sure you want to edit this?`);" href="edit.php?id=',$results[$i]["id"],'&page=events">EDIT</a><br>';
                            echo '<a style="margin-left:20px;" class="editBut" onclick="return confirm(`Are you sure you want to change priority?`);" href="PHP/up_event.php?id=',$results[$i]["id"],'&weight=',$results[$i]["weight"],'">Increase Priority</a>';
                            echo '<a style="margin-left:20px;" class="editBut" onclick="return confirm(`Are you sure you want to change priority?`);" href="PHP/down_event.php?id=',$results[$i]["id"],'&weight=',$results[$i]["weight"],'">Decrease Priority</a>';
                            echo '<p style="margin-left:20px;margin-top:20x;">Priority: ',$results[$i]["weight"],'</p></div>';

                        }
                        echo "<h1>",$results[$i]["title"],"</h1>";
                        echo "<h1>",$results[$i]["date"],"</h1>";
                        echo "<p>Posted on: ",substr($results[$i]["cr_date"],0,10),"</p>";
                        echo $results[$i]["description"];
                        echo '<br><br><div style="text-align:center;"><a href="https://www.google.com/maps?q=',$results[$i]['location'],'" class="mCard">View Location</a><br><br></div></div>';
                    }
                    } catch(PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }     
                ?>
        </div>


<?php
    require "components/footer.php";
?>