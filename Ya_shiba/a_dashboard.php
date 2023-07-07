<!-- Programmer Name: Teoh Mae Kay -->
<!-- Program Name : Admin dashboard-->
<!-- Description: admin dashboard -->
<!-- First Written: 19/6/2023 -->
<!-- Eddited on: 7/7/2023-->
<?php
    $title = 'Home';
    $page = 'home';
    include_once('assets/a_header+nav.php');
    $query='SELECT * FROM yashiba_school ORDER BY SCHOOL_ID ASC'; 
    $results = mysqli_query($connection, $query);

    $query1="SELECT STUDENT_BATCH_ID, COUNT(USER_ID) as 'u_Count' FROM yashiba_user 
             WHERE STUDENT_BATCH_ID!='NULL'
             GROUP BY STUDENT_BATCH_ID 
             ORDER BY u_Count DESC 
             LIMIT 5"; 
    $results1 = mysqli_query($connection, $query1);
    $labels=[];
    $values=[];
    while ($row = mysqli_fetch_assoc($results1)) {
        $batchID = $row['STUDENT_BATCH_ID'];
        $userCount = $row['u_Count'];
    
        // Add the data to the arrays
        $labels[] = $batchID;
        $values[] = $userCount;
    }
    mysqli_free_result($results1);

    $tec = mysqli_query($connection, "SELECT COUNT(*) as `count` FROM yashiba_user WHERE ROLE='Teacher'");
    $no_tec = mysqli_fetch_assoc($tec);
    
    $stu = mysqli_query($connection,  "SELECT COUNT(*) as `count` FROM yashiba_user WHERE ROLE='Student'");
    $no_stu = mysqli_fetch_assoc($stu);

    $adm = mysqli_query($connection,  "SELECT COUNT(*) as `count` FROM yashiba_user WHERE ROLE='Admin'");
    $no_adm = mysqli_fetch_assoc($adm);
?>

<!DOCTYPE html>
<title>Dashboard - Admin</title>
<html lang="en">
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
        <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Mukta:wght@300&display=swap" rel="stylesheet">
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
                        <h1 class="mt-4" style ="font-family:Mukta; color: #03396c;"><b>Dashboard</b></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row" style ="font-family:Mukta; color: #03396c;">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fa-solid fa-chart-column me-1" style="color: #03396c;"></i>
                                        <b>Most Students in the Batch ID</b>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="batchBarChart" width="100%" height="50"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fa-solid fa-users me-1" style="color: #03396c;"></i>
                                        <b>Total Accounts</b>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="tAccPieChart" width="100%" height="50"></canvas>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                        <div class="card mb-4">
                            <div class="card-header" style ="font-family:Mukta; color: #03396c;">
                                <i class="fa-solid fa-school me-1" style="color: #03396c;"></i>
                                <b>School Accounts</b>
                            </div>
                            <div class="card-body"  style ="font-family:Mukta;">
                                <table class="table table-hover table-striped table-bordered "  id="sortTable" >
                                    <thead class="text-center" style="background-color: #bcd2e1fe; vertical-align:middle; white-space:nowrap;">
                                        <tr>
                                            <th >School ID</th>
                                            <th>School Name</th>
                                            <th>Address</th>
                                            <th>Person in charge</th>
                                            <th>Contact Number</th>
                                            <th>Registered Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        while ($row = mysqli_fetch_assoc($results)){
                                    ?>
                                        <tr>
                                            <td><?php echo $row['SCHOOL_ID']. ' ';?></td>
                                            <td style="white-space:nowrap;"><?php echo $row['SCHOOL_NAME']. ' ';?></td>
                                            <td><?php echo $row['SCHOOL_ADDRESS']. ' ';?></td>
                                            <td style="white-space:nowrap;"><?php echo $row['PERSON_IN_CHARGE']. ' ';?></td>
                                            <td><?php echo $row['PERSON_IN_CHARGE_PHONE']. ' ';?></td>
                                            <td style="white-space:nowrap;"><?php echo $row['SCHOOL_REGISTER_DATE']. ' ';?></td>
                                        </tr>
                                    <?php
                                        }
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
            var pieChart = document.getElementById("tAccPieChart");
            var tAccPieChart = new Chart(pieChart, {
                type: 'pie',
                data: {
                    labels: ["Admin", "Teacher", "Student"],
                    datasets: [{
                        data: [
                            <?php if(isset($no_adm)){echo $no_adm['count'];}else{echo ('0');} ?>,
                            <?php if(isset($no_tec)){echo $no_tec['count'];}else{echo ('0');} ?>,
                            <?php if(isset($no_stu)){echo $no_stu['count'];}else{echo ('0');} ?>,
                        ],
                        backgroundColor: ['#585aad', '#58a1ad', '#5879ad'],
                    }],
                },
            });
        </script>
        <!-- Bar Chart -->
        <script>
            var Labels = <?php echo json_encode($labels); ?>;
            var Values = <?php echo json_encode($values); ?>;

            var barChart = document.getElementById("batchBarChart");
            var batchBarChart = new Chart(barChart, {
                type: 'bar',
                data: {
                        
                    labels: Labels,
                    datasets: [{
                        label: "Total Students",
                        backgroundColor: "#5879ad",
                        borderColor: "#5879ad",
                        data: Values,
                    }],
                },
                options: {
                    scales: {
                        xAxes: [{
                            gridLines: {
                                display: false
                            },
                            ticks: {
                                maxTicksLimit: 5
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                min: 0,
                                max: 10,
                                maxTicksLimit: 5
                            },
                            gridLines: {
                                display: true
                            }
                        }],
                    },
                    legend: {
                        display: true
                    }
                }
            });
        </script>
    </body>
</html>