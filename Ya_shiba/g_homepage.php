<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Home Page - Guest</title>
        <link rel="shortcut icon" href="img/Logo(Ya-Shiba).png">   
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/nav+body.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Mukta:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/g_homepage.css">

    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-light sb-sidenav-white">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" style ="font-family:Karla; cursor: pointer;" href= "g_homepage.php">Ya-Shiba <img src="img/Logo(Ya-Shiba).png" class="logo ml-3" width="57" height="50" alt="" ></a>
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
                        <li><a class="dropdown-item" href="login.html">Login</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav" style ="font-family:Nunito;">
                <!-- sideNav bg color-->>
                <nav class="sb-sidenav accordion sb-sidenav-white" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="#whyChooseUs">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Why Choose Us?
                            </a>
                            <a class="nav-link" href="#OurTeam">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Our Team
                            </a>
                            <a class="nav-link" href="#PSchool">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Partnership Schools
                            </a>
                            <a class="nav-link" href="#Review">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Review
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content" class="bg-light">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4" style="text-align: center;">Welcome to Ya-Shiba</h1>
                        <h3 class="mt-2" style="font-family:Karla;text-align: center;">Unlock your potential with Ya-Shiba!</h3>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"></li>
                        </ol>
                        <!-- Event and Advertisement Slider -->
                        <div id="imageSlider">
                            <div class="slider">
                                <!--radio buttons -->
                                <div class="slides">
                                <input type="radio" name="radio-btn" id="radio1">
                                <input type="radio" name="radio-btn" id="radio2">
                                <input type="radio" name="radio-btn" id="radio3">
                                <input type="radio" name="radio-btn" id="radio4">
                                <!-- slide images -->
                                <div class="slide first">
                                    <img src="image/Event1.png" alt="Sustainable Agriculture Summit" title="Sustainable Agriculture Summit">
                                </div>
                                <div class="slide">
                                    <img src="image/Event2.png" alt="10th EcoFarm Conference" title="10th EcoFarm Conference">
                                </div>
                                <div class="slide">
                                    <img src="image/Advertisement1.png" alt="Agriculture Farming Service" title="Agriculture Farming Service">
                                </div>
                                <div class="slide">
                                    <img src="image/FAQ.png" alt="Advertisment/Event FAQ" title="Advertisment/Event FAQ">
                                </div>
                                <!-- automatic navigation button -->
                                <div class="navigation-auto">
                                    <div class="auto-btn1"></div>
                                    <div class="auto-btn2"></div>
                                    <div class="auto-btn3"></div>
                                    <div class="auto-btn4"></div>
                                </div>
                                </div>
                                <!-- manual navigation button -->
                                <div class="navigation-manual">
                                    <label for="radio1" class="manual-btn"></label>
                                    <label for="radio2" class="manual-btn"></label>
                                    <label for="radio3" class="manual-btn"></label>
                                    <label for="radio4" class="manual-btn"></label>
                                </div>
                            </div>
                        </div>
                        <section id="whyChooseUs">
                            <div class="featureRow">
                                <h1>Why Choose Us</h1>
                            </div>
                            <div class="featureRow">
                                <!-- featureColumn One -->
                                <div class="featureColumn">
                                    <div class="card">
                                        <div class="icon">
                                            <i class="fa-solid fa-user" style="height:80%;width:80%;border-radius:50%;"></i>
                                        </div>
                                        <h3>User Friendly</h3>
                                        <p>
                                        Designed with simplicity in mind, our user-friendly platform offers intuitive interfaces, easy navigation, and hassle-free access to learning materials. Empowering learners of all backgrounds to 
                                        effortlessly explore, engage, and excel in their educational journey.
                                        </p>
                                    </div>
                                </div>
                                <!-- featureColumn Two -->
                                <div class="featureColumn">
                                    <div class="card">
                                        <div class="icon">
                                            <i class="fa-solid fa-shield-halved" style="height:85%;width:85%;border-radius:50%;"></i>
                                        </div>
                                        <h3>Super Secure</h3>
                                        <p>
                                        Your data security is paramount. With robust encryption, strict privacy protocols, and advanced authentication mechanisms, we provide a super secure learning environment, 
                                        ensuring your information and learning experience are protected at all times.
                                        </p>
                                    </div>
                                </div>
                                <!-- featureColumn Three -->
                                <div class="featureColumn">
                                    <div class="card">
                                        <div class="icon">
                                            <i class="fa-solid fa-headset"style="height:85%;width:85%;border-radius:50%;"></i>
                                        </div>
                                        <h3>Progress Tracking</h3>
                                        <p>
                                        Track your progress with easily. Our platform enables you to monitor your achievements, receive feedback, and stay motivated 
                                        as you chart your learning journey and achieve your educational goals.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Our Team -->
                        <section id= "OurTeam">
                            <div class="ourteamtitle">
                                <h1>Our Team</h1>
                            </div>
                            <div class="otmain">
                                <div class="otprofile-card">
                                    <div class="otimg">
                                        <img src="img/Jason.png" alt="Jason">
                                    </div>
                                    <div class="otcaption">
                                        <h3>She Jun Yuan</h3>
                                        <p>Project Manager</p>
                                        <div class="otsocial-links">
                                            <a href="https://www.facebook.com/jason.she.39/" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                                            <a href="https://www.instagram.com/junyuan.she/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                                            <a href="#"><i class="fa-solid fa-envelope"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="otprofile-card">
                                    <div class="otimg">
                                        <img src="img/MaeKay.jpg" alt="Maekay">
                                    </div>
                                    <div class="otcaption">
                                        <h3>Teoh Mae Kay</h3>
                                        <p>System Analyst</p>
                                        <div class="otsocial-links">
                                            <a href="https://www.facebook.com/mk.1007" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                                            <a href="https://www.instagram.com/mk.07x/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                                            <a href="#"><i class="fa-solid fa-envelope"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="otprofile-card">
                                    <div class="otimg">
                                        <img src="img/Huiyee.png" alt="Huiyee">
                                    </div>
                                    <div class="otcaption">
                                        <h3>Tay Hui Yee</h3>
                                        <p>Back-End Developer</p>
                                        <div class="otsocial-links">
                                            <a href="https://www.facebook.com/profile.php?id=100002569878309" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                                            <a href="https://www.instagram.com/tayyy_hy/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                                            <a href="#"><i class="fa-solid fa-envelope"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="otprofile-card">
                                    <div class="otimg">
                                        <img src="img/Bernard.jpg" alt="Huiyee">
                                    </div>
                                    <div class="otcaption">
                                        <h3>Bernard Ong Yuzhe</h3>
                                        <p>Front-End Developer</p>
                                        <div class="otsocial-links">
                                            <a href="https://www.facebook.com/bernard.ong.92798" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                                            <a href="https://www.instagram.com/bernardyuzzzzz/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                                            <a href="#"><i class="fa-solid fa-envelope"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section id="PScholl">
                            <div class="pstitle">
                                <h1>Partnership Schools</h1>

                            </div>
                        </section>
                        <section id="Review">
                            <div class="reviewtitle">
                                <h1>Review</h1>
                                
                            </div>
                            
                        </section>   
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Ya-Shiba 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script src="js/g_homepage.js"></script>
    </body>
</html>
