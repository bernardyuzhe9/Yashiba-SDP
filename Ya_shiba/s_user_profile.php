<?php
    $title = 'Home';
    $page = 'home';
    include_once('assets/s_header+nav.php');
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
                        <div class="row justify-content-between">
                            <div class="col-4">
                            <img src="img/Jason.png" class="rounded-circle" alt="..." style="width: 150px; height: 150px; margin-bottom: 10px">
                            </div>
                            <div class="dropdown col-auto">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Setting
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="s_edit_profile.php">Edit Profile</a></li>
                                <li><a class="dropdown-item" href="#">Deactivate Account</a></li>
                            </ul>
                            </div>
                        </div>
                        <div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Username</label>
                                <input class="form-control" type="text" value="Readonly input here..." aria-label="readonly input example" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Name</label>
                                <input class="form-control" type="text" value="Readonly input here..." aria-label="readonly input example" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                <input class="form-control" type="text" value="Readonly input here..." aria-label="readonly input example" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Contact Number</label>
                                <input class="form-control" type="text" value="Readonly input here..." aria-label="readonly input example" readonly>
                            </div><div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Password</label>
                                <input class="form-control" type="text" value="Readonly input here..." aria-label="readonly input example" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">School Name</label>
                                <input class="form-control" type="text" value="Readonly input here..." aria-label="readonly input example" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Student Batch ID</label>
                                <input class="form-control" type="text" value="Readonly input here..." aria-label="readonly input example" readonly>
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
</html>
