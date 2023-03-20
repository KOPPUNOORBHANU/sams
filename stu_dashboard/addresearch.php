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
            $r_title=$_POST['r_title'];
            $r_specify=$_POST['r_specify'];
            $r_faculty=$_POST['r_faculty'];
            $r_publish=$_POST['r_publish'];
            $r_domain=$_POST['r_domain'];
            $r_year=$_POST['r_year'];
            $r_link=$_POST['r_link'];
            $r_desc=$_POST['r_desc'];
            $r_img=$_FILES["r_img"]["name"];
            $adid=$_SESSION['jklu_sams'];
    $ret=mysqli_query($con,"select rollno from student where rollno='$adid'");
    $row=mysqli_fetch_array($ret);


    $rollno=$row['rollno'];
      $extension = substr($r_img,strlen($r_img)-4,strlen($r_img));
      $allowed_extensions = array(".jpg","jpeg",".png");
        if(!in_array($extension,$allowed_extensions))
      {
        echo "<script>alert('Image has Invalid format. Only jpg / jpeg/ png  format allowed');</script>";
      }
        else
      {
      
      $r_img=md5($r_img).time().$extension;
       move_uploaded_file($_FILES["r_img"]["tmp_name"],"images/research/".$r_img);
       $query=mysqli_query($con, "INSERT INTO `research`(`r_title`, `r_specify`, `r_faculty`, `r_publish`, `r_domain`, `r_year`, `r_link`, `r_desc`, `r_img`, `rollno`) VALUES ('$r_title','$r_specify','$r_faculty','$r_publish','$r_domain','$r_year','$r_link','$r_desc','$r_img','$rollno')");
          if ($query) {
            echo "<script>alert('Successfully detail has been added.');
            window.location='special.php';
            </script>";
         }
        else
          {
            echo "<script>alert('Something Went Wrong. Please try again.');
            window.location='addresearch.php';
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
            <span style="--i:1">R</span>
            <span style="--i:2">e</span>
            <span style="--i:3">s</span>
            <span style="--i:4">e</span>
            <span style="--i:5">a</span>
            <span style="--i:6">r</span>
            <span style="--i:7">c</span>
            <span style="--i:8">h</span>
            <span></span>
            <span style="--i:1">P</span>
            <span style="--i:2">a</span>
            <span style="--i:3">p</span>
            <span style="--i:4">e</span>
            <span style="--i:5">r</span>
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
                <div class="card-header">Research Paper or Poster presentation Details</div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputname">Title of poster or paper</label>
                                <input class="form-control" id="inputname" name="r_title" type="text" placeholder="Enter title of poster or paper">
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="paper">Specify it Poster or Research Paper</label>
                                <select class="form-control small mb-1" id="paper" name="r_specify" aria-label="Default select example">
                                    <option selected>Select is it paper or poster</option>
                                    <option value="Research Paper">Research Paper</option>
                                    <option value="Poster">Poster</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputguide">Faculty Guidence</label>
                                <input class="form-control" id="inputguide" name="r_faculty" type="text" placeholder="Enter Your faculty Guidence name">
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputpub">Published By</label>
                                <input class="form-control" id="inputpub" name="r_publish" type="text" placeholder="Enter your Publication name">
                            </div>
                        </div>
                        <!-- Form Row        -->
                        <div class="row gx-3 mb-3">
                        <div class="col-md-6">
                                <label class="small mb-1" for="inputdom">Area of domain</label>
                                <input class="form-control" id="inputdom" type="text" name="r_domain" placeholder="Enter area of domain">
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputyear">Year</label>
                                <input class="form-control" id="inputyear" name="r_year" type="number" min="1900" max="2099" step="1" placeholder="Select year of published" >
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputlink">Link for the Poster or paper</label>
                                <input class="form-control" id="inputlink" name="r_link" type="url" placeholder="Enter link of your poster or paper">
                            </div>
                            
                            
                        </div>
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (Description)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputdes">Description</label>
                                <input class="form-control" id="inputdes" type="text" name="r_desc" placeholder="Enter description about your poster or paper">
                            </div>
                            <!-- Form Group (phone number)-->
                            <div class="col-md-6">
                            <label for="file" class="small mb-1 ">Select a proof of certification</label>
                            <p><input class="form-control" type="file"  accept="image/jpg/png" name="r_img" id="file"  onchange="loadFile(event)" style="display: none;"></p>
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