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
            $p_job=$_POST['p_job'];
            $p_comp=$_POST['p_comp'];
            $p_package=$_POST['p_package'];
            $p_year=$_POST['p_year'];
            $p_comp_location=$_POST['p_comp_location'];
            $p_img=$_FILES["p_img"]["name"];
            $adid=$_SESSION['jklu_sams'];
    $ret=mysqli_query($con,"select rollno from student where rollno='$adid'");
    $row=mysqli_fetch_array($ret);


    $rollno=$row['rollno'];
      $extension = substr($p_img,strlen($p_img)-4,strlen($p_img));
      $allowed_extensions = array(".jpg","jpeg",".png");
        if(!in_array($extension,$allowed_extensions))
      {
        echo "<script>alert('Image has Invalid format. Only jpg / jpeg/ png  format allowed');</script>";
      }
        else
      {
      
      $p_img=md5($p_img).time().$extension;
       move_uploaded_file($_FILES["p_img"]["tmp_name"],"images/placements/".$p_img);
       $query=mysqli_query($con, "INSERT INTO `placement`(`p_job`, `p_comp`, `p_package`, `p_year`, `p_comp_location`, `p_img`, `rollno`) VALUES ('$p_job','$p_comp','$p_package','$p_year','$p_comp_location','$p_img','$rollno')");
          if ($query) {
            echo "<script>alert('Successfully detail has been added.');
            window.location='special.php';
            </script>";
         }
        else
          {
            echo "<script>alert('Something Went Wrong. Please try again.');
            window.location='addplacements.php';
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
            <span style="--i:1">P</span>
            <span style="--i:2">l</span>
            <span style="--i:3">a</span>
            <span style="--i:4">c</span>
            <span style="--i:5">e</span>
            <span style="--i:6">m</span>
            <span style="--i:7">e</span>
            <span style="--i:8">n</span>
            <span style="--i:9">t</span>
            <span style="--i:9">s</span>
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
                <div class="card-header">Placements Details</div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputname">Job Name</label>
                                <input class="form-control" id="inputname" name="p_job" type="text" placeholder="Enter name of Job">
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputorg">Company Name</label>
                                <input class="form-control" id="inputorg" name="p_comp" type="text" placeholder="Enter Company name">
                            </div>
                            
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputprize">Package</label>
                                <input class="form-control" id="inputprize" name="p_package" type="number" placeholder="Enter Package" >
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputyear">Year of placed</label>
                                <input class="form-control" id="inputyear" name="p_year" type="number" min="1900" max="2099" step="1" placeholder="Select year of placed" >
                            </div>
                        </div>
                        <!-- Form Row        -->
                        
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (Description)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputloc">Company Location</label>
                                <input class="form-control" id="inputloc" type="text" name="p_comp_location" placeholder="Enter company location">
                            </div>
                            <!-- Form Group (phone number)-->
                            <div class="col-md-6">
                            <label for="file" class="small mb-1 ">Select a proof of certification</label>
                            <p><input class="form-control" type="file"  accept="image/jpg/png" name="p_img" id="file"  onchange="loadFile(event)" style="display: none;"></p>
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