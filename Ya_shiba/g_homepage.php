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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link rel="stylesheet" href="css/g_homepage.css">

    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-light sb-sidenav-white">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" style ="font-family:Karla; cursor: pointer;" href= "g_homepage.php">Ya-Shiba <img src="img/Logo(Ya-Shiba).png" class="logo ml-3" width="55" height="50" alt="" ></a>
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
                        <li><a class="dropdown-item" href="g_login.php">Login</a></li>
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
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-magnifying-glass"></i></div>
                                Why Choose Us?
                            </a>
                            <a class="nav-link" href="#OurTeam">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-people-group"></i></div>
                                Our Team
                            </a>
                            <a class="nav-link" href="#PScholl">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-school"></i></div>
                                Partnership Schools
                            </a>
                            <a class="nav-link" href="#Review">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-pencil"></i></div>
                                Review
                            </a>
                            <a class="nav-link" href="#ContactUs">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-phone"></i></div>
                                Contact Us
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
                        <!--Slider -->
                        <div id="imageSlider">
                            <div class="islider">
                                <!--radio buttons -->
                                <div class="islides">
                                <input type="radio" name="radio-btn" id="radio1">
                                <input type="radio" name="radio-btn" id="radio2">
                                <input type="radio" name="radio-btn" id="radio3">
                                <input type="radio" name="radio-btn" id="radio4">
                                <!-- slide images -->
                                <div class="islide first">
                                    <img src="img/Slider1.png" alt="User Friendly" title="User Friendly">
                                </div>
                                <div class="islide">
                                    <img src="img/Slider2.png" alt="Super Secure" title="Super Secure">
                                </div>
                                <div class="islide">
                                    <img src="img/Slider3.png" alt="Progress Tracking" title="Progress Tracking">
                                </div>
                                <div class="islide">
                                    <img src="img/Slider4.png" alt="School Request" title="School Request">
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
                                        <p style ="font-family:Mukta;">
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
                                        <p style ="font-family:Mukta;">
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
                                        <p style ="font-family:Mukta;">
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
                                        <p style ="font-family:Mukta;">Project Manager</p>
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
                                        <p style ="font-family:Mukta;">System Analyst</p>
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
                                        <p style ="font-family:Mukta;">Back-End Developer</p>
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
                                        <p style ="font-family:Mukta;">Front-End Developer</p>
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
                            <div class="pscontainer">
                                <h1>Partnership Schools</h1>
                            </div>
                            <div class="slider">
                                <div class="slider-track">
                                    <div class="slide">
                                        <img src="img/MCM.png" alt="logo">
                                    </div>
                                    <div class="slide">
                                        <img src="img/MLK.png" alt="logo">
                                    </div>
                                    <div class="slide">
                                        <img src="img/Seri Botani.png" alt="logo">
                                    </div>
                                    <div class="slide">
                                        <img src="img/SMK_Bandar_Puchong_Jaya_(A).png" alt="logo">
                                    </div>
                                    <div class="slide">
                                        <img src="img/ST.John.png" alt="logo">
                                    </div>
                                    <div class="slide">
                                        <img src="img/Seri Kembangan.png" alt="logo">
                                    </div>
                                    <div class="slide">
                                        <img src="img/Seksyen 3.png" alt="logo">
                                    </div>
                                    <div class="slide">
                                        <img src="img/Seri Serdang.gif" alt="logo">
                                    </div>
                                    <div class="slide">
                                        <img src="img/MCM.png" alt="logo">
                                    </div>
                                    <div class="slide">
                                        <img src="img/MLK.png" alt="logo">
                                    </div>
                                    <div class="slide">
                                        <img src="img/Seri Botani.png" alt="logo">
                                    </div>
                                    <div class="slide">
                                        <img src="img/SMK_Bandar_Puchong_Jaya_(A).png" alt="logo">
                                    </div>
                                    <div class="slide">
                                        <img src="img/ST.John.png" alt="logo">
                                    </div>
                                    <div class="slide">
                                        <img src="img/Seri Kembangan.png" alt="logo">
                                    </div>
                                    <div class="slide">
                                        <img src="img/Seksyen 3.png" alt="logo">
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section id="Review">
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-10 col-xl-8 text-center">
                                <h1 class="reviewtitle">Review</h1>
                                <p class="mb-4 pb-2 mb-md-5 pb-md-0" style ="font-family:Mukta;">
                                The Ya-Shiba E-Learning System is an innovative online platform that provides comprehensive educational 
                                resources and interactive tools for learners of all ages, fostering engaging and effective remote learning experiences.
                                </p>
                                </div>
                            </div>

                            <div class="row text-center">
                                <div class="col-md-4 mb-5 mb-md-0">
                                <div class="d-flex justify-content-center mb-4">
                                    <img src="img/KPM.jpg"
                                    class="rounded-circle shadow-1-strong" width="150" height="150" />
                                </div>
                                <h5 class="mb-3">Kementerian Pendidikan Malaysia</h5>
                                <h6 class="text-primary mb-3">Malaysian Institute of Education </h6>
                                <p class="px-xl-3" style ="font-family:Mukta;">
                                    <i class="fas fa-quote-left pe-2"></i>With its comprehensive curriculum, interactive modules, and user-friendly interface, it has successfully enhanced remote learning experiences. 
                                    The system's adaptability and extensive resources make it a valuable tool for educators and students alike. Highly recommended it to all school in Malaysia
                                </p>
                                <ul class="list-unstyled d-flex justify-content-center mb-0">
                                    <li>
                                    <i class="fas fa-star fa-sm text-warning"></i>
                                    </li>
                                    <li>
                                    <i class="fas fa-star fa-sm text-warning"></i>
                                    </li>
                                    <li>
                                    <i class="fas fa-star fa-sm text-warning"></i>
                                    </li>
                                    <li>
                                    <i class="fas fa-star fa-sm text-warning"></i>
                                    </li>
                                    <li>
                                    <i class="fas fa-star-half-alt fa-sm text-warning"></i>
                                    </li>
                                </ul>
                                </div>
                                <div class="col-md-4 mb-5 mb-md-0">
                                <div class="d-flex justify-content-center mb-4">
                                    <img src="img/Lecturer.jpg"
                                    class="rounded-circle shadow-1-strong" width="150" height="150" />
                                </div>
                                <h5 class="mb-3">Mr. Dhason</h5>
                                <h6 class="text-primary mb-3">SDP Lecturer</h6>
                                <p class="px-xl-3" style ="font-family:Mukta;">
                                    <i class="fas fa-quote-left pe-2"></i>I am absolutely thrilled with the Ya-Shiba E-Learning System! It offers a seamless and user-friendly interface, a vast library of educational content, and interactive features that enhance student engagement. 
                                    It has revolutionized my teaching experience, making remote instruction a breeze. A true game-changer!
                                </p>
                                <ul class="list-unstyled d-flex justify-content-center mb-0">
                                    <li>
                                    <i class="fas fa-star fa-sm text-warning"></i>
                                    </li>
                                    <li>
                                    <i class="fas fa-star fa-sm text-warning"></i>
                                    </li>
                                    <li>
                                    <i class="fas fa-star fa-sm text-warning"></i>
                                    </li>
                                    <li>
                                    <i class="fas fa-star fa-sm text-warning"></i>
                                    </li>
                                    <li>
                                    <i class="fas fa-star fa-sm text-warning"></i>
                                    </li>
                                </ul>
                                </div>
                                <div class="col-md-4 mb-0">
                                <div class="d-flex justify-content-center mb-4">
                                    <img src="img/Seksyen 3.png"
                                    class="rounded-circle shadow-1-strong" width="150" height="150" />
                                </div>
                                <h5 class="mb-3">SMK Seksyen 3 Bandar Kinrara</h5>
                                <h6 class="text-primary mb-3">students</h6>
                                <p class="px-xl-3" style ="font-family:Mukta;">
                                    <i class="fas fa-quote-left pe-2"></i>
                                    As a secondary school student, I highly recommend the Ya-Shiba E-Learning System. It offers a wide range of subjects with interactive lessons and quizzes that keep me engaged. 
                                    The platform's user-friendly interface and comprehensive resources have greatly enhanced my learning experience.
                                </p>
                                <ul class="list-unstyled d-flex justify-content-center mb-0">
                                    <li>
                                    <i class="fas fa-star fa-sm text-warning"></i>
                                    </li>
                                    <li>
                                    <i class="fas fa-star fa-sm text-warning"></i>
                                    </li>
                                    <li>
                                    <i class="fas fa-star fa-sm text-warning"></i>
                                    </li>
                                    <li>
                                    <i class="fas fa-star fa-sm text-warning"></i>
                                    </li>
                                    <li>
                                    <i class="far fa-star fa-sm text-warning"></i>
                                    </li>
                                </ul>
                                </div>
                            </div>
                        </section>
                        <section id="ContactUs">
                            <div class="pscontainer">
                                <h1>Contact Us</h1>
                                <h6 style="text-align: center;">If your school like to request to use our e-learning platform, you can contact us through the method below.It will take 2 to 3 working days</h6>
                            </div>
                            <div class="contactUs">
                                <div class="contactus">
                                    <div class="cucard">
                                        <i class="card-icon far fa-envelope"></i>
                                        <p style ="font-family:Mukta;">yashiba@gmail.com</p>
                                    </div>
                                    <div class="cucard">
                                        <i class="card-icon fas fa-phone"></i>
                                        <p style ="font-family:Mukta;">03-19203819</p>
                                    </div>
                                    <div class="cucard">
                                        <i class="card-icon fab fa-instagram"></i>
                                        <p style ="font-family:Mukta;">yashiba2023</p>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section id="JoinUs">
                            <div>
                                <h1 class="jointitle">Join Us Now!!!!</h1>
                                <h3 class="joincaption">Sign Up by pressing the link below</h3>
                            </div>
                            <a href="g_register.php">
                            <button class="signupb">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="30" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path fill="currentColor" d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"></path></svg> Sign Up
                                </span>
                            </button>
                            </a>
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
