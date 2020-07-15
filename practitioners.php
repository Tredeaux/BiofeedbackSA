<!DOCTYPE html>
<html lang="en">
    <title>PRACTITIONERS PAGE | Biofeedback South Africa</title>
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
?>

    <div style="text-align:center;border-bottom: 2px solid #02a7e3;">
        <div>
            <h1>Practitioners</h1>
        </div>
        <h4>Select a Region</h4>
    </div>

    <div class="spacer"></div>
    <!-- <div class="row"> -->

    <!-- <div style="margin-bottom:1vh;"> -->
        <div style="margin-top:5px;text-align:center;">
        <button onclick="getLocation()" >Find Practitioners Close to Me</button>
        <br><br>
        <script>
            function getLocation() {
              if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
              } else { 
                alert("Geolocation is not supported by this browser.");
              }
            }

            function showPosition(position) {
                window.location.href = "practitioners_list.php?long=" + position.coords.longitude + "&lat=" + position.coords.latitude;
            }
        </script>

        <!-- <div style="margin:10px;"> -->
        <button style="border:1px solid #02a7e3;" id="btnALL" onclick="orderALL()">All Regions</button>
        <script>
            function orderALL() {
            document.getElementById("ALL").style.display = "block";
            document.getElementById("WC").style.display = "none";
            document.getElementById("EC").style.display = "none";
            document.getElementById("NC").style.display = "none";
            document.getElementById("FS").style.display = "none";
            document.getElementById("GT").style.display = "none";
            document.getElementById("KN").style.display = "none";
            document.getElementById("NW").style.display = "none";

            
            document.getElementById("btnALL").style.border = "1px solid #02a7e3";
            document.getElementById("btnWC").style.border = "1px solid black";
            document.getElementById("btnEC").style.border = "1px solid black";
            document.getElementById("btnNC").style.border = "1px solid black";
            document.getElementById("btnFS").style.border = "1px solid black";
            document.getElementById("btnGT").style.border = "1px solid black";
            document.getElementById("btnKN").style.border = "1px solid black";
            document.getElementById("btnNW").style.border = "1px solid black";
            }
        </script>
        
        <button id="btnWC" onclick="orderWC()">Western Cape</button>
        <script>
            function orderWC() {
            document.getElementById("ALL").style.display = "none";
            document.getElementById("WC").style.display = "block";
            document.getElementById("EC").style.display = "none";
            document.getElementById("NC").style.display = "none";
            document.getElementById("FS").style.display = "none";
            document.getElementById("GT").style.display = "none";
            document.getElementById("KN").style.display = "none";
            document.getElementById("NW").style.display = "none";
            
            
            document.getElementById("btnALL").style.border = "1px solid black";
            document.getElementById("btnWC").style.border = "2px solid #02a7e3";
            document.getElementById("btnEC").style.border = "1px solid black";
            document.getElementById("btnNC").style.border = "1px solid black";
            document.getElementById("btnFS").style.border = "1px solid black";
            document.getElementById("btnGT").style.border = "1px solid black";
            document.getElementById("btnKN").style.border = "1px solid black";
            document.getElementById("btnNW").style.border = "1px solid black";
            }
        </script>

        <button id="btnEC" onclick="orderEC()">Eastern Cape</button>
        <script>
            function orderEC() {
            document.getElementById("ALL").style.display = "none";
            document.getElementById("WC").style.display = "none";
            document.getElementById("EC").style.display = "block";
            document.getElementById("NC").style.display = "none";
            document.getElementById("FS").style.display = "none";
            document.getElementById("GT").style.display = "none";
            document.getElementById("KN").style.display = "none";
            document.getElementById("NW").style.display = "none";

            
            document.getElementById("btnALL").style.border = "1px solid black";
            document.getElementById("btnWC").style.border = "1px solid black";
            document.getElementById("btnEC").style.border = "2px solid #02a7e3";
            document.getElementById("btnNC").style.border = "1px solid black";
            document.getElementById("btnFS").style.border = "1px solid black";
            document.getElementById("btnGT").style.border = "1px solid black";
            document.getElementById("btnKN").style.border = "1px solid black";
            document.getElementById("btnNW").style.border = "1px solid black";
            }
        </script>

        <button id="btnNC" onclick="orderNC()">Northern Cape</button>
        <script>
            function orderNC() {
            document.getElementById("ALL").style.display = "none";
            document.getElementById("WC").style.display = "none";
            document.getElementById("EC").style.display = "none";
            document.getElementById("NC").style.display = "block";
            document.getElementById("FS").style.display = "none";
            document.getElementById("GT").style.display = "none";
            document.getElementById("KN").style.display = "none";
            document.getElementById("NW").style.display = "none";

            
            document.getElementById("btnALL").style.border = "1px solid black";
            document.getElementById("btnWC").style.border = "1px solid black";
            document.getElementById("btnEC").style.border = "1px solid black";
            document.getElementById("btnNC").style.border = "2px solid #02a7e3";
            document.getElementById("btnFS").style.border = "1px solid black";
            document.getElementById("btnGT").style.border = "1px solid black";
            document.getElementById("btnKN").style.border = "1px solid black";
            document.getElementById("btnNW").style.border = "1px solid black";
            }
        </script>

        <button id="btnNW" onclick="orderNW()">North West</button>
        <script>
            function orderNW() {
            document.getElementById("ALL").style.display = "none";
            document.getElementById("WC").style.display = "none";
            document.getElementById("EC").style.display = "none";
            document.getElementById("NC").style.display = "none";
            document.getElementById("FS").style.display = "none";
            document.getElementById("GT").style.display = "none";
            document.getElementById("KN").style.display = "none";
            document.getElementById("NW").style.display = "block";

            
            document.getElementById("btnALL").style.border = "1px solid black";
            document.getElementById("btnWC").style.border = "1px solid black";
            document.getElementById("btnEC").style.border = "1px solid black";
            document.getElementById("btnNC").style.border = "1px solid black";
            document.getElementById("btnFS").style.border = "1px solid black";
            document.getElementById("btnGT").style.border = "1px solid black";
            document.getElementById("btnKN").style.border = "1px solid black";
            document.getElementById("btnNW").style.border = "2px solid #02a7e3";
            }
        </script>

        <button id="btnFS" onclick="orderFS()">Free State</button>
        <script>
            function orderFS() {
            document.getElementById("ALL").style.display = "none";
            document.getElementById("WC").style.display = "none";
            document.getElementById("EC").style.display = "none";
            document.getElementById("NC").style.display = "none";
            document.getElementById("FS").style.display = "block";
            document.getElementById("GT").style.display = "none";
            document.getElementById("KN").style.display = "none";
            document.getElementById("NW").style.display = "none";

            
            document.getElementById("btnALL").style.border = "1px solid black";
            document.getElementById("btnWC").style.border = "1px solid black";
            document.getElementById("btnEC").style.border = "1px solid black";
            document.getElementById("btnNC").style.border = "1px solid black";
            document.getElementById("btnFS").style.border = "2px solid #02a7e3";
            document.getElementById("btnGT").style.border = "1px solid black";
            document.getElementById("btnKN").style.border = "1px solid black";
            document.getElementById("btnNW").style.border = "1px solid black";
            }
        </script>

        <button id="btnGT" onclick="orderGT()">Gauteng</button>
        <script>
            function orderGT() {
            document.getElementById("ALL").style.display = "none";
            document.getElementById("WC").style.display = "none";
            document.getElementById("EC").style.display = "none";
            document.getElementById("NC").style.display = "none";
            document.getElementById("FS").style.display = "none";
            document.getElementById("GT").style.display = "block";
            document.getElementById("KN").style.display = "none";
            document.getElementById("NW").style.display = "none";

            document.getElementById("btnALL").style.border = "1px solid black";
            document.getElementById("btnWC").style.border = "1px solid black";
            document.getElementById("btnEC").style.border = "1px solid black";
            document.getElementById("btnNC").style.border = "1px solid black";
            document.getElementById("btnFS").style.border = "1px solid black";
            document.getElementById("btnGT").style.border = "2px solid #02a7e3";
            document.getElementById("btnKN").style.border = "1px solid black";
            document.getElementById("btnNW").style.border = "1px solid black";
            }
        </script>

        <button id="btnKN" onclick="orderKN()">KwaZulu-Natal</button>
        <script>
            function orderKN() {
            document.getElementById("ALL").style.display = "none";
            document.getElementById("WC").style.display = "none";
            document.getElementById("EC").style.display = "none";
            document.getElementById("NC").style.display = "none";
            document.getElementById("FS").style.display = "none";
            document.getElementById("GT").style.display = "none";
            document.getElementById("KN").style.display = "block";
            document.getElementById("NW").style.display = "none";

            
            document.getElementById("btnALL").style.border = "1px solid black";
            document.getElementById("btnWC").style.border = "1px solid black";
            document.getElementById("btnEC").style.border = "1px solid black";
            document.getElementById("btnNC").style.border = "1px solid black";
            document.getElementById("btnFS").style.border = "1px solid black";
            document.getElementById("btnGT").style.border = "1px solid black";
            document.getElementById("btnKN").style.border = "2px solid #02a7e3";
            document.getElementById("btnNW").style.border = "1px solid black";
            }
        </script>
        </div>

        <br>
    
    
        
        <div style="background-color:#eee;height:700px;overflow-y:scroll;display:block;" id="ALL"> 
        <?php
            try {
                $stmt = $conn->prepare("SELECT * FROM `biofefqs_maindata`.`userdata` WHERE `practitioner` = '1' AND `bemail` != '' AND `image` != '' AND `name` != '' "); 
                $stmt->execute();
                $results = array();
                if ($stmt->execute()) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $results[] = $row;
                    }
                }
                echo '<div style="text-align:center;display:flex;">';
                for ($i = 0; $i < $stmt->rowcount(); $i++) {
                    $useragent=$_SERVER['HTTP_USER_AGENT'];
                    if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))) {
                        echo '</div><div style="text-align:center;display:flex;">';
                    } else
                    if (($i % 4) == 0) {
                        echo '</div><div style="text-align:center;display:flex;">';
                    }
                    echo '<br><div class="column1">';
                    echo '<div style="height:70px;">';
                    echo '<h5>',$results[$i]["name"],' ',($results[$i]["surname"]),'</h5>';
                    echo '</div>';
                    echo '<div style="height:200px;">';
                    if ($results[$i]["image"]) {
                        echo '<img class="userimg" src="uploads/',$results[$i]["image"],'">';
                    } else {
                        echo '<img class="userimg" src="Images/user.png">';
                    }
                    echo '</div>';
                    echo '
                    <button id="ALLmyBtn',$results[$i]["id"],'">Read more</button>
                    
                   
                    <div id="ALLmyModal',$results[$i]["id"],'" class="modal">
                    
         
                      <div class="modal-content">
                        <div style="text-align:center;">
                        <h1>',$results[$i]["name"],' ',$results[$i]["surname"],'</h1>
                        </div>';
                        if ($results[$i]["image"]) {
                            echo '<img class="userimg" src="uploads/',$results[$i]["image"],'">';
                        } else {
                            echo '<img class="userimg" src="Images/user.png">';
                        }
                        echo'<br><br>
                        <strong><p style="font-size:1.5em;">Title:</p></strong>
                        <p style="font-size:1.5em;">',$results[$i]["title"],'</p>
                        <strong><p style="font-size:1.5em;">Email:</p></strong>
                        <p style="font-size:1.5em;">',$results[$i]["bemail"],'</p>
                        '; if ($results[$i]["certified"] == "1") { echo '   <strong><p style="font-size:1.5em;">BCIA Certified</p></strong>
                            <img width="100px" height="100px" src="Images/BCIA_Gold.gif">';}echo'                        <br><br>
                        <div style="padding-top:2px;margin:auto;text-align:center;">
                        <a style="text-decoration:none;background-color:#eee;"class="mCard" href="https://www.google.com/maps?q=',$results[$i]['location'],'">View Location</a>
                        ';
                        if ($results[$i]['website']) {
                            echo '<a style="text-decoration:none;background-color:#eee;"class="mCard" href="https://',$results[$i]['website'],'">View Website</a>';
                        }
                      
                        echo'</div>
                        <br><br>

                        <button id="ALLclose'.$i.'" >Close</button>
                      </div>
                    
                    </div>
                        
                    <script>
                    var ALLmodal'.$i.' = document.getElementById("ALLmyModal',$results[$i]["id"],'");
                    
                    var ALLbtn'.$i.' = document.getElementById("ALLmyBtn',$results[$i]["id"],'");
                    
                    var ALLspan'.$i.' = document.getElementById("ALLclose'.$i.'");
                    
                    ALLbtn'.$i.'.onclick = function() {
                      ALLmodal'.$i.'.style.display = "block";
                    }
                    
                    ALLspan'.$i.'.onclick = function() {
                      ALLmodal'.$i.'.style.display = "none";
                    }
                    
                    window.onclick = function(event) {
                      if (event.target == ALLmodal'.$i.') {
                        ALLmodal'.$i.'.style.display = "none";
                      }
                    }
                    </script>';

                    echo '</div>';

                }
                echo '</div>';
                } catch(PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }     
            ?>
        </div>

        <div style="background-color:#eee;height:700px;overflow-y:scroll;display:none;" id="WC">
        <?php
            try {
                $stmt = $conn->prepare("SELECT * FROM `biofefqs_maindata`.`userdata` WHERE `practitioner` = '1' AND `province` = 'WC' AND `bemail` != '' AND `image` != '' AND `name` != '' ");                 $stmt->execute();
                $results = array();
                if ($stmt->execute()) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $results[] = $row;
                    }
                }
                echo '<div style="text-align:center;display:flex;">';
                for ($i = 0; $i < $stmt->rowcount(); $i++) {
                    $useragent=$_SERVER['HTTP_USER_AGENT'];
                    if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))) {
                        echo '</div><div style="text-align:center;display:flex;">';
                    } else
                    if (($i % 4) == 0) {
                        echo '</div><div style="text-align:center;display:flex;">';
                    }
                    echo '<br><div class="column1">';
                    echo '<div style="height:70px;">';
                    echo '<h5>',$results[$i]["name"],' ',($results[$i]["surname"]),'</h5>';
                    echo '</div>';
                    echo '<div style="height:200px;">';
                    if ($results[$i]["image"]) {
                        echo '<img class="userimg" src="uploads/',$results[$i]["image"],'">';
                    } else {
                        echo '<img class="userimg" src="Images/user.png">';
                    }
                    echo '</div>';
                    echo '
                    <button id="WCmyBtn',$results[$i]["id"],'">Read more</button>
                    
                   
                    <div id="WCmyModal',$results[$i]["id"],'" class="modal">
                    
         
                      <div class="modal-content">
                        <div style="text-align:center;">
                        <h1>',$results[$i]["name"],' ',$results[$i]["surname"],'</h1>
                        </div>';
                        if ($results[$i]["image"]) {
                            echo '<img class="userimg" src="uploads/',$results[$i]["image"],'">';
                        } else {
                            echo '<img class="userimg" src="Images/user.png">';
                        }
                        echo'<br><br>
                        <strong><p style="font-size:1.5em;">Title:</p></strong>
                        <p style="font-size:1.5em;">',$results[$i]["title"],'</p>
                        <strong><p style="font-size:1.5em;">Email:</p></strong>
                        <p style="font-size:1.5em;">',$results[$i]["bemail"],'</p>
                '; if ($results[$i]["certified"] == "1") { echo '   <strong><p style="font-size:1.5em;">BCIA Certified</p></strong>
                    <img width="100px" height="100px" src="Images/BCIA_Gold.gif">';}echo'
                        <br><br>
                        <div style="padding-top:2px;margin:auto;text-align:center;">
                        <a style="text-decoration:none;background-color:#eee;"class="mCard" href="https://www.google.com/maps?q=',$results[$i]['location'],'">View Location</a>
                        ';
                        if ($results[$i]['website']) {
                            echo '<a style="text-decoration:none;background-color:#eee;"class="mCard" href="https://',$results[$i]['website'],'">View Website</a>';
                        }

                        echo'</div>
                        <br><br>

                        <button id="WCclose'.$i.'" >Close</button>
                      </div>
                    
                    </div>
                        
                    <script>
                    var WCmodal'.$i.' = document.getElementById("WCmyModal',$results[$i]["id"],'");
                    
                    var WCbtn'.$i.' = document.getElementById("WCmyBtn',$results[$i]["id"],'");
                    
                    var WCspan'.$i.' = document.getElementById("WCclose'.$i.'");
                    
                    WCbtn'.$i.'.onclick = function() {
                      WCmodal'.$i.'.style.display = "block";
                    }
                    
                    WCspan'.$i.'.onclick = function() {
                      WCmodal'.$i.'.style.display = "none";
                    }
                    
                    window.onclick = function(event) {
                      if (event.target == WCmodal'.$i.') {
                        WCmodal'.$i.'.style.display = "none";
                      }
                    }
                    </script>';
                    echo '</div>';

                }
                echo '</div>';
                } catch(PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }     
            ?>
            
        </div>

        <div style="background-color:#eee;height:700px;overflow-y:scroll;display:none;" id="EC">
        <?php
            try {
                $stmt = $conn->prepare("SELECT * FROM `biofefqs_maindata`.`userdata` WHERE `practitioner` = '1' AND `province` = 'EC' AND `bemail` != '' AND `image` != '' AND `name` != '' "); 
                $stmt->execute();
                $results = array();
                if ($stmt->execute()) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $results[] = $row;
                    }
                }
                echo '<div style="text-align:center;display:flex;">';
                for ($i = 0; $i < $stmt->rowcount(); $i++) {
                    $useragent=$_SERVER['HTTP_USER_AGENT'];
                    if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))) {
                        echo '</div><div style="text-align:center;display:flex;">';
                    } else
                    if (($i % 4) == 0) {
                        echo '</div><div style="text-align:center;display:flex;">';
                    }
                    echo '<br><div class="column1">';
                    echo '<div style="height:70px;">';
                    echo '<h5>',$results[$i]["name"],' ',($results[$i]["surname"]),'</h5>';
                    echo '</div>';
                    echo '<div style="height:200px;">';
                    if ($results[$i]["image"]) {
                        echo '<img class="userimg" src="uploads/',$results[$i]["image"],'">';
                    } else {
                        echo '<img class="userimg" src="Images/user.png">';
                    }
                    echo '</div>';
                    echo '
                    <button id="ECmyBtn',$results[$i]["id"],'">Read more</button>
                    
                   
                    <div id="ECmyModal',$results[$i]["id"],'" class="modal">
                    
         
                      <div class="modal-content">
                        <div style="text-align:center;">
                        <h1>',$results[$i]["name"],' ',$results[$i]["surname"],'</h1>
                        </div>';
                        if ($results[$i]["image"]) {
                            echo '<img class="userimg" src="uploads/',$results[$i]["image"],'">';
                        } else {
                            echo '<img class="userimg" src="Images/user.png">';
                        }
                        echo'<br><br>
                        <strong><p style="font-size:1.5em;">Title:</p></strong>
                        <p style="font-size:1.5em;">',$results[$i]["title"],'</p>
                        <strong><p style="font-size:1.5em;">Email:</p></strong>
                        <p style="font-size:1.5em;">',$results[$i]["bemail"],'</p>
