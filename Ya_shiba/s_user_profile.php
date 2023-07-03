<?php
    $title = 'Home';
    $page = 'home';
    include_once('assets/s_header+nav.php');

    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'yashiba';
    $connection= mysqli_connect($host,$user,$password,$database);



    if ($connection === false){
        die('Connection failed' . mysqli_connect_error());
    }
    if(isset($_POST['deactivate'])){
        $status='Deactivate';
        $updateQuery = "UPDATE `yashiba_user` 
        SET `USER_STATUS`='$status' WHERE `USER_ID`=" . $_SESSION['id'];
        if(mysqli_query($connection, $updateQuery)){
            echo '<script>alert("Your account is deactivated")</script>';
            echo '<script>window.location.href = "logout.php";</script>';
        }else {
            echo"Error, something went wrong!";
            mysqli_close($connection);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<title>Profile Details - Student</title>
    <body class="sb-nav-fixed">
            <div id="layoutSidenav_content" class="bg-light">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Profile Details</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"></li>
                        </ol>
                        <?php
                            $query = "SELECT yashiba_user.USERNAME,yashiba_user.USER_PROFILE,yashiba_user.USER_NAME, yashiba_user.EMAIL, yashiba_user.CONTACT_NUMBER, yashiba_user.PASSWORD, yashiba_school.SCHOOL_NAME, yashiba_user.STUDENT_BATCH_ID 
                            FROM yashiba_user 
                            INNER JOIN yashiba_school ON yashiba_user.SCHOOL_ID = yashiba_school.SCHOOL_ID 
                            WHERE USER_ID = ".$_SESSION['id']."";
                            $results = mysqli_query($connection, $query);
                            $row = mysqli_fetch_assoc($results);
                        ?>
                        <div class="row justify-content-between">
                            <div class="profile-pic" style="width:150px;height:150px;object-fit:cover;margin-bottom:24px;">
                            <?php
                            if ($row["USER_PROFILE"] == null) {
                            ?>
                                <img src="img/profile picture.jpg" style="width: 150px; height: 150px; border-radius: 50%; background-color: rgb(220, 220, 220);">
                            <?php
                            } else {
                            ?>
                                <img src="uploads/<?php echo $row["USER_PROFILE"] ?>" style="width: 150px; height: 150px; border-radius: 50%; background-color: rgb(220, 220, 220);">
                            <?php
                            }
                            ?>
                                
                            </div>
                            <div class="dropdown col-auto">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="margin-top:65px;width:100px;margin-right:5px;">
                                Setting
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="s_edit_profile.php">Edit Profile</a></li>
                                <li><a class="dropdown-item" href="#" id="DeactivateLink">Deactivate Account</a></li>
                            </ul>
                            </div>
                            <div class="modal fade" id="DeactivateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">  
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel" style="font-family:Karla;font-weight:bold;">Deactivate Account</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="" method="post">
                                    <div class="modal-body">
                                        <img src="img/warning.png" alt="warning" style="display: block; margin-left: auto; margin-right: auto;margin-bottom:15px;" height=100px weight=100px>
                                        <p style="font-family:Karla;text-align:center;">Are you sure that you want to deactivate your account？</p>
                                    </div>
                                    <div class="modal-footer justify-content-center">
                                        <button type="submit" class="decbtns" name="deactivate">
                                        Deactivate
                                        </button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Username</label>
                                <input class="form-control" type="text" value="<?php echo $row["USERNAME"]; ?>" aria-label="readonly input example" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Name</label>
                                <input class="form-control" type="text" value="<?php echo $row["USER_NAME"]; ?>" aria-label="readonly input example" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                <input class="form-control" type="text" value="<?php echo $row["EMAIL"]; ?>" aria-label="readonly input example" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Contact Number</label>
                                <input class="form-control" type="text" value="<?php echo $row["CONTACT_NUMBER"]; ?>" aria-label="readonly input example" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Password</label>
                                <input class="form-control" type="password" value="<?php echo $row["PASSWORD"]; ?>" aria-label="readonly input example" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">School Name</label>
                                <input class="form-control" type="text" value="<?php echo $row["SCHOOL_NAME"]; ?>" aria-label="readonly input example" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Student Batch ID</label>
                                <input class="form-control" type="text" value="<?php echo $row["STUDENT_BATCH_ID"]; ?>" aria-label="readonly input example" readonly>
                            </div>
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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var DeactivateLink = document.getElementById("DeactivateLink");
            DeactivateLink.addEventListener("click", function(event) {
                event.preventDefault(); 
                var modal = new bootstrap.Modal(document.getElementById("DeactivateModal"));
                modal.show();
            });
        });
    </script>
</html>
