<?php
session_start();
error_reporting(0);
$con=mysqli_connect("localhost", "root", "", "jklu_sams");
if(mysqli_connect_errno()){
echo "Connection Fail".mysqli_connect_error();
}



if(isset($_POST['login']))
  {
    $name=$_POST['name'];
    $pass=$_POST['pass'];
    $query=mysqli_query($con,"select name from admin where name='$name' && pass='$pass'");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['jklu_sams']=$ret['name'];
    
     header ('location:demo.php');
    }
    else{
     echo "<script>alert('Invalid Credentials');
  window.location='adminlogin.php';
  </script>";
    }
  }
  ?>