'; if ($results[$i]["certified"] == "1") { echo '<strong><p style="font-size:1.5em;">BCIA Certified</p></strong>
    <img width="100px" height="100px" src="Images/BCIA_Gold.gif">';}echo'
                        <br><br>
                        <div style="padding-top:2px;margin:auto;text-align:center;">
                        <a style="text-decoration:none;background-color:#eee;"class="mCard" href="https://www.google.com/maps?q=',$results[$i]['location'],'">View Location</a>
                        ';
                        if ($results[$i]['website']) {
                            echo '<a style="text-decoration:none;background-color:#eee;"class="mCard" href="https://',$results[$i]['website'],'">View Website</a>';
                        }

                        echo'</div>
                        <br><br>

                        <button id="ECclose'.$i.'" >Close</button>
                      </div>
                    
                    </div>
                        
                    <script>
                    var ECmodal'.$i.' = document.getElementById("ECmyModal',$results[$i]["id"],'");
                    
                    var ECbtn'.$i.' = document.getElementById("ECmyBtn',$results[$i]["id"],'");
                    
                    var ECspan'.$i.' = document.getElementById("ECclose'.$i.'");
                    
                    ECbtn'.$i.'.onclick = function() {
                      ECmodal'.$i.'.style.display = "block";
                    }
                    
                    ECspan'.$i.'.onclick = function() {
                      ECmodal'.$i.'.style.display = "none";
                    }
                    
                    window.onclick = function(event) {
                      if (event.target == ECmodal'.$i.') {
                        ECmodal'.$i.'.style.display = "none";
                      }
                    }
                    </script>';

                    echo '</div>';

                }
                echo '</div>';
                } catch(PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }     
            ?>
            
        </div>

        <div style="background-color:#eee;height:700px;overflow-y:scroll;display:none;" id="NC">
        <?php
            try {
                $stmt = $conn->prepare("SELECT * FROM `biofefqs_maindata`.`userdata` WHERE `practitioner` = '1' AND `province` = 'NC' AND `bemail` != '' AND `image` != '' AND `name` != '' ");                 $stmt->execute();
                $results = array();
                if ($stmt->execute()) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $results[] = $row;
                    }
                }
                echo '<div style="text-align:center;display:flex;">';
                for ($i = 0; $i < $stmt->rowcount(); $i++) {
                    $useragent=$_SERVER['HTTP_USER_AGENT'];
                    if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))) {
                        echo '</div><div style="text-align:center;display:flex;">';
                    } else
                    if (($i % 4) == 0) {
                        echo '</div><div style="text-align:center;display:flex;">';
                    }
                    echo '<br><div class="column1">';
                    echo '<div style="height:70px;">';
                    echo '<h5>',$results[$i]["name"],' ',($results[$i]["surname"]),'</h5>';
                    echo '</div>';
                    echo '<div style="height:200px;">';
                    if ($results[$i]["image"]) {
                        echo '<img class="userimg" src="uploads/',$results[$i]["image"],'">';
                    } else {
                        echo '<img class="userimg" src="Images/user.png">';
                    }
                    echo '</div>';
                    echo '
                    <button id="NCmyBtn',$results[$i]["id"],'">Read more</button>
                    
                   
                    <div id="NCmyModal',$results[$i]["id"],'" class="modal">
                    
         
                      <div class="modal-content">
                        <div style="text-align:center;">
                        <h1>',$results[$i]["name"],' ',$results[$i]["surname"],'</h1>
                        </div>';
                        if ($results[$i]["image"]) {
                            echo '<img class="userimg" src="uploads/',$results[$i]["image"],'">';
                        } else {
                            echo '<img class="userimg" src="Images/user.png">';
                        }
                        echo'<br><br>
                        <strong><p style="font-size:1.5em;">Title:</p></strong>
                        <p style="font-size:1.5em;">',$results[$i]["title"],'</p>
                        <strong><p style="font-size:1.5em;">Email:</p></strong>
                        <p style="font-size:1.5em;">',$results[$i]["bemail"],'</p>
