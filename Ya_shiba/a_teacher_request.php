<!-- Programmer Name: Teoh Mae Kay -->
<!-- Program Name : Teacher Request Account -->
<!-- Description:allow admin to accept/reject teacher account  -->
<!-- First Written: 20/6/2023 -->
<!-- Eddited on: 7/7/2023-->


<?php
    $title = 'Home';
    $page = 'home';
    include_once('assets/a_header+nav.php');
    $query=
    'SELECT yashiba_user.USER_ID, yashiba_user.USERNAME, yashiba_user.USER_NAME, yashiba_user.EMAIL, 
    yashiba_user.CONTACT_NUMBER, yashiba_school.SCHOOL_NAME, yashiba_user.USER_STATUS FROM yashiba_user
    INNER JOIN yashiba_school ON yashiba_school.SCHOOL_ID = yashiba_user.SCHOOL_ID 
    WHERE ROLE="Teacher" AND (USER_STATUS="Pending" OR USER_STATUS="Rejected")
    ORDER BY USER_ID ASC'; 
    $results = mysqli_query($connection, $query);

    $pending = mysqli_query($connection, "SELECT COUNT(*) as `count` FROM yashiba_user WHERE USER_STATUS='Pending'");
    $no_pending = mysqli_fetch_assoc($pending);

    $rejected = mysqli_query($connection, "SELECT COUNT(*) as `count` FROM yashiba_user WHERE USER_STATUS='Rejected'");
    $no_rejected = mysqli_fetch_assoc($rejected);


?>

<!DOCTYPE html>
<html lang="en">
<title>Teacher Request - Admin</title>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
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
                        <h1 class="mt-4" style ="font-family:Karla; color: #03396c;"><b>Teacher Requests</b></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="a_dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Teacher Request</li>
                        </ol>
                        <div class="card mb-4" style ="font-family:Mukta; color: #03396c;">
                            <div class="card-body">
                                <b>Streamline teacher onboarding to our e-learning platform with efficient management of joining requests.</b>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header" style ="font-family:Mukta; color: #03396c;">
                            <i class="fas fa-address-card me-1" style="color: #03396c;"></i>
                                <b>Teacher Requests Tracked</b>
                            </div>
                            <div class="card-body"><canvas id="tRequestPieChart" width="100%" height="20px"></canvas></div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header" style ="font-family:Mukta; color: #03396c;">
                                <i class="fas fa-address-card me-1" style="color: #03396c;"></i>
                                <b>Teacher Requests</b>
                            </div>
                            <div class="card-body" style ="font-family:Mukta;">
                                <table class="table table-hover table-striped table-bordered"  id="sortTable">
                                    <thead class="text-center" style="background-color: #bcd2e1fe; vertical-align:middle; white-space:nowrap;">
                                        <tr>
                                            <th>User ID</th>
                                            <th>Username</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Contact Number</th>
                                            <th>School</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            while ($row = mysqli_fetch_assoc($results)){
                                        ?>                                        
                                            <tr>
                                                <td><?php echo $row['USER_ID']. ' ';?></td>
                                                <td><?php echo $row['USERNAME']. ' ';?></td>
                                                <td><?php echo $row['USER_NAME']. ' ';?></td>
                                                <td><?php echo $row['EMAIL']. ' ';?></td>
                                                <td><?php echo $row['CONTACT_NUMBER']. ' ';?></td>
                                                <td><?php echo $row['SCHOOL_NAME']. ' ';?></td>
                                                <td style="text-align:center;">
                                                    <?php
                                                        if($row['USER_STATUS'] == "Pending"){
                                                    ?>
                                                        <span class="badge rounded-pill d-inline" style="background-color:#e8cea5;color:#73521e;padding:4px 8px 4px 8px;">Pending</span>
                                                    <?php
                                                        }else if($row['USER_STATUS'] == "Rejected"){
                                                    ?>
                                                        <span class="badge rounded-pill d-inline" style="background-color:#e6979d;color:#422123;padding:4px 8px 4px 8px;">Rejected</span>
                                                    <?php
                                                        }
                                                    ?>
                                                </td>
                                                <td style="text-align:center;white-space:nowrap;">
                                                    <a href="a_solve_approve.php?userID=
                                                        <?php echo $row['USER_ID'];?>" 
                                                        onclick="alert('Teacher Request has been approved.')">
                                                        <i class="fa-solid fa-circle-check me-2" style="color: #404a69;width:22px;height:22px;"></i>
                                                    </a>
                                                    <a href="a_rejected.php?userID=
                                                        <?php echo $row['USER_ID'];?>" 
                                                        onclick="alert('Teacher Request has been rejected.')">
                                                        <i class="fa-solid fa-circle-xmark me-2" style="color: #404a69;width:22px;height:22px;"></i>
                                                    </a>
                                                    <a href="a_delete.php?userID=
                                                        <?php echo $row['USER_ID'];?>" 
                                                        onclick="alert('Teacher Request has been deleted.')">
                                                        <i class="fa-solid fa-trash" style="color: #404a69;width:22px;height:22px;"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php
                                            }
                                            mysqli_close($connection);
                                        ?>                                    
                                    </tbody>
                                </table>
                                <script>$('#sortTable').DataTable();</script>
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
        </div>
        <!-- Pie Chart -->
        <script>
            var pieChart = document.getElementById("tRequestPieChart");
            var tRequestPieChart = new Chart(pieChart, {
            type: 'pie',
                data: {
                    labels: ["Pending", "Rejected"],
                    datasets: [{
                    data: [
                        <?php if(isset($no_pending)){echo $no_pending['count'];}else{echo ('0');} ?>,
                        <?php if(isset($no_rejected)){echo $no_rejected['count'];}else{echo ('0');} ?>,
                    ],
                    backgroundColor: ['#58a1ad', '#5879ad'],
                    }],
                }
            });
        </script>
    </body>
</html>
