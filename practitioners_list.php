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
// sleep(10);
    require_once 'SQL/dbconnect.php';
    require "components/header.php";
    require "components/topnav.php";

    $lat1 = $_GET["lat"];
    $long1 = $_GET["long"];

    if ($lat1 && $long1) {
        $lat1 = deg2rad($lat1);
        $long1 = deg2rad($long1);
        $latlong = date("Y-m-dh:i:sa");

        try {
            $stmt = $conn->prepare("SELECT * FROM `biofefqs_maindata`.`userdata` WHERE `practitioner` = '1' AND `longitude` != '' "); 
            $stmt->execute();
            $results = array();
            if ($stmt->execute()) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $results[] = $row;
                    }
                }
                
                if (count($results) > 3) {
                    for ($i = 0; $i < 3;$i++) {
                        $lat2 = deg2rad($results[$i]["latitude"]);
                        $long2 = deg2rad($results[$i]["longitude"]);
    
                        $latDelta = $lat1 - $lat2;
                        $lonDelta = $lon1 - $lon2;
    
                        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
                        $length = $angle * 6371000;
                        try {
                        $stmt = $conn->prepare("INSERT INTO `biofefqs_maindata`.`loclength` (`latlong`, `pid`, `distance`) VALUES (:q1, :a1, :d1)" ); 
                        $stmt->execute([":q1" => $latlong, ":a1" => $results[$i]["id"], ":d1" => $length]);
                        } catch(PDOException $e) {
                            echo "Error: " . $e->getMessage();
                        }  
                    } 
                } else {
                    for ($i = 0; $i < count($results);$i++) {
                        $lat2 = deg2rad($results[$i]["latitude"]);
                        $long2 = deg2rad($results[$i]["longitude"]);
    
                        $latDelta = $lat1 - $lat2;
                        $lonDelta = $lon1 - $lon2;
    
                        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
                        $length = $angle * 6371000;
                        try {
                        $stmt = $conn->prepare("INSERT INTO `biofefqs_maindata`.`loclength` (`latlong`, `pid`, `distance`) VALUES (:q1, :a1, :d1)" ); 
                        $stmt->execute([":q1" => $latlong, ":a1" => $results[$i]["id"], ":d1" => $length]);
                        } catch(PDOException $e) {
                            echo "Error: " . $e->getMessage();
                        }  
                    } 
                }
               
 
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }  
 
      

        try {
            $stmt = $conn->prepare("SELECT * FROM `biofefqs_maindata`.`loclength` WHERE `latlong` = :a1 ORDER BY `distance` ASC"); 
            $stmt->execute([":a1" => $latlong]);
            $res = array();
            $id = array();
            if ($stmt->execute()) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $res[] = $row;
                    array_push($id, $row["pid"]);
                    }
                }
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            } 
           
                $ids = implode(', ', $id);
                try {
                    $stmt = $conn->prepare("SELECT * FROM `biofefqs_maindata`.`userdata` WHERE `id` IN (".$ids.")"); 
                    $stmt->execute();
                    $result = array();
                    if ($stmt->execute()) {
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $result[] = $row;
                            }
                        }



                    for ($c = 0; $c < $stmt->rowcount() and $c < 10 ;$c++) {

                        echo '<div style="text-align:center;display:flex;">';
                        for ($c = 0; $c < $stmt->rowcount(); $c++) {
                            $useragent=$_SERVER['HTTP_USER_AGENT'];
                            if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))) {
                                echo '</div><div style="text-align:center;display:flex;">';
                            } else
                            if (($c % 4) == 0) {
                                echo '</div><div style="text-align:center;display:flex;">';
                            }
                            echo '<br><div class="column1">';
                            echo '<div style="height:70px;">';
                            echo '<h5>',$results[$c]["name"],' ',($results[$c]["surname"]),'</h5>';
                            echo '</div>';
                            echo '<div style="height:200px;">';
                            if ($results[$c]["image"]) {
                                echo '<img class="userimg" src="uploads/',$results[$c]["image"],'">';
                            } else {
                                echo '<img class="userimg" src="Images/user.png">';
                            }
                            echo '</div>';
                            echo '
                            <button id="KNmyBtn',$results[$c]["id"],'">Read more</button>

                        
                            <div id="KNmyModal',$results[$c]["id"],'" class="modal">

                        
                              <div class="modal-content">
                                <div style="text-align:center;">
                                <h1>',$results[$c]["name"],' ',$results[$c]["surname"],'</h1>
                                </div>';
                                if ($results[$c]["image"]) {
                                    echo '<img class="userimg" src="uploads/',$results[$c]["image"],'">';
                                } else {
                                    echo '<img class="userimg" src="Images/user.png">';
                                }
                                echo'<br><br>
                                <strong><p style="font-size:1.5em;">Title:</p></strong>
                                <p style="font-size:1.5em;">',$results[$c]["title"],'</p>
                                <strong><p style="font-size:1.5em;">Email:</p></strong>
                                <p style="font-size:1.5em;">',$results[$c]["bemail"],'</p>
                                <br><br>
                                <div style="padding-top:2px;margin:auto;text-align:center;">
                                <a style="text-decoration:none;background-color:#eee;"class="mCard" href="https://www.google.com/maps?q=',$results[$i]['location'],'">View Location</a>
                                ';
                                if ($results[$c]['website']) {
                                    echo '<a style="text-decoration:none;background-color:#eee;"class="mCard" href="https://',$results[$i]['website'],'">View Website</a>';
                                }
                                echo'</div>
                                <br><br>
                            
                                <button id="KNclose'.$c.'" >Close</button>
                              </div>
                            
                            </div>

                            <script>
                            var KNmodal'.$c.' = document.getElementById("KNmyModal',$results[$c]["id"],'");
                            
                            var KNbtn'.$c.' = document.getElementById("KNmyBtn',$results[$c]["id"],'");
                            
                            var KNspan'.$c.' = document.getElementById("KNclose'.$c.'");
                            
                            KNbtn'.$c.'.onclick = function() {
                              KNmodal'.$c.'.style.display = "block";
                            }

                            KNspan'.$c.'.onclick = function() {
                              KNmodal'.$c.'.style.display = "none";
                            }

                            window.onclick = function(event) {
                              if (event.target == KNmodal'.$c.') {
                                KNmodal'.$c.'.style.display = "none";
                              }
                            }
                            </script>';
                            echo '</div>';
                        
                        }
                        echo '</div>';
    
                        }
                        } catch(PDOException $e) {
                            echo "Error: " . $e->getMessage();
                        }  

                        try {
                            $stmt = $conn->prepare("DELETE FROM `biofefqs_maindata`.`loclength` WHERE `latlong` = :a1"); 
                            $stmt->execute([":a1" => $latlong]);
                
                            } catch(PDOException $e) {
                                echo "Error: " . $e->getMessage();
                            } 
                    // }  
        
    }

?>

<?php
    require "components/footer.php";
?>