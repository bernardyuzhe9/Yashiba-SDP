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

    if (isset($_POST['show'])) {
        $newstatus = "Show";
        if (isset($_POST['classroomid'])) {
            $classroomID = $_POST['classroomid'];
            mysqli_query($connection, "UPDATE enrolled_classroom SET STATUS='$newstatus' WHERE CLASSROOM_ID='$classroomID'");    
        }
    }
    if(isset($_POST['delete'])){
        if (isset($_POST['classroomid'])) {
            $classroomID = $_POST['classroomid'];
            mysqli_query($connection, "DELETE FROM enrolled_classroom WHERE CLASSROOM_ID='$classroomID'"); 
            mysqli_query($connection,"DELETE FROM classroom WHERE CLASSROOM_ID='$classroomID'");
            echo '<script>alert("Class has been deleted successfully")</script>';
        }
    }
    if(isset($_POST['goclass'])){
        
        $classroomid = $_POST['classroomid'];
        
    $query = "SELECT * FROM classroom WHERE CLASSROOM_ID = '$classroomid'";
    $results = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($results); //$row['email']
    $count = mysqli_num_rows($results); //1 or 0
    if($count == 1){
        
        $_SESSION['classroomid'] = $row['CLASSROOM_ID'];
        $_SESSION['classroomname'] = $row['CLASS_NAME'];
        $_SESSION['classroomnstudent'] = $row['CLASS_NAME'];
        echo '<script>window.location.href = "t_courseoveerview.php";</script>';
        exit();
    }}
?>

<!DOCTYPE html>
<html lang="en">
<title>Hidden Class - Teacher</title>

    <body class="sb-nav-fixed">
            <div id="layoutSidenav_content" class="bg-light">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Hidden Classes</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"></li>
                        </ol>
                        <div class="row">
                        <?php 


                            $status = "Hidden";
                            $classes = mysqli_query($connection, "SELECT * FROM enrolled_classroom WHERE USER_ID = '$userid' AND STATUS='".$status."'");

                           $class = mysqli_fetch_assoc($classes);
                           $count = mysqli_num_rows($classes); 
                           
                           foreach ($classes as $class) { 
                          
                            $classdetails = mysqli_query($connection, "SELECT * FROM classroom WHERE CLASSROOM_ID=".$class['CLASSROOM_ID']."");

                               $classdetails = mysqli_fetch_assoc($classdetails)
                        ?>
                        <div class="card" style="width: 18rem; margin-right: 60px; margin-top: 10px;margin-bottom:15px;height:400px;max-height:400px;">
                            <img src="classroom/<?php echo $classdetails["CLASS_BACKGROUND"]; ?>" style="height: 150px; object-fit: cover;width: 17.9rem;margin-left:-12px;border-radius:5px;"alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $classdetails["CLASS_NAME"]; ?></h5>
                                <p class="card-text"style="height:120px;font-family:Mukta;"><?php echo strlen($classdetails["CLASS_DESCRIPTION"]) > 100 ? substr($classdetails["CLASS_DESCRIPTION"], 0, 150) . "..." : $classdetails["CLASS_DESCRIPTION"]; ?>
                                <hr class="divider" />
                                <form action="#" method="post">
                                <a href="#" >
                                <input type="hidden" name="classroomid" value="<?php echo $classdetails['CLASSROOM_ID']; ?>">
                                <button type="submit" class="hide-button" name="show" style="background: none; border: none;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-eye-fill; float-end" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                
                                </svg>
                                </a>
                                </button>
                                <a>
                                <button type="submit" class="viewbtn" name="goclass">
                                View
                                </a>
                                </button>
                                <a href="#" >
                                <input type="hidden" name="classroomid" value="<?php echo $classdetails['CLASSROOM_ID']; ?>">
                                <button type="submit" class="delete-button" name="delete" style="background: none; border: none;"onclick="return confirm('Are you sure you want to proceed?')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16" style="margin-top: -15px;margin-left:30px;">
                                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                </svg>
                                </a>
                                </button>  
                                </form>
                            </div>
                        </div>
                        <?php 
                        }
                        ?>
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
