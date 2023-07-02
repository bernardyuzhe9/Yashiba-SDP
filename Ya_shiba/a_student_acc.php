<?php
    $title = 'Home';
    $page = 'home';
    include_once('assets/a_header+nav.php');
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
                                    <thead style="background-color: #bcd2e1fe;">
                                        <tr>
                                            <th class="text-center">Profile</th>
                                            <th class="text-center">Student ID</th>
                                            <th class="text-center">Username</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">School</th>
                                            <th class="text-center">Batch ID</th>
                                            <th class="text-center">Register Date</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>a</td>
                                            <td>2011/04/25</td>
                                            <td>2011/04/25</td>
                                            <td>2011/04/25</td>
                                            <td>2011/04/25</td>
                                            <td>2011/04/25</td>
                                        </tr>
                                        <tr>
                                            <td>Garrett Winters</td>
                                            <td>Accountant</td>
                                            <td>Tokyo</td>
                                            <td>b</td>
                                            <td>2011/07/25</td>
                                            <td>2011/07/25</td>
                                            <td>2011/07/25</td>
                                            <td>2011/07/25</td>
                                            <td>2011/07/25</td>
                                        </tr>
                                        <tr>
                                            <td>Ashton Cox</td>
                                            <td>Junior Technical Author</td>
                                            <td>San Francisco</td>
                                            <td>d</td>
                                            <td>2009/01/12</td>
                                            <td>2009/01/12</td>
                                            <td>2009/01/12</td>
                                            <td>2009/01/12</td>
                                            <td>2009/01/12</td>
                                        </tr>
                                        <tr>
                                            <td>Cedric Kelly</td>
                                            <td>Senior Javascript Developer</td>
                                            <td>Edinburgh</td>
                                            <td>e</td>
                                            <td>2012/03/29</td>
                                            <td>2012/03/29</td>
                                            <td>2012/03/29</td>
                                            <td>2012/03/29</td>
                                            <td>2012/03/29</td>
                                        </tr>
                                        <tr>
                                            <td>Airi Satou</td>
                                            <td>Accountant</td>
                                            <td>Tokyo</td>
                                            <td>c</td>
                                            <td>2008/11/28</td>
                                            <td>2008/11/28</td>
                                            <td>2008/11/28</td>
                                            <td>2008/11/28</td>
                                            <td>2008/11/28</td>
                                        </tr>
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
