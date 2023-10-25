<?php include 'header.php'
?>

<body>
     <?php
     session_start();
     if (!(isset($_SESSION['UserId']) && !empty($_SESSION['UserId']))) {
          header("Location:login.html");
     }
     ?>
     <section class="sub-header">
          <nav> <br>
               <div class="nav-link" id="menu">
                    <i class="fas fa-times" onclick="hidemenu()" style="margin-left: 10px; margin-top: 6px;"></i>
                    <ul>
                         <li><a href="home.php">HOME</a></li>
                         <li><a href="About.php">ABOUT</a></li>
                         <li><a href="Booking.php">BOOKING</a></li>
                         <li><a href="MyReservation.php">MY RESERVATION</a></li>
                         <li><a href="Contact.php">CONTACT</a></li>
                         <li><a href="logout.php">LOGOUT</a></li>
                    </ul>
               </div>
               <i class="fas fa-bars" onclick="showmenu()"></i>

          </nav>

          <!-- <h1>BOOK NOW</h1> -->

     </section>

     <!-------- Contact -------->

     <section class="ticketdetails">
          <div class="container">
               <h4 class="heading">Payment Details</h4>
               <div class="form">
                    <div class="content">
                         <form action="enterticketdetails.php" method="post">
                              <label for="phone">Phone Number:<span>*</span></label>
                              <input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required />
                              <label for="amount">Enter Amount:<span>*</span></label>
                              <input type="text" id="phone" name="amount" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required />


                              <h5 class="fees-heading">Fees</h5>
                              <div class="fees">
                                   <div class="transport-fee">
                                        <?php
                                        include 'DBConnect.php';

                                        $selectquery = "SELECT * FROM Reservation JOIN Schedule on schedule.ScheduleId = Reservation.ScheduleId WHERE reservation.userId = " . $_SESSION['UserId'];

                                        $query = mysqli_query($myconn, $selectquery);

                                        $nums = mysqli_num_rows($query);

                                        while ($res = mysqli_fetch_array($query)) {

                                        ?>
                                             <!-- <p>Transport fare: <?php echo $res['Fare'] ?></p>
                                   </div>
                                   <div class="transport-fee">
                                        <p> Charge:1800</p>
                                   </div> -->
                                   <div class="transport-fee">
                                        <p>Total: <?php echo $res['Fare'] + 1800 ?></p>
                                   </div>
                              </div>
                              <input type="submit" name="complete_payment" value="Complete Payment">
                              
                              <!-- <button class="Complete">Done</button> -->
                         </form>
                    </div>
               </div>
          </div>
     <?php } ?>



     </section>




     <!-------- Footer -------->

     <?php include 'footer.php'
     ?>
     <!-------- Javascript -------->

     <script>
          function showmenu() {
               var c = document.getElementById("menu")
               c.style.right = "0"
          }

          function hidemenu() {
               var c = document.getElementById("menu")
               c.style.right = "-200px"
          }
     </script>

</body>

</html>