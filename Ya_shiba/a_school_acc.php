<!-- Programmer Name: Teoh Mae Kay -->
<!-- Program Name : View School -->
<!-- Description: View school account -->
<!-- First Written: 20/6/2023 -->
<!-- Eddited on: 7/7/2023-->

<?php
    $title = 'Home';
    $page = 'home';
    include_once('assets/a_header+nav.php');
    $query='SELECT * FROM yashiba_school ORDER BY SCHOOL_ID ASC'; 
    $results = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html lang="en">
<title>School Account - Admin</title>
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
        <link rel="stylesheet" href="css/button.css">
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
                        <div class="row">
                            <div class="col-lg-6">
                                <h1 class="mt-4" style ="font-family:Karla; color: #03396c;"><b>School Account Details</b></h1>
                            </div>
                            <div class="col-lg-6">
                                <a href="a_add_school.php">
                                    <button type="button" class="addSchBtn mt-4" ><i class="fa-solid fa-plus me-2" style="color: #03396c;"></i>SCHOOL</button>
                                </a>
                            </div>
                        </div>  
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="a_dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">School Account</li>
                        </ol>
                        <div class="card mb-4" style ="font-family:Mukta; color: #03396c;">
                            <div class="card-body">
                                <b>Explore comprehensive school account data, 
                                including School ID, Name, Address, Personnel, and Contact Information, 
                                all conveniently displayed on this page.</b>
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
        </div>
    </body>
</html>