'; if ($results[$i]["certified"] == "1") { echo '   <strong><p style="font-size:1.5em;">BCIA Certified</p></strong><img width="100px" height="100px" src="Images/BCIA_Gold.gif">';}echo'
                        <br><br>
                        <div style="padding-top:2px;margin:auto;text-align:center;">
                        <a style="text-decoration:none;background-color:#eee;"class="mCard" href="https://www.google.com/maps?q=',$results[$i]['location'],'">View Location</a>
                        ';
                        if ($results[$i]['website']) {
                            echo '<a style="text-decoration:none;background-color:#eee;"class="mCard" href="https://',$results[$i]['website'],'">View Website</a>';
                        }
 
                        echo'</div>
                        <br><br>

                        <button id="NCclose'.$i.'" >Close</button>
                      </div>
                    
                    </div>
                        
                    <script>
                    var NCmodal'.$i.' = document.getElementById("NCmyModal',$results[$i]["id"],'");
                    
                    var NCbtn'.$i.' = document.getElementById("NCmyBtn',$results[$i]["id"],'");
                    
                    var NCspan'.$i.' = document.getElementById("NCclose'.$i.'");
                    
                    NCbtn'.$i.'.onclick = function() {
                      NCmodal'.$i.'.style.display = "block";
                    }
                    
                    NCspan'.$i.'.onclick = function() {
                      NCmodal'.$i.'.style.display = "none";
                    }
                    
                    window.onclick = function(event) {
                      if (event.target == NCmodal'.$i.') {
                        NCmodal'.$i.'.style.display = "none";
                      }
                    }
                    </script>';
                    echo '</div>';

                }
                echo '</div>';
                } catch(PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }     
            ?>
            
        </div>

        <div style="background-color:#eee;height:700px;overflow-y:scroll;display:none;" id="NW">
        <?php
            try {
                $stmt = $conn->prepare("SELECT * FROM `biofefqs_maindata`.`userdata` WHERE `practitioner` = '1' AND `province` = 'NW' AND `bemail` != '' AND `image` != '' AND `name` != '' "); 
                $results = array();
                if ($stmt->execute()) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $results[] = $row;
                    }
                }
                echo '<div style="text-align:center;display:flex;">';
                for ($i = 0; $i < $stmt->rowcount(); $i++) {
                    $useragent=$_SERVER['HTTP_USER_AGENT'];
                    if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))) {
                        echo '</div><div style="text-align:center;display:flex;">';
                    } else
                    if (($i % 4) == 0) {
                        echo '</div><div style="text-align:center;display:flex;">';
                    }
                    echo '<br><div class="column1">';
                    echo '<div style="height:70px;">';
                    echo '<h5>',$results[$i]["name"],' ',($results[$i]["surname"]),'</h5>';
                    echo '</div>';
                    echo '<div style="height:200px;">';
                    if ($results[$i]["image"]) {
                        echo '<img class="userimg" src="uploads/',$results[$i]["image"],'">';
                    } else {
                        echo '<img class="userimg" src="Images/user.png">';
                    }
                    echo '</div>';
                    echo '
                    <button id="NWmyBtn',$results[$i]["id"],'">Read more</button>
                    
                   
                    <div id="NWmyModal',$results[$i]["id"],'" class="modal">
                    
         
                      <div class="modal-content">
                        <div style="text-align:center;">
                        <h1>',$results[$i]["name"],' ',$results[$i]["surname"],'</h1>
                        </div>';
                        if ($results[$i]["image"]) {
                            echo '<img class="userimg" src="uploads/',$results[$i]["image"],'">';
                        } else {
                            echo '<img class="userimg" src="Images/user.png">';
                        }
                        echo'<br><br>
                        <strong><p style="font-size:1.5em;">Title:</p></strong>
                        <p style="font-size:1.5em;">',$results[$i]["title"],'</p>
                        <strong><p style="font-size:1.5em;">Email:</p></strong>
                        <p style="font-size:1.5em;">',$results[$i]["bemail"],'</p>
