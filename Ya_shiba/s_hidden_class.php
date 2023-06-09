<!-- Programmer Name: She Jun Yuan-->
<!-- Program Name : Student Hidden Class -->
<!-- Description:Hide Student class -->
<!-- First Written: 22/6/2023 -->
<!-- Eddited on: 7/7/2023-->

<?php
    $title = 'Home';
    $page = 'home';
    include_once('assets/s_header+nav.php');
    
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
    if(isset($_POST['goclass'])){
        
        $classroomid = $_POST['classroomid'];
        
    $query = "SELECT * FROM classroom WHERE CLASSROOM_ID = '$classroomid'";
    $results = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($results); //$row['email']
    $count = mysqli_num_rows($results); //1 or 0
    if($count == 1){
        
        $_SESSION['classroomid'] = $row['CLASSROOM_ID'];
        $_SESSION['classroomname'] = $row['CLASS_NAME'];
        $_SESSION['classroomnstudent'] = $row['NUM'];
        echo '<script>window.location.href = "s_courseoverview.php";</script>';
        exit();
    }}
?>

<!DOCTYPE html>
<html lang="en">
<title>Hidden Class - Student</title>
            <div id="layoutSidenav_content" class="bg-light">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">All Hidden Class</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"></li>
                        </ol>
                        <div class="row">
                        <?php 

                            
                    $userid =  $_SESSION['id'] ;
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
                           </form>
                                </div>
                            </div>
                            <?php 
                           }
                            ?>

                        </div>
                    </div>
                </main>
                <?php
                    $title = 'Home';
                    $page = 'home';
                    include_once('assets/footer.php');
                    include_once('assets/s_joinclass.php');
                ?>
            </div>
        </div>
    </body>
</html>
