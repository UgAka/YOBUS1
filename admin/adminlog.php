
<?php
    // start session and connect with database
    session_start();
    $conn = mysqli_connect("localhost", "root", "root", "busreservation");

?>
 
<!-- check if admin is logged in -->
<?php if (isset($_SESSION["admin"])): ?>
    <!-- button to logout -->
    <p>
        <a href="?logout">Logout</a>
    </p>
<?php else: ?>
    <!-- form to login -->
    <form method="POST">
        <p>
            <input type="email" name="email" placeholder="Enter email" required>
        </p>
 
        <p>
            <input type="password" name="password" placeholder="Enter password" required>
        </p>
 
        <p>
            <input type="submit" name="login" value="Login">
        </p>
    </form>
<?php endif; ?>



// check if request is for login
if (isset($_POST["login"]))
{
    // get email and password
    $email = $_POST["email"];
    $password = $_POST["password"];
 
    // check if email exists
    $result = mysqli_query($conn, "SELECT * FROM admins WHERE email = '" . $email . "'");
    if (mysqli_num_rows($result) > 0)
    {
        // check if password is correct
        $admin = mysqli_fetch_object($result);
        if (password_verify($password, $admin->password))
        {
            // start session
            $_SESSION["admin"] = $admin;
            echo "<p>Logged in.</p>";
        }
        else
        {
            echo "<p>Wrong password.</p>";
        }
    }
    else
    {
        echo "<p>Email not found.</p>";
    }
}