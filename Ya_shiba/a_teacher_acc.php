<?php
    $title = 'Home';
    $page = 'home';
    include_once('assets/a_header+nav.php');

    // Establish database connection
    $connection = mysqli_connect('localhost', 'root', '', 'yashiba');
    if (!$connection) {
        die('Database connection failed: ' . mysqli_connect_error());
    }

    $query = 'SELECT yashiba_user.USER_ID, yashiba_user.USER_PROFILE, yashiba_user.USERNAME, yashiba_user.USER_NAME, 
        yashiba_user.EMAIL, yashiba_school.SCHOOL_NAME, yashiba_user.PASSWORD, yashiba_user.REGISTERED_DATE, yashiba_user.USER_STATUS 
        FROM yashiba_user
        INNER JOIN yashiba_school ON yashiba_school.SCHOOL_ID = yashiba_user.SCHOOL_ID 
        WHERE ROLE="Teacher" AND (USER_STATUS="Active" OR USER_STATUS="Deactivate")
        ORDER BY USER_ID ASC'; 
    $results = mysqli_query($connection, $query);

    if (isset($_POST['edit'])) {
        $userid = $_POST['userid'];
        $Password = $_POST['password_'.$userid];
        $pattern = '/^[0-9]{8,11}$/';
        if (!preg_match($pattern, $Password)) {
            echo '<script>alert("The password must have 8 to 15 digits")</script>';
        } else {
            mysqli_query($connection, "UPDATE yashiba_user SET PASSWORD='$Password' WHERE USER_ID='$userid'");
            echo '<script>alert("Edit Successful")</script>';
            echo '<script>window.location.href = "a_teacher_acc.php";</script>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <title>Teacher Account - Admin</title>
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
                    <!-- Your main content here -->
                    <h1 class="mt-4" style ="font-family:Karla; color: #03396c;"><b>Teacher Account Details</b></h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="a_dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Teacher Account</li>
                    </ol>
                    <div class="card mb-4" style ="font-family:Mukta; color: #03396c;">
                        <div class="card-body">
                            <b>Comprehensive display of teacher account details including ID, profile, username, name, email,
                                school, registration date, and status (active/deactivated).</b>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header" style ="font-family:Mukta; color: #03396c;">
                            <i class="fa-solid fa-chalkboard-user me-1" style="color: #03396c;"></i> 
                            <b>Teacher Accounts</b>
                        </div>
                    
                        <div class="card-body" style ="font-family:Mukta;">                        
                            <form action="#" method="post">
                                <table class="table table-hover table-striped table-bordered" id="sortTable">
                                    <thead class="text-center" style="background-color: #bcd2e1fe; vertical-align:middle; white-space:nowrap;">
                                        <tr>
                                            <th>Teacher ID</th>
                                            <th>Profile</th>
                                            <th>Username</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>School</th>
                                            <th>Password</th>
                                            <th>Register Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php 
                                            while ($row = mysqli_fetch_assoc($results)) { 
                                        ?>
                                        <tr style="vertical-align:middle;">
                                            <td name="userID">
                                                <?php echo $row['USER_ID']; ?>
                                            </td>
                                            <td style="text-align:center;">
                                                <?php
                                                    if ($row["USER_PROFILE"] == null) {
                                                ?>
                                                    <img src="img/profile picture.jpg" style="width: 70px; height: 70px; border-radius: 50%; vertical-align:middle; horizontal-align:center;">
                                                <?php
                                                    } else {
                                                ?>
                                                        <img src="uploads/<?php echo $row["USER_PROFILE"] ?>" style="width: 70px; height: 700px; border-radius: 50%; vertical-align:middle; horizontal-align:center;">
                                                <?php
                                                    }
                                                ?>
                                            </td>
                                            <td><?php echo $row['USERNAME']; ?></td>
                                            <td><?php echo $row['USER_NAME']; ?></td>
                                            <td><?php echo $row['EMAIL']; ?></td>
                                            <td style="white-space:nowrap;"><?php echo $row['SCHOOL_NAME']; ?></td>
                                            <td>
                                                <input type="text" name="password_<?php echo $row['USER_ID']; ?>" value="<?php echo $row['PASSWORD']; ?>" required style="background: none; border: none;width: 120px;">
                                            </td>
                                            <td><?php echo $row['REGISTERED_DATE']; ?></td>
                                            <td style="text-align:center;">
                                                <?php if ($row['USER_STATUS'] == "Active") { ?>
                                                    <span class="badge rounded-pill d-inline" style="background-color:#c7d9bf;color:#374a2f;padding:4px 8px 4px 8px;">Active</span>
                                                <?php } else if ($row['USER_STATUS'] == "Deactivate") { ?>
                                                    <span class="badge rounded-pill d-inline" style="background-color:#e6979d;color:#422123;padding:4px 8px 4px 8px;">Deactivate</span>
                                                <?php } ?>
                                            </td>
                                            <td style="text-align:center;white-space:nowrap;">
                                                <input type="hidden" name="userid" value="<?php echo $row['USER_ID']; ?>">
                                                <button type="submit" class="edit-button" name="edit" style="background: none; border: none;">
                                                    <i class="fa-solid fa-pen me-2" style="color: #404a69;width:25px;height:25px;"></i>
                                                </button>                                                                         
                                                <a href="a_delete.php?tecID=
                                                    <?php echo $row['USER_ID']; ?>" 
                                                    onclick="alert('Teacher Account has been deleted.')">
                                                    <i class="fa-solid fa-trash" style="color: #404a69;width:25px;height:25px;"></i>
                                                </a>                                                
                                            </td>
                                        </tr>
                                        <?php 
                                            }
                                            mysqli_close($connection); 
                                        ?>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                    <script>$('#sortTable').DataTable();</script>
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
