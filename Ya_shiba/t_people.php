<?php
    $title = 'Home';
    $page = 'home';
    include_once('assets/t_header+nav.php');
?>

<title>People - Student</title>
<body class="sb-nav-fixed">
    <div id="layoutSidenav_content" class="bg-light">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">People Page</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"></li>
                </ol>
                <div class="row">
                    <h3 class="col text-primary">Teacher</h3>
                    <div class="col text-end">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="30" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <hr class="border border-primary border-2 opacity-100">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Profile</th>
                            <th scope="col">Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">2</td>
                            <td>Jacob</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td scope="row">2</td>
                            <td>Jacob</td>
                        </tr>
                    </tfoot>
                </table>
                <div class="row">
                        <h3 class="col text-primary">Student</h3>
                        <h6 class="col text-end" style="margin-top: 12px">73 Students</h3>
                </div>
                <hr class="border border-primary border-2 opacity-100">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Profile</th>
                            <th scope="col">Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">2</td>
                            <td>Jacob</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td scope="row">2</td>
                            <td>Jacob</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- main Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Student Arrangement</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex justify-content-center">
                    <button type="button" class="btn btn-primary" style="margin-right: 10px" data-bs-toggle="modal" data-bs-target="#add_student">Add Student</button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_student_batch">Add Student Batch</button>
                </div>
                </div>
            </div>
            </div>
            <!-- Modal for add student-->
            <div class="modal fade" id="add_student" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="d-flex flex-column align-items-center"> <!-- Center alignment -->
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Student Name</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1">
                                </div>
                                <div class="d-flex justify-content-end mb-3">
                                    <button type="button" class="btn btn-primary">Confirm</button>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <div class="col-4">
                                                    <img src="img/Jason.png" class="rounded-circle" alt="..." style="width: 50px; height: 50px;">
                                                </div>
                                                <h6 style="margin-left: 30px">Name:</h6>
                                            </div>
                                            <div>
                                                <button type="button" class="btn btn-primary">Add</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <div class="col-4">
                                                    <img src="img/Jason.png" class="rounded-circle" alt="..." style="width: 50px; height: 50px;">
                                                </div>
                                                <h6 style="margin-left: 30px">Name:</h6>
                                            </div>
                                            <div>
                                                <button type="button" class="btn btn-primary">Add</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <div class="col-4">
                                                    <img src="img/Jason.png" class="rounded-circle" alt="..." style="width: 50px; height: 50px;">
                                                </div>
                                                <h6 style="margin-left: 30px">Name:</h6>
                                            </div>
                                            <div>
                                                <button type="button" class="btn btn-primary">Add</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <div class="col-4">
                                                    <img src="img/Jason.png" class="rounded-circle" alt="..." style="width: 50px; height: 50px;">
                                                </div>
                                                <h6 style="margin-left: 30px">Name:</h6>
                                            </div>
                                            <div>
                                                <button type="button" class="btn btn-primary">Add</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <!-- Modal for add student-->
             <div class="modal fade" id="add_student_batch" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Student Batch</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="d-flex flex-column align-items-center"> <!-- Center alignment -->
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Student Batch ID</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1">
                                </div>
                                <div class="d-flex justify-content-end mb-3">
                                    <button type="button" class="btn btn-primary">Confirm</button>
                                </div>
                            </div>
                        </div>
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
</body>
