<?php
$con=mysqli_connect("localhost", "root", "", "jklu_sams");
if(mysqli_connect_errno()){
echo "Connection Fail".mysqli_connect_error();
}
session_start();
error_reporting(0);
 
?>



    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/adminlogin.css">
        <title>Admin Login</title>
        <link rel="icon" type="image/png" href="img/favicon.png" />
    </head>

    <body>
        <div class="login-wrapper">
            <form action="ad_login.php" class="form" method="post">
                <img src="https://yt3.ggpht.com/ytc/AKedOLRhHOOUvKS7Hi_PggX-uhvKwDPrwbQWb7Xh9rny=s900-c-k-c0x00ffffff-no-rj" alt="avatar">
                <h2>Login</h2>
                <div class="input-group">
                    <input type="text" name="name" id="loginUser" required>
                    <label for="loginUser">User Name</label>
                </div>
                <div class="input-group">
                    <input type="password" name="pass" id="loginpassword" required>
                    <label for="loginpassword">Password</label>
                </div>
                <input type="submit" value="login" name="login" class="submit-button"><br>
                <!-- <a href="../index.php" class="forgot">Back to Home!!</a> -->
            </form>
        </div>
    </body>

    </html>