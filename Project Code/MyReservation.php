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
                    <li><a href="Home.php">HOME</a></li>
                    <li><a href="About.php">ABOUT</a></li>
                    <li><a href="MyReservation.php">MY RESERVATIONS</a></li>
                    <li><a href="location.html">TRACK LOCATION</a></li>
                    <li><a href="Contact.php">CONTACT</a></li>
                    <li><a href="logout.php">LOGOUT</a></li>
                </ul>
            </div>
            <i class="fas fa-bars" onclick="showmenu()"></i>

        </nav>

        <h1>MY RESERVATION</h1>

    </section>

    <!-------- Table -------->

    <div class="detailsReservation">
        <div class="recentReservation">
            <div class="cardHeader">
                <h2><?php echo $_SESSION['UserName']."'s reservation"?></h2><br>
            </div>
            <table>
                <thead>
                    <tr>

                        <th>Name</th>
                        <th>Origin</th>
                        <th>Destination</th>
                        <th>Departure</th>
                        <th>Fare</th>
                        <th>Seat Number</th>
                        <th>Date</th>
                        <th>Delete</th>
                        <th>Print</th>
                    </tr>
                </thead>
                <tbody>



                    <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <!-- <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Payment Details</h4>
                                </div>
                                <div class="modal-body">

                                    <label>Enter phone number</label>
                                    <input type="tel " ,value="tel">
                                </div>
                                <?php
                                include 'DBConnect.php';

                                $selectquery = "SELECT * FROM Reservation JOIN Schedule on schedule.ScheduleId = Reservation.ScheduleId WHERE reservation.userId = " . $_SESSION['UserId'];

                                $query = mysqli_query($myconn, $selectquery);

                                $nums = mysqli_num_rows($query);

                                while ($res = mysqli_fetch_array($query)) {

                                ?>
                                    <p>Transport fare: <?php echo $res['Fare'] ?></p>
                                    <p> Charge:500</p>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color:green;color:white;">Pay Now</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color:red;color:white;">Close</button>
                                    </div>
                                <?php } ?>
                            </div> -->

                        </div>

                    </div>

                    <?php
                    include 'DBConnect.php';

                    $selectquery = "SELECT * FROM Reservation JOIN Schedule on schedule.ScheduleId = Reservation.ScheduleId WHERE reservation.userId = " . $_SESSION['UserId'];

                    $query = mysqli_query($myconn, $selectquery);

                    $nums = mysqli_num_rows($query);

                    while ($res = mysqli_fetch_array($query)) {

                    ?>

                        <tr>
                            <td><?php echo $_SESSION['UserName'] ?></td>
                            <td><?php echo $res['Origin'] ?></td>
                            <td><?php echo $res['Destination'] ?></td>
                            <td><?php echo $res['Departure_time'] ?></td>
                            <td><?php echo $res['Fare'] ?></td>
                            <td><?php echo $res['SeatNo'] ?></td>
                            <td><?php echo $res['Dep_Date'] ?></td>
                            <td><a href="DeleteReservation.php?ReservationId=<?php echo $res['ReservationId']; ?>" data-toggle="tooltip" data-placement="buttom" title="DELETE"></title></data-toggle><i class="fas fa-trash" style="text-align-last: center;"></i></a></td>
                            <td><a href="PrintTicket.php?ReservationId=<?php echo $res['ReservationId']; ?>" data-toggle="tooltip" data-placement="buttom" title="PRINT"></title></data-toggle><i class="fas fa-print" style="text-align-last: center;"></i></a></td>

                        </tr>

                    <?php

                    }

                    ?>

                </tbody>
                <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Make Payment</button> -->

            </table>
        </div>
    </div>

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