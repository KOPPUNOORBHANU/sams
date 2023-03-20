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
            $i_domain=$_POST['i_domain'];
            $i_company=$_POST['i_company'];
            $i_stipend=$_POST['i_stipend'];
            $i_duration=$_POST['i_duration'];
            $i_year=$_POST['i_year'];
            $i_desc=$_POST['i_desc'];
            $i_location=$_POST['i_location'];
            $i_img=$_FILES["i_img"]["name"];
            $adid=$_SESSION['jklu_sams'];
    $ret=mysqli_query($con,"select rollno from student where rollno='$adid'");
    $row=mysqli_fetch_array($ret);


    $rollno=$row['rollno'];
      $extension = substr($i_img,strlen($i_img)-4,strlen($i_img));
      $allowed_extensions = array(".jpg","jpeg",".png");
        if(!in_array($extension,$allowed_extensions))
      {
        echo "<script>alert('Image has Invalid format. Only jpg / jpeg/ png  format allowed');</script>";
      }
        else
      {
      
      $i_img=md5($i_img).time().$extension;
       move_uploaded_file($_FILES["i_img"]["tmp_name"],"images/internships/".$i_img);
       $query=mysqli_query($con, "INSERT INTO `internship`(`i_domain`, `i_company`, `i_stipend`, `i_duration`, `i_year`, `i_desc`, `i_location`, `i_img`, `rollno`) VALUES ('$i_domain','$i_company','$i_stipend','$i_duration','$i_year','$i_desc','$i_location','$i_img','$rollno')");
          if ($query) {
            echo "<script>alert('Successfully detail has been added.');
            window.location='internship.php';
            </script>";
         }
        else
          {
            echo "<script>alert('Something Went Wrong. Please try again.');
            window.location='addinternship.php';
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
            <span style="--i:1">I</span>
            <span style="--i:2">n</span>
            <span style="--i:3">t</span>
            <span style="--i:4">e</span>
            <span style="--i:5">r</span>
            <span style="--i:6">n</span>
            <span style="--i:7">s</span>
            <span style="--i:8">h</span>
            <span style="--i:9">i</span>
            <span style="--i:10">p</span>
            <span style="--i:9">.</span>
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
                <div class="card-header">Internship Details</div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputdomainName">Domain name</label>
                                <input class="form-control" id="inputdomainName" name="i_domain" type="text" placeholder="Enter your Domain name">
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputorg">Company</label>
                                <input class="form-control" id="inputorg" type="text" name="i_company" placeholder="Enter Company Name">
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputstipend">Stipend</label>
                                <input class="form-control" id="inputstipend" name="i_stipend" type="number" placeholder="Enter stipend" >
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputdur">Duration In Months</label>
                                <input class="form-control" id="inputdur" type="number" name="i_duration" min="1" max="24" step="1" placeholder="Select No.of Months" >
                            </div>
                        </div>
                        <!-- Form Row        -->
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputyear">Year</label>
                                <input class="form-control" id="inputyear" name="i_year" type="number" min="1900" max="2099" step="1" placeholder="Select year (Internship started year)" >
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputdes">Description</label>
                                <input class="form-control" id="inputdes" type="text" name="i_desc" placeholder="Enter About Company">
                            </div>
                            
                        </div>
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (Description)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputloc">Location of Company</label>
                                <input class="form-control" id="inputloc" type="text" name="i_location" placeholder="Enter Location of a Company">
                            </div>
                            <!-- Form Group (phone number)-->
                            <div class="col-md-6">
                            <label for="file" class="small mb-1 ">Select a proof of certification</label>
                            <p><input class="form-control" type="file"  accept="image/jpg/png" name="i_img" id="file"  onchange="loadFile(event)" style="display: none;"></p>
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