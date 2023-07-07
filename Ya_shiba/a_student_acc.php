<!-- Programmer Name: Teoh Mae Kay-->
<!-- Program Name : Edit Student Account -->
<!-- Description:allow admin to edit student account  -->
<!-- First Written: 20/6/2023 -->
<!-- Eddited on: 7/7/2023-->

<?php
    $title = 'Home';
    $page = 'home';
    include_once('assets/a_header+nav.php');

   
    if (isset($_POST['edittxt'])) {
        $userid = $_POST['edittxt'];
        $password = $_POST['passwordtxt'];
        $pattern = '/^.{8,15}$/';
        if (!preg_match($pattern, $password)) {
            echo '<script>alert("The password must have 8 to 15 characters")</script>';
        } else {
        mysqli_query($connection, "UPDATE yashiba_user SET `PASSWORD`='$password' WHERE USER_ID='$userid'");
        echo '<script>alert("Edit Successful")</script>';
        echo '<script>window.location.href = "a_student_acc.php";</script>';
        }
    }
    $query=
    'SELECT yashiba_user.USER_ID, yashiba_user.USER_PROFILE, yashiba_user.USERNAME, yashiba_user.USER_NAME, 
    yashiba_user.EMAIL, yashiba_school.SCHOOL_NAME, yashiba_user.STUDENT_BATCH_ID, yashiba_user.REGISTERED_DATE, yashiba_user.PASSWORD, yashiba_user.USER_STATUS FROM yashiba_user
    INNER JOIN yashiba_school ON yashiba_school.SCHOOL_ID = yashiba_user.SCHOOL_ID 
    WHERE ROLE="Student" 
    ORDER BY USER_ID ASC'; 
    $results = mysqli_query($connection, $query);

?>

<!DOCTYPE html>
<html lang="en">
<title>Student Account - Admin</title>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
        <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Mukta:wght@300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <style>
            .table-hover tbody tr:hover td {
                background-color: #bcd2e1fe;
            }                     
        </style>
    </head>
    <body class="sb-nav-fixed">
            <div id="layoutSidenav_content" class="bg-light">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4"  style ="font-family:Karla; color: #03396c;"><b>Student Account Details</b></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="a_dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Student Account</li>
                        </ol>
                        <div class="card mb-4" style ="font-family:Mukta; color: #03396c;">
                            <div class="card-body">
                                <b>Comprehensive student accounts data showcasing student ID, profiles, usernames, full names, 
                                    emails, schools, batch IDs, registration dates, and active/deactivate status.</b>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header" style ="font-family:Mukta; color: #03396c;">
                                <i class="fa-solid fa-users me-1" style="color: #03396c;"></i>
                                <b>Student Accounts</b>
                            </div>
                            <div class="card-body" style ="font-family:Mukta;">
                                    <table class="table table-hover table-striped table-bordered"  id="sortTable">
                                        <thead class="text-center" style="background-color: #bcd2e1fe; vertical-align:middle; white-space:nowrap;">
                                            <tr>
                                                <th>Student ID</th>
                                                <th>Profile</th>
                                                <th>Username</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>School</th>
                                                <th>Batch ID</th>
                                                <th>Password</th>
                                                <th>Registered Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead> 
                                        <tbody>
                        <?php
                            while ($row = mysqli_fetch_assoc($results)){
                        ?>
                            <tr style="vertical-align:middle;">
                                <form action="#" method="post">
                                    <td name="userID">
                                        <?php echo $row['USER_ID']; ?>
                                    </td>
                                    <td style="text-align:center;">
                                        <?php
                                            if ($row["USER_PROFILE"] == null) {
                                        ?>
                                            <img src="img/profile picture.jpg" style="width: 70px; height: 70px; border-radius: 50%;">
                                        <?php
                                            } else {
                                        ?>
                                            <img src="uploads/<?php echo $row["USER_PROFILE"] ?>" style="width: 70px; height: 70px; border-radius: 50%;">
                                        <?php
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo $row['USERNAME'];?></td>
                                    <td><?php echo $row['USER_NAME'];?></td>
                                    <td><?php echo $row['EMAIL']. ' ';?></td>
                                    <td><?php echo $row['SCHOOL_NAME'];?></td>
                                    <td><?php echo $row['STUDENT_BATCH_ID'];?></td>
                                    <td>
                                        <div>
                                            <input type="text" name="passwordtxt" value="<?php echo $row['PASSWORD']; ?>" required style="background: none; border: none; width:120px;">
                                        </div>
                                    </td>
                                    <td><?php echo $row['REGISTERED_DATE'];?></td>
                                    <td style="text-align:center;">
                                        <?php
                                            if($row['USER_STATUS'] == "Active"){
                                        ?>
                                            <span class="badge rounded-pill d-inline" style="background-color:#c7d9bf;color:#374a2f;padding:4px 8px 4px 8px;">Active</span>
                                        <?php
                                            } else if($row['USER_STATUS'] == "Deactivate"){
                                        ?>
                                            <span class="badge rounded-pill d-inline" style="background-color:#e6979d;color:#422123;padding:4px 8px 4px 8px;">Deactivate</span>
                                        <?php
                                            }
                                        ?>
        </td>
        <td style="text-align:center;white-space:nowrap;">
                 <button type="submit" class="edit-button"  value="<?php echo $row['USER_ID'];?>" name="edittxt" style="background: none; border: none;">
                <i class="fa-solid fa-pen me-2" style="color: #404a69;width:25px;height:25px;"></i>
                </button>                                                                                                            
            <a href="a_delete.php?stuID=<?php echo $row['USER_ID'];?>" onclick="alert('Student Account has been deleted.')">
                <i class="fa-solid fa-trash" style="color: #404a69;width:25px;height:25px;"></i>
                </a>
                
            </td>
        </form>
    </tr>
<?php
    }
?>

                                            </tbody>
                                    </table>
                               
                            </div>    
                                    <script>$('#sortTable').DataTable();</script>
                
                        </div>
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

