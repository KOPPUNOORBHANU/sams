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
            $str_name=$_POST['str_name'];
            $str_domain=$_POST['str_domain'];
            $str_income=$_POST['str_income'];
            $str_link=$_POST['str_link'];
            $str_email=$_POST['str_email'];
            $str_year=$_POST['str_year'];
            $str_desc=$_POST['str_desc'];
            $str_location=$_POST['str_location'];
            $str_img=$_FILES["str_img"]["name"];
            $adid=$_SESSION['jklu_sams'];
    $ret=mysqli_query($con,"select rollno from student where rollno='$adid'");
    $row=mysqli_fetch_array($ret);


    $rollno=$row['rollno'];
      $extension = substr($str_img,strlen($str_img)-4,strlen($str_img));
      $allowed_extensions = array(".jpg","jpeg",".png");
        if(!in_array($extension,$allowed_extensions))
      {
        echo "<script>alert('Image has Invalid format. Only jpg / jpeg/ png  format allowed');</script>";
      }
        else
      {
      
      $str_img=md5($str_img).time().$extension;
       move_uploaded_file($_FILES["str_img"]["tmp_name"],"images/startups/".$str_img);
       $query=mysqli_query($con, "INSERT INTO `startup`(`str_name`, `str_domain`, `str_income`, `str_link`, `str_email`, `str_year`, `str_desc`, `str_location`, `str_img`, `rollno`) VALUES ('$str_name','$str_domain','$str_income','$str_link','$str_email','$str_year','$str_desc','$str_location','$str_img','$rollno')");
          if ($query) {
            echo "<script>alert('Successfully detail has been added.');
            window.location='special.php';
            </script>";
         }
        else
          {
            echo "<script>alert('Something Went Wrong. Please try again.');
            window.location='addstartup.php';
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
            <span style="--i:1">S</span>
            <span style="--i:2">t</span>
            <span style="--i:3">a</span>
            <span style="--i:4">r</span>
            <span style="--i:5">t</span>
            <span style="--i:6">u</span>
            <span style="--i:7">p</span>
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
                <div class="card-header">Startup Details</div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputname">Name of StartUp</label>
                                <input class="form-control" id="inputname" type="text" name="str_name" placeholder="Enter name of StartUp">
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputdomainName">StartUp Domain name</label>
                                <input class="form-control" id="inputdomainName" name="str_domain" type="text" placeholder="Enter your StartUp Domain name">
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputprize">Annual Income</label>
                                <input class="form-control" id="inputprize" type="number" name="str_income" placeholder="Enter Annual Income" >
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputlink">StartUp website Link</label>
                                <input class="form-control" id="inputlink" type="url" name="str_link" placeholder="Enter your StartUp website Link">
                            </div>
                        </div>
                        <!-- Form Row        -->
                        <div class="row gx-3 mb-3">
                        <div class="col-md-6">
                                <label class="small mb-1" for="inputemail">Company Email</label>
                                <input class="form-control" id="inputemail" type="email" name="str_email" placeholder="Enter Company Email">
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputyear">Started Year</label>
                                <input class="form-control" id="inputyear" name="str_year" type="number" min="1900" max="2099" step="1" placeholder="Year of startup started!!" >
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1" for="inputdes">Description</label>
                                <input class="form-control" id="inputdes" type="text" name="str_desc" placeholder="Enter Description of startup">
                            </div>
                            
                            
                        </div>

                        <div class="row gx-3 mb-3">
                            <!-- Form Group (Description)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputloc">Location</label>
                                <input class="form-control" id="inputloc" type="text" name="str_location" placeholder="Enter location of your company">
                            </div>
                            <!-- Form Group (phone number)-->
                            <div class="col-md-6">
                            <label for="file" class="small mb-1 ">Select a Image of startup</label>
                            <p><input class="form-control" type="file"  accept="image/jpg/png" name="str_img" id="file"  onchange="loadFile(event)" style="display: none;"></p>
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