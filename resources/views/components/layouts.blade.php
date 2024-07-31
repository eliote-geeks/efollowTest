<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Focus Admin: Creative Admin Dashboard</title>
    <!-- ================= Favicon ================== -->
    <link rel="stylesheet" href="vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="vendor/owl-carousel/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link href="vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="icons/fontawesome/css/all.css" rel="stylesheet">
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
    End link
***********************************-->


<div id="main-wrapper">

    <!--**********************************
        Nav header start
    ***********************************-->
        <div class="nav-header">
            <a href="index.html" class="brand-logo">
                <img class="logo-abbr" src="../images/logo.png" alt="">
                <img class="logo-compact" src="../images/logo-text.png" alt="">
                <img class="brand-title" src="../images/logo-text.png" alt="">
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
    <div class="header">
        <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                           
                        </div>

                    <ul class="navbar-nav header-right">
                        
                        <li class="nav-item dropdown header-profile">
                            <a class="nav-link" href="../php/logout">
                                <i class="fas fa-sign-out fs-5"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!--**********************************
        Header end ti-comment-alt
    ***********************************-->

   
        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
            
                    <li class="nav-label first active">
                    <span 
                        class="nav-text">Gestion des classes</span></a></li>
                    <!-- <li><a href="index.html"><i class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a>
                    </li> -->
                    <li><a href="level-list.php" aria-expanded="false">
                        <div class="d-flex align-items-center">
                        <i class="fas fa-star"></i><span 
                                class="nav-text" style="margin-left: 12px;">Liste des niveaux</span> 
                        </div>
                    </a></li>

                    <li><a href="speciality-list.php" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-book"></i><span 
                                class="nav-text" style="margin-left: 12px;">Liste des spécialités</span> 
                        </div>
                    </a></li>

                    <li class="nav-label first active">
                    <span 
                        class="nav-text">Gestion des étudiants</span></a></li>
                    <!-- <li><a href="index.html"><i class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a>
                    </li> -->
                    <li><a href="students-list.php" aria-expanded="false">
                        <div class="d-flex align-items-center">
                        <i class="fas fa-graduation-cap"></i><span 
                                class="nav-text" style="margin-left: 12px;">Liste des étudiants</span> 
                        </div>
                    </a></li>

                    <li class="nav-label first active">
                    <span 
                        class="nav-text">Gestion des professeurs</span></a></li>
                    <!-- <li><a href="index.html"><i class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a>
                    </li> -->
                    <li><a href="teachers-list.php" aria-expanded="false">
                        <div class="d-flex align-items-center">
                        <i class="fas fa-chalkboard-teacher"></i><span 
                                class="nav-text" style="margin-left: 12px;">Liste des professeurs</span> 
                        </div>
                    </a></li>

                    <li class="nav-label first active">
                    <span 
                        class="nav-text">Gestion des cours</span></a></li>
                    <!-- <li><a href="index.html"><i class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a>
                    </li> -->
                    <li><a href="course-list.php" aria-expanded="false">
                        <div class="d-flex align-items-center">
                        <i class="fas fa-book-open"></i><span 
                                class="nav-text" style="margin-left: 12px;">Liste des cours</span> 
                        </div>
                    </a></li>  

                    <li><a href="session-list.php" aria-expanded="false">
                        <div class="d-flex align-items-center">
                        <i class="fas fa-clock"></i><span 
                                class="nav-text" style="margin-left: 12px;">Liste des sessions</span> 
                        </div>
                    </a></li>

                    <li><a href="program-list.php" aria-expanded="false">
                        <div class="d-flex align-items-center">
                        <i class="fas fa-book-reader"></i><span 
                                class="nav-text" style="margin-left: 12px;">Liste des programmes</span> 
                        </div>
                    </a></li>

                    <li class="nav-label first active">
                    <span 
                        class="nav-text">Historique</span></a></li>
                    <!-- <li><a href="index.html"><i class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a>
                    </li> -->
                    <li><a href="absence-list.php" aria-expanded="false">
                        <div class="d-flex align-items-center">
                        <i class="fas fa-history"></i><span 
                                class="nav-text" style="margin-left: 12px;">Historique des absences</span> 
                        </div>
                    </a></li>
                 
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

 
            {{ $slot }}
            
    


     <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
    <script src="js/quixnav-init.js"></script>
    <script src="js/custom.min.js"></script>


    <!-- Vectormap -->
    <script src="vendor/raphael/raphael.min.js"></script>
    <script src="vendor/morris/morris.min.js"></script>


    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/chart.js/Chart.bundle.min.js"></script>

    <script src="vendor/gaugeJS/dist/gauge.min.js"></script>

    <!--  flot-chart js -->
    <script src="vendor/flot/jquery.flot.js"></script>
    <script src="vendor/flot/jquery.flot.resize.js"></script>

    <!-- Owl Carousel -->
    <script src="vendor/owl-carousel/js/owl.carousel.min.js"></script>

    <!-- Counter Up -->
    <script src="vendor/jqvmap/js/jquery.vmap.min.js"></script>
    <script src="vendor/jqvmap/js/jquery.vmap.usa.js"></script>
    <script src="vendor/jquery.counterup/jquery.counterup.min.js"></script>
    <script src="bootstrap/js/jquery-3.6.0.min.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="bootstrap/js/jquery.dataTables.min.js"></script>
    <script src="bootstrap/js/dataTables.bootstrap5.min.js"></script>

    <script src="js/dashboard/dashboard-1.js"></script>
</body>

</html>
