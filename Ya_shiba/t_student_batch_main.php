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
    if(isset($_POST['delete2'])){
        if (isset($_POST['batchid'])) {
            $batchid = $_POST['batchid'];
            mysqli_query($connection, "UPDATE yashiba_user SET STUDENT_BATCH_ID=NULL WHERE STUDENT_BATCH_ID='$batchid'");
            mysqli_query($connection, "DELETE FROM student_batch WHERE STUDENT_BATCH_ID='$batchid'"); 
            echo '<script>alert("The student batch id has been successfully deleted")</script>';
        }
    }
    if(isset($_POST['view'])){
        $_SESSION['student_batch_id'] = $_POST['batchid'];
        echo '<script>window.location.href = "t_student_batch_sub.php";</script>';
    }


    date_default_timezone_set('Asia/Kuala_Lumpur');
    if(isset($_POST['create'])){
        $batchname = $_POST['batch_name'];
        $batchid = $_POST['batchid'];
        $createtime = date('Y/m/d H:i:s');
        $num = 0;
        $query1 =mysqli_query($connection,"SELECT * FROM student_batch WHERE STUDENT_BATCH_ID = '$batchid'");
        $row = mysqli_fetch_assoc($query1); 
        $count = mysqli_num_rows($query1);
        $NUM="0";
        if($count ==1){
            echo '<script>alert("There are repeated student batch id")</script>';
        }else{
            $query = "INSERT INTO student_batch(STUDENT_BATCH_ID, STUDENT_BATCH_NAME,CREATED_TIME,CREATED_USER_ID_TEACHER,NUM)
            VALUES('$batchid','$batchname','$createtime','" . $_SESSION['id'] . "','$NUM')";
            if(mysqli_query($connection,$query)){
                echo '<script>alert("Successfully create student batch id")</script>';
                echo '<script>window.location.href = "t_student_batch_main.php";</script>';
            }else{
                echo '<script>alert("Error occur")</script>';
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
                    <h1 class="mt-4">Student Batch</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"></li>
                    </ol>
                    <div class="d-grid gap-3">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Create Student Batch</button>
                        <?php
                        $userid ="1";
                        $sql = mysqli_query($connection, "SELECT STUDENT_BATCH_ID, NUM
                        FROM student_batch
                        WHERE student_batch.CREATED_USER_ID_TEACHER ='$userid'");
                        while($studentbatch = mysqli_fetch_assoc($sql)){
                        ?>
                        <div class="card">
                            <div class="card-body">
                                <div class="float-start"> 
                                <h6>Student Batch No: <?php echo $studentbatch['STUDENT_BATCH_ID'] ?></h6>
                                <h6>Number of Students: <?php echo $studentbatch['NUM'] ?></h6>
                                </div>
                                <div class="float-end" style="margin-top: 10px;">
                                    <form action="#" method="post">
                                    <input type="hidden" name="batchid" value="<?php echo $studentbatch['STUDENT_BATCH_ID']; ?>">
                                    <a href="#">
                                    <button type="submit" class="view-button" name="view" style="background: none; border: none;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-people-fill people-icon" viewBox="0 0 16 16" style="margin-right:15px;" >
                                            <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                                        </svg>
                                    </a>
                                    </button>
                                    <a href="#">
                                    <button type="submit" class="delete-button" name="delete2" style="background: none; border: none;"onclick="return confirm('Are you sure you want to proceed?')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                        </svg>
                                    </a>
                                    </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        mysqli_close($connection);
                        ?>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <form enctype="multipart/form-data" action="" method="post" onsubmit="return validateBIDForm()">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" style="font-family:Karla;font-weight:bold;">Create Student Batch</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Student Batch Name</label>
                        <input type="text" class="form-control" required  placeholder="Please enter your student Batch name" name="batch_name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Student Batch ID</label>
                        <span id=batchID-error></span>
                        <input type="text" class="form-control" require id="batchid" name="batchid" onkeyup="validateBatchID()"  placeholder="Please enter your student Batch ID">

                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="create">Submit</button>
                    </div>
                    <span id=Create-error></span>
                    </div>
                </form>
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
    <script src="assets/validation.js"></script>
</html>
