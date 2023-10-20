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

        <h1>CONTACT US</h1>

    </section>

<!-------- Contact -------->
    <section class="location">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d215.57351597070556!2d71.50988772823048!3d30.1749587319372!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x393b376010698cb3%3A0x95d6c708f62bfc00!2zV2FpbnMgQXV0byBQbGF6YdmI24zZhtizINii2bnZiCDZvtmE2KfYstuB!5e0!3m2!1sen!2s!4v1626155223457!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </section>

    <section class="contact-us">

        <div class="row">
            <div class="contact-col">
                <div>
                    <i class="fas fa-home"></i>
                    <span>
                        <h5>Kampala, Uganda</h5>
                        
                    </span>
                </div>
                <div>
                    <i class="fas fa-phone"></i>
                    <span>
                        <h5>+256-708-210-793</h5>
                        <p1>Active all Days, 09AM to 08PM</p1>
                    </span>
                </div>
                <div>
                    <i class="fas fa-envelope"></i>
                    <span>
                        <h5>simbula-tugende@gmail.com</h5>
                        <p1>Email us your query</p1>
                    </span>
                </div>
            </div>
            <div class="contact-col">

                <form action="" Method="get">
                    <input type="text" name="Name" placeholder="Enter Your Name" required>
                    <input type="email" name="Email" placeholder="Enter Your Email Address" required>
                    <input type="text" name="Subject" placeholder="Enter Your Subject" required>
                    <textarea rows="8" name="Message" placeholder="Message" required></textarea>
                    <button type="submit" onclick="Email()" class="hero-btn blue-btn"> Send Message </button>
                </form>

            </div>
        </div>

    </section>


<!-------- Footer -------->
<?php include 'footer.php'
?>


<!-------- Javascript -------->

<script>
    function Email(){
        Name = document.getElementsByName("Name")[0].value;
        Email = document.getElementsByName("Email")[0].value;
        Subject = document.getElementsByName("Subject")[0].value;
        Message = document.getElementsByName("Message")[0].value;
        var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function(){
				if( this.readyState == 4 && this.status == 200){
					alert(this.responseText);
				}
			}
	        xmlhttp.open("GET","SendMail.php?Name="+Name+"&Email="+Email+"&Subject="+Subject+"&Message="+Message,true);
	        xmlhttp.send();
        }

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