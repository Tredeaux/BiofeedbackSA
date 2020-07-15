<!DOCTYPE html>
<html lang="en">
    <title>DASHBOARD PAGE | Biofeedback South Africa</title>
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

    if (empty($_SESSION)) {
        echo "<script>window.location = 'https://biofeedbacksa.co.za/index.php';</script>";
    }

    if ($_SESSION["reset"] == 1) {
        echo '<script>swal("Success!", "You requested a password reset, Reset your password now in Edit Profile!", "success");</script>';
        $_SESSION["reset"] = 0;
    };

    if ($_SESSION["application_made"] == 1) {
        echo '<script>swal("Success!", "Application Sent!", "success");</script>';
        $_SESSION["application_made"] = 0;
    };

    if (($_SESSION["practitioner"] == 1) AND (empty($_SESSION["lat"]))) {
        echo '<script>alert("Your Location is missing, Go add your location at Edit Profile and then login again");</script>';
    };
?>

    <div style="text-align:center;border-bottom: 2px solid #02a7e3;">
        <div>
            <h1>Dashboard</h1>
        </div>
        <h6>Here you can perform member actions</h6>
    </div>

    <div class="mainDiv">

    <?php
            try {
                $stmt = $conn->prepare("SELECT * FROM `biofefqs_maindata`.`userdata` WHERE `id` = '".$_SESSION["id"]."'"); 
                $stmt->execute();
                $results = array();
                if ($stmt->execute()) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $results[] = $row;
                    }
                }
                echo '<div style="margin:10px;width:100%;text-align:center;">';
                for ($i = 0; $i < $stmt->rowcount(); $i++) {

                    echo '<br><div style="margin:auto;">';
                    echo '<div style="height:30px;">';
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
                    <button id="myBtn',$results[$i]["id"],'">Show Profile</button>
                    
                   
                    <div id="myModal',$results[$i]["id"],'" class="modal">
                    
         
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
                        <strong><p style="font-size:1.5em;">Website:</p></strong>
                        <a href="',$results[$i]["website"],'"><p style="font-size:1.5em;">',$results[$i]["website"],'</p></a>
                        <strong><p style="font-size:1.5em;">Location:</p></strong>
                        <p style="font-size:1.5em;">',$results[$i]["location"],'</p>

                        <button id="close'.$i.'" >Close</button>
                      </div>
                    
                    </div>
                        
                    <script>
                    var modal'.$i.' = document.getElementById("myModal',$results[$i]["id"],'");
                    
                    var btn'.$i.' = document.getElementById("myBtn',$results[$i]["id"],'");
                    
                    var span'.$i.' = document.getElementById("close'.$i.'");
                    
                    btn'.$i.'.onclick = function() {
                      modal'.$i.'.style.display = "block";
                    }
                    
                    span'.$i.'.onclick = function() {
                      modal'.$i.'.style.display = "none";
                    }
                    
                    window.onclick = function(event) {
                      if (event.target == modal'.$i.') {
                        modal'.$i.'.style.display = "none";
                      }
                    }
                    </script>';
                    // echo '<div style="width:60%;margin-left:10px;">';
                      
                    // echo '<p> ',$results[$i]["title"],'</p>'; 
                    // echo '<p><a href="mailto:',$results[$i]["bemail"],'">',$results[$i]["bemail"],'</a></p><br>'; 
                    // echo '<div style="padding-top:2px;margin:auto;text-align:center;"><a style="text-decoration:none;background-color:#eee;"class="mCard" href="https://www.google.com/maps?q=',$results[$i]['location'],'">View Location</a>
                    // <a style="text-decoration:none;background-color:#eee;"class="mCard" href="https://',$results[$i]['website'],'">View Website</a></div><br>';
                    // echo '</div>';

                    // if ($results[$i]["certified"] == 1) {
                    //     echo '<div style="margin:auto;">
                    //         <img style="text-align:middle;margin:auto;" height="60px" src="Images/BCIA_Gold.gif">
                    //     </div>';
                    // }

                    echo '</div>';

                }
                echo '</div>';
                } catch(PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }     
            ?>

        <?php
            // try {                        
            //     $stmt = $conn->prepare("SELECT * FROM `biofefqs_maindata`.`userdata` WHERE `id` = :id"); 
            //     $stmt->execute([":id" => $_SESSION['id']]);
            //     $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            //     echo '<div class="column1">';
            //     echo '<div style="display:flex;">';
            //     echo '<div >';
            //     if ($result["image"]) {
            //         echo '<img class="userimg" src="uploads/',$result["image"],'">';
            //     } else {
            //         echo '<img class="userimg" src="Images/user.png">';
            //     }
            //     echo '</div>';
            //     echo '<div style="width:5vw;"></div>';

            //     echo '<div style="text-align:left;">';
            //         echo '<h1 style="font-size:1.5;">',$result["username"],'</h1>';
            //         echo '<h6>Name: ',$result["name"],'</h6>';
            //         echo '<h6>Surname: ',$result["surname"],'</h6>';
            //         echo '<h6>Title: ',$result["title"],'</h6>';
            //         echo '<h6>ID: ',$result["id"],'</h6>';
                    
            //     echo '</div>';

            //     echo '<div style="width:5vw;"></div>';

            //     echo '<div style="text-align:left;padding-top:2vh;">';
            //     echo '<h6>','Business Email: ',$result["bemail"],'</h6>';
            //         echo '<h6>','Email: ',$result["email"],'</h6>';
            //         echo '<h6>',$result["location"],'</h6>';
            //         echo '<h6>',$result["website"],'</h6>';
            //         echo '<h6>Joined: ',substr($result["cr_date"], 0, 10),'</h6>';
            //     echo '</div>';

            //     echo '<div style="width:5vw;"></div>';
            //     echo '<div style="text-align:left;padding-top:2vh;">';
            //         if ($result["admin"] == 1) {
            //             echo '<i style="font-size:1.1em;color:#02a7e3;" class="fa fa-check"> Admin</i><br>';
            //         }
            //         if ($result["practitioner"] == 1) {
            //             echo '<i style="font-size:1.1em;color:#02a7e3;" class="fa fa-check"> Practitioner</i><br>';
            //         }

            //         if ($result["board"] == 1) {
            //             echo '<i style="font-size:1.1em;color:#02a7e3;" class="fa fa-check"> Board</i><br>';
            //         }

            //         if ($result["member"] == 2) {
            //             echo '<i style="font-size:1.1em;color:#02a7e3;" class="fa fa-check"> Affiliate</i><br>';
            //         }
            //         if ($result["member"] == 3) {
            //             echo '<i style="font-size:1.1em;color:#02a7e3;" class="fa fa-check"> Student</i><br>';
            //         }
            //         if ($result["member"] == 4) {
            //             echo '<i style="font-size:1.1em;color:#02a7e3;" class="fa fa-check"> Associate</i><br>';
            //         }
            //         if ($result["member"] == 5) {
            //             echo '<i style="font-size:1.1em;color:#02a7e3;" class="fa fa-check"> Full</i><br>';
            //         }

            //         if ($result["certified"] == 1) {
            //             echo '<i style="font-size:1.1em;color:#02a7e3;" class="fa fa-check"> BCIA Certified</i><br>';
            //             echo '<br><img width="50" height="50" src="Images/BCIA_Gold.gif">';
            //         }

            //     echo '</div>';
            //     echo '</div>';
            //     echo '</div>';

            // } catch(PDOException $e) {
            //     echo "Error: " . $e->getMessage();
            // } 
            ?>   
    </div>


    <div>
        <script> 
            $(document).ready(function(){
                var flipFlop = 0;
            $("#flip0").click(function(){
            if (flipFlop == 0) {
              $("#panel0").slideDown("slow");
              flipFlop = 1;
            } else {
              $("#panel0").slideUp("slow");
              flipFlop = 0;
            }
            });
            });
        </script>
        <div class="flip" id="flip0">
            <p style="padding: 1vh 1vh;">Edit profile</p>
        </div>
        <div class="panel" id="panel0">
            <div class="form">
                <form method="POST" action="PHP/edit_profile.php" enctype="multipart/form-data">
                    <input  id="fname" style="width:85%;" type="text" name="name" title="No Numbers, No symbols, One Word Only" pattern="^[^\s]+$"  placeholder="Enter Name" >
                    <br>
                    <input  style="width:85%;" type="text" name="surname" title="No Numbers, No symbols"  placeholder="Enter Surname" >
                    <br>
                    <input  autocomplete="off" style="width:85%;" type="text" name="title" title="No Numbers" pattern="^([^0-9]*)$" placeholder="Enter Job Title" >
                    <br>
                    <input  autocomplete="off" style="width:85%;" type="email" name="Email" placeholder="Enter Business Email" >
                    <br>
                    <input  style="width:85%;" type="text" name="website" placeholder="Enter Website URL.. (www.example.com)" >
                    <br>
                    <input  style="width:85%;" type="text" name="location" placeholder="Enter Address" >
                    <br><br>
                    <p>If you want to reset your password, enter new one below </p>
                    <input  autocomplete="off" style="width:85%;" type="password" name="psw1" placeholder="Enter New password" >
                    <br>
                    <input  autocomplete="off" style="width:85%;" type="password" name="psw2" placeholder="Enter New password again" >
                    <br><br>
                    <?php   
                        if ($_SESSION["practitioner"] == 1) {
                            echo '<p>Select Province (For practitioners)</p>
                            <select name="province">
                                <option value="">Select Province</option>
                                <option value="WC">Western Cape</option>
                                <option value="EC">Eastern Cape</option>
                                <option value="NC">Northern Cape</option>
                                <option value="NW">North West</option>
                                <option value="FS">Free State</option>
                                <option value="GT">Gauteng</option>
                                <option value="KN">KwaZulu-Natal</option>
                            </select>
                            <br><br>
                            <button id="locBut" type="button" onclick="getLocation()">Update Location</button>
                            <input type="hidden" name="long" id="long"/>
                            <input type="hidden" name="lat" id="lat"/>
                            <br><br>
                    <p> Select a profile picture </p>
                    <input  type="file" name="file" id="fileToUpload" >';
                        }
                        ?>
                    
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
                        }
                    </script>

                    
                    <br>
                    <input class="subBut" style="width:85%;" type="submit">
                    <br><br>
                </form>
            </div>
        </div>
    </div>

 <div>
        <script> 
            $(document).ready(function(){
                var flipFlop = 0;
            $("#flipM").click(function(){
            if (flipFlop == 0) {
              $("#panelM").slideDown("slow");
              flipFlop = 1;
            } else {
              $("#panelM").slideUp("slow");
              flipFlop = 0;
            }
            });
            });
        </script>
        <div class="flip" id="flipM">
            <p style="padding: 1vh 1vh;">Membership</p>
        </div>
        <div class="panel" id="panelM">
            <div class="form">
                <div style="display:flex;">
                    <div style="margin:10px;" class="contact1">
                        <h1>Unsubscribe</h1>
                        <p>Cancel your current membership</p>
                        <br><div style="margin:auto;text-align:center;"><a style="background-color:#eee;"class="mCard" href="PHP/apply.php?id=Cancel">Apply</a></div><br>
                        <br><br>
                    </div>
                    <div style="margin:10px;" class="contact1">
                        <h1>Affiliate</h1>
                        <p>Clinician who is interested in the field
                        of Biofeedback and research in this
                        domain but who have not done any
                        training to qualify as Full Member
                        <br><strong>R150</strong></p>
                        <br><div style="margin:auto;text-align:center;"><a style="background-color:#eee;"class="mCard" href="PHP/apply.php?id=Affiliate">Apply</a></div>
                        <br><br>
                    </div>
                    <div style="margin:10px;" class="contact1">
                        <h1>Student</h1>
                        <p>Proof of student registration
                        required
                        <br><strong>R150</strong></p>
                        <br><div style="margin:auto;text-align:center;"><a style="background-color:#eee;"class="mCard" href="PHP/apply.php?id=Student">Apply</a></div>
                        <br><br>
                    </div>
                    <div style="margin:10px;" class="contact1">
                        <h1>Associate</h1>
                        <p>
                        Registered clinician who is in the
                        process of completing BCIA
                        Accreditation
                        <br><strong>R450</strong></p>
                        <br><div style="margin:auto;text-align:center;"><a style="background-color:#eee;"class="mCard" href="PHP/apply.php?id=Associate">Apply</a></div>
                        <br><br>
                    </div>
                    <div style="margin:10px;" class="contact1">
                        <h1>Full Member</h1>
                        <p>Registered clinician who has
                        completed the BCIA Accreditation
                        process<br>
                        <strong>R600</strong></p>
                        <br><div style="margin:auto;text-align:center;"><a style="background-color:#eee;"class="mCard" href="PHP/apply.php?id=Full">Apply</a></div>
                        <br><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php
    if (($_SESSION["admin"] == 1) || ($_SESSION["member"] == 4 ) || ($_SESSION["member"] == 5)) {    
        echo '
        <div>
            <script> 
                $(document).ready(function(){
                    var flipFlop = 0;
                $("#flipVideos").click(function(){
                if (flipFlop == 0) {
                  $("#panelVideos").slideDown("slow");
                  flipFlop = 1;
                } else {
                  $("#panelVideos").slideUp("slow");
                  flipFlop = 0;
                }
                });
                });
            </script>

            <div class="flip" id="flipVideos">
                <p style="padding: 1vh 1vh;">Videos</p>
            </div>
            <div class="panel" id="panelVideos">
            <div class="form">

            <style>
                iframe {margin:auto;width:auto;max-width:24%;
                margin-top:10px;}
            </style>

                <div style="display:flex;margin:auto;">
                    <iframe  src="https://www.youtube.com/embed/mD3Ta4tBWow" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <iframe  src="https://www.youtube.com/embed/K_KNU0OMrps" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <iframe  src="https://www.youtube.com/embed/wVHRtNwF-wU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div style="display:flex;margin:auto;">
                    <iframe  src="https://www.youtube.com/embed/ZCEliSh6evg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <iframe  src="https://www.youtube.com/embed/k_d04ntUsyY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <iframe  src="https://www.youtube.com/embed/k5PIEJfrrVM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div style="display:flex;margin:auto;">
                    <iframe  src="https://www.youtube.com/embed/QJmcQHRULDs" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <iframe  src="https://www.youtube.com/embed/4wODBFtdDT0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <iframe  src="https://www.youtube.com/embed/xSTz7BuCNVM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div style="display:flex;margin:auto;">
                    <iframe  src="https://www.youtube.com/embed/njCABqVpGrY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <iframe  src="https://www.youtube.com/embed/nZdZoxfw5xw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <iframe  src="https://www.youtube.com/embed/pN8NhfZ8PEk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div style="display:flex;margin:auto;">
                    <iframe  src="https://www.youtube.com/embed/pBL4IHx7QkQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <iframe  src="https://www.youtube.com/embed/3bS144LB4ns" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <iframe  src="https://www.youtube.com/embed/MRef8mkCKqc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <iframe  src="https://www.youtube.com/embed/LmG9Ju0L7SA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div style="display:flex;margin:auto;">
                        <iframe  src="https://www.youtube.com/embed/giJflT8BpHI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <iframe  src="https://www.youtube.com/embed/4IHeojXwOCI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <iframe  src="https://www.youtube.com/embed/j56oHcP5ri0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <iframe  src="https://www.youtube.com/embed/18LzLsHmKow" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div style="display:flex;margin:auto;">
                    <iframe  src="https://www.youtube.com/embed/Kdz7HINU7y4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <iframe  src="https://www.youtube.com/embed/6RXIzF6NELM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <iframe  src="https://www.youtube.com/embed/6vTz6A7ML7o" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <iframe  src="https://www.youtube.com/embed/XkGk6BtNtqg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div style="display:flex;margin:auto;">
                    <iframe  src="https://www.youtube.com/embed/M45XO7soFo4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <iframe  src="https://www.youtube.com/embed/x5NpWEaU-Ic" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        </div>';
    }
    ?>

    <?php 
    if ($_SESSION["admin"] == 1) {      //Write a FAQ
        echo '
            <div>
            <script> 
                $(document).ready(function(){
                var flipFlop = 0;
            $("#flip1").click(function(){
            if (flipFlop == 0) {
              $("#panel1").slideDown("slow");
              flipFlop = 1;
            } else {
              $("#panel1").slideUp("slow");
              flipFlop = 0;
            }
            });
            });
        </script>';
        echo '
            <div class="flip" id="flip1">
                <p style="padding: 1vh 1vh;">Add to FAQ</p>
            </div>
            <div class="panel" id="panel1">
                <div class="form">
                    <form method="POST"  id="FAQ" action="PHP/upload_faq.php">
                        <input style="width:85%;" type="text" name="q" placeholder="Question" required>
                        <br>
                        <div>
                        <link href="https://cdn.quilljs.com/1.1.6/quill.snow.css" rel="stylesheet">
                        <div style="height:auto;" id="editorFAQ">
                        </div>
                    

                        <script>
                            var quillFAQ = new Quill("#editorFAQ", {
                              modules: {
                                toolbar: [
                                  [{ header: [1, false] }],
                                  ["bold", "italic", "underline"],
                                  ["image", "video",  "blockquote"],
                                  [{ list: "ordered" }, { list: "bullet"}],
                                  [{ align: "" }, { align: "center" }, { align: "right" }, { align: "justify" }],
                                  [{ "indent": "-1"}, { "indent": "+1" }],
                                  [{ "direction": "rtl" }],
                                  ["link"],
                                
                                ]
                              },
                              placeholder: "Compose an article",
                              theme: "snow"

                            });
'.
                            // setInterval(function() {

                            //     var FAQEditor = document.querySelector("#editorFAQ");
                            //     var htmlFAQ = FAQEditor.children[0].innerHTML;
                            //     if (htmlEvent.length > 900000) {
                            //         document.getElementById("sizeCheckEvent").style.display = "block";
                            //     } else {
                            //         document.getElementById("sizeCheckEvent").style.display = "none";
                            //     }                              
                            // }, 1000);
                            '

                            $("#FAQ").on("submit",function(){
                                var FAQEditor = document.querySelector("#editorFAQ");
                                var htmlFAQ = FAQEditor.children[0].innerHTML;
                                $("#descFAQ").val(htmlFAQ);
                            '.
                            //     if (htmlFAQ.length > 900000) {
                            //         alert("The files size is too big. Reduce Image size/quality");
                            //     } else {
                            //     $("#descFAQ").val(htmlFAQ);
                            // }
                            '
                           })
                        </script>
                    </div>
                    
                    <input type="hidden" name="a" id="descFAQ">
                <br>
                
                '.
                // <div id="sizeCheckEvent"><h2 style="color:red;">FILE SIZE IS TOO BIG</h2>
                //     </div>
'
                        <br>
                        <input class="subBut" style="width:85%;" type="submit">
                        <br><br>
                    </form>
                </div>
            </div>
            </div>';
    }
    ?>

    <?php
    if ($_SESSION["admin"] == 1) {      //Add an Event
        echo '<div>
        <script> 
            $(document).ready(function(){
                var flipFlop = 0;
            $("#flipe").click(function(){
            if (flipFlop == 0) {
              $("#panele").slideDown("slow");
              flipFlop = 1;
            } else {
              $("#panele").slideUp("slow");
              flipFlop = 0;
            }
            });
            });
        </script>
        <div class="flip" id="flipe">
            <p style="padding: 1vh 1vh;">Add Event</p>
        </div>
        <div class="panel" id="panele">
            <div class="form">
            <form method="POST" id="artEvent" action="PHP/upload_event.php">
                <input style="width:85%;" type="text" name="title" placeholder="Enter Title" required>
                <br>

                <input style="width:85%;" type="text" name="date" placeholder="Enter Date" required>
                <br>


                <div>
                        <link href="https://cdn.quilljs.com/1.1.6/quill.snow.css" rel="stylesheet">
                        <div style="height:auto;" id="editorEvent">
                        </div>
                    

                        <script>
                            var quillEvent = new Quill("#editorEvent", {
                              modules: {
                                toolbar: [
                                  [{ header: [1, false] }],
                                  ["bold", "italic", "underline"],
                                  ["image", "video",  "blockquote"],
                                  [{ list: "ordered" }, { list: "bullet"}],
                                  [{ align: "" }, { align: "center" }, { align: "right" }, { align: "justify" }],
                                  [{ "indent": "-1"}, { "indent": "+1" }],
                                  [{ "direction": "rtl" }],
                                  ["link"],
                                
                                ]
                              },
                              placeholder: "Compose an article",
                              theme: "snow"

                            });
'.
                            // setInterval(function() {

                            //     var EventEditor = document.querySelector("#editorEvent");
                            //     var htmlEvent = EventEditor.children[0].innerHTML;
                            //     if (htmlEvent.length > 900000) {
                            //         document.getElementById("sizeCheckEvent").style.display = "block";
                            //     } else {
                            //         document.getElementById("sizeCheckEvent").style.display = "none";
                            //     }                              
                            // }, 1000);
                            // 
                            '

                            $("#artEvent").on("submit",function(){
                                var EventEditor = document.querySelector("#editorEvent");
                                var htmlEvent = EventEditor.children[0].innerHTML;
                                $("#descEvent").val(htmlEvent);
                                '.
                            //     if (htmlEvent.length > 900000) {
                            //         alert("The files size is too big. Reduce Image size/quality");
                            //     } else {

                            //     $("#descEvent").val(htmlEvent);
                            // }
                            '
                           })
                        </script>
                    </div>
                    
                    <input type="hidden" name="description" id="descEvent">
                <br>
                '.
                // <div id="sizeCheckEvent"><h2 style="color:red;">FILE SIZE IS TOO BIG</h2>
                //     </div>
'
                <input style="width:85%;" type="text" name="location" placeholder="Enter Location" required>
                <br>

                <input class="subBut" style="width:85%;" type="submit">
                <br><br>
            </form>
            </div>
        </div>
        </div>';
    }
    ?>
     
     <?php
    if ($_SESSION["admin"] == 1) {      //Write A Post
        echo '
        <div>
            <script> 
                $(document).ready(function(){
                    var flipFlop = 0;
                $("#flip2").click(function(){
                if (flipFlop == 0) {
                  $("#panel2").slideDown("slow");
                  flipFlop = 1;
                } else {
                  $("#panel2").slideUp("slow");
                  flipFlop = 0;
                }
                });
                });
            </script>

            <div class="flip" id="flip2">
                <p style="padding: 1vh 1vh;">Write a blog post</p>
            </div>
            <div class="panel" id="panel2">
            <div class="form">
                <form method="POST" id="art" action="PHP/upload_notice.php">
                    <input style="width:85%;" type="text" name="title" placeholder="Title" required>
                    <br>
                    <div>
                        <link href="https://cdn.quilljs.com/1.1.6/quill.snow.css" rel="stylesheet">
                        <div style="height:auto;" id="editor">
                        </div>
                    

                        <script>
                            var quill = new Quill("#editor", {
                              modules: {
                                toolbar: [
                                  [{ header: [1, false] }],
                                  ["bold", "italic", "underline"],
                                  ["image", "video",  "blockquote"],
                                  [{ list: "ordered" }, { list: "bullet"}],
                                  [{ align: "" }, { align: "center" }, { align: "right" }, { align: "justify" }],
                                  [{ "indent": "-1"}, { "indent": "+1" }],
                                  [{ "direction": "rtl" }],
                                  ["link"],
                                
                                ]
                              },
                              placeholder: "Compose an article",
                              theme: "snow"

                            });

                            setInterval(function() {

                                var myEditor = document.querySelector("#editor");
                                var html1 = myEditor.children[0].innerHTML;
                                if (html1.length > 900000) {
                                    document.getElementById("sizeCheck2").style.display = "block";
                                } else {
                                    document.getElementById("sizeCheck2").style.display = "none";
                                }                              
                            }, 1000);

                            $("#art").on("submit",function(){
                                var myEditor = document.querySelector("#editor");
                                var html1 = myEditor.children[0].innerHTML;

                                if (html1.length > 900000) {
                                    alert("The files size is too big. Reduce Image size/quality");
                                } else {
                                $("#desc").val(html1);
                            }
                           })
                        </script>
                    </div>
                    <br>
                    <input type="hidden" name="description" id="desc">
                    <br>

                    <input type="radio" name="member" value="1"> Hidden<br>
                    <input type="radio" name="member" value="2"> Greyed out<br>
                    <br><br>
                    <div id="sizeCheck2"><h2 style="color:red;">FILE SIZE IS TOO BIG</h2>
                    </div>
                    <input class="subBut" style="width:85%;" type="submit">
                    <br><br>
                </form>
            </div>
        </div>
        </div>';
    }
    ?>
    
    <?php 
    if ($_SESSION["admin"] == 1) {     //Write a Publication
        echo '
        <div>
        <script> 
            $(document).ready(function(){
                var flipFlop = 0;
            $("#flip4").click(function(){
            if (flipFlop == 0) {
              $("#panel4").slideDown("slow");
              flipFlop = 1;
            } else {
              $("#panel4").slideUp("slow");
              flipFlop = 0;
            }
            });
            });
        </script>
        <div class="flip" id="flip4">
        <p style="padding: 1vh 1vh;">Write a publication</p>
        </div>
        <div class="panel" id="panel4">
            <div class="form">
                <form method="POST" id="art" action="PHP/upload_publication.php">
                <input style="width:85%;" type="text" name="a" placeholder="title" required>
                    <br>
                    <input style="width:85%;" type="text" name="b" placeholder="description" required>
                    <br>
                    <input style="width:85%;" type="text" name="c" placeholder="link" required>
                    <br>
                    <input type="radio" name="member" value="1"> Hidden<br>
                    <input type="radio" name="member" value="2"> Greyed out<br>
                    <br>
                    <input class="subBut" style="width:85%;" type="submit">
                </form>
            </div>
        </div>
        </div>

        ';
    }
    ?>

    <?php 
    if ($_SESSION["admin"] == 1) {     //banner manager
        echo '
        <div>
        <script> 
            $(document).ready(function(){
                var flipFlop = 0;
            $("#flipBan").click(function(){
            if (flipFlop == 0) {
              $("#panelBan").slideDown("slow");
              flipFlop = 1;
            } else {
              $("#panelBan").slideUp("slow");
              flipFlop = 0;
            }
            });
            });
        </script>
        <div class="flip" id="flipBan">
        <p style="padding: 1vh 1vh;">Banner Manager</p>
        </div>
        <div class="panel" id="panelBan">
        <div class="form">
        <form action="PHP/upload_banner.php" method="POST" id="1" enctype="multipart/form-data">
            <p>Images must be about 1500px by 400px in size</p>
            <input style="text-align:center;width:80%;" type="file" name="file" id="fileToUpload" >
            <br><br>
            <input class="subBut" type="submit" value="Upload">
            <br><br>';
                $dirname = "Banners/";
                $images = glob($dirname."*");

                foreach($images as $image) {
                    echo "<div style='padding:10px;background-color:lightgrey;border:1px solid black;'><p style='font-weight:bolder;'>".$image."</p><img style='border:2px solid black;width:60%;' src='".$image."'/><br>";
                    echo "<br><a class='btn btn-danger' onclick='return confirm(`Are you sure you want to delete this item?`);' href='PHP/deleteBanner.php?file=".$image."'>DELETE</a><br><br></div><br><br>";
                    
                }
                echo '
            <br><br>
        </form>
        </div>
        </div>
        </div>

        ';
    }
    ?>

    <?php 
    if ($_SESSION["admin"] == 1) {
        echo '<br><div style="margin:auto;text-align:center;"><a style="background-color:#eee;"class="mCard" href="member_man.php">Manage Tool</a></div><br>';
        echo '<br><div style="margin:auto;text-align:center;"><a style="background-color:#eee;"class="mCard" href="stats.php">Stats Tool</a></div><br>';

    }
    ?>


<?php
    require "components/footer.php";
?>