
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
   


if(isset($_POST['post-submit']) ){
    $class= $_POST['class'];
    $description= $_POST['description'];
    $classcode= $_POST['classcodetxt'];
    $number="1";
    $task_number="0";
    $userid="1";
    $status="Show";
    $query1 =mysqli_query($connection,"SELECT * FROM classroom WHERE CLASS_CODE = '$classcode'");
    $row = mysqli_fetch_assoc($query1); 
    $count = mysqli_num_rows($query1);
    if($count == 1){
        // echo '<script>alert("There is repeated classcode, please try another username ")</script>';

    }else{
    if(isset($_FILES['my_image'] )){
     
   
      $img_name=$_FILES['my_image']['name'];
      // $img_name=empty($_POST['image'])?"":$_FILES['my_image']['name'];
      $img_size=$_FILES['my_image']['size'];
      $tmp_name=$_FILES['my_image']['tmp_name'];
      $error=$_FILES['my_image']['error'];
  
      if($error === 0){
          if($img_size>1250000){
              $em="sorry your file is too lagre";
            //   header("Location: postupload.php?error=$em");
          }else{
              $img_ex = pathinfo($img_name,PATHINFO_EXTENSION);
              $img_ex_lc = strtolower($img_ex);
              $allowed_exs=array("jpg","jpeg","png");
              
              
              if(in_array( $img_ex_lc,$allowed_exs)){
  
                  $new_img_name=uniqid("IMG-",true).'.'.$img_ex_lc ;
                  $img_upload_path='classroom/'.$new_img_name;
                  move_uploaded_file($tmp_name,$img_upload_path);
                  //Insert into database
                //   echo '<script>alert("You submited")</script>';
                  $sql = "INSERT INTO classroom (CLASS_CODE, USER_ID , CLASS_NAME , CLASS_DESCRIPTION, CLASS_BACKGROUND , NUM,TASK_NUM) 
                  VALUES ('$classcode','$userid','$class','$description','$new_img_name','$number','$task_number')"; 
                  mysqli_query($connection,$sql);
                  $classroomId = mysqli_insert_id($connection);
                  $sql2 = "INSERT INTO enrolled_classroom (CLASSROOM_ID,USER_ID,STATUS) 
                  VALUES ('$classroomId','$userid','$status')";

                  mysqli_query($connection,$sql2);
              }else{
                  $em="You cant upload this type of files";
            
              }
          }
      }else{
        $new_img_name="hihi.png";
        $sql = "INSERT INTO classroom (CLASS_CODE, USER_ID , CLASS_NAME , CLASS_DESCRIPTION, CLASS_BACKGROUND , NUM,TASK_NUM) 
        VALUES ('$classcode','$userid','$class','$description','$new_img_name','$number','$task_number')"; 
        mysqli_query($connection,$sql);
        $classroomId = mysqli_insert_id($connection);
        $sql2 = "INSERT INTO enrolled_classroom (CLASSROOM_ID,USER_ID,STATUS) 
        VALUES ('$classroomId','$userid','$status')";

        mysqli_query($connection,$sql2);
      
        }
    } 

  
   
}

}
  
// mysqli_close($connection);
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
        <link href="css/test.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/button.css">
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Mukta:wght@300&display=swap" rel="stylesheet">
    </head>
    <body>   
    <nav class="sb-topnav navbar navbar-expand navbar-light sb-sidenav-white">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" style ="font-family:Karla; cursor: pointer;" href= "t_homepage.php">Ya-Shiba <img src="img/Logo(Ya-Shiba).png" class="logo ml-3" width="55" height="50" alt="" ></a>
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
                        <li><a class="dropdown-item" href="t_user_profile.php">View Profile</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#">Log Out</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav" style ="font-family:Nunito;">
                <!-- sideNav bg color-->
                <nav class="sb-sidenav accordion sb-sidenav-white" id="sidenavAccordion">
                    <div class="sb-sidenav-menu" >
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="t_homepage.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-school"></i></i></div>
                                All Classes
                            </a>
                            <div class="sb-sidenav-menu-heading">Others</div>
                            <a class="nav-link" href="#" id="createclasslink">
                                <div class="sb-nav-link-icon"><i class="fas fa-square-plus"></i></div>
                                Create Classes
                            </a>
                            <a class="nav-link" href="t_hidden_class.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-eye-slash"></i></div>
                                Hidden Classes
                            </a>
                            <a class="nav-link" href="t_student_batch_main.php">
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
            <!-- Modal -->

            <div class="modal fade" id="createclassmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">  
            <form enctype="multipart/form-data"  class="flow" action="#" method="post" onsubmit="return validateClassForm()">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Class</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
               
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Class Name</label>
                        <input type="text" class="form-control" required placeholder="Please enter your class name" name="class">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label" >Class Code</label>
                        <span  id =codeC-error></span>
                        <input type="text" class="form-control"  required id="codeInput" name="classcodetxt" onkeyup="validateCode()" placeholder="Please enter your class code (4 letters 4 digits) ">
                       
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Class description</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" required name="description"></textarea>
                    </div>
                    <div class="mb-3">
                    <label for="formFile" class="form-label">Class Background</label>
                    <input class="form-control" type="file" id="formFile"  name="my_image">
                    </div>
                </div>
                <div class="modal-footer">
                    <span  id =submitC-error></span>
                    <button type="submit" class="btn btn-primary" name="post-submit">Confirm</button>
                    
                </div>

                </form>
                </div>
            </div>
            </div>
        </body>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var joinClassLink = document.getElementById("createclasslink");
                joinClassLink.addEventListener("click", function(event) {
                    event.preventDefault(); 
                    var modal = new bootstrap.Modal(document.getElementById("createclassmodal"));
                    modal.show();
                });
            });
        </script>
        <script src="assets/validation.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
</html>

