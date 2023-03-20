<?php
session_start();
error_reporting(0);
include ("includes/connn.php");
if (strlen($_SESSION['jklu_sams']==0)) {
    header('location:ad_logout.php');
    } 
    else{
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link rel="stylesheet" href="vendor/chartist/css/chartist.min.css">
    <link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="img/favicon.png" />

</head>

<body>
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
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
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.html" class="brand-logo">
                <i class="logo-abbr fa-brands fa-stumbleupon"></i>

                <h2 class="brand-title">Admin</h2>
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->



        <!--**********************************
            Header start
        ***********************************-->
        <?php include ('includes/ad_header.php')?>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <?php include ('includes/ad_sidebar.php')?>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="card mb-4">
                    <div class="card-header">
                        Project Approvals
                    </div>
                    <div class="card-body">
                    <?php 
						$pr_id=$_GET['pr_id'];
 $query=mysqli_query($con,"select * from project where pr_id='$pr_id'");
 
 while ($row=mysqli_fetch_array($query)) {
 ?>
						<img src="../images/projects/<?php echo $row['pr_img'];?>" alt=" " class="img-thumbnail img-responsive" width="300" height="300"/>
<h3 style="padding-top: 20px"><?php echo $row['pr_name'];?></h3>
<p style="padding-top: 20px"><?php echo $row['pr_desc'];?>.</p>
<strong style="padding-top: 20px;font-size:20px">Department: <?php echo $row['pr_dept'];?></strong><br>
<span><br></span>
<strong style="font-size:15px">Year: <?php echo $row['pr_year'];?>.</strong><br>
<span><br></span>
<strong style="padding-top: 20px">Link:<a href="<?php echo $row['pr_link'];?>" style="color: #51f5ae" class="responsive"> <?php echo $row['pr_link'];?></a>.</strong>
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
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Designed <span class="heart"></span> <a href="#">AC</a> 2022</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->




    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->




    <script src="vendor/global/global.min.js"></script>
    <script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="vendor/chart.js/Chart.bundle.min.js"></script>

    <!-- Chart piety plugin files -->
    <script src="vendor/peity/jquery.peity.min.js"></script>

    <!-- Apex Chart -->
    <script src="vendor/apexchart/apexchart.js"></script>

    <!-- Dashboard 1 -->
    <script src="js/dashboard/dashboard-1.js"></script>

    <script src="js/custom.min.js"></script>
    <script src="js/deznav-init.js"></script>
    <script src="js/demo.js"></script>
    <script src="js/styleSwitcher.js"></script>


</body>

</html>
<?php }?>