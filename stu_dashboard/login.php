<?php
session_start();
error_reporting(0);
include('includes/conn.php');

if(isset($_POST['login']))
  {
    $adminuser=$_POST['username'];
    $password=md5($_POST['password']);
    $query=mysqli_query($con,"select rollno from student where  email='$adminuser' && pass='$password' && status= '1' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
    $_SESSION['jklu_sams']=$ret['rollno'];
     header('location:index.php');
    }
    else{
     echo "<script>alert('Invalid Credentials or Email not verified!.');
  window.location='studentsign.php';
  </script>";
    }
  }
  ?>