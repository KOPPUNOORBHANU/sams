
    <header>
        <div class="logo">JKLUIAN'S ACHIEVEMENTS</div>
        <nav class="container">
            <ul>
                <li><a href="#" class="active">Home</a></li>
                <li><a href="#">Branch</a>
                    <ul>
                        <li><a href="#">IET</a>
                            <li><a href="#">ID</a>
                                <li><a href="#">IM</a>
                    </ul>
                    </li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Sign In/Up</a>
                        <ul>
                            <li><a href="stu_dashboard/studentsign.php">Student</a></li>
                            <li><a href="stu_dashboard/ad_dashboard/adminlogin.php">Admin</a></li>
                        </ul>
                    </li>
            </ul>
        </nav>
        <div class="menu-toggle"><i class="fa fa-bars"></i></div>
    </header>

    <script>
        const btn = document.querySelector('.menu-toggle');
        const nav = document.querySelector('nav');

        btn.addEventListener('click', () => {

            nav.classList.toggle('active');
        })
    </script>
