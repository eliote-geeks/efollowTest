<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Focus Admin: Creative Admin Dashboard</title>
    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">
    <!-- Styles -->
    <link href="assets/css/lib/calendar2/semantic.ui.min.css" rel="stylesheet">
    <link href="assets/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="assets/css/lib/chartist/chartist.min.css" rel="stylesheet">
    <link href="assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="assets/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="assets/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="assets/css/lib/weather-icons.css" rel="stylesheet" />
    <link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/lib/helper.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
    <div id="main-wrapper">

        <div class="nav-header">
            <a href="index.html" class="brand-logo">
                <img class="logo-abbr" src="assets/images/logo.png" alt="">
                <img class="logo-compact" src="assets/images/logo-text.png" alt="">
                <img class="brand-title" src="assets/images/logo-text.png" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>

        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">

                        </div>

                        <ul class="navbar-nav header-right">

                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="assets/php/logout">
                                    <i class="fas fa-sign-out fs-5"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">

                    <li class="nav-label first active">
                        <span class="nav-text">Gestion des classes</span></a>
                    </li>
                    <!-- <li><a href="index.html"><i class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a>
                        </li> -->
                    <li><a href="level-list.php" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-star"></i><span class="nav-text" style="margin-left: 12px;">Liste des
                                    niveaux</span>
                            </div>
                        </a></li>

                    <li><a href="speciality-list.php" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-book"></i><span class="nav-text" style="margin-left: 12px;">Liste des
                                    spécialités</span>
                            </div>
                        </a></li>

                    <li class="nav-label first active">
                        <span class="nav-text">Gestion des étudiants</span></a>
                    </li>
                    <!-- <li><a href="index.html"><i class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a>
                        </li> -->
                    <li><a href="students-list.php" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-graduation-cap"></i><span class="nav-text"
                                    style="margin-left: 12px;">Liste
                                    des étudiants</span>
                            </div>
                        </a></li>

                    <li class="nav-label first active">
                        <span class="nav-text">Gestion des professeurs</span></a>
                    </li>
                    <!-- <li><a href="index.html"><i class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a>
                        </li> -->
                    <li><a href="teachers-list.php" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-chalkboard-teacher"></i><span class="nav-text"
                                    style="margin-left: 12px;">Liste des professeurs</span>
                            </div>
                        </a></li>

                    <li class="nav-label first active">
                        <span class="nav-text">Gestion des cours</span></a>
                    </li>
                    <!-- <li><a href="index.html"><i class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a>
                        </li> -->
                    <li><a href="course-list.php" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-book-open"></i><span class="nav-text"
                                    style="margin-left: 12px;">Liste
                                    des cours</span>
                            </div>
                        </a></li>

                    <li><a href="session-list.php" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-clock"></i><span class="nav-text" style="margin-left: 12px;">Liste
                                    des sessions</span>
                            </div>
                        </a></li>

                    <li><a href="program-list.php" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-book-reader"></i><span class="nav-text"
                                    style="margin-left: 12px;">Liste
                                    des programmes</span>
                            </div>
                        </a></li>

                    <li class="nav-label first active">
                        <span class="nav-text">Historique</span></a>
                    </li>
                    <!-- <li><a href="index.html"><i class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a>
                        </li> -->
                    <li><a href="absence-list.php" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-history"></i><span class="nav-text"
                                    style="margin-left: 12px;">Historique des absences</span>
                            </div>
                        </a></li>

                </ul>
                </li>
                </ul>
            </div>
        </div>
        
    {{-- </div> --}}


    <div class="content-wrap">
        {{ $slot }}
    </div>


    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.12.1/i18n/fr-FR.json"
                },
                "dom": '<"d-flex justify-content-between align-items-center mb-3"<"d-flex align-items-center"l><"d-flex align-items-center"f>>t<"d-flex justify-content-between align-items-center"ip>'
            });
        });
    </script>

    <!-- jquery vendor -->
    <script src="assets/js/lib/jquery.min.js"></script>
    <script src="assets/js/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="assets/js/lib/menubar/sidebar.js"></script>
    <script src="assets/js/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->

    <!-- bootstrap -->

    <script src="assets/js/lib/calendar-2/moment.latest.min.js"></script>
    <!-- scripit init-->
    <script src="assets/js/lib/calendar-2/semantic.ui.min.js"></script>
    <!-- scripit init-->
    <script src="assets/js/lib/calendar-2/prism.min.js"></script>
    <!-- scripit init-->
    <script src="assets/js/lib/calendar-2/pignose.calendar.min.js"></script>
    <!-- scripit init-->
    <script src="assets/js/lib/calendar-2/pignose.init.js"></script>
    <!-- scripit init-->


    <script src="assets/js/lib/weather/jquery.simpleWeather.min.js"></script>
    <script src="assets/js/lib/weather/weather-init.js"></script>
    <script src="assets/js/lib/circle-progress/circle-progress.min.js"></script>
    <script src="assets/js/lib/circle-progress/circle-progress-init.js"></script>
    <script src="assets/js/scripts.js"></script>
    <!-- scripit init-->
</body>

</html>
