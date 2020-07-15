<!DOCTYPE html>
<html lang="en">
    <title>BLOG PAGE | Biofeedback South Africa</title>
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
            <h1>Blog</h1>
        </div>
        <h4>Click on a article to read</h4>
    </div>


        <div>
        <?php
                try {
                    $stmt = $conn->prepare("SELECT * FROM `biofefqs_maindata`.`articles`ORDER BY `id`"); 
                    
                    $stmt->execute();
                    $results = array();
                    if ($stmt->execute()) {
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $results[] = $row;
                        }
                    }
                    for ($i = $stmt->rowcount()-1; $i >= 0;$i--) {
                        if ($results[$i]["permission"] == 1) {
                            if ($_SESSION["member"] > 1) {
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
                                        // echo '<a class="delBut" onclick="return confirm(`Are you sure you want to delete this?`);" href="PHP/del_article.php?id=',$results[$i]["id"],'">DELETE</a><br><br>';
                                        echo '<div style="display:flex;"><a class="delBut" onclick="return confirm(`Are you sure you want to delete this?`);" href="PHP/del_article.php?id=',$results[$i]["id"],'">DELETE</a><br>';
                                        echo '<a style="margin-left:20px;" class="editBut" onclick="return confirm(`Are you sure you want to edit this?`);" href="edit.php?id=',$results[$i]["id"],'&page=blog">EDIT</a><br></div>';

                                    }
                                echo "<h1>",$results[$i]["title"],"</h1>";
                                echo "<p>Posted on: ",substr($results[$i]["cr_date"], 0, 10), "  ", $results[$i]["author"],"</p>";
                                echo $results[$i]["body"],'</div>';
                                
                            }
                        } else if ($results[$i]["permission"] == 0) {
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
                                        // echo '<a class="delBut" onclick="return confirm(`Are you sure you want to delete this?`);" href="PHP/del_article.php?id=',$results[$i]["id"],'">DELETE</a><br><br>';
                                        echo '<div style="display:flex;"><a class="delBut" onclick="return confirm(`Are you sure you want to delete this?`);" href="PHP/del_article.php?id=',$results[$i]["id"],'">DELETE</a><br>';
                                        echo '<a style="margin-left:20px;" class="editBut" onclick="return confirm(`Are you sure you want to edit this?`);" href="edit.php?id=',$results[$i]["id"],'&page=blog">EDIT</a><br></div>';

                                    }
                                    echo "<h1>",$results[$i]["title"],"</h1>";
                                echo "<p>Posted on: ",substr($results[$i]["cr_date"], 0, 10), "  ", $results[$i]["author"],"</p>";
                                echo $results[$i]["body"],'</div>';
                                
                        } else if ($results[$i]["permission"] == 2) {
                            if ($_SESSION["member"] > 1) {
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
                                        // echo '<a class="delBut" onclick="return confirm(`Are you sure you want to delete this?`);" href="PHP/del_article.php?id=',$results[$i]["id"],'">DELETE</a><br><br>';
                                        echo '<div style="display:flex;"><a class="delBut" onclick="return confirm(`Are you sure you want to delete this?`);" href="PHP/del_article.php?id=',$results[$i]["id"],'">DELETE</a><br>';
                                        echo '<a style="margin-left:20px;" class="editBut" onclick="return confirm(`Are you sure you want to edit this?`);" href="edit.php?id=',$results[$i]["id"],'&page=blog">EDIT</a><br></div>';

                                    }
                                    echo "<h1>",$results[$i]["title"],"</h1>";
                                echo "<p>Posted on: ",substr($results[$i]["cr_date"], 0, 10), "  ", $results[$i]["author"],"</p>";
                                echo $results[$i]["body"],'</div>';
                                
                            } else {
                                echo '<script>function functionSa() { swal("Members Only", "Register to become a member or sign in if you already are to view this", "warning");}</script>';
                                echo '<div onclick="functionSa()" class="flipG" id="flip',$results[$i]["id"],'">';
                                echo '<p style="padding: 1vh 1vh;">',$results[$i]["title"],'</p>';
                                echo '</div>';
                                }
                            }
                        }
                    } catch(PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }     
                ?>
        </div>


<?php
    require "components/footer.php";
?>