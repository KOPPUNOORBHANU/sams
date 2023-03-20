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
            $h_name=$_POST['h_name'];
            $h_org=$_POST['h_org'];
            $h_area=$_POST['h_area'];
            $h_year=$_POST['h_year'];
            $h_link=$_POST['h_link'];
            $h_desc=$_POST['h_desc'];
            $h_img=$_FILES["h_img"]["name"];
            $adid=$_SESSION['jklu_sams'];
    $ret=mysqli_query($con,"select rollno from student where rollno='$adid'");
    $row=mysqli_fetch_array($ret);


    $rollno=$row['rollno'];
        //  $aimg=$_FILES["image"]["name"];
      $extension = substr($h_img,strlen($h_img)-4,strlen($h_img));
      $allowed_extensions = array(".jpg","jpeg",".png");
        if(!in_array($extension,$allowed_extensions))
      {
        echo "<script>alert('Image has Invalid format. Only jpg / jpeg/ png  format allowed');</script>";
      }
        else
      {
      
      $h_img=md5($h_img).time().$extension;
       move_uploaded_file($_FILES["h_img"]["tmp_name"],"images/hackathons/".$h_img);
       $query=mysqli_query($con, "INSERT INTO `hackathon`(`h_name`, `h_org`, `h_area`, `h_year`, `h_link`, `h_desc`, `h_img`, `rollno`) VALUES ('$h_name','$h_org','$h_area','$h_year','$h_link','$h_desc','$h_img','$rollno')");
          if ($query) {
            echo "<script>alert('Successfully detail has been added.');
            window.location='hackathon.php';
            </script>";
         }
        else
          {
            echo "<script>alert('Something Went Wrong. Please try again.');
            window.location='addhackathon.php';
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
            <span style="--i:1">H</span>
            <span style="--i:2">a</span>
            <span style="--i:3">c</span>
            <span style="--i:4">k</span>
            <span style="--i:5">a</span>
            <span style="--i:6">t</span>
            <span style="--i:7">t</span>
            <span style="--i:8">h</span>
            <span style="--i:9">o</span>
            <span style="--i:10">n</span>
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
                <div class="card-header">Hackathon Details</div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <!-- Form Group (rollno)-->

                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputhackathonName">Hackathon name</label>
                                <input class="form-control" id="inputhackathonName" name="h_name" type="text" placeholder="Enter your Hackathon name">
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputorg">Organisation</label>
                                <input class="form-control" id="inputorg" type="text" name="h_org" placeholder="Enter Organisation name (Hackathon Conducted by)">
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputarea">Area of Hackathon</label>
                                <input class="form-control" id="inputarea" type="text" name="h_area" placeholder="Enter Area of Hackathon">
                            </div>
                            <!-- <div class="col-md-6">
                                <label class="small mb-1" for="inputdur">Duration of Hackathon</label>
                                <input class="form-control" id="inputdur" type="text" placeholder="Enter Duration of Hackathon">
                            </div> -->
                        </div>
                        <!-- Form Row        -->
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputyear">Year</label>
                                <input class="form-control" id="inputyear" type="number" name="h_year" min="1900" max="2099" step="1" placeholder="Select year (project started year)" >
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputlink">Link for the Project submitted in Hackathon</label>
                                <input class="form-control" id="inputlink" type="url" name="h_link" placeholder="Enter your hackathon project link (github etc..,)">
                            </div>
                            
                        </div>
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (Description)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputdes">Description</label>
                                <input class="form-control" id="inputdes" type="text" name="h_desc" placeholder="Enter your Hackathon Project Description">
                            </div>
                            <!-- Form Group (phone number)-->
                            <div class="col-md-6">
                            <label for="file" class="small mb-1 ">Select a proof of certification</label>
                            <p><input class="form-control" type="file"  accept="image/jpg/png" name="h_img" id="file"  onchange="loadFile(event)" style="display: none;"></p>
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