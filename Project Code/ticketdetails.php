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

          <h1>BOOK NOW</h1>

     </section>

     <!-------- Contact -------->

     <section class="ticketdetails">
          <div class="containert">
               <h4 class="headingt">Booking information</h4>
               <p>(Enter Your Booking details here)</p>
               <div class="formtt">
                    <p>Fields marked with <span>*</span> are mandatory</p>
                    <div class="content">
                         <form action="makepayment.php" method="post">
                              <label for="fname">Name:<span>*</span></label><br />
                              <input type="text" id="fname" name="fname" placeholder="Ann Kirabo" required /><br />
                              <label for="email">Email:</label>
                              <input type="email" id="email" name="email" placeholder="annkirabo@gmail.com" />
                              <label for="phone">Phone Number:<span>*</span></label>
                              <input type="tel" id="phone" name="phone"required />
                              <label for="quantity" class="quantity-text">Number of tickets:<span>*</span></label>
                              <input type="number" id="quantity" class="quantity" name="quantity" min="1" max="19" required />
                              <label for="entry-points">Entry Point:<span>*</span></label>

                              <select name="entry-points" id="entry-points">
                                   <option value="Bus park">Bus Park</option>
                                   <option value="Bus Park">Bus Park</option>
                                   <option value="Bus Park">Bus Park</option>
                                   <option value="Bus Park">Bus Park</option>
                              </select>

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
                                             <p>Transport fare: <?php echo $res['Fare'] ?></p>
                                   </div>
                                   <div class="transport-fee">
                                        <p> Charge:1800</p>
                                   </div>
                                   <div class="transport-fee">
                                        <p>Total: <?php echo $res['Fare'] + 1800 ?></p>
                                   </div>
                              </div>
                              <button href="makepayment.php" class="make-payment">Make Payment Now</button>
                              <br />
                              <input type="submit" name="submit" value="Submit">
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