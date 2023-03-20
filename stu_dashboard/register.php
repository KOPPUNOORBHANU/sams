<?php
session_start();

include('includes/conn.php');
error_reporting(0);
// 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'PHPMailer\src\PHPMailer.php';
require 'PHPMailer\src\SMTP.php';
require 'PHPMailer\src\Exception.php';
// 
if(isset($_POST['signup']))
  {
    $fullname=$_POST['fullname'];
    $rollno=$_POST['rollno'];
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $enc_pass=md5($pass);
    $otp=substr(number_format(time()* rand(),0,'',''),0,6);

    

  }
$result= mysqli_query($con,"select * from student where rollno='$rollno' || email='$email'");

$num= mysqli_num_rows($result);
if($num==1){
  echo "<script>alert('User Already exists!!');
  window.location='studentsign.php';
  </script>";

  }
else{
  $_SESSION["email"]="$email";
  $_SESSION["otp"]="$otp";

  $add="insert into student(fullname,rollno,email,pass,otp) value('$fullname','$rollno','$email','$enc_pass','$otp')";

  mysqli_query($con,$add);
    echo "<script>alert('Account created!! and  Verify Your Email');
    window.location='email_verify.php';
    </script>";
  
  //Create an instance; passing `true` enables exceptions
  $mail = new PHPMailer(true);
  
  try {
      //Server settings
      $mail->SMTPDebug = 2;                      //Enable verbose debug output
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp.office365.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      
      $mail->Username   = 'koppunoorreddy@jklu.edu.in';                     //SMTP username
      $mail->Password   = '211126Kbr@';                               //SMTP password
      $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
      $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
  
      //Recipients
      $mail->setFrom('koppunoorreddy@jklu.edu.in', 'JKLU_ACHIEVEMENTS');
      $mail->addAddress($email, $fullname);     //Add a recipient              //Name is optional 
      $mail->addReplyTo('koppunoorreddy@jklu.edu.in', 'JKLU_ACHIEVEMENTS');
  
      //Content
      $mail->isHTML(true);                                 //Set email format to HTML
      $mail->Subject = 'Email Verification';
      
      $mail->Body    = 'Hi '.$fullname.' <h2>You have registered for JKLU Achievements!</h2> <br>This is verification code  :  ' .$otp.'<h4>Press below link to enter otp</h4><br><a href="http://localhost/trishul/sams/stu_dashboard/email_verify.php">click me</a>';
  
      $mail->send();
      echo 'Message has been sent';
  } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
    
    // 
  
      //
}
  ?>