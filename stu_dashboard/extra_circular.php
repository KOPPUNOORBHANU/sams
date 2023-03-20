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
        <a href="addextra.php" >
            <button type="button" class="btn btn-primary " style="color:'white'">Add Extra Curicular Activities</button>
        </a>
        </div>
        <!-- Fetching Info -->
        <br><span>
<div class="card mb-4">
    <div class="card-header">
Extra Curicular Activities
    </div>
    <div class="card-body">
    <table class="table table-hover">
  <thead>
  <?php
$adid=$_SESSION['jklu_sams'];
$ret=mysqli_query($con,"select * from student where rollno='$adid'");

$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
?>
    <?php
include ("includes/conn.php");
    if ($con === false) {
        die("Opps Unable to connect " . mysqli_connect_error());
    }

$sql = "SELECT * FROM extra where rollno='$adid'";}
if ($result = mysqli_query($con, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        echo "<tr>";
        echo "<th scope='col'>Image</th>";
        echo "<th scope='col'>Name</th>";
        echo "<th scope='col'>Organization</th>";
        echo "<th scope='col'>Year</th>";
        echo "<th scope='col'>More</th>";
        echo "</tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr scope='row'>";
            echo "<td scope='row'>" .'<a href="extra_desc.php?e_id='.$row["e_id"].'">'. "<img src=images/extra_c_act/".$row['e_img'].'  class="img-thumbnail"  width=100px height="100px">'.'</a>' . "</td>";
            echo "<td scope='row'>"  . $row['e_name']  .  "</td>";
            echo "<td scope='row'>"  . $row['e_org']  .  "</td>";
            echo "<td scope='row'>" . $row['e_year'] . "</td>";
            echo "<td scope='row'>" . '<a href="extra_desc.php?e_id='.$row["e_id"].'">'."<img src='img/more1.png' width=20px height='20px'>".'</a>'. '</td>';
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else {
        echo "No records found";
    }
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
}
    ?>
  </thead>
  
</table>

    </div>

</div>


</div>
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