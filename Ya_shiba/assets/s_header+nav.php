<!-- Programmer Name: Bernard Ong Yuzhe & Teoh Mae Kay-->
<!-- Program Name : Student Header -->
<!-- Description: Header for student user -->
<!-- First Written: 19/6/2023 -->
<!-- Eddited on: 7/7/2023-->



<?php
    session_start();
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'yashiba';
    $connection= mysqli_connect($host,$user,$password,$database);



    if ($connection === false){
        die('Connection failed' . mysqli_connect_error());
    }


    date_default_timezone_set('Asia/Kuala_Lumpur');
    if (isset($_POST['add'])) {
        $classcode = $_POST['classcodetxt'];
        $status = "Show";
        $userid = $_SESSION['id'];
        $schoolid = $_SESSION['schoolid'];
    
        if (empty($classcode)) {
            echo '<script>alert("Please fill in the code")</script>';
        } else {
            $query = mysqli_query($connection, "SELECT * FROM classroom WHERE CLASS_CODE = '$classcode'");
            $row = mysqli_fetch_assoc($query);
            $count = mysqli_num_rows($query);
    
            if ($count == 1) {
                $USERCHECKID = $row['USER_ID'];
                $query3 = mysqli_query($connection, "SELECT * FROM yashiba_user WHERE USER_ID ='$USERCHECKID'");
                $row2 = mysqli_fetch_assoc($query3);
                $checkshl = $row2['SCHOOL_ID'];
    
                if ($schoolid == $checkshl) {
                    $classroom_id = $row['CLASSROOM_ID'];
                    $query2 = mysqli_query($connection, "SELECT * FROM enrolled_classroom WHERE CLASSROOM_ID='$classroom_id'AND USER_ID='$userid'");
                    $row1 = mysqli_fetch_assoc($query2);
                    $count1 = mysqli_num_rows($query2);
    
                    if ($count1 == 1) {
                        echo '<script>alert("Error! You have joined the class")</script>';
                    } else {
                        // Insert data into the report table
                        $query1 = "INSERT INTO enrolled_classroom (CLASSROOM_ID, USER_ID, STATUS)
                                VALUES ('$classroom_id', '" . $_SESSION['id'] . "', '$status')";
    
                        if (mysqli_query($connection, $query1)) {
                            echo '<script>alert("Successfully join the class")</script>';
                        } else {
                            echo '<script>alert("Error occur")</script>';
                        }
                    }
                } else {
                    echo '<script>alert("You are not able to join this class code")</script>';
                }
            } else {
                echo '<script>alert("Wrong class code")</script>';
            }
        }
    }
    

?>
<!DOCTYPE html>
<html lang="en"> 
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="shortcut icon" href="img/Logo(Ya-Shiba).png">   
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/nav+body.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Mukta:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/button.css">
    </head>
    <body>    
    <nav class="sb-topnav navbar navbar-expand navbar-light sb-sidenav-white">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" style ="font-family:Karla; cursor: pointer;" href= "s_homepage.php">Ya-Shiba <img src="img/Logo(Ya-Shiba).png" class="logo ml-3" width="55" height="50" alt="" ></a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" id="searchclass" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <div  class="bla" ><div id="output1"  ></div></div>
            <!-- Navbar for profile-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="s_user_profile.php">View Profile</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav" style ="font-family:Nunito;">
                <!-- sideNav bg color-->
                <nav class="sb-sidenav accordion sb-sidenav-white" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="s_homepage.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-school"></i></div>
                                All Classes
                            </a>
                            <div class="sb-sidenav-menu-heading">Others</div>
                            <a class="nav-link" href="#" id="joinClassLink">
                                <div class="sb-nav-link-icon"><i class="fas fa-arrow-right-to-bracket"></i></i></div>
                                Join Class
                            </a>
                            <a class="nav-link" href="s_hidden_class.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-eye-slash"></i></i></div>
                                Hidden Classes
                            </a>
                            <a class="nav-link" href="s_report.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-flag"></i></div>
                                Report
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Student
                    </div>
                </nav>
            </div>
        
            <!-- Modal -->
                
        </body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $("#searchclass").keypress(function(){
    var schoolID = "<?php echo $_SESSION['schoolid']; ?>"; // Retrieve school_id from Session variable

    $.ajax({
      type: 'POST',
      url: 'searchclass1.php',
      data: {
        name: $("#searchclass").val(),
        schoolID: schoolID
      },
      success: function(data){
        $("#output1").html(data);
      }
    });
  });
});

</script>
