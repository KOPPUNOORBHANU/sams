<?php
session_start();
error_reporting(0);
include ("includes/conn.php");
if (strlen($_SESSION['jklu_sams']==0)) {
    header('location:stu_logout.php');
    } 
    else{
        if(isset($_POST['submit']))
        {
            $e_name=$_POST['e_name'];
            $e_rank=$_POST['e_rank'];
            $e_money=$_POST['e_money'];
            $e_org=$_POST['e_org'];
            $e_compname=$_POST['e_compname'];
            $e_year=$_POST['e_year'];
            $e_location=$_POST['e_location'];
            $e_img=$_FILES["e_img"]["name"];
            $adid=$_SESSION['jklu_sams'];
    $ret=mysqli_query($con,"select rollno from student where rollno='$adid'");
    $row=mysqli_fetch_array($ret);


    $rollno=$row['rollno'];
      $extension = substr($e_img,strlen($e_img)-4,strlen($e_img));
      $allowed_extensions = array(".jpg","jpeg",".png");
        if(!in_array($extension,$allowed_extensions))
      {
        echo "<script>alert('Image has Invalid format. Only jpg / jpeg/ png  format allowed');</script>";
      }
        else
      {
      
      $e_img=md5($e_img).time().$extension;
       move_uploaded_file($_FILES["e_img"]["tmp_name"],"images/extra_c_act/".$e_img);
       $query=mysqli_query($con, "INSERT INTO `extra`(`e_name`, `e_rank`, `e_money`, `e_org`, `e_compname`, `e_year`, `e_location`, `e_img`, `rollno`) VALUES ('$e_name','$e_rank','$e_money','$e_org','$e_compname','$e_year','$e_location','$e_img','$rollno')");
          if ($query) {
            echo "<script>alert('Successfully detail has been added.');
            window.location='extra_circular.php';
            </script>";
         }
        else
          {
            echo "<script>alert('Something Went Wrong. Please try again.');
            window.location='addextra.php';
            </script>";
          }
          
      }
      }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- PAGE TITLE HERE -->
    <title>Student DashBoard</title>

    <link href="vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link rel="stylesheet" href="vendor/nouislider/nouislider.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Style css -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="img/favicon.png" />
</head>
<body>
<div id="preloader">
        <div class="waviy">
        <span style="--i:1">A</span>
            <span style="--i:2">d</span>
            <span style="--i:3">d</span>
            <span></span>
            <span></span>
            <span style="--i:1">E</span>
            <span style="--i:2">x</span>
            <span style="--i:3">t</span>
            <span style="--i:4">r</span>
            <span style="--i:5">a</span>
            <span></span>
            <span style="--i:1">C</span>
            <span style="--i:2">i</span>
            <span style="--i:3">r</span>
            <span style="--i:4">c</span>
            <span style="--i:5">u</span>
            <span style="--i:6">l</span>
            <span style="--i:7">a</span>
            <span style="--i:8">r</span>
            <span style="--i:10">.</span>
            <span style="--i:10">.</span>
        </div>
    </div>
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header and Header start 
        ***********************************-->
        <?php include ('includes/admin_header.php')?>
        
        
        <!--**********************************
            Header end 
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <?php include('includes/sidebar.php');?>
        <!--**********************************
            Sidebar end
        ***********************************-->


        <!-- ******************* Content Start
    ********************************* -->
    <div class="content-body">
        <div class="container-fluid">
        <div class="col-xl-12">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Extra Curicular Activities Details</div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputname">Name of Field</label>
                                <input class="form-control" id="inputname" name="e_name" type="text" placeholder="Enter name of event">
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputrank">Rank</label>
                                <input class="form-control" id="inputrank" name="e_rank" type="number" min="1" max="24" step="1" placeholder="Enter Your Rank" >
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputprize">Prize Money</label>
                                <input class="form-control" id="inputprize" name="e_money" type="number" placeholder="Enter Prize Money" >
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputorg">Organized By</label>
                                <input class="form-control" id="inputorg" name="e_org" type="text" placeholder="Enter Organisation name">
                            </div>
                        </div>
                        <!-- Form Row        -->
                        <div class="row gx-3 mb-3">
                        <div class="col-md-6">
                                <label class="small mb-1" for="inputcomp">Competition Name</label>
                                <input class="form-control" id="inputcomp" type="text" name="e_compname" placeholder="Enter Competition Name">
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputyear">Year</label>
                                <input class="form-control" id="inputyear" name="e_year" type="number" min="1900" max="2099" step="1" placeholder="Select year of event done" >
                            </div>
                            
                            
                        </div>
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (Description)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputloc">Location</label>
                                <input class="form-control" id="inputloc" type="text" name="e_location" placeholder="Enter location where you participated">
                            </div>
                            <!-- Form Group (phone number)-->
                            <div class="col-md-6">
                            <label for="file" class="small mb-1 ">Select a proof of certification</label>
                            <p><input class="form-control" type="file"  accept="image/jpg/png" name="e_img" id="file"  onchange="loadFile(event)" style="display: none;"></p>
                            <p><label for="file" style="cursor: pointer;" class="btn btn-primary">Upload Image</label></p>
                            <p><img id="output" width="100"  /></p>
                            <script>
                                var loadFile = function(event) {
                                    var image = document.getElementById('output');
                                    image.src = URL.createObjectURL(event.target.files[0]);
                                };
                            </script>
                    

                            </div>
                            
                        </div>
                        <!-- Save changes button-->
                        <button class="btn btn-primary" name="submit" type="submit">SUBMIT</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
        </div>
    </div>
    
    <!-- ******************* Content end
    ********************************* -->


    <!-- ******************* footer start
    ********************************* -->
   
    <!-- ******************* Footer end
    ********************************* -->

</div>

<!--**********************************
        Scripts
    ***********************************-->
     <!-- Required vendors -->

<script src="vendor/global/global.min.js"></script>
    <script src="vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>

    <!-- Apex Chart -->
    <script src="vendor/apexchart/apexchart.js"></script>
    <script src="vendor/nouislider/nouislider.min.js"></script>
    <script src="vendor/wnumb/wNumb.js"></script>

    <!-- Dashboard 1 -->
    <script src="js/dashboard/dashboard-1.js"></script>

    <script src="js/custom.min.js"></script>
    <script src="js/dlabnav-init.js"></script>
    <script src="js/demo.js"></script>
    <script src="js/styleSwitcher.js"></script>
</body>

</html>
<?php } ?>