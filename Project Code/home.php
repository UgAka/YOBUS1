<?php include 'header.php'
?>
<body>
<?php
        session_start();
		if(!(isset($_SESSION['UserId']) && !empty($_SESSION['UserId']))){
            header("Location:login.html");
        }
        if($_SESSION['UserName'] == 'admin'){
            header("Location:Dashboard.php");
        }
    ?>
    <section class="header">
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
            <i class="fas fa-bars" onclick="showmenu()"></i>
        </nav>

       
        <section class="booking">
    <h1 style="color:white;">Select Route</h1>
    <p1 style="color:white;">Choose The Origin and Destination of your Route</p1>
    <br><br>
    <div class="rowb">
        <div class="Origin">
            <select name="Origin" class="Dropdown" style="text-align-last: center; background-color: #d13636;" >
            <option>Origin - Destination</option>
                <?php    
                    $myconn= mysqli_connect("localhost","root","","busreservation");
                    $query = "SELECT DISTINCT CONCAT(Origin, CONCAT(' - ', Destination)) as 'Routel' FROM schedule";
                    $result = mysqli_query($myconn, $query);

                    if($result)
                        {
                        while($row=mysqli_fetch_array($result))
                            {
                                $Route = $row["Routel"];
                                echo"<option>$Route</option>";
                            }
                        }
                ?>
            </select><br>
            <input type="button" value="Search Bus" onclick="SearchRoute()" class="hero-btn blue-btn" style="margin-top: 50px;">
        </div>
        <span id="spnTable">

        </span>
            
    </div>
</section>

<span id="spnTable">

</span>





    </section>


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
<!-------- Javascript -------->

<script>
    function SearchRoute(){
        Bus = document.getElementsByName("Origin")[0].value;
        const myArr = Bus.split(" - ");
        Origin = myArr[0];
        Destination = myArr[1];

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
            if( this.readyState == 4 && this.status == 200){
                document.getElementById('spnTable').innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET","Search.php?Origin="+Origin+"&Destination="+Destination,true);
        xmlhttp.send();
    }
    function ReserveSeat(ScheduleId){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
            if( this.readyState == 4 && this.status == 200){
                alert(this.responseText);
                location.href = "ticketdetails.php";
            }
        }
        xmlhttp.open("GET","Ticket.php?ScheduleId="+ScheduleId,true);
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