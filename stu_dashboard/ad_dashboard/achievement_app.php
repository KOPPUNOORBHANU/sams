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
                        Achivement Approvals
                    </div>
                    <div class="card-body">
                    <table class="table table-hover">
            <thead>
            <?php
            $adid=$_SESSION['jklu_sams'];
            $ret=mysqli_query($con,"select * from admin where name='$adid'");

            $cnt=1;
            while ($row=mysqli_fetch_array($ret)) {
            ?>
                <?php
            include ("includes/connn.php");
                if ($con === false) {
                    die("Opps Unable to connect " . mysqli_connect_error());
                }

            $sql = "SELECT * FROM project where pr_status=0 ";}
            if ($result = mysqli_query($con, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    echo "<tr>";
                    echo "<th scope='col'>Name</th>";
                    echo "<th scope='col'>Image</th>";
                    echo "<th scope='col'>Year</th>";
                    echo "<th scope='col'>Status</th>";
                    echo "<th scope='col'>More</th>";
                    echo "</tr>";
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr scope='row'>";
                        echo "<td scope='row'>"  . $row['pr_name']  .  "</td>";
                        echo "<td scope='row'>" .'<a href="ad_project_desc.php?pr_id='.$row["pr_id"].'">'. "<img src=../images/projects/".$row['pr_img'].'  class="img-thumbnail"  width=100px height="100px">'.'</a>' . "</td>";
                        
                        echo "<td scope='row'>" . $row['pr_year'] . "</td>";
                        echo "<td scope='row'>"."<select onchange=approve_reject(this.value, ". $row['pr_status'].")><option>Status</option><option class='btn-info' value='1'><a class='label theme-bg text-white f-11'>Accept</a></option><option class='btn-info' value='0'><a class='label theme-bg text-white f-11'>Reject</a></option><select></td>";
                        // "<select onchange="approve_reject(this.value, echo $row['pr_status'])"><option>Status</option></select>"
                        // echo "<td scope='row'><button type='submit' value='accept' class='btn btn-primary'>Accept</button></td>";
                        // echo "<td scope='row'><button type='submit' value='reject' class='btn btn-primary '>Reject</button></td>";
                        echo "<td scope='row'>" . '<a href="ad_project_desc.php?pr_id='.$row["pr_id"].'">'."<img src='../img/more1.png' width=20px height='20px'>".'</a>'. '</td>';
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