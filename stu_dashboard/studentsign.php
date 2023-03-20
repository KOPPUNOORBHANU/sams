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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/studentsign.css" />
    <link rel="icon" type="image/png" href="img/favicon.png" />
    <title>Sign in & Sign up </title>
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="login.php" class="sign-in-form" method="post">
                    <h2 class="title">Sign in</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="username" placeholder="University Email" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" placeholder="Password" />
                    </div>
                    <input type="submit" name="login" value="Login" class="btn solid" />
                    <div class="social-media"></div>
                    <div style="padding-top: 15px">
                        <a style="text-decoration: none;" href="../index.php" id="back">Back to Home!!</a>
                    </div>
                </form>
                <form action="register.php" class="sign-up-form" method="post">
                    <h2 class="title">Sign up</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="fullname" placeholder="Full Name" />
                    </div>
                    <div class="input-field">
                        <i class="fa fa-address-card"></i>
                        <input type="text" name="rollno" placeholder="Enter Valid Roll No" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" placeholder="Enter University Email"  pattern=".+@jklu.edu.in"  />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="pass" placeholder="Password" />
                    </div>
                    <input type="submit" onsubmit="checkEmail" name="signup" class="btn" value="Sign up" />
                    <div class="social-media"></div>
                    <div style="padding-top: 15px">
                        <a style="text-decoration: none;" href="../index.php" id="back">Back to Home!!</a>
                    </div>
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>New here ?</h3>
                    <p>
                        Hey! JKLUIAN come join with us! Let's shine together.....

                    </p>
                    <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
                </div>
                <img src="img/bye2.svg" class="image" alt="" />
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>One of us ?</h3>
                    <p>
                        Why are you waiting here Login and Introduce you to the WORLD!.
                    </p>
                    <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
                </div>
                <img src="img/bye.svg" class="image" alt="" />
            </div>
        </div>
    </div>

    <script src="js/studentsign.js"></script>
</body>

</html>