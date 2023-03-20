<?php
session_start();
error_reporting(0);
include ("includes/conn.php");
if (strlen($_SESSION['jklu_sams']==0)) {
    header('location:stu_logout.php');
    } 
    else{
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
        <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="waviy">
            <span style="--i:1">D</span>
            <span style="--i:2">e</span>
            <span style="--i:3">s</span>
            <span style="--i:4">c</span>
            <span style="--i:5">r</span>
            <span style="--i:6">i</span>
            <span style="--i:7">p</span>
            <span style="--i:8">t</span>
            <span style="--i:9">i</span>
            <span style="--i:9">o</span>
            <span style="--i:10">n</span>
            <span style="--i:10">.</span>
            <span style="--i:10">.</span>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

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
        <?php 
						$h_id=$_GET['h_id'];
 $query=mysqli_query($con,"select * from hackathon where h_id='$h_id'");
 
 while ($row=mysqli_fetch_array($query)) {
 ?>
						<img src="images/hackathons/<?php echo $row['h_img'];?>" alt=" " class="img-thumbnail img-responsive" width="300" height="300"/>
<h3 style="padding-top: 20px"><?php echo $row['h_name'];?></h3>
<p style="padding-top: 20px">Organization: <?php echo $row['h_org'];?>.</p>
<strong style="padding-top: 20px;font-size:20px">Description: <?php echo $row['h_desc'];?></strong><br>
<span><br></span>
<strong style="font-size:15px">Year: <?php echo $row['h_year'];?>.</strong><br>
<span><br></span>
<strong style="font-size:15px">Area: <?php echo $row['h_area'];?>.</strong><br>
<span><br></span>
<strong style="padding-top: 20px">Link:<a href="<?php echo $row['h_link'];?>" style="color: #51f5ae" class="responsive"> <?php echo $row['h_link'];?></a>.</strong>
<span><br></span>
<br>
<div class="button">
        <a href="addproject.php" style="padding-top:10px;padding-right:10px">
    <button type="button" class="btn btn-primary " style="color:'white'">Update</button>
</a>

<a>
    <button type="submit" name="delete" class="btn btn-primary " style="color:'white'">Delete</button>
</a>
        </div>
					<?php }?>
                    

    </div>
    <!-- ******************* Content end
    ********************************* -->


    <!-- ******************* footer start
    ********************************* -->
    <?php include ('includes/admin_footer.php')?>
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