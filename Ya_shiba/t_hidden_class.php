<?php
    $title = 'Home';
    $page = 'home';
    include_once('assets/t_header+nav.php');

    

if ($connection === false){
    die('Connection failed' . mysqli_connect_error());
}
    $title = 'Home';
    $page = 'home';
    include_once('assets/t_header+nav.php');

    if (isset($_POST['show'])) {
        $newstatus = "Show";
        if (isset($_POST['classroomid'])) {
            $classroomID = $_POST['classroomid'];
            mysqli_query($connection, "UPDATE enrolled_classroom SET STATUS='$newstatus' WHERE CLASSROOM_ID='$classroomID'");    
        }
    }
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

                            
$userid = "1";
$status = "Hidden";
$classes = mysqli_query($connection, "SELECT * FROM enrolled_classroom WHERE USER_ID = '$userid' AND STATUS='".$status."'");

                           $class = mysqli_fetch_assoc($classes);
                           $count = mysqli_num_rows($classes); 
                           
                           foreach ($classes as $class) { 
                          
                            $classdetails = mysqli_query($connection, "SELECT * FROM classroom WHERE CLASSROOM_ID=".$class['CLASSROOM_ID']."");

                               $classdetails = mysqli_fetch_assoc($classdetails)
                            ?>
                            <div class="card" style="width: 18rem; margin-right: 15px; margin-top: 10px">
                                <img src="classroom/<?php echo $classdetails["CLASS_BACKGROUND"]; ?>" style="height: 150px; object-fit: cover;width: 17.9rem;margin-left:-12px;border-radius:5px;"alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $classdetails["CLASS_NAME"]; ?></h5>
                                    <p class="card-text"><?php echo $classdetails["CLASS_DESCRIPTION"]; ?></p>
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
