<?php
$con=mysqli_connect("localhost", "root", "", "jklu_sams");
if(mysqli_connect_errno()){
echo "Connection Fail".mysqli_connect_error();
}
session_start();
error_reporting(0);
?>


<!--**********************************
            Sidebar start
        ***********************************-->
        <?php
$adid=$_SESSION['jklu_sams'];
$ret=mysqli_query($con,"select * from student where rollno='$adid'");

$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
?>
        <div class="dlabnav">
            <div class="dlabnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="dropdown header-profile">
                        <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown">
                            <img src="images/students/<?php  echo $row['image'];?>" width="20" alt="" />
                            <div class="header-info ms-3">
                                <span class="font-w600 ">Hi,
                                
<b>
                                
<?php  echo $row['fullname'];?>
                                </b></span>
                                <small class="text-end font-w400">
                                
                                
                                    
                                <?php  echo $row['rollno'];?></small>
                                
                            </div>
                            <?php } ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                    <a href="profile.php" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <span class="ms-2">Profile </span>
                                    </a>
                                    <a href="settings.php" class="dropdown-item ai-icon">
                                        <svg id="icon-settings" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                        <!-- <i class="flaticon-admin"></i> -->
                                        <span class="ms-2">Settings </span>
                                    </a>
                                    <a href="stu_logout.php" class="dropdown-item ai-icon">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                        <span class="ms-2">Logout </span>
                                    </a>
                            </div>
                        

                    </li>
                    <li>
                        <a href="index.php" aria-expanded="false">
                            <i class="flaticon-025-dashboard"></i>
                            <span class="nav-text">Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="project.php" aria-expanded="false">
                            <i class="flaticon-050-info"></i>
                            <span class="nav-text">Projects</span>
                        </a>
                    </li>
                    <li>
                        <a href="hackathon.php" aria-expanded="false">
                            <i class="flaticon-041-graph"></i>
                            <span class="nav-text">Hackathons</span>
                        </a>
                    </li>
                    <li>
                        <a href="internship.php" aria-expanded="false">
                            <i class="flaticon-086-star"></i>
                            <span class="nav-text">Internships</span>
                        </a>
                    </li>
                    <li>
                        <a href="extra_circular.php" aria-expanded="false">
                            <i class="flaticon-045-heart"></i>
                            <span class="nav-text">Extra Curricular Activities</span>
                        </a>
                    </li>
                    <li>
                        <a href="special.php" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-013-checkmark"></i>
                            <span class="nav-text">Special Achievement</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->