'; if ($results[$i]["certified"] == "1") { echo '   <strong><p style="font-size:1.5em;">BCIA Certified</p></strong>
    <img width="100px" height="100px" src="Images/BCIA_Gold.gif">';}echo'
                        <br><br>
                        <div style="padding-top:2px;margin:auto;text-align:center;">
                        <a style="text-decoration:none;background-color:#eee;"class="mCard" href="https://www.google.com/maps?q=',$results[$i]['location'],'">View Location</a>
                        ';
                        if ($results[$i]['website']) {
                            echo '<a style="text-decoration:none;background-color:#eee;"class="mCard" href="https://',$results[$i]['website'],'">View Website</a>';
                        }
              
                        echo'</div>
                        <br><br>

                        <button id="NWclose'.$i.'" >Close</button>
                      </div>
                    
                    </div>
                        
                    <script>
                    var NWmodal'.$i.' = document.getElementById("NWmyModal',$results[$i]["id"],'");
                    
                    var NWbtn'.$i.' = document.getElementById("NWmyBtn',$results[$i]["id"],'");
                    
                    var NWspan'.$i.' = document.getElementById("NWclose'.$i.'");
                    
                    NWbtn'.$i.'.onclick = function() {
                      NWmodal'.$i.'.style.display = "block";
                    }
                    
                    NWspan'.$i.'.onclick = function() {
                      NWmodal'.$i.'.style.display = "none";
                    }
                    
                    window.onclick = function(event) {
                      if (event.target == NWmodal'.$i.') {
                        NWmodal'.$i.'.style.display = "none";
                      }
                    }
                    </script>';

                    echo '</div>';

                }
                echo '</div>';
                } catch(PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }     
            ?>
            
        </div>

        <div style="background-color:#eee;height:700px;overflow-y:scroll;display:none;" id="FS">
        <?php
            try {
                $stmt = $conn->prepare("SELECT * FROM `biofefqs_maindata`.`userdata` WHERE `practitioner` = '1' AND `province` = 'FS' AND `bemail` != '' AND `image` != '' AND `name` != '' "); 
                $results = array();
                if ($stmt->execute()) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $results[] = $row;
                    }
                }
                echo '<div style="text-align:center;display:flex;">';
                for ($i = 0; $i < $stmt->rowcount(); $i++) {
                    $useragent=$_SERVER['HTTP_USER_AGENT'];
                    if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))) {
                        echo '</div><div style="text-align:center;display:flex;">';
                    } else
                    if (($i % 4) == 0) {
                        echo '</div><div style="text-align:center;display:flex;">';
                    }
                    echo '<br><div class="column1">';
                    echo '<div style="height:70px;">';
                    echo '<h5>',$results[$i]["name"],' ',($results[$i]["surname"]),'</h5>';
                    echo '</div>';
                    echo '<div style="height:200px;">';
                    if ($results[$i]["image"]) {
                        echo '<img class="userimg" src="uploads/',$results[$i]["image"],'">';
                    } else {
                        echo '<img class="userimg" src="Images/user.png">';
                    }
                    echo '</div>';
                    echo '
                    <button id="FSmyBtn',$results[$i]["id"],'">Read more</button>
                    
                   
                    <div id="FSmyModal',$results[$i]["id"],'" class="modal">
                    
         
                      <div class="modal-content">
                        <div style="text-align:center;">
                        <h1>',$results[$i]["name"],' ',$results[$i]["surname"],'</h1>
                        </div>';
                        if ($results[$i]["image"]) {
                            echo '<img class="userimg" src="uploads/',$results[$i]["image"],'">';
                        } else {
                            echo '<img class="userimg" src="Images/user.png">';
                        }
                        echo'<br><br>
                        <strong><p style="font-size:1.5em;">Title:</p></strong>
                        <p style="font-size:1.5em;">',$results[$i]["title"],'</p>
                        <strong><p style="font-size:1.5em;">Email:</p></strong>
                        <p style="font-size:1.5em;">',$results[$i]["bemail"],'</p>
