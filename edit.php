<!DOCTYPE html>
<html lang="en">
    <title>EDIT PAGE | Biofeedback South Africa</title>
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

    $id = $_GET["id"];
    $page = $_GET["page"];
?>
<form  method="POST" id="artA" action="PHP/update_post.php" style="text-align:center;">

<?php
    if ($page == "publications") {
    try {
        $stmt = $conn->prepare("SELECT * FROM `biofefqs_maindata`.`publications` WHERE `id` = :a"); 
        $stmt->execute([":a" => $id]);
        $results = array();
        if ($stmt->execute()) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $results[] = $row;
            }
        }
        for ($i = $stmt->rowcount()-1; $i >= 0;$i--) {
            $text = str_replace("'","`",$results[$i]["body"]);
            echo "<input type='hidden' id='prevA' value='". $text."'>";       
            echo "<input type='hidden' name='id' value='". $id."'>";  
            echo "<input type='hidden' name='page' value='". $page."'>";      
            echo "<input type='text' name='q' id='prevQ' value='". $results[0]["title"]."'>";                            
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }     
} else if ($page == "blog") {
    try {
        $stmt = $conn->prepare("SELECT * FROM `biofefqs_maindata`.`articles` WHERE `id` = :a"); 
        $stmt->execute([":a" => $id]);
        $results = array();
        if ($stmt->execute()) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $results[] = $row;
            }
        }
        for ($i = $stmt->rowcount()-1; $i >= 0;$i--) {
            $text = str_replace("'","`",$results[$i]["body"]);
            echo "<input type='hidden' id='prevA' value='". $text."'>";       
            echo "<input type='hidden' name='id' value='". $id."'>";  
            echo "<input type='hidden' name='page' value='". $page."'>";      
            echo "<input type='text' name='q' id='prevQ' value='". $results[0]["title"]."'>";   
                     
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }     
}else if ($page == "events") {
    try {
        $stmt = $conn->prepare("SELECT * FROM `biofefqs_maindata`.`events` WHERE `id` = :a"); 
        $stmt->execute([":a" => $id]);
        $results = array();
        if ($stmt->execute()) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $results[] = $row;
            }
        }
        for ($i = $stmt->rowcount()-1; $i >= 0;$i--) {
            $text = str_replace("'","`",$results[$i]["description"]);
            echo "<input type='hidden' id='prevA' value='". $text."'>";       
            echo "<input type='hidden' name='id' value='". $id."'>";  
            echo "<input type='hidden' name='page' value='". $page."'>";   
            ECHO "<P>Title</p>";
            echo "<input type='text' name='q' id='prevQ' value='". $results[0]["title"]."'>";   
            ECHO "<P>Location</p>";
            echo "<input type='text' name='loc' value='".$results[0]["location"]."'>";                            
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }     
} else if ($page == "main") {
    try {
        $stmt = $conn->prepare("SELECT * FROM `biofefqs_maindata`.`main` WHERE `id` = :a"); 
        $stmt->execute([":a" => $id]);
        $results = array();
        if ($stmt->execute()) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $results[] = $row;
            }
        }
        for ($i = $stmt->rowcount()-1; $i >= 0;$i--) {
            $text = str_replace("'","`",$results[$i]["body"]);
            echo "<input type='hidden' id='prevA' value='". $text."'>";       
            echo "<input type='hidden' name='id' value='". $id."'>";  
            echo "<input type='hidden' name='page' value='". $page."'>";      
            echo "<input type='text' name='q' id='prevQ' value='". $results[0]["title"]."'>";                            
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }     
}
?>

            <br>
            <div>
                <link href="https://cdn.quilljs.com/1.1.6/quill.snow.css" rel="stylesheet">
                <div style="height:auto;" id="editorA"></div>
                <script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
                <script>
                    var prevA = document.getElementById("prevA").value;
                    var quill = new Quill('#editorA', {
                      modules: {
                        toolbar: [
                          [{ header: [1, 2, false] }],
                          ['bold', 'italic', 'underline', 'link'],
                          ['image', 'code-block', 'video'],
                          [{ list: 'ordered' }, { list: 'bullet' }],
                          [{ align: '' }, { align: 'center' }, { align: 'right' }, { align: 'justify' }],
                          [{ 'indent': '-1'}, { 'indent': '+1' }],
                          [{ 'direction': 'rtl' }]
                        ]
                      },
                      placeholder: "type here...",
                      theme: 'snow',  // or 'bubble'
                    });
                    quill.clipboard.dangerouslyPasteHTML(prevA);

                    setInterval(function() {
                        var myEditor1 = document.querySelector('#editor');
                        var html2 = myEditor1.children[0].innerHTML;
                        if (html2.length > 90000000) {
                            document.getElementById("sizeCheckx").style.display = "block";
                        } else {
                            document.getElementById("sizeCheckx").style.display = "none";
                        }                              
                    }, 1000);

                    $("#artA").on("submit",function(){
                        var myEditor1 = document.querySelector('#editorA');
                        var html2 = myEditor1.children[0].innerHTML;

                        if (html2.length > 90000000) {
                            alert("The files size is too big. Reduce Image size/quality");
                        } else {
                        $("#desc1A").val(html2);
                    }
                   })
                </script>
            <br>
            <input type="hidden" name="a" id="desc1A">
            <input onclick="return confirm(`Are you sure you want to edit this?`);" class="subBut" style="width:85%;" type="submit">
            <br><br>
            
</form>

<?php
    require "components/footer.php";
?>