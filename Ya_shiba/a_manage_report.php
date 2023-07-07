<!-- Programmer Name: Teoh Mae Kay -->
<!-- Program Name : Admin Manage Report -->
<!-- Description: allow admin to manage report -->
<!-- First Written: 20/6/2023 -->
<!-- Eddited on: 7/7/2023-->

<?php
    $title = 'Home';
    $page = 'home';
    include_once('assets/a_header+nav.php');
    $query=
    'SELECT report.REPOT_ID, yashiba_user.ROLE, yashiba_user.USER_NAME, report.REPORT_NAME, 
    report.REPORT_DESCRIPTION, report.REPORT_STATUS FROM report
    INNER JOIN yashiba_user ON yashiba_user.USER_ID = report.USER_ID 
    ORDER BY REPOT_ID ASC'; 
    $results = mysqli_query($connection, $query);

    $solved = mysqli_query($connection, "SELECT COUNT(*) as `count` FROM report WHERE REPORT_STATUS='Solved'");
    $no_solved = mysqli_fetch_assoc($solved);

    $unsolved = mysqli_query($connection, "SELECT COUNT(*) as `count` FROM report WHERE REPORT_STATUS='Unsolved'");
    $no_unsolved = mysqli_fetch_assoc($unsolved);


?>

<!DOCTYPE html>
<html lang="en">
<title>Manage Report - Admin</title>
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
                        <h1 class="mt-4" style ="font-family:Karla; color: #03396c;"><b>Manage Reports</b></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="a_dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Manage Reports</li>
                        </ol>
                        <div class="card mb-4" style ="font-family:Mukta; color: #03396c;">
                            <div class="card-body">
                                <b>Efficiently track and organize student and teacher reports 
                                    for streamlined management and improved collaboration.</b>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header" style ="font-family:Mukta; color: #03396c;">
                            <i class="fa-solid fa-triangle-exclamation me-1" style="color: #03396c;"></i>
                                <b>Reports Tracked</b>
                            </div>
                            <div class="card-body"><canvas id="sReportPieChart" width="100%" height="20px"></canvas></div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header" style ="font-family:Mukta; color: #03396c;">
                            <i class="fa-solid fa-triangle-exclamation me-1" style="color: #03396c;"></i>
                                <b>Reports Data</b>
                            </div>
                            <div class="card-body" style ="font-family:Mukta;">
                                <table class="table table-hover table-striped table-bordered"  id="sortTable">
                                <thead class="text-center" style="background-color: #bcd2e1fe; vertical-align:middle; white-space:nowrap;">
                                        <tr>
                                            <th>Report ID</th>
                                            <th>Role</th>
                                            <th>Name</th>
                                            <th>Report Title</th>
                                            <th>Report Details</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        while ($row = mysqli_fetch_assoc($results)){
                                    ?>
                                        <tr>
                                            <td><?php echo $row['REPOT_ID'].' ';?></td>
                                            <td><?php echo $row['ROLE'].' ';?></td>
                                            <td><?php echo $row['USER_NAME'].' ';?></td>
                                            <td><?php echo $row['REPORT_NAME'].' ';?></td>
                                            <td><?php echo $row['REPORT_DESCRIPTION'].' ';?></td>
                                            <td style="text-align:center;">
                                                <?php
                                                    if($row['REPORT_STATUS'] == "Solved"){
                                                ?>
                                                    <span class="badge rounded-pill d-inline" style="background-color:#c7d9bf;color:#374a2f;padding:4px 8px 4px 8px;">Solved</span>
                                                <?php
                                                    }else if($row['REPORT_STATUS'] == "Unsolved"){
                                                ?>
                                                    <span class="badge rounded-pill d-inline" style="background-color:#e8cea5;color:#73521e;padding:4px 8px 4px 8px;">Unsolved</span>
                                                <?php
                                                    }
                                                ?>
                                            </td>
                                            <td style="text-align:center;white-space:nowrap;">
                                                <a href="a_solve_approve.php?reportID=
                                                    <?php echo $row['REPOT_ID'];?>" 
                                                    onclick="alert('The report has been solved.')">
                                                    <i class="fa-solid fa-circle-check me-2" style="color: #404a69;width:25px;height:25px;"></i>
                                                </a>
                                                <a href="a_delete.php?reportID=
                                                    <?php echo $row['REPOT_ID'];?>" 
                                                    onclick="alert('The report has been deleted.')">
                                                    <i class="fa-solid fa-trash ms-2" style="color: #404a69;width:25px;height:25px;"></i>
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
        <!-- Pie Chart -->
        <script>
            var pieChart = document.getElementById("sReportPieChart");
            var sReportPieChart = new Chart(pieChart, {
            type: 'pie',
                data: {
                    labels: ["Solved", "Unsolved"],
                    datasets: [{
                    data: [
                        <?php if(isset($no_solved)){echo $no_solved['count'];}else{echo ('0');} ?>,
                        <?php if(isset($no_unsolved)){echo $no_unsolved['count'];}else{echo ('0');} ?>,
                    ],
                    backgroundColor: ['#58a1ad', '#5879ad'],
                    }],
                }
            });
        </script>

    </body>
</html>
