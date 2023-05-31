    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/nav+body.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>    
    <nav class="sb-topnav navbar navbar-expand navbar-light sb-sidenav-white">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-4">Ya-Shiba<img src="img/Logo(Ya-Shiba).png" class="logo" width="57" height="50" alt=""></a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar for profile-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="g_homepage.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <!-- sideNav bg color-->>
                <nav class="sb-sidenav accordion sb-sidenav-white" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="t_homepage.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-school"></i></i></div>
                                All Classes
                            </a>
                            <div class="sb-sidenav-menu-heading">Others</div>
                            <a class="nav-link" href="t_create_classes.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-square-plus"></i></div>
                                Create Classes
                            </a>
                            <a class="nav-link" href="t_hidden_class.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-eye-slash"></i></div>
                                Hidden Classes
                            </a>
                            <a class="nav-link" href="t_student_batch.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Student Batch
                            </a>
                            <a class="nav-link" href="t_report.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-flag"></i></div>
                                Report
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Teacher
                    </div>
                </nav>
            </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>

