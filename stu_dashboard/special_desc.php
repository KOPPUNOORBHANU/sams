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
						$str_id=$_GET['str_id'];
 $query=mysqli_query($con,"select * from startup where str_id='$str_id'");
 
 while ($row=mysqli_fetch_array($query)) {
 ?>
						<img src="images/startups/<?php echo $row['str_img'];?>" alt=" " class="img-thumbnail img-responsive" width="300" height="300"/>
<h3 style="padding-top: 20px">StartUp Name : <?php echo $row['str_name'];?></h3>
<p style="padding-top: 20px">StartUp Domain : <?php echo $row['str_domain'];?>.</p>
<strong style="font-size:15px">Description: <?php echo $row['str_desc'];?>.</strong><br>
<span><br></span>
<strong style="padding-top: 20px;font-size:20px">Annual Income: <?php echo $row['str_income'];?></strong><br>
<span><br></span>
<strong style="font-size:15px">Company's Email: <?php echo $row['str_email'];?>.</strong><br>
<span><br></span>
<strong style="font-size:15px">Location: <?php echo $row['str_location'];?>.</strong><br>
<span><br></span>
<strong style="font-size:15px">Started Year:  <?php echo $row['str_year'];?>.</strong><br>
<span><br></span>
<strong style="padding-top: 20px">Link for the website:<a href="<?php echo $row['str_link'];?>" style="color: #51f5ae" class="responsive"> <?php echo $row['str_link'];?></a>.</strong>
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


                    <?php 
						$r_id=$_GET['r_id'];
 $query=mysqli_query($con,"select * from research where r_id='$r_id'");
 
 while ($row=mysqli_fetch_array($query)) {
 ?>
						<img src="images/research/<?php echo $row['r_img'];?>" alt=" " class="img-thumbnail img-responsive" width="300" height="300"/>
<h3 style="padding-top: 20px">Title of Poster/Paper : <?php echo $row['r_title'];?></h3>
<p style="padding-top: 20px">Domain : <?php echo $row['r_desc'];?>.</p>
<strong style="font-size:15px">Description: <?php echo $row['r_desc'];?>.</strong><br>
<span><br></span>
<strong style="padding-top: 20px;font-size:20px">Faculty Guidence: <?php echo $row['r_faculty'];?></strong><br>
<span><br></span>
<strong style="font-size:15px">Published By: <?php echo $row['r_publish'];?>.</strong><br>
<span><br></span>
<strong style="font-size:15px">Year:  <?php echo $row['r_year'];?>.</strong><br>
<span><br></span>
<strong style="padding-top: 20px">Link for the Paper/Poster:<a href="<?php echo $row['r_link'];?>" style="color: #51f5ae" class="responsive"> <?php echo $row['r_link'];?></a>.</strong>
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


                    <!-- Scholarships -->
                    <?php 
						$sch_id=$_GET['sch_id'];
 $query=mysqli_query($con,"select * from scholarship where sch_id='$sch_id'");
 
 while ($row=mysqli_fetch_array($query)) {
 ?>
						<img src="images/scholarships/<?php echo $row['sch_img'];?>" alt=" " class="img-thumbnail img-responsive" width="300" height="300"/>
<h3 style="padding-top: 20px">Name of Scholarship : <?php echo $row['sch_name'];?></h3>
<p style="padding-top: 20px">Provided Oganization : <?php echo $row['sch_org'];?>.</p>
<strong style="font-size:15px">Amount : <?php echo $row['sch_amount'];?>.</strong><br>
<span><br></span>
<strong style="padding-top: 20px;font-size:20px">Duration: <?php echo $row['sch_duration'];?></strong><br>
<span><br></span>
<strong style="font-size:15px">Year:  <?php echo $row['sch_year'];?>.</strong><br>
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

                    <!-- pLACEMENTS -->
                    <?php 
						$p_id=$_GET['p_id'];
 $query=mysqli_query($con,"select * from placement where p_id='$p_id'");
 
 while ($row=mysqli_fetch_array($query)) {
 ?>
						<img src="images/placements/<?php echo $row['p_img'];?>" alt=" " class="img-thumbnail img-responsive" width="300" height="300"/>
<h3 style="padding-top: 20px">Job Title : <?php echo $row['p_job'];?></h3>
<p style="padding-top: 20px">Company : <?php echo $row['p_comp'];?>.</p>
<strong style="font-size:15px">Package : <?php echo $row['p_package'];?>.</strong><br>
<span><br></span>
<strong style="padding-top: 20px;font-size:20px">Company Location: <?php echo $row['p_comp_location'];?></strong><br>
<span><br></span>
<strong style="font-size:15px">Year:  <?php echo $row['p_year'];?>.</strong><br>
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

                    <!-- Other -->
                    <?php 
						$o_id=$_GET['o_id'];
 $query=mysqli_query($con,"select * from other where o_id='$o_id'");
 
 while ($row=mysqli_fetch_array($query)) {
 ?>
						<img src="images/other/<?php echo $row['o_img'];?>" alt=" " class="img-thumbnail img-responsive" width="300" height="300"/>
<h3 style="padding-top: 20px">Name of Achievement : <?php echo $row['o_name'];?></h3>
<p style="padding-top: 20px">Description : <?php echo $row['o_desc'];?>.</p>
<strong style="font-size:15px">Year:  <?php echo $row['o_year'];?>.</strong><br>
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