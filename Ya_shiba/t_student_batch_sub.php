<?php
    $title = 'Home';
    $page = 'home';
    include_once('assets/t_header+nav.php');
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'yashiba';
    $connection= mysqli_connect($host,$user,$password,$database);



    if ($connection === false){
        die('Connection failed' . mysqli_connect_error());
    }
    if(isset($_POST['delete3'])){
        if (isset($_POST['user_name'])) {
            $user_name = $_POST['user_name'];
            $sbatchid = $_SESSION['student_batch_id'];
            $getnumq = mysqli_query($connection,"SELECT * FROM student_batch WHERE STUDENT_BATCH_ID='$sbatchid'");
            $row1 = mysqli_fetch_assoc($getnumq);
            $number =$row1['NUM'];
            mysqli_query($connection, "UPDATE yashiba_user SET STUDENT_BATCH_ID=NULL WHERE USER_NAME='$user_name'");
            mysqli_query($connection, "UPDATE student_batch SET NUM=$number-1 WHERE STUDENT_BATCH_ID='$sbatchid'");
            echo '<script>alert("The student has been remove from the student batch id")</script>';
            echo '<script>window.location.href = "t_student_batch_sub.php";</script>';
        }
    }
    if(isset($_POST['add'])){
        if(isset($_POST['user_name1'])){
            $user_names =$_POST['user_name1'];
            $sbatchid = $_SESSION['student_batch_id'];
            $getnumq = mysqli_query($connection,"SELECT * FROM student_batch WHERE STUDENT_BATCH_ID='$sbatchid'");
            $row1 = mysqli_fetch_assoc($getnumq);
            $number =$row1['NUM'];
            $checkq = mysqli_query($connection,"SELECT * FROM yashiba_user WHERE USER_NAME='$user_names' AND STUDENT_BATCH_ID='$sbatchid'");
            $row = mysqli_fetch_assoc($checkq);
            $count = mysqli_num_rows($checkq);
            if($count == 1){
                echo '<script>alert("Error! The student has been added before")</script>';
            }else{
                mysqli_query($connection, "UPDATE yashiba_user SET STUDENT_BATCH_ID='$sbatchid' WHERE USER_NAME='$user_names'AND ROLE='Student'");
                mysqli_query($connection, "UPDATE student_batch SET NUM=$number+1 WHERE STUDENT_BATCH_ID='$sbatchid'");
                echo '<script>alert("The student has been added to this id")</script>';
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Student Batch - Teacher</title>
    </head>
    <body class="sb-nav-fixed">
        <div id="layoutSidenav_content" class="bg-light">
            <main>
                <div class="container-fluid px-4">
                    <?php
                        $studentbatchid = $_SESSION['student_batch_id'];
                        $sql = mysqli_query($connection, "SELECT STUDENT_BATCH_ID, STUDENT_BATCH_NAME
                            FROM student_batch
                            WHERE STUDENT_BATCH_ID = '$studentbatchid'");
                        $studentbatch = mysqli_fetch_assoc($sql);
                    ?>
                    <h2 class="mt-4">Student Batch Name: <?php echo $studentbatch['STUDENT_BATCH_NAME'] ?></h2>
                    <h4 class="mt-3">Student Batch ID: <?php echo $studentbatch['STUDENT_BATCH_ID'] ?></h4>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"></li>
                    </ol>
                    <div class="d-grid gap-3">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Student</button>
                        <?php
                            $studentbatchid = $_SESSION['student_batch_id'];
                            $sql1 = mysqli_query($connection, "SELECT USER_PROFILE, USER_NAME
                                FROM yashiba_user
                                WHERE STUDENT_BATCH_ID = '$studentbatchid'");
                            while($student = mysqli_fetch_assoc($sql1)){
                        ?>
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="col-4">
                                        <?php
                                        if ($student["USER_PROFILE"] == null) {
                                        ?>
                                            <img src="img/profile picture.jpg" class="rounded-circle" style="width: 80px; height: 80px; border-radius: 50%;margin-right:20px; ">
                                        <?php
                                        } else {
                                        ?>
                                            <img src="uploads/<?php echo $student["USER_PROFILE"] ?>" class="rounded-circle" style="width: 80px; height: 80px; border-radius: 50%; ">
                                        <?php
                                        }
                                        ?>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <h6 style="margin-left: 30px; margin-bottom: 0;margin-top:10px;">Name: </h6>
                                            <p style="margin-left: 30px; margin-top: 10px;"><?php echo $student['USER_NAME']?></p>
                                        </div>
                                    </div>
                                    <div>
                                        <form action="" method="post">
                                        <input type="hidden" name="user_name" value="<?php echo $student['USER_NAME'] ?>">
                                        <a href="#">
                                        <button type="submit" class="delete-buttons" name="delete3" style="background: none; border: none;" onclick="return confirm('Are you sure you want to proceed?')">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-fill-dash" viewBox="0 0 16 16" style="margin-right:15px;" >
                                                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7ZM11 12h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1 0-1Zm0-7a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                                <path d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z"/>
                                            </svg>
                                        </a>
                                        </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Students</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <div class="d-flex flex-column align-items-center"> <!-- Center alignment -->
                        <div class="mb-3">
                            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                            </div>
                            </form>
                        </div>
                    </div>
                    <?php
                        $schoolid = $_SESSION['schoolid'];
                        $sql2 = mysqli_query($connection, "SELECT USER_PROFILE, USER_NAME
                            FROM yashiba_user
                            WHERE SCHOOL_ID ='$schoolid'AND ROLE='Student'
                            ORDER BY USER_ID DESC
                            LIMIT 4");
                        while($school = mysqli_fetch_assoc($sql2)){
                    ?>
                    <div class="mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="col-4">
                                        <?php
                                        if ($school["USER_PROFILE"] == null) {
                                        ?>
                                            <img src="img/profile picture.jpg" class="rounded-circle" style="width: 80px; height: 80px; border-radius: 50%; ">
                                        <?php
                                        } else {
                                        ?>
                                            <img src="uploads/<?php echo $school["USER_PROFILE"] ?>" class="rounded-circle" style="width: 80px; height: 80px; border-radius: 50%; ">
                                        <?php
                                        }
                                        ?>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <h6 style="margin-left: 30px; margin-bottom: 0;margin-top:10px;">Name: </h6>
                                            <p style="margin-left: 30px; margin-top: 10px;"><?php echo $school['USER_NAME']?></p>
                                        </div>
                                    </div>
                                    <div>
                                        <form action="#" method="post">
                                        <input type="hidden" name="user_name1" value="<?php echo $school['USER_NAME'] ?>">
                                        <button type="submit" class="btn btn-primary" name="add">Add</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                    </div>
                </div>
                </div>
            </main>
            <?php
                $title = 'Home';
                $page = 'home';
                include_once('assets/footer.php');
            ?>
        </div>
    </body>
</html>