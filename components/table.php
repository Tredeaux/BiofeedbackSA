<div style="height:800px;overflow-y:scroll;">
    <div style="display:block;" id="tbName">

        <?php
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
                $tablecontent = '';
                echo '<table id="t01">
                <th class="tableHeader" style="cursor:pointer;" id="btnId" onclick="orderId()">Id</th>
                <th class="tableHeader" style="cursor:pointer;" id="btnName" onclick="orderName()">Name</th>
                <th class="tableHeader" style="cursor:pointer;" id="btnSurname" onclick="orderSurname()">Surname</th>
                <th class="tableHeader" style="cursor:pointer;" id="btnEmail" onclick="orderEmail()">Email</th>
                <th class="tableHeader" style="cursor:pointer;" id="btnBoard" onclick="orderBoard()">Board</th>
                <th class="tableHeader" style="cursor:pointer;" id="btnAdmin" onclick="orderAdmin()">Admin</th>
                <th class="tableHeader" style="cursor:pointer;" id="btnPractitioner" onclick="orderPractitioner()">Display</th>
                <th class="tableHeader">BCIA</th>
                <th class="tableHeader">Member</th>
                </tr>
                ';
                for ($i = 0; $i < $stmt->rowcount(); $i++) {
                    $tablecontent = $tablecontent.'<tr>'.'<td>'.$results[$i]["id"].'</td>'
                    .'<td>'.$results[$i]["name"].'</td>'
                    .'<td>'.$results[$i]["surname"].'</td>'
                    .'<td>'.$results[$i]["email"].'</td>';

                    if ($results[$i]["board"] == 1) {
                        $tablecontent = $tablecontent.'<td><a href="PHP/set_board.php?id='.$results[$i]["id"].'"><i style="color:lime;"class="fa fa-circle">  On</i></a></td>';
                    } else {
                        $tablecontent = $tablecontent.'<td><a href="PHP/set_board.php?id='.$results[$i]["id"].'"><i style="color:red;"class="fa fa-circle">  Off</i></a></td>';
                    }

                    if ($results[$i]["admin"] == 1) {
                        $tablecontent = $tablecontent.'<td><a href="PHP/set_admin.php?id='.$results[$i]["id"].'"><i style="color:lime;"class="fa fa-circle">  On</i></a></td>';
                    } else {
                        $tablecontent = $tablecontent.'<td><a href="PHP/set_admin.php?id='.$results[$i]["id"].'"><i style="color:red;"class="fa fa-circle">  Off</i></a></td>';
                    }

                    if ($results[$i]["practitioner"] == 1) {
                        $tablecontent = $tablecontent.'<td><a href="PHP/set_display.php?id='.$results[$i]["id"].'"><i style="color:lime;"class="fa fa-circle">  On</i></a></td>';
                    } else {
                        $tablecontent = $tablecontent.'<td><a href="PHP/set_display.php?id='.$results[$i]["id"].'"><i style="color:red;"class="fa fa-circle">  Off</i></a></td>';
                    }

                    if ($results[$i]["certified"] == 1) {
                        $tablecontent = $tablecontent.'<td><a href="PHP/set_bcia.php?id='.$results[$i]["id"].'"><i style="color:lime;"class="fa fa-circle">  On</i></a></td>';
                    } else {
                        $tablecontent = $tablecontent.'<td><a href="PHP/set_bcia.php?id='.$results[$i]["id"].'"><i style="color:red;"class="fa fa-circle">  Off</i></a></td>';
                    }


                    if ($results[$i]["member"] == 1 || $results[$i]["member"] == 0) {
                        $tablecontent = $tablecontent.'<td>
                        <button style="background-color:#333333;"><a style="background-color:#333333;color:white;" href="PHP/set_no.php?id='.$results[$i]["id"].'"> No </a></button>
                        <button><a href="PHP/set_affiliate.php?id='.$results[$i]["id"].'"> Affiliate</a></button>
                        <button><a href="PHP/set_student.php?id='.$results[$i]["id"].'"> Student</a></button>
                        <button><a href="PHP/set_associate.php?id='.$results[$i]["id"].'"> Associate</a></button>
                        <button><a href="PHP/set_full.php?id='.$results[$i]["id"].'"> Full</a></button></td>';
                    } else if ($results[$i]["member"] == 2){
                        $tablecontent = $tablecontent.'<td>
                        <button><a href="PHP/set_no.php?id='.$results[$i]["id"].'"> No </a></button>
                        <button style="background-color:#333333;"><a style="background-color:#333333;color:white;" href="PHP/set_affiliate.php?id='.$results[$i]["id"].'"> Affiliate</a></button>
                        <button><a href="PHP/set_student.php?id='.$results[$i]["id"].'"> Student</a></button>
                        <button><a href="PHP/set_associate.php?id='.$results[$i]["id"].'"> Associate</a></button>
                        <button><a href="PHP/set_full.php?id='.$results[$i]["id"].'"> Full</a></button></td>';
                    }
                    else if ($results[$i]["member"] == 3){
                        $tablecontent = $tablecontent.'<td>
                        <button><a href="PHP/set_no.php?id='.$results[$i]["id"].'"> No </a></button>
                        <button><a href="PHP/set_affiliate.php?id='.$results[$i]["id"].'"> Affiliate</a></button>
                        <button style="background-color:#333333;"><a style="background-color:#333333;color:white;" href="PHP/set_student.php?id='.$results[$i]["id"].'"> Student</a></button>
                        <button><a href="PHP/set_associate.php?id='.$results[$i]["id"].'"> Associate</a></button>
                        <button><a href="PHP/set_full.php?id='.$results[$i]["id"].'"> Full</a></button></td>';
                    }
                    else if ($results[$i]["member"] == 4){
                        $tablecontent = $tablecontent.'<td>
                        <button><a href="PHP/set_no.php?id='.$results[$i]["id"].'"> No </a></button>
                        <button><a href="PHP/set_affiliate.php?id='.$results[$i]["id"].'"> Affiliate</a></button>
                        <button><a href="PHP/set_student.php?id='.$results[$i]["id"].'"> Student</a></button>
                        <button style="background-color:#333333;"><a style="background-color:#333333;color:white;" href="PHP/set_associate.php?id='.$results[$i]["id"].'"> Associate</a></button>
                        <button><a href="PHP/set_full.php?id='.$results[$i]["id"].'"> Full</a></button></td>';
                    }
                    else if ($results[$i]["member"] == 5){
                        $tablecontent = $tablecontent.'<td>
                        <button><a href="PHP/set_no.php?id='.$results[$i]["id"].'"> No </a></button>
                        <button><a href="PHP/set_affiliate.php?id='.$results[$i]["id"].'"> Affiliate</a></button>
                        <button><a href="PHP/set_student.php?id='.$results[$i]["id"].'"> Student</a></button>
                        <button><a href="PHP/set_associate.php?id='.$results[$i]["id"].'"> Associate</a></button>
                        <button style="background-color:#333333;"><a style="background-color:#333333;color:white;" href="PHP/set_full.php?id='.$results[$i]["id"].'"> Full</a></button></td>';
                    }

                }
                echo $tablecontent;
                echo '</tr></table>';
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        ?>

    </div>

    <div style="display:none;" id="tbSurname">

        <?php
            try {
                $c1 = "surname";
                $stmt = $conn->prepare("SELECT * FROM `biofefqs_maindata`.`userdata` ORDER BY $c1"); 
                $stmt->execute();
                $results = array();
                if ($stmt->execute()) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $results[] = $row;
                    }
                }
                $tablecontent = '';
                echo '<table id="t01">
                <th style="cursor:pointer;" id="btnId" onclick="orderId()">Id</th>
                <th style="cursor:pointer;" id="btnName" onclick="orderName()">Name</th>
                <th style="cursor:pointer;" id="btnSurname" onclick="orderSurname()">Surname</th>
                <th style="cursor:pointer;" id="btnEmail" onclick="orderEmail()">Email</th>
                <th style="cursor:pointer;" id="btnBoard" onclick="orderBoard()">Board</th>
                <th style="cursor:pointer;" id="btnAdmin" onclick="orderAdmin()">Admin</th>
                <th style="cursor:pointer;" id="btnPractitioner" onclick="orderPractitioner()">Display</th>
                <th>BCIA</th>
                <th>Member</th>
                </tr>
                ';
                for ($i = 0; $i < $stmt->rowcount(); $i++) {
                    $tablecontent = $tablecontent.'<tr>'.'<td>'.$results[$i]["id"].'</td>'
                    .'<td>'.$results[$i]["name"].'</td>'
                    .'<td>'.$results[$i]["surname"].'</td>'
                    .'<td>'.$results[$i]["email"].'</td>';

                    if ($results[$i]["board"] == 1) {
                        $tablecontent = $tablecontent.'<td><a href="PHP/set_board.php?id='.$results[$i]["id"].'"><i style="color:lime;"class="fa fa-circle">  On</i></a></td>';
                    } else {
                        $tablecontent = $tablecontent.'<td><a href="PHP/set_board.php?id='.$results[$i]["id"].'"><i style="color:red;"class="fa fa-circle">  Off</i></a></td>';
                    }

                    if ($results[$i]["admin"] == 1) {
                        $tablecontent = $tablecontent.'<td><a href="PHP/set_admin.php?id='.$results[$i]["id"].'"><i style="color:lime;"class="fa fa-circle">  On</i></a></td>';
                    } else {
                        $tablecontent = $tablecontent.'<td><a href="PHP/set_admin.php?id='.$results[$i]["id"].'"><i style="color:red;"class="fa fa-circle">  Off</i></a></td>';
                    }

                    if ($results[$i]["practitioner"] == 1) {
                        $tablecontent = $tablecontent.'<td><a href="PHP/set_display.php?id='.$results[$i]["id"].'"><i style="color:lime;"class="fa fa-circle">  On</i></a></td>';
                    } else {
                        $tablecontent = $tablecontent.('<td><a href="PHP/set_display.php?id='.$results[$i]["id"].'"><i style="color:red;"class="fa fa-circle">  Off</i></a></td>');
                    }

                    if ($results[$i]["certified"] == 1) {
                        $tablecontent = $tablecontent.'<td><a href="PHP/set_bcia.php?id='.$results[$i]["id"].'"><i style="color:lime;"class="fa fa-circle">  On</i></a></td>';
                    } else {
                        $tablecontent = $tablecontent.'<td><a href="PHP/set_bcia.php?id='.$results[$i]["id"].'"><i style="color:red;"class="fa fa-circle">  Off</i></a></td>';
                    }

                    if ($results[$i]["member"] == 1 || $results[$i]["member"] == 0) {
                        $tablecontent = $tablecontent.'<td>
                        <button style="background-color:#333333;"><a style="background-color:#333333;color:white;" href="PHP/set_no.php?id='.$results[$i]["id"].'"> No </a></button>
                        <button><a href="PHP/set_affiliate.php?id='.$results[$i]["id"].'"> Affiliate</a></button>
                        <button><a href="PHP/set_student.php?id='.$results[$i]["id"].'"> Student</a></button>
                        <button><a href="PHP/set_associate.php?id='.$results[$i]["id"].'"> Associate</a></button>
                        <button><a href="PHP/set_full.php?id='.$results[$i]["id"].'"> Full</a></button></td>';
                    } else if ($results[$i]["member"] == 2){
                        $tablecontent = $tablecontent.'<td>
                        <button><a href="PHP/set_no.php?id='.$results[$i]["id"].'"> No </a></button>
                        <button style="background-color:#333333;"><a style="background-color:#333333;color:white;" href="PHP/set_affiliate.php?id='.$results[$i]["id"].'"> Affiliate</a></button>
                        <button><a href="PHP/set_student.php?id='.$results[$i]["id"].'"> Student</a></button>
                        <button><a href="PHP/set_associate.php?id='.$results[$i]["id"].'"> Associate</a></button>
                        <button><a href="PHP/set_full.php?id='.$results[$i]["id"].'"> Full</a></button></td>';
                    }
                    else if ($results[$i]["member"] == 3){
                        $tablecontent = $tablecontent.'<td>
                        <button><a href="PHP/set_no.php?id='.$results[$i]["id"].'"> No </a></button>
                        <button><a href="PHP/set_affiliate.php?id='.$results[$i]["id"].'"> Affiliate</a></button>
                        <button style="background-color:#333333;"><a style="background-color:#333333;color:white;" href="PHP/set_student.php?id='.$results[$i]["id"].'"> Student</a></button>
                        <button><a href="PHP/set_associate.php?id='.$results[$i]["id"].'"> Associate</a></button>
                        <button><a href="PHP/set_full.php?id='.$results[$i]["id"].'"> Full</a></button></td>';
                    }
                    else if ($results[$i]["member"] == 4){
                        $tablecontent = $tablecontent.'<td>
                        <button><a href="PHP/set_no.php?id='.$results[$i]["id"].'"> No </a></button>
                        <button><a href="PHP/set_affiliate.php?id='.$results[$i]["id"].'"> Affiliate</a></button>
                        <button><a href="PHP/set_student.php?id='.$results[$i]["id"].'"> Student</a></button>
                        <button style="background-color:#333333;"><a style="background-color:#333333;color:white;" href="PHP/set_associate.php?id='.$results[$i]["id"].'"> Associate</a></button>
                        <button><a href="PHP/set_full.php?id='.$results[$i]["id"].'"> Full</a></button></td>';
                    }
                    else if ($results[$i]["member"] == 5){
                        $tablecontent = $tablecontent.'<td>
                        <button><a href="PHP/set_no.php?id='.$results[$i]["id"].'"> No </a></button>
                        <button><a href="PHP/set_affiliate.php?id='.$results[$i]["id"].'"> Affiliate</a></button>
                        <button><a href="PHP/set_student.php?id='.$results[$i]["id"].'"> Student</a></button>
                        <button><a href="PHP/set_associate.php?id='.$results[$i]["id"].'"> Associate</a></button>
                        <button style="background-color:#333333;"><a style="background-color:#333333;color:white;" href="PHP/set_full.php?id='.$results[$i]["id"].'"> Full</a></button></td>';
                    }

                }
                echo $tablecontent;
                echo '</tr></table>';
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        ?>

    </div>

    <div style="display:none;" id="tbId">
        <?php
            try {
                $c1 = "id";
                $stmt = $conn->prepare("SELECT * FROM `biofefqs_maindata`.`userdata` ORDER BY $c1"); 
                $stmt->execute();
                $results = array();
                if ($stmt->execute()) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $results[] = $row;
                    }
                }
                $tablecontent = '';
                echo '<table id="t01">
                <th style="cursor:pointer;" id="btnId" onclick="orderId()">Id</th>
                <th style="cursor:pointer;" id="btnName" onclick="orderName()">Name</th>
                <th style="cursor:pointer;" id="btnSurname" onclick="orderSurname()">Surname</th>
                <th style="cursor:pointer;" id="btnEmail" onclick="orderEmail()">Email</th>
                <th style="cursor:pointer;" id="btnBoard" onclick="orderBoard()">Board</th>
                <th style="cursor:pointer;" id="btnAdmin" onclick="orderAdmin()">Admin</th>
                <th style="cursor:pointer;" id="btnPractitioner" onclick="orderPractitioner()">Display</th>
                <th>BCIA</th>
                <th>Member</th>
                </tr>
                ';
                for ($i = 0; $i < $stmt->rowcount(); $i++) {
                    $tablecontent = $tablecontent.'<tr>'.'<td>'.$results[$i]["id"].'</td>'
                    .'<td>'.$results[$i]["name"].'</td>'
                    .'<td>'.$results[$i]["surname"].'</td>'
                    .'<td>'.$results[$i]["email"].'</td>';
                
                    if ($results[$i]["board"] == 1) {
                        $tablecontent = $tablecontent.'<td><a href="PHP/set_board.php?id='.$results[$i]["id"].'"><i style="color:lime;"class="fa fa-circle">  On</i></a></td>';
                    } else {
                        $tablecontent = $tablecontent.'<td><a href="PHP/set_board.php?id='.$results[$i]["id"].'"><i style="color:red;"class="fa fa-circle">  Off</i></a></td>';
                    }
                
                    if ($results[$i]["admin"] == 1) {
                        $tablecontent = $tablecontent.'<td><a href="PHP/set_admin.php?id='.$results[$i]["id"].'"><i style="color:lime;"class="fa fa-circle">  On</i></a></td>';
                    } else {
                        $tablecontent = $tablecontent.'<td><a href="PHP/set_admin.php?id='.$results[$i]["id"].'"><i style="color:red;"class="fa fa-circle">  Off</i></a></td>';
                    }
                
                    if ($results[$i]["practitioner"] == 1) {
                        $tablecontent = $tablecontent.'<td><a href="PHP/set_display.php?id='.$results[$i]["id"].'"><i style="color:lime;"class="fa fa-circle">  On</i></a></td>';
                    } else {
                        $tablecontent = $tablecontent.('<td><a href="PHP/set_display.php?id='.$results[$i]["id"].'"><i style="color:red;"class="fa fa-circle">  Off</i></a></td>');
                    }
                
                    if ($results[$i]["certified"] == 1) {
                        $tablecontent = $tablecontent.'<td><a href="PHP/set_bcia.php?id='.$results[$i]["id"].'"><i style="color:lime;"class="fa fa-circle">  On</i></a></td>';
                    } else {
                        $tablecontent = $tablecontent.'<td><a href="PHP/set_bcia.php?id='.$results[$i]["id"].'"><i style="color:red;"class="fa fa-circle">  Off</i></a></td>';
                    }

                    if ($results[$i]["member"] == 1 || $results[$i]["member"] == 0) {
                        $tablecontent = $tablecontent.'<td>
                        <button style="background-color:#333333;"><a style="background-color:#333333;color:white;" href="PHP/set_no.php?id='.$results[$i]["id"].'"> No </a></button>
                        <button><a href="PHP/set_affiliate.php?id='.$results[$i]["id"].'"> Affiliate</a></button>
                        <button><a href="PHP/set_student.php?id='.$results[$i]["id"].'"> Student</a></button>
                        <button><a href="PHP/set_associate.php?id='.$results[$i]["id"].'"> Associate</a></button>
                        <button><a href="PHP/set_full.php?id='.$results[$i]["id"].'"> Full</a></button></td>';
                    } else if ($results[$i]["member"] == 2){
                        $tablecontent = $tablecontent.'<td>
                        <button><a href="PHP/set_no.php?id='.$results[$i]["id"].'"> No </a></button>
                        <button style="background-color:#333333;"><a style="background-color:#333333;color:white;" href="PHP/set_affiliate.php?id='.$results[$i]["id"].'"> Affiliate</a></button>
                        <button><a href="PHP/set_student.php?id='.$results[$i]["id"].'"> Student</a></button>
                        <button><a href="PHP/set_associate.php?id='.$results[$i]["id"].'"> Associate</a></button>
                        <button><a href="PHP/set_full.php?id='.$results[$i]["id"].'"> Full</a></button></td>';
                    }
                    else if ($results[$i]["member"] == 3){
                        $tablecontent = $tablecontent.'<td>
                        <button><a href="PHP/set_no.php?id='.$results[$i]["id"].'"> No </a></button>
                        <button><a href="PHP/set_affiliate.php?id='.$results[$i]["id"].'"> Affiliate</a></button>
                        <button style="background-color:#333333;"><a style="background-color:#333333;color:white;" href="PHP/set_student.php?id='.$results[$i]["id"].'"> Student</a></button>
                        <button><a href="PHP/set_associate.php?id='.$results[$i]["id"].'"> Associate</a></button>
                        <button><a href="PHP/set_full.php?id='.$results[$i]["id"].'"> Full</a></button></td>';
                    }
                    else if ($results[$i]["member"] == 4){
                        $tablecontent = $tablecontent.'<td>
                        <button><a href="PHP/set_no.php?id='.$results[$i]["id"].'"> No </a></button>
                        <button><a href="PHP/set_affiliate.php?id='.$results[$i]["id"].'"> Affiliate</a></button>
                        <button><a href="PHP/set_student.php?id='.$results[$i]["id"].'"> Student</a></button>
                        <button style="background-color:#333333;"><a style="background-color:#333333;color:white;" href="PHP/set_associate.php?id='.$results[$i]["id"].'"> Associate</a></button>
                        <button><a href="PHP/set_full.php?id='.$results[$i]["id"].'"> Full</a></button></td>';
                    }
                    else if ($results[$i]["member"] == 5){
                        $tablecontent = $tablecontent.'<td>
                        <button><a href="PHP/set_no.php?id='.$results[$i]["id"].'"> No </a></button>
                        <button><a href="PHP/set_affiliate.php?id='.$results[$i]["id"].'"> Affiliate</a></button>
                        <button><a href="PHP/set_student.php?id='.$results[$i]["id"].'"> Student</a></button>
                        <button><a href="PHP/set_associate.php?id='.$results[$i]["id"].'"> Associate</a></button>
                        <button style="background-color:#333333;"><a style="background-color:#333333;color:white;" href="PHP/set_full.php?id='.$results[$i]["id"].'"> Full</a></button></td>';
                    }

                }
                echo $tablecontent;
                echo '</tr></table>';
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        ?>
    </div>

    <div style="display:none;" id="tbPractitioner">


        <?php
           try {
            $c1 = "practitioner";
            $stmt = $conn->prepare("SELECT * FROM `biofefqs_maindata`.`userdata` ORDER BY $c1 DESC"); 
            $stmt->execute();
            $results = array();
            if ($stmt->execute()) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $results[] = $row;
                }
            }
            $tablecontent = '';
            echo '<table id="t01">
            <th style="cursor:pointer;" id="btnId" onclick="orderId()">Id</th>
                <th style="cursor:pointer;" id="btnName" onclick="orderName()">Name</th>
                <th style="cursor:pointer;" id="btnSurname" onclick="orderSurname()">Surname</th>
                <th style="cursor:pointer;" id="btnEmail" onclick="orderEmail()">Email</th>
                <th style="cursor:pointer;" id="btnBoard" onclick="orderBoard()">Board</th>
                <th style="cursor:pointer;" id="btnAdmin" onclick="orderAdmin()">Admin</th>
                <th style="cursor:pointer;" id="btnPractitioner" onclick="orderPractitioner()">Display</th>
                <th>BCIA</th>
                <th>Member</th>
            </tr>
            ';
            for ($i = 0; $i < $stmt->rowcount(); $i++) {
                $tablecontent = $tablecontent.'<tr>'.'<td>'.$results[$i]["id"].'</td>'
                .'<td>'.$results[$i]["name"].'</td>'
                .'<td>'.$results[$i]["surname"].'</td>'
                .'<td>'.$results[$i]["email"].'</td>';  

                if ($results[$i]["board"] == 1) {
                    $tablecontent = $tablecontent.'<td><a href="PHP/set_board.php?id='.$results[$i]["id"].'"><i style="color:lime;"class="fa fa-circle">  On</i></a></td>';
                } else {
                    $tablecontent = $tablecontent.'<td><a href="PHP/set_board.php?id='.$results[$i]["id"].'"><i style="color:red;"class="fa fa-circle">  Off</i></a></td>';
                }   

                if ($results[$i]["admin"] == 1) {
                    $tablecontent = $tablecontent.'<td><a href="PHP/set_admin.php?id='.$results[$i]["id"].'"><i style="color:lime;"class="fa fa-circle">  On</i></a></td>';
                } else {
                    $tablecontent = $tablecontent.'<td><a href="PHP/set_admin.php?id='.$results[$i]["id"].'"><i style="color:red;"class="fa fa-circle">  Off</i></a></td>';
                }   

                if ($results[$i]["practitioner"] == 1) {
                    $tablecontent = $tablecontent.'<td><a href="PHP/set_display.php?id='.$results[$i]["id"].'"><i style="color:lime;"class="fa fa-circle">  On</i></a></td>';
                } else {
                    $tablecontent = $tablecontent.('<td><a href="PHP/set_display.php?id='.$results[$i]["id"].'"><i style="color:red;"class="fa fa-circle">  Off</i></a></td>');
                }   

                if ($results[$i]["certified"] == 1) {
                    $tablecontent = $tablecontent.'<td><a href="PHP/set_bcia.php?id='.$results[$i]["id"].'"><i style="color:lime;"class="fa fa-circle">  On</i></a></td>';
                } else {
                    $tablecontent = $tablecontent.'<td><a href="PHP/set_bcia.php?id='.$results[$i]["id"].'"><i style="color:red;"class="fa fa-circle">  Off</i></a></td>';
                }

                if ($results[$i]["member"] == 1 || $results[$i]["member"] == 0) {
                    $tablecontent = $tablecontent.'<td>
                    <button style="background-color:#333333;"><a style="background-color:#333333;color:white;" href="PHP/set_no.php?id='.$results[$i]["id"].'"> No </a></button>
                    <button><a href="PHP/set_affiliate.php?id='.$results[$i]["id"].'"> Affiliate</a></button>
                    <button><a href="PHP/set_student.php?id='.$results[$i]["id"].'"> Student</a></button>
                    <button><a href="PHP/set_associate.php?id='.$results[$i]["id"].'"> Associate</a></button>
                    <button><a href="PHP/set_full.php?id='.$results[$i]["id"].'"> Full</a></button></td>';
                } else if ($results[$i]["member"] == 2){
                    $tablecontent = $tablecontent.'<td>
                    <button><a href="PHP/set_no.php?id='.$results[$i]["id"].'"> No </a></button>
                    <button style="background-color:#333333;"><a style="background-color:#333333;color:white;" href="PHP/set_affiliate.php?id='.$results[$i]["id"].'"> Affiliate</a></button>
                    <button><a href="PHP/set_student.php?id='.$results[$i]["id"].'"> Student</a></button>
                    <button><a href="PHP/set_associate.php?id='.$results[$i]["id"].'"> Associate</a></button>
                    <button><a href="PHP/set_full.php?id='.$results[$i]["id"].'"> Full</a></button></td>';
                }
                else if ($results[$i]["member"] == 3){
                    $tablecontent = $tablecontent.'<td>
                    <button><a href="PHP/set_no.php?id='.$results[$i]["id"].'"> No </a></button>
                    <button><a href="PHP/set_affiliate.php?id='.$results[$i]["id"].'"> Affiliate</a></button>
                    <button style="background-color:#333333;"><a style="background-color:#333333;color:white;" href="PHP/set_student.php?id='.$results[$i]["id"].'"> Student</a></button>
                    <button><a href="PHP/set_associate.php?id='.$results[$i]["id"].'"> Associate</a></button>
                    <button><a href="PHP/set_full.php?id='.$results[$i]["id"].'"> Full</a></button></td>';
                }
                else if ($results[$i]["member"] == 4){
                    $tablecontent = $tablecontent.'<td>
                    <button><a href="PHP/set_no.php?id='.$results[$i]["id"].'"> No </a></button>
                    <button><a href="PHP/set_affiliate.php?id='.$results[$i]["id"].'"> Affiliate</a></button>
                    <button><a href="PHP/set_student.php?id='.$results[$i]["id"].'"> Student</a></button>
                    <button style="background-color:#333333;"><a style="background-color:#333333;color:white;" href="PHP/set_associate.php?id='.$results[$i]["id"].'"> Associate</a></button>
                    <button><a href="PHP/set_full.php?id='.$results[$i]["id"].'"> Full</a></button></td>';
                }
                else if ($results[$i]["member"] == 5){
                    $tablecontent = $tablecontent.'<td>
                    <button><a href="PHP/set_no.php?id='.$results[$i]["id"].'"> No </a></button>
                    <button><a href="PHP/set_affiliate.php?id='.$results[$i]["id"].'"> Affiliate</a></button>
                    <button><a href="PHP/set_student.php?id='.$results[$i]["id"].'"> Student</a></button>
                    <button><a href="PHP/set_associate.php?id='.$results[$i]["id"].'"> Associate</a></button>
                    <button style="background-color:#333333;"><a style="background-color:#333333;color:white;" href="PHP/set_full.php?id='.$results[$i]["id"].'"> Full</a></button></td>';
                }

            }
            echo $tablecontent;
            echo '</tr></table>';
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        ?>

    </div>

    <div style="display:none;" id="tbBoard">
        <?php
            try {
                $c1 = "board";
                $stmt = $conn->prepare("SELECT * FROM `biofefqs_maindata`.`userdata` ORDER BY $c1 DESC"); 
                $stmt->execute();
                $results = array();
                if ($stmt->execute()) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $results[] = $row;
                    }
                }
                $tablecontent = '';
                echo '<table id="t01">
                <th style="cursor:pointer;" id="btnId" onclick="orderId()">Id</th>
                <th style="cursor:pointer;" id="btnName" onclick="orderName()">Name</th>
                <th style="cursor:pointer;" id="btnSurname" onclick="orderSurname()">Surname</th>
                <th style="cursor:pointer;" id="btnEmail" onclick="orderEmail()">Email</th>
                <th style="cursor:pointer;" id="btnBoard" onclick="orderBoard()">Board</th>
                <th style="cursor:pointer;" id="btnAdmin" onclick="orderAdmin()">Admin</th>
                <th style="cursor:pointer;" id="btnPractitioner" onclick="orderPractitioner()">Display</th>
                <th>BCIA</th>
                <th>Member</th>
                </tr>
                ';
                for ($i = 0; $i < $stmt->rowcount(); $i++) {
                    $tablecontent = $tablecontent.'<tr>'.'<td>'.$results[$i]["id"].'</td>'
                    .'<td>'.$results[$i]["name"].'</td>'
                    .'<td>'.$results[$i]["surname"].'</td>'
                    .'<td>'.$results[$i]["email"].'</td>';

                    if ($results[$i]["board"] == 1) {
                        $tablecontent = $tablecontent.'<td><a href="PHP/set_board.php?id='.$results[$i]["id"].'"><i style="color:lime;"class="fa fa-circle">  On</i></a></td>';
                    } else {
                        $tablecontent = $tablecontent.'<td><a href="PHP/set_board.php?id='.$results[$i]["id"].'"><i style="color:red;"class="fa fa-circle">  Off</i></a></td>';
                    }

                    if ($results[$i]["admin"] == 1) {
                        $tablecontent = $tablecontent.'<td><a href="PHP/set_admin.php?id='.$results[$i]["id"].'"><i style="color:lime;"class="fa fa-circle">  On</i></a></td>';
                    } else {
                        $tablecontent = $tablecontent.'<td><a href="PHP/set_admin.php?id='.$results[$i]["id"].'"><i style="color:red;"class="fa fa-circle">  Off</i></a></td>';
                    }

                    if ($results[$i]["practitioner"] == 1) {
                        $tablecontent = $tablecontent.'<td><a href="PHP/set_display.php?id='.$results[$i]["id"].'"><i style="color:lime;"class="fa fa-circle">  On</i></a></td>';
                    } else {
                        $tablecontent = $tablecontent.('<td><a href="PHP/set_display.php?id='.$results[$i]["id"].'"><i style="color:red;"class="fa fa-circle">  Off</i></a></td>');
                    }

                    if ($results[$i]["certified"] == 1) {
                        $tablecontent = $tablecontent.'<td><a href="PHP/set_bcia.php?id='.$results[$i]["id"].'"><i style="color:lime;"class="fa fa-circle">  On</i></a></td>';
                    } else {
                        $tablecontent = $tablecontent.'<td><a href="PHP/set_bcia.php?id='.$results[$i]["id"].'"><i style="color:red;"class="fa fa-circle">  Off</i></a></td>';
                    }

                    if ($results[$i]["member"] == 1 || $results[$i]["member"] == 0) {
                        $tablecontent = $tablecontent.'<td>
                        <button style="background-color:#333333;"><a style="background-color:#333333;color:white;" href="PHP/set_no.php?id='.$results[$i]["id"].'"> No </a></button>
                        <button><a href="PHP/set_affiliate.php?id='.$results[$i]["id"].'"> Affiliate</a></button>
                        <button><a href="PHP/set_student.php?id='.$results[$i]["id"].'"> Student</a></button>
                        <button><a href="PHP/set_associate.php?id='.$results[$i]["id"].'"> Associate</a></button>
                        <button><a href="PHP/set_full.php?id='.$results[$i]["id"].'"> Full</a></button></td>';
                    } else if ($results[$i]["member"] == 2){
                        $tablecontent = $tablecontent.'<td>
                        <button><a href="PHP/set_no.php?id='.$results[$i]["id"].'"> No </a></button>
                        <button style="background-color:#333333;"><a style="background-color:#333333;color:white;" href="PHP/set_affiliate.php?id='.$results[$i]["id"].'"> Affiliate</a></button>
                        <button><a href="PHP/set_student.php?id='.$results[$i]["id"].'"> Student</a></button>
                        <button><a href="PHP/set_associate.php?id='.$results[$i]["id"].'"> Associate</a></button>
                        <button><a href="PHP/set_full.php?id='.$results[$i]["id"].'"> Full</a></button></td>';
                    }
                    else if ($results[$i]["member"] == 3){
                        $tablecontent = $tablecontent.'<td>
                        <button><a href="PHP/set_no.php?id='.$results[$i]["id"].'"> No </a></button>
                        <button><a href="PHP/set_affiliate.php?id='.$results[$i]["id"].'"> Affiliate</a></button>
                        <button style="background-color:#333333;"><a style="background-color:#333333;color:white;" href="PHP/set_student.php?id='.$results[$i]["id"].'"> Student</a></button>
                        <button><a href="PHP/set_associate.php?id='.$results[$i]["id"].'"> Associate</a></button>
                        <button><a href="PHP/set_full.php?id='.$results[$i]["id"].'"> Full</a></button></td>';
                    }
                    else if ($results[$i]["member"] == 4){
                        $tablecontent = $tablecontent.'<td>
                        <button><a href="PHP/set_no.php?id='.$results[$i]["id"].'"> No </a></button>
                        <button><a href="PHP/set_affiliate.php?id='.$results[$i]["id"].'"> Affiliate</a></button>
                        <button><a href="PHP/set_student.php?id='.$results[$i]["id"].'"> Student</a></button>
                        <button style="background-color:#333333;"><a style="background-color:#333333;color:white;" href="PHP/set_associate.php?id='.$results[$i]["id"].'"> Associate</a></button>
                        <button><a href="PHP/set_full.php?id='.$results[$i]["id"].'"> Full</a></button></td>';
                    }
                    else if ($results[$i]["member"] == 5){
                        $tablecontent = $tablecontent.'<td>
                        <button><a href="PHP/set_no.php?id='.$results[$i]["id"].'"> No </a></button>
                        <button><a href="PHP/set_affiliate.php?id='.$results[$i]["id"].'"> Affiliate</a></button>
                        <button><a href="PHP/set_student.php?id='.$results[$i]["id"].'"> Student</a></button>
                        <button><a href="PHP/set_associate.php?id='.$results[$i]["id"].'"> Associate</a></button>
                        <button style="background-color:#333333;"><a style="background-color:#333333;color:white;" href="PHP/set_full.php?id='.$results[$i]["id"].'"> Full</a></button></td>';
                    }

                }
                echo $tablecontent;
                echo '</tr></table>';
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        ?>
    </div>

    <div style="display:none;" id="tbAdmin">
        <?php
            try {
                $c1 = "admin";
                $stmt = $conn->prepare("SELECT * FROM `biofefqs_maindata`.`userdata` ORDER BY $c1 DESC"); 
                $stmt->execute();
                $results = array();
                if ($stmt->execute()) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $results[] = $row;
                    }
                }
                $tablecontent = '';
                echo '<table id="t01">
                <th style="cursor:pointer;" id="btnId" onclick="orderId()">Id</th>
                <th style="cursor:pointer;" id="btnName" onclick="orderName()">Name</th>
                <th style="cursor:pointer;" id="btnSurname" onclick="orderSurname()">Surname</th>
                <th style="cursor:pointer;" id="btnEmail" onclick="orderEmail()">Email</th>
                <th style="cursor:pointer;" id="btnBoard" onclick="orderBoard()">Board</th>
                <th style="cursor:pointer;" id="btnAdmin" onclick="orderAdmin()">Admin</th>
                <th style="cursor:pointer;" id="btnPractitioner" onclick="orderPractitioner()">Display</th>
                <th>BCIA</th>
                <th>Member</th>
                </tr>
                ';
                for ($i = 0; $i < $stmt->rowcount(); $i++) {
                    $tablecontent = $tablecontent.'<tr>'.'<td>'.$results[$i]["id"].'</td>'
                    .'<td>'.$results[$i]["name"].'</td>'
                    .'<td>'.$results[$i]["surname"].'</td>'
                    .'<td>'.$results[$i]["email"].'</td>';

                    if ($results[$i]["board"] == 1) {
                        $tablecontent = $tablecontent.'<td><a href="PHP/set_board.php?id='.$results[$i]["id"].'"><i style="color:lime;"class="fa fa-circle">  On</i></a></td>';
                    } else {
                        $tablecontent = $tablecontent.'<td><a href="PHP/set_board.php?id='.$results[$i]["id"].'"><i style="color:red;"class="fa fa-circle">  Off</i></a></td>';
                    }

                    if ($results[$i]["admin"] == 1) {
                        $tablecontent = $tablecontent.'<td><a href="PHP/set_admin.php?id='.$results[$i]["id"].'"><i style="color:lime;"class="fa fa-circle">  On</i></a></td>';
                    } else {
                        $tablecontent = $tablecontent.'<td><a href="PHP/set_admin.php?id='.$results[$i]["id"].'"><i style="color:red;"class="fa fa-circle">  Off</i></a></td>';
                    }

                    if ($results[$i]["practitioner"] == 1) {
                        $tablecontent = $tablecontent.'<td><a href="PHP/set_display.php?id='.$results[$i]["id"].'"><i style="color:lime;"class="fa fa-circle">  On</i></a></td>';
                    } else {
                        $tablecontent = $tablecontent.('<td><a href="PHP/set_display.php?id='.$results[$i]["id"].'"><i style="color:red;"class="fa fa-circle">  Off</i></a></td>');
                    }

                    if ($results[$i]["certified"] == 1) {
                        $tablecontent = $tablecontent.'<td><a href="PHP/set_bcia.php?id='.$results[$i]["id"].'"><i style="color:lime;"class="fa fa-circle">  On</i></a></td>';
                    } else {
                        $tablecontent = $tablecontent.'<td><a href="PHP/set_bcia.php?id='.$results[$i]["id"].'"><i style="color:red;"class="fa fa-circle">  Off</i></a></td>';
                    }

                    if ($results[$i]["member"] == 1 || $results[$i]["member"] == 0) {
                        $tablecontent = $tablecontent.'<td>
                        <button style="background-color:#333333;"><a style="background-color:#333333;color:white;" href="PHP/set_no.php?id='.$results[$i]["id"].'"> No </a></button>
                        <button><a href="PHP/set_affiliate.php?id='.$results[$i]["id"].'"> Affiliate</a></button>
                        <button><a href="PHP/set_student.php?id='.$results[$i]["id"].'"> Student</a></button>
                        <button><a href="PHP/set_associate.php?id='.$results[$i]["id"].'"> Associate</a></button>
                        <button><a href="PHP/set_full.php?id='.$results[$i]["id"].'"> Full</a></button></td>';
                    } else if ($results[$i]["member"] == 2){
                        $tablecontent = $tablecontent.'<td>
                        <button><a href="PHP/set_no.php?id='.$results[$i]["id"].'"> No </a></button>
                        <button style="background-color:#333333;"><a style="background-color:#333333;color:white;" href="PHP/set_affiliate.php?id='.$results[$i]["id"].'"> Affiliate</a></button>
                        <button><a href="PHP/set_student.php?id='.$results[$i]["id"].'"> Student</a></button>
                        <button><a href="PHP/set_associate.php?id='.$results[$i]["id"].'"> Associate</a></button>
                        <button><a href="PHP/set_full.php?id='.$results[$i]["id"].'"> Full</a></button></td>';
                    }
                    else if ($results[$i]["member"] == 3){
                        $tablecontent = $tablecontent.'<td>
                        <button><a href="PHP/set_no.php?id='.$results[$i]["id"].'"> No </a></button>
                        <button><a href="PHP/set_affiliate.php?id='.$results[$i]["id"].'"> Affiliate</a></button>
                        <button style="background-color:#333333;"><a style="background-color:#333333;color:white;" href="PHP/set_student.php?id='.$results[$i]["id"].'"> Student</a></button>
                        <button><a href="PHP/set_associate.php?id='.$results[$i]["id"].'"> Associate</a></button>
                        <button><a href="PHP/set_full.php?id='.$results[$i]["id"].'"> Full</a></button></td>';
                    }
                    else if ($results[$i]["member"] == 4){
                        $tablecontent = $tablecontent.'<td>
                        <button><a href="PHP/set_no.php?id='.$results[$i]["id"].'"> No </a></button>
                        <button><a href="PHP/set_affiliate.php?id='.$results[$i]["id"].'"> Affiliate</a></button>
                        <button><a href="PHP/set_student.php?id='.$results[$i]["id"].'"> Student</a></button>
                        <button style="background-color:#333333;"><a style="background-color:#333333;color:white;" href="PHP/set_associate.php?id='.$results[$i]["id"].'"> Associate</a></button>
                        <button><a href="PHP/set_full.php?id='.$results[$i]["id"].'"> Full</a></button></td>';
                    }
                    else if ($results[$i]["member"] == 5){
                        $tablecontent = $tablecontent.'<td>
                        <button><a href="PHP/set_no.php?id='.$results[$i]["id"].'"> No </a></button>
                        <button><a href="PHP/set_affiliate.php?id='.$results[$i]["id"].'"> Affiliate</a></button>
                        <button><a href="PHP/set_student.php?id='.$results[$i]["id"].'"> Student</a></button>
                        <button><a href="PHP/set_associate.php?id='.$results[$i]["id"].'"> Associate</a></button>
                        <button style="background-color:#333333;"><a style="background-color:#333333;color:white;" href="PHP/set_full.php?id='.$results[$i]["id"].'"> Full</a></button></td>';
                    }

                }
                echo $tablecontent;
                echo '</tr></table>';
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        ?>
    </div>

    <div style="display:none;" id="tbEmail">
        <?php
            try {
                $c1 = "email";
                $stmt = $conn->prepare("SELECT * FROM `biofefqs_maindata`.`userdata` ORDER BY $c1"); 
                $stmt->execute();
                $results = array();
                if ($stmt->execute()) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $results[] = $row;
                    }
                }
                $tablecontent = '';
                echo '<table id="t01">
                <th style="cursor:pointer;" id="btnId" onclick="orderId()">Id</th>
                <th style="cursor:pointer;" id="btnName" onclick="orderName()">Name</th>
                <th style="cursor:pointer;" id="btnSurname" onclick="orderSurname()">Surname</th>
                <th style="cursor:pointer;" id="btnEmail" onclick="orderEmail()">Email</th>
                <th style="cursor:pointer;" id="btnBoard" onclick="orderBoard()">Board</th>
                <th style="cursor:pointer;" id="btnAdmin" onclick="orderAdmin()">Admin</th>
                <th style="cursor:pointer;" id="btnPractitioner" onclick="orderPractitioner()">Display</th>
                <th>BCIA</th>
                <th>Member</th>
                </tr>
                ';
                for ($i = 0; $i < $stmt->rowcount(); $i++) {
                    $tablecontent = $tablecontent.'<tr>'.'<td>'.$results[$i]["id"].'</td>'
                    .'<td>'.$results[$i]["name"].'</td>'
                    .'<td>'.$results[$i]["surname"].'</td>'
                    .'<td>'.$results[$i]["email"].'</td>';

                    if ($results[$i]["board"] == 1) {
                        $tablecontent = $tablecontent.'<td><a href="PHP/set_board.php?id='.$results[$i]["id"].'"><i style="color:lime;"class="fa fa-circle">  On</i></a></td>';
                    } else {
                        $tablecontent = $tablecontent.'<td><a href="PHP/set_board.php?id='.$results[$i]["id"].'"><i style="color:red;"class="fa fa-circle">  Off</i></a></td>';
                    }

                    if ($results[$i]["admin"] == 1) {
                        $tablecontent = $tablecontent.'<td><a href="PHP/set_admin.php?id='.$results[$i]["id"].'"><i style="color:lime;"class="fa fa-circle">  On</i></a></td>';
                    } else {
                        $tablecontent = $tablecontent.'<td><a href="PHP/set_admin.php?id='.$results[$i]["id"].'"><i style="color:red;"class="fa fa-circle">  Off</i></a></td>';
                    }

                    if ($results[$i]["practitioner"] == 1) {
                        $tablecontent = $tablecontent.'<td><a href="PHP/set_display.php?id='.$results[$i]["id"].'"><i style="color:lime;"class="fa fa-circle">  On</i></a></td>';
                    } else {
                        $tablecontent = $tablecontent.('<td><a href="PHP/set_display.php?id='.$results[$i]["id"].'"><i style="color:red;"class="fa fa-circle">  Off</i></a></td>');
                    }

                    if ($results[$i]["certified"] == 1) {
                        $tablecontent = $tablecontent.'<td><a href="PHP/set_bcia.php?id='.$results[$i]["id"].'"><i style="color:lime;"class="fa fa-circle">  On</i></a></td>';
                    } else {
                        $tablecontent = $tablecontent.'<td><a href="PHP/set_bcia.php?id='.$results[$i]["id"].'"><i style="color:red;"class="fa fa-circle">  Off</i></a></td>';
                    }

                    if ($results[$i]["member"] == 1 || $results[$i]["member"] == 0) {
                        $tablecontent = $tablecontent.'<td>
                        <button style="background-color:#333333;"><a style="background-color:#333333;color:white;" href="PHP/set_no.php?id='.$results[$i]["id"].'"> No </a></button>
                        <button><a href="PHP/set_affiliate.php?id='.$results[$i]["id"].'"> Affiliate</a></button>
                        <button><a href="PHP/set_student.php?id='.$results[$i]["id"].'"> Student</a></button>
                        <button><a href="PHP/set_associate.php?id='.$results[$i]["id"].'"> Associate</a></button>
                        <button><a href="PHP/set_full.php?id='.$results[$i]["id"].'"> Full</a></button></td>';
                    } else if ($results[$i]["member"] == 2){
                        $tablecontent = $tablecontent.'<td>
                        <button><a href="PHP/set_no.php?id='.$results[$i]["id"].'"> No </a></button>
                        <button style="background-color:#333333;"><a style="background-color:#333333;color:white;" href="PHP/set_affiliate.php?id='.$results[$i]["id"].'"> Affiliate</a></button>
                        <button><a href="PHP/set_student.php?id='.$results[$i]["id"].'"> Student</a></button>
                        <button><a href="PHP/set_associate.php?id='.$results[$i]["id"].'"> Associate</a></button>
                        <button><a href="PHP/set_full.php?id='.$results[$i]["id"].'"> Full</a></button></td>';
                    }
                    else if ($results[$i]["member"] == 3){
                        $tablecontent = $tablecontent.'<td>
                        <button><a href="PHP/set_no.php?id='.$results[$i]["id"].'"> No </a></button>
                        <button><a href="PHP/set_affiliate.php?id='.$results[$i]["id"].'"> Affiliate</a></button>
                        <button style="background-color:#333333;"><a style="background-color:#333333;color:white;" href="PHP/set_student.php?id='.$results[$i]["id"].'"> Student</a></button>
                        <button><a href="PHP/set_associate.php?id='.$results[$i]["id"].'"> Associate</a></button>
                        <button><a href="PHP/set_full.php?id='.$results[$i]["id"].'"> Full</a></button></td>';
                    }
                    else if ($results[$i]["member"] == 4){
                        $tablecontent = $tablecontent.'<td>
                        <button><a href="PHP/set_no.php?id='.$results[$i]["id"].'"> No </a></button>
                        <button><a href="PHP/set_affiliate.php?id='.$results[$i]["id"].'"> Affiliate</a></button>
                        <button><a href="PHP/set_student.php?id='.$results[$i]["id"].'"> Student</a></button>
                        <button style="background-color:#333333;"><a style="background-color:#333333;color:white;" href="PHP/set_associate.php?id='.$results[$i]["id"].'"> Associate</a></button>
                        <button><a href="PHP/set_full.php?id='.$results[$i]["id"].'"> Full</a></button></td>';
                    }
                    else if ($results[$i]["member"] == 5){
                        $tablecontent = $tablecontent.'<td>
                        <button><a href="PHP/set_no.php?id='.$results[$i]["id"].'"> No </a></button>
                        <button><a href="PHP/set_affiliate.php?id='.$results[$i]["id"].'"> Affiliate</a></button>
                        <button><a href="PHP/set_student.php?id='.$results[$i]["id"].'"> Student</a></button>
                        <button><a href="PHP/set_associate.php?id='.$results[$i]["id"].'"> Associate</a></button>
                        <button style="background-color:#333333;"><a style="background-color:#333333;color:white;" href="PHP/set_full.php?id='.$results[$i]["id"].'"> Full</a></button></td>';
                    }

                }
                echo $tablecontent;
                echo '</tr></table>';
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        ?>

    </div>
</div>