'; if ($results[$i]["certified"] == "1") { echo '   <strong><p style="font-size:1.5em;">BCIA Certified</p></strong>
    <img width="100px" height="100px" src="Images/BCIA_Gold.gif">';}echo'
                        <br><br>
                        <div style="padding-top:2px;margin:auto;text-align:center;">
                        <a style="text-decoration:none;background-color:#eee;"class="mCard" href="https://www.google.com/maps?q=',$results[$i]['location'],'">View Location</a>
                        ';
                        if ($results[$i]['website']) {
                            echo '<a style="text-decoration:none;background-color:#eee;"class="mCard" href="https://',$results[$i]['website'],'">View Website</a>';
                        }
                    
                        echo'</div>
                        <br><br>

                        <button id="FSclose'.$i.'" >Close</button>
                      </div>
                    
                    </div>
                        
                    <script>
                    var FSmodal'.$i.' = document.getElementById("FSmyModal',$results[$i]["id"],'");
                    
                    var FSbtn'.$i.' = document.getElementById("FSmyBtn',$results[$i]["id"],'");
                    
                    var FSspan'.$i.' = document.getElementById("FSclose'.$i.'");
                    
                    FSbtn'.$i.'.onclick = function() {
                      FSmodal'.$i.'.style.display = "block";
                    }
                    
                    FSspan'.$i.'.onclick = function() {
                      FSmodal'.$i.'.style.display = "none";
                    }
                    
                    window.onclick = function(event) {
                      if (event.target == FSmodal'.$i.') {
                        FSmodal'.$i.'.style.display = "none";
                      }
                    }
                    </script>';

                    echo '</div>';

                }
                echo '</div>';
                } catch(PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }     
            ?>
            
        </div>

        <div style="background-color:#eee;height:700px;overflow-y:scroll;display:none;" id="GT">
        <?php
            try {
                $stmt = $conn->prepare("SELECT * FROM `biofefqs_maindata`.`userdata` WHERE `practitioner` = '1' AND `province` = 'GT' AND `bemail` != '' AND `image` != '' AND `name` != '' "); 
                $results = array();
                if ($stmt->execute()) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $results[] = $row;
                    }
                }
                echo '<div style="text-align:center;display:flex;">';
                for ($i = 0; $i < $stmt->rowcount(); $i++) {
                    $useragent=$_SERVER['HTTP_USER_AGENT'];
                    if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))) {
                        echo '</div><div style="text-align:center;display:flex;">';
                    } else
                    if (($i % 4) == 0) {
                        echo '</div><div style="text-align:center;display:flex;">';
                    }
                    echo '<br><div class="column1">';
                    echo '<div style="height:70px;">';
                    echo '<h5>',$results[$i]["name"],' ',($results[$i]["surname"]),'</h5>';
                    echo '</div>';
                    echo '<div style="height:200px;">';
                    if ($results[$i]["image"]) {
                        echo '<img class="userimg" src="uploads/',$results[$i]["image"],'">';
                    } else {
                        echo '<img class="userimg" src="Images/user.png">';
                    }
                    echo '</div>';
                    echo '
                    <button id="GTmyBtn',$results[$i]["id"],'">Read more</button>
                    
                   
                    <div id="GTmyModal',$results[$i]["id"],'" class="modal">
                    
         
                      <div class="modal-content">
                        <div style="text-align:center;">
                        <h1>',$results[$i]["name"],' ',$results[$i]["surname"],'</h1>
                        </div>';
                        if ($results[$i]["image"]) {
                            echo '<img class="userimg" src="uploads/',$results[$i]["image"],'">';
                        } else {
                            echo '<img class="userimg" src="Images/user.png">';
                        }
                        echo'<br><br>
                        <strong><p style="font-size:1.5em;">Title:</p></strong>
                        <p style="font-size:1.5em;">',$results[$i]["title"],'</p>
                        <strong><p style="font-size:1.5em;">Email:</p></strong>
                        <p style="font-size:1.5em;">',$results[$i]["bemail"],'</p>
