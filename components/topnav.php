<div class="topnav" id="myTopnav">
        <a href="index.php">HOME</a>
        <a href="blog.php">BLOG</a>
        <a href="publications.php">PUBLICATIONS</a>
        <a href="events.php">EVENTS</a>
        <a href="practitioners.php">PRACTITIONERS</a>
        <a href="contact.php">CONTACT US</a>
        <?php 
            if (($_SESSION["id"])) {
                echo '<a style="float:right;" href="PHP/logout.php">LOGOUT</a>';
                echo '<a style="float:right;" href="dashboard.php">DASHBOARD</a>';
            } else {
                echo '<a style="float:right;" href="signup.php">MEMBERS</a>';
            }
        ?>

    </div>