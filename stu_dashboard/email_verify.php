<?php
session_start();
include('includes/conn.php');

if(isset($_POST["verify"])){

    $otp = $_SESSION['otp'];
    $email = $_SESSION['email'];
        $otp_code = $_POST['otp_code'];

        if($otp != $otp_code){
            ?>
           <script>
               alert("Invalid OTP code");
           </script>
           <?php
           }else{
            mysqli_query($con, "UPDATE student SET status = 1 WHERE email = '$email'");
            ?>
             <script>
                 alert("Verfiy account done, you may sign in now");
                   window.location.replace("studentsign.php");
             </script>
             <?php
        }
}


 
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/studentsign.css" />
    <link rel="icon" type="image/png" href="img/favicon.png" />
    <title>Email Verification</title>
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="" class="sign-in-form" method="post">
                    <h2 class="title">Email Verification</h2>
                    
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="number" name="otp_code" placeholder="Enter Otp" />
                    </div>
                    <input type="submit" name="verify" value="Verify" class="btn solid" />
                    <div class="social-media"></div>
                    <div style="padding-top: 15px">
                        <a style="text-decoration: none;" href="./studentsign.php" id="back">Back to SignIn!!</a>
                    </div>
                </form>
                
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    
                </div>
                <img src="img/otp.svg" class="image" alt="" />
            </div>
            </div>
        </div>
    </div>

    <script src="js/studentsign.js"></script>
</body>

</html>