'; if ($results[$i]["certified"] == "1") { echo '   <strong><p style="font-size:1.5em;">BCIA Certified</p></strong>
    <img width="100px" height="100px" src="Images/BCIA_Gold.gif">';}echo'
                        <br><br>
                        <div style="padding-top:2px;margin:auto;text-align:center;">
                        <a style="text-decoration:none;background-color:#eee;"class="mCard" href="https://www.google.com/maps?q=',$results[$i]['location'],'">View Location</a>
                        ';
                        if ($results[$i]['website']) {
                            echo '<a style="text-decoration:none;background-color:#eee;"class="mCard" href="https://',$results[$i]['website'],'">View Website</a>';
                        }
                      
                        echo'</div>
                        <br><br>

                        <button id="GTclose'.$i.'" >Close</button>
                      </div>
                    
                    </div>
                        
                    <script>
                    var GTmodal'.$i.' = document.getElementById("GTmyModal',$results[$i]["id"],'");
                    
                    var GTbtn'.$i.' = document.getElementById("GTmyBtn',$results[$i]["id"],'");
                    
                    var GTspan'.$i.' = document.getElementById("GTclose'.$i.'");
                    
                    GTbtn'.$i.'.onclick = function() {
                      GTmodal'.$i.'.style.display = "block";
                    }
                    
                    GTspan'.$i.'.onclick = function() {
                      GTmodal'.$i.'.style.display = "none";
                    }
                    
                    window.onclick = function(event) {
                      if (event.target == GTmodal'.$i.') {
                        GTmodal'.$i.'.style.display = "none";
                      }
                    }
                    </script>';
                    echo '</div>';

                }
                echo '</div>';
                } catch(PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }     
            ?>

        </div>

        <div style="background-color:#eee;height:700px;overflow-y:scroll;display:none;" id="KN">
        <?php
            try {
                $stmt = $conn->prepare("SELECT * FROM `biofefqs_maindata`.`userdata` WHERE `practitioner` = '1' AND `province` = 'KN' AND `bemail` != '' AND `image` != '' AND `name` != '' "); 
                $results = array();
                if ($stmt->execute()) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $results[] = $row;
                    }
                }
                echo '<div style="text-align:center;display:flex;">';
                for ($i = 0; $i < $stmt->rowcount(); $i++) {
                    $useragent=$_SERVER['HTTP_USER_AGENT'];
                    if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))) {
                        echo '</div><div style="text-align:center;display:flex;">';
                    } else
                    if (($i % 4) == 0) {
                        echo '</div><div style="text-align:center;display:flex;">';
                    }
                    echo '<br><div class="column1">';
                    echo '<div style="height:70px;">';
                    echo '<h5>',$results[$i]["name"],' ',($results[$i]["surname"]),'</h5>';
                    echo '</div>';
                    echo '<div style="height:200px;">';
                    if ($results[$i]["image"]) {
                        echo '<img class="userimg" src="uploads/',$results[$i]["image"],'">';
                    } else {
                        echo '<img class="userimg" src="Images/user.png">';
                    }
                    echo '</div>';
                    echo '
                    <button id="KNmyBtn',$results[$i]["id"],'">Read more</button>
                    
                   
                    <div id="KNmyModal',$results[$i]["id"],'" class="modal">
                    
         
                      <div class="modal-content">
                        <div style="text-align:center;">
                        <h1>',$results[$i]["name"],' ',$results[$i]["surname"],'</h1>
                        </div>';
                        if ($results[$i]["image"]) {
                            echo '<img class="userimg" src="uploads/',$results[$i]["image"],'">';
                        } else {
                            echo '<img class="userimg" src="Images/user.png">';
                        }
                        echo'<br><br>
                        <strong><p style="font-size:1.5em;">Title:</p></strong>
                        <p style="font-size:1.5em;">',$results[$i]["title"],'</p>
                        <strong><p style="font-size:1.5em;">Email:</p></strong>
                        <p style="font-size:1.5em;">',$results[$i]["bemail"],'</p>
                            '; if ($results[$i]["certified"] == "1") { 
                                echo '   <strong><p style="font-size:1.5em;">BCIA Certified</p></strong>
                                <img width="100px" height="100px" src="Images/BCIA_Gold.gif">';}echo'
                        <br><br>
                        <div style="padding-top:2px;margin:auto;text-align:center;">
                        <a style="text-decoration:none;background-color:#eee;"class="mCard" href="https://www.google.com/maps?q=',$results[$i]['location'],'">View Location</a>
                        ';
                        if ($results[$i]['website']) {
                            echo '<a style="text-decoration:none;background-color:#eee;"class="mCard" href="https://',$results[$i]['website'],'">View Website</a>';
                        }
                     
                        echo'</div>
                        <br><br>

                        <button id="KNclose'.$i.'" >Close</button>
                      </div>
                    
                    </div>
                        
                    <script>
                    var KNmodal'.$i.' = document.getElementById("KNmyModal',$results[$i]["id"],'");
                    
                    var KNbtn'.$i.' = document.getElementById("KNmyBtn',$results[$i]["id"],'");
                    
                    var KNspan'.$i.' = document.getElementById("KNclose'.$i.'");
                    
                    KNbtn'.$i.'.onclick = function() {
                      KNmodal'.$i.'.style.display = "block";
                    }
                    
                    KNspan'.$i.'.onclick = function() {
                      KNmodal'.$i.'.style.display = "none";
                    }
                    
                    window.onclick = function(event) {
                      if (event.target == KNmodal'.$i.') {
                        KNmodal'.$i.'.style.display = "none";
                      }
                    }
                    </script>';
                    echo '</div>';

                }
                echo '</div>';
                } catch(PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }     
            ?>
        </div> 

    <!-- </div> -->


<?php
    require "components/footer.php";
?>