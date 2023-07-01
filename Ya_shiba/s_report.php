<?php
    session_start();
    $title = 'Home';
    $page = 'home';
    include_once('assets/s_header+nav.php');

    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'yashiba';
    $connection = mysqli_connect($host, $user, $password, $database);

    if ($connection === false){
        die('Connection failed' . mysqli_connect_error());
    }else{
        // echo 'Connection establised successfully <br>';
     }

    date_default_timezone_set('Asia/Kuala_Lumpur');

    if (isset($_POST['report'])) {
        $title = $_POST['r_title'];
        $message = $_POST['r_message'];
        $status = 'Unsolved';

        if(empty($title) || empty($message)){
            echo '<script>alert("Please fill in the details")</script>';
        }else{
            // Insert data into the report table
            $query = "INSERT INTO report (USER_ID, REPORT_NAME, REPORT_DESCRIPTION, REPORT_STATUS)
            VALUES ('{$_SESSION['id']}', '$title', '$message', '$status')";

            if (mysqli_query($connection, $query)) {
                echo '<script>alert("Report sent successfully, the admin will solve the issue soon")</script>';
            } else {
                echo '<script>alert("Report sent unsuccessfully, please try again later")</script>';
            }
        }
        
    }

    mysqli_close($connection);

   
?>

<!DOCTYPE html>
<html lang="en">
<title>Report - Student</title>
    <body class="sb-nav-fixed">
            <div id="layoutSidenav_content" class="bg-light">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Report</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"></li>
                        </ol>
                        <form method="post">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Title Name</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="r_title" >
                        </div>
                            <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Report Description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="r_message" ></textarea>
                        </div>
                        <div class="d-flex flex-column align-items-center"> 
                            <div class="mb-3">
                            <button type="submit" class="submitbtn" style="width:150px" name="report" value="Submit"><span>Submit</span></button>
                            </div>
                        </div>
                        </form> 
                    </div>
                </main>
                <?php
                    $title = 'Home';
                    $page = 'home';
                    include_once('assets/footer.php');
                ?>
            </div>
        </div>
    </body>
</html>
