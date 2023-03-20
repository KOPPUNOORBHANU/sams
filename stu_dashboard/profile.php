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
            $rollno=$_POST['rollno'];
            $fullname=$_POST['fullname'];
            $gender=$_POST['gender'];
            $institute=$_POST['institute'];
            $branch=$_POST['branch'];
            $batch=$_POST['batch'];
            $dept=$_POST['dept'];
            $dob=date('Y-m-d',strtotime($_POST['dob']));
            $email=$_POST['email'];
            $contact=$_POST['contact'];
            $address=$_POST['address'];  
              
          $query=mysqli_query($con, "UPDATE `student` SET `rollno`='$rollno',`fullname`='$fullname',`gender`='$gender',`institute`='$institute',`branch`='$branch',`dept`='$dept',`batch`='$batch',`dob`='$dob',`email`='$email',`contact`='$contact',`address`='$address' WHERE rollno='$rollno' and email='$email'");
          if ($query) {
        
          echo "<script>alert('Your details has been Updated!!');
  window.location='profile.php';
  </script>";
        }
        else
          {
            
            echo "<script>alert('Something Went Wrong. Please try again.');
  window.location='profile.php';
  </script>";
          }
      
        
      }
$img=$_FILES["img"]["name"];
$extension = substr($img,strlen($img)-4,strlen($img));
$allowed_extensions = array(".jpg",".jpeg",".png");
if(in_array($extension,$allowed_extensions))
{
    $img=md5($img).time().$extension;
move_uploaded_file($_FILES["img"]["tmp_name"],"images/students/".$img);
    $query=mysqli_query($con, "UPDATE `student` SET `image`='$img' WHERE rollno='$rollno' and email='$email'");
    if ($query) {
       echo "<script>alert('Your details has been Updated!!');
        window.location='profile.php';
        </script>";
    }
    else
        {
        echo "<script>alert('Something Went Wrong. Please try again.');
        window.location='profile.php';
        </script>";
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
    <title>Student Profile</title>

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
        <div class="waviy" >
            <span style="--i:1">P</span>
            <span style="--i:2">r</span>
            <span style="--i:3">o</span>
            <span style="--i:4">f</span>
            <span style="--i:5">i</span>
            <span style="--i:6">l</span>
            <span style="--i:7">e</span>
            <span style="--i:8">.</span>
            <span style="--i:9">.</span>
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
    <!-- Account page navigation-->
    
    <!-- <hr class="mt-0 mb-4"> -->
    <!-- Fetching Details -->
    
    <?php
$adid=$_SESSION['jklu_sams'];
$ret=mysqli_query($con,"select * from student where rollno='$adid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
?>
    <!-- end fetching -->
    <div class="row">
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Profile Picture</div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <img class="img-account-profile rounded-circle mb-2" src="images/students/<?php  echo $row['image'];?>"  width='220' height='200' alt="Image">
                    <!-- Profile picture help block-->
                    <div class="small font-italic text-muted mb-4">Hi!! <?php  echo $row['fullname'];?></div>
                    <!-- Profile picture upload button-->
                    <p><label for="file" style="cursor: pointer;" class="btn btn-primary">Upload your Profile Pic</label></p>
                            <p><img id="output" width="100"  /></p>
                            <script>
                                var loadFile = function(event) {
                                    var image = document.getElementById('output');
                                    image.src = URL.createObjectURL(event.target.files[0]);
                                };
                            </script>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Profile Details</div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <!-- Form Group (rollno)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputRollno">Roll No</label>
                            <input class="form-control" id="inputRollno" type="text" name="rollno" placeholder="Enter your Rollno" value="<?php  echo $row['rollno'];?>" readonly="true">
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputFullName">Full Name</label>
                                <input class="form-control" id="inputFullName" type="text" placeholder="Enter your full name" name="fullname" value="<?php  echo $row['fullname'];?>">
                            </div>
                            <!-- Form Group (last name)-->
                            
                        </div>
                        <!-- Form Row        -->
                        <div class="row gx-3 mb-3">
                        <div class="col-md-6">
                        <label class="small mb-1" for="gender">Gender</label>
                        <select class="form-control small mb-1" id="gender" aria-label="Default select example" name="gender" >
  <option selected="<?php  echo $row['gender'];?>" value="<?php  echo $row['gender'];?>"><?php  echo $row['gender'];?></option>
  <option value="Male">Male</option>
  <option value="Female">Female</option>
</select>
</div>
                        <div class="col-md-6 ">
                        <label class="small mb-1" for="institute">Institute</label>
                        <select class="form-control small mb-1" id="institue" aria-label="Default select example"  name="institute" >
  <option selected="<?php  echo $row['institute'];?>" value="<?php  echo $row['institute'];?>"><?php  echo $row['institute'];?></option>
  <option value="IET">IET</option>
  <option value="ID">ID</option>
  <option value="IM">IM</option>
</select>
</div>
<div class="col-md-6">
<label class="small mb-1" for="inputbranch">Branch</label>
                        <select class="form-control small mb-1" id="inputbranch" aria-label="Default select example" name="branch" >
  <option selected="<?php  echo $row['branch'];?>" value="<?php  echo $row['branch'];?>"><?php  echo $row['branch'];?></option>
  <option value="BTECH">BTECH</option>
  <option value="MTECH">MTECH</option>
  <option value="BDES">BDES</option>
  <option value="MDES">MDES</option>
  <option value="BBA">BBA</option>
  <option value="MBA">MBA</option>
</select>
</div>
<div class="col-md-6">
                                <label class="small mb-1" for="inputBatch">Batch</label>
                                <input class="form-control" id="inputbatch" type="number" min="1900" max="2099" step="1" name="batch" placeholder="Select Your Batch (started year)" value="<?php  echo $row['batch'];?>">
                            </div>
<div class="col-md-6">
                                <label class="small mb-1" for="inputBranch">Department Name</label>
                                <input class="form-control" id="inputBranch" type="text" placeholder="Enter your Department Name" name="dept" value="<?php  echo $row['dept'];?>">
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputbirth">Birth day</label>
                                
                                <input class="form-control" id="inputbirth" type="date" placeholder="Enter your Department Name" name="dob" value="<?php  echo $row['dob'];?>">
                            </div>
                            
                            
                        </div>
                        <!-- Form Group (email address)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputEmailAddress">Email address</label>
                            <input class="form-control" id="inputEmailAddress" type="email" name="email" placeholder="Enter your university email address" value="<?php  echo $row['email'];?>" readonly="true">
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone number)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone">Contact</label>
                                <input class="form-control" id="inputPhone" type="tel" name="contact" placeholder="Enter your Contact number" value="<?php  echo $row['contact'];?>">
                            </div>
                            <!-- Form Group (Address)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputaddress">Address</label>
                                <input class="form-control" id="inputAddress" type="text" name="address" placeholder="Enter your Address" value="<?php  echo $row['address'];?>">
                            </div>
                        </div>
                        <!-- Save changes button-->
                        <div class="col-md-6">
                            <label for="file" class="small mb-1 "></label>
                            <p><input class="form-control" type="file" accept="image/jpg/png"   name="img" id="file"  onchange="loadFile(event)" style="display: none;"></p>
                            
                    

                            </div>
                            <?php } ?>
                        <button class="btn btn-primary" type="submit" name="submit">Save changes</button>
                    </form>
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