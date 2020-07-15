<!DOCTYPE html>
<html lang="en">
    <title>HOME PAGE | Biofeedback South Africa</title>
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

    if ($_SESSION["faq_success"] == 1) {
        echo '<script>swal("Success!", "A new FAQ has been added!", "success");</script>';
        $_SESSION["faq_success"] = 0;
    };

    if ($_SESSION["faq_deleted"] == 1) {
        echo '<script>swal("Success!", "FAQ has been deleted!", "success");</script>';
        $_SESSION["faq_deleted"] = 0;
    };

    if ($_SESSION["login_suc"] == 1) {
        echo '<script>swal("Success!", "Welcome!", "success");</script>';
        
        $_SESSION["login_suc"] = 0;
    };

    require "components/banner_loader.php";
?>

    <div class="spacer"></div>

    <div style="margin:auto;display:flex;">
    
        <div style="background-color:#eee;min-height:150px;" onclick="location.href='events.php'" class="mCard">
            <i style="font-size:3em;color:#02a7e3;" class="fa fa-align-left"></i>
            <h5>Upcoming Events</h5>
        </div>

        <div id="vidBtn" style="background-color:#eee;min-height:150px;" class="mCard">
            <i style="font-size:3em;color:#02a7e3;" class="fa fa-graduation-cap"></i>
            <h5>Journey to certification</h5>
        </div>

            <div id="vid" class="modal">
                
              <div style="text-align:center;" class="modal-content">
                <span id="close" class="close">&times;</span>
                <br><br>
                <iframe width="560" height="315" src="https://www.youtube.com/embed/ffodrc-RIvg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <br><br>
              </div>
                
            </div>

            <script>
            var modal = document.getElementById('vid');
            var btn = document.getElementById("vidBtn");
            var span = document.getElementById("close");

            btn.onclick = function() {
              modal.style.display = "block";
            }
            span.onclick = function() {
              modal.style.display = "none";
            }
            window.onclick = function(event) {
              if (event.target == modal) {
                modal.style.display = "none";
              }
            }
            </script>
          

        <div style="background-color:#eee;min-height:150px;" onclick="location.href='signup.php'" class="mCard">
            <i style="font-size:3em;color:#02a7e3;" class="fa fa-address-card"></i>
            <h5>Become a member</h5>
        </div>

        <div  style="background-color:#eee;min-height:150px;" onclick="findFunction()" class="mCard">
            <i style="font-size:3em;color:#02a7e3;" class="fa fa-search"></i>
            <h5>Have any questions?</h5>
        </div>
    </div>

    <div class="spacer"></div>

    <script> 
        $(document).ready(function(){
            var flipFlop = 0;
          $("#flip").click(function(){
              if (flipFlop == 0) {
                $("#panel").slideDown("slow");
                flipFlop = 1;
              } else {
                $("#panel").slideUp("slow");
                flipFlop = 0;
              }
          
          });
        });
    </script>

            <div style="text-align:center;border-bottom: 2px solid #02a7e3;">
            <div>
                <h5>Learn More</h5>
            </div>
            <h4>Click on a topic to view more info</h4>
        </div>



        <div>

        <?php
                try {
                    $stmt = $conn->prepare("SELECT * FROM `biofefqs_maindata`.`main`"); 
                    $stmt->execute();
                    $results = array();
                    if ($stmt->execute()) {
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $results[] = $row;
                        }
                    }
                    for ($i = 0; $i < $stmt->rowcount();$i++) {
                        echo '  <script> 
                                    $(document).ready(function(){
                                        var flipFlop = 0;
                                    $("#flipM',$results[$i]["id"],'").click(function(){
                                    if (flipFlop == 0) {
                                      $("#panelM',$results[$i]["id"],'").slideDown("slow");
                                      flipFlop = 1;
                                    } else {
                                      $("#panelM',$results[$i]["id"],'").slideUp("slow");
                                      flipFlop = 0;
                                    }
                                    });
                                    });
                                </script>';
                        echo '<div class="flip" id="flipM',$results[$i]["id"],'">';
                        echo '<p style="font-weight:bolder;font-size:1em;padding: 1vh 1vh;">',$results[$i]["title"],'</p></div>';
                        echo '<div style="height:600px;overflow-y:scroll;padding:20px 20px;" class="panel2" id="panelM',$results[$i]["id"],'">';
                        if ($_SESSION["admin"] == 1) {
                            echo '<div style="display:flex;"><a class="delBut" onclick="return confirm(`Are you sure you want to delete this?`);" href="PHP/del_main.php?id=',$results[$i]["id"],'">DELETE</a><br>';
                            echo '<a style="margin-left:20px;" class="editBut" onclick="return confirm(`Are you sure you want to edit this?`);" href="edit.php?id=',$results[$i]["id"],'&page=main">EDIT</a><br></div><br>';
                        }
                        echo $results[$i]["body"];

                        echo '</div>';
                    }
                    } catch(PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }     
                ?>
        </div>

    <div class="spacer"></div>
    
    <div style="margin:auto;text-align:center;">

    <h5>International Association's Links</h5>
    <br>
    <div style="display:flexbox;">
    <a style="text-decoration:none;background-color:#eee;"class="mCard" href="https://www.bcia.org/i4a/pages/index.cfm?pageid=1">BCIA</a>
    <a style="text-decoration:none;background-color:#eee;"class="mCard" href="https://www.isnr.org/">ISNR</a>
    <a style="text-decoration:none;background-color:#eee;"class="mCard" href="https://www.aapb.org/i4a/pages/index.cfm?pageid=1">AAPB</a>
    <a style="text-decoration:none;background-color:#eee;"class="mCard" href="https://bfe.org/">BFE</a>
    </div></div>
    

    <div class="spacer"></div>
    <div class="spacer"></div>

    <div id="faqs">
        <div style="text-align:center;border-bottom: 2px solid #02a7e3;">
            <div>
                <h5>Questions</h5>
            </div>
            <h4>Click on a question to view the answer</h4>
        </div>

            <div>
               <?php
                try {
                    $stmt = $conn->prepare("SELECT * FROM `biofefqs_maindata`.`faqs`"); 
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
                        echo '<p style="font-weight:bolder;font-size:1em;padding: 1vh 1vh;">',$results[$i]["question"],'</p></div>';
                        echo '<div class="panel2" id="panel',$results[$i]["id"],'"><p>',$results[$i]["answer"],'</p>';
                        if ($_SESSION["admin"] == 1) {
                            echo '<a style="color:red;" onclick="return confirm(`Are you sure you want to delete this?`);" href="PHP/del_faq.php?id=',$results[$i]["id"],'">DELETE</a>';
                        }
                        echo '</div>';
                    }
                    } catch(PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }     
                ?>
            </div>
    </div>

    <script>
            function findFunction() {
                location.href='index.php#faqs';
                document.getElementById("faqs").style.boxShadow = "0 0 60px 30px #02a7e3";
                document.getElementById("faqs").style.transition = ".4s ease";
                setTimeout(function(){
                    document.getElementById("faqs").style.boxShadow = "none";
                }, 6000);
            }
        </script>

<?php
    require "components/footer.php";
?>