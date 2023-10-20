<?php include 'header.php'
?>
<body>
    <?php
    session_start();
    if(!(isset($_SESSION['UserId']) && !empty($_SESSION['UserId']))){
        header("Location:login.html");
    }
    ?>
    <section class="sub-header">
        <nav> <br>
            <div class="nav-link" id="menu">
                <i class="fas fa-times" onclick="hidemenu()" style="margin-left: 10px; margin-top: 6px;"></i>
                <ul>
                    <li><a href="Home.php">HOME</a></li>
                    <li><a href="About.php">ABOUT</a></li>
                    <li><a href="MyReservation.php">MY RESERVATIONS</a></li>
                    <li><a href="location.html">TRACK  LOCATION</a></li>
                    <li><a href="Contact.php">CONTACT</a></li>
                    <li><a href="logout.php">LOGOUT</a></li>
                </ul>
            </div>
            <i class="fas fa-bars" onclick="showmenu()" style="margin-left: 10px; margin-left: 290px;"></i>
            
        </nav>

        <h1>ABOUT US</h1>

    </section>

<!-------- Content -------->
    <section class="about-us">
        <div class="row">
            <div class="about-col">
                <h1>Vision</h1> <br>
                <p1>Our strong vision is to deliver excellence in services that exceeds the needs and expectation of our customers. Strive to become a market leader in the transportation industry of which others aspire to follow.</p1><br><br><br>
                <a href="Home.php" class="hero-btn blue-btn">EXPLORE NOW</a>
            </div>
            <div class="about-col">
                <img src="vision.jpg">
            </div>
        </div>
    </section>

<!-------- Content 2 -------->
<section class="about-us">
    <div class="row">
        <div class="about-col">
            <h1>Mission Statement</h1> <br>
            <p1>We are committed towards the economic growth of our country by participating in the core infrastructure development. Providing a reliable and comfortable public transport service which people can look to as a viable and convenient transport alternative to any other transportation source. We will continually monitor the needs of the traveling public and review our service delivery on a regular basis in order to maintain people’s interest in our public transport service.</p1><br><br><br>
            <a href="Home.php" class="hero-btn blue-btn">EXPLORE NOW</a>
        </div>
        <div class="about-col">
            <img src="Mission.png">
        </div>
    </div>
</section>

<!-------- Content 3 -------->
<section class="about-us">
    <div class="row">
        <div class="about-col">
            <h1>Company Profile</h1> <br>
            <p1>WAINS Transport is pioneer in the business of Transportation in Pakistan. It has a protracted history; based on more than two decades of excellence in services. The founder members strong vision and dedication made it possible to launch WAINS Transport. The journey, which was started in 2009 under the banner of WAINS Transport with logistics business and then express bus service between Rawalpindi and Multan, which has been expanded to many folds. WAINS Transport serves as a hub of passenger transport throughout the length and breadth of Pakistan.</p1><br><br><br>
            <a href="Home.php" class="hero-btn blue-btn">EXPLORE NOW</a>
        </div>
        <div class="about-col">
            <img src="Profile.jfif">
        </div>
    </div>
</section>

<!-------- Footer -------->
<?php include 'footer.php'
?>

<!-------- Javascript -------->

<script>

    function showmenu(){
        var c = document.getElementById("menu")
        c.style.right = "0"
    }

    function hidemenu(){
        var c = document.getElementById("menu")
        c.style.right = "-200px"
    }

</script>

</body>
</html>