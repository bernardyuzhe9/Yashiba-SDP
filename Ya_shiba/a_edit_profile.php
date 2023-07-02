<?php
    $title = 'Home';
    $page = 'home';
    include_once('assets/a_header+nav.php');
?>

<!DOCTYPE html>
<html lang="en">
<title>Edit Profile - Admin</title>
    <body class="sb-nav-fixed">
            <div id="layoutSidenav_content" class="bg-light">
                <main>
                <div class="container-fluid px-4">
                        <h1 class="mt-4">Edit Profile</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"></li>
                        </ol>
                        <div class="row align-items-start">
                            <div class="col">
                            <img src="img/Jason.png" class="rounded-circle" alt="..." style="width: 150px; height: 150px; margin-bottom: 10px">
                            </div>
                        </div>
                        <div>
                            <div class="mb-3">
                            <label for="formFile" class="form-label">Default file input example</label>
                            <input class="form-control" type="file" id="formFile">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Username</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Your username">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Contact Numer</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="0123456789">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Password</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="password">
                            </div>
                        </div>
                        <div>
                        <button type="button" class="btn btn-primary">Save Changes</button>
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