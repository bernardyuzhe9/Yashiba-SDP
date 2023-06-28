<?php
    $title = 'Home';
    $page = 'home';
    include_once('assets/s_header+nav.php');
?>

<!DOCTYPE html>
<html lang="en">
<title>Home Page - Student</title>
    <body class="sb-nav-fixed">
            <div id="layoutSidenav_content" class="bg-light">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">All Classes</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"></li>
                        </ol>
                        <div class="row">
                            <div class="list-group">
                                <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                                To Do List
                                </a>
                                <a href="#" class="list-group-item list-group-item-action">A second link item</a>
                                <a href="#" class="list-group-item list-group-item-action">A third link item</a>
                                <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
                                <a href="#" class="list-group-item list-group-item-action">A fifth link item</a>
                            </div>
                            <div class="card" style="width: 18rem; margin-right: 15px; margin-top: 10px">
                                <img src="data:image/jpeg;base64,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" class="card-img-top; img-fluid" alt="...">
                                <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-eye-slash-fill" viewBox="0 0 16 16">
                                <path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
                                <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12-.708.708z"/>
                                </svg>
                                </div>
                            </div>
                            <div class="card" style="width: 18rem; margin-right: 15px; margin-top: 10px">
                                <img src="..." class="card-img-top; img-fluid" alt="...">
                                <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                            <div class="card" style="width: 18rem; margin-right: 15px; margin-top: 10px">
                                <img src="..." class="card-img-top; img-fluid" alt="...">
                                <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                            <div class="card" style="width: 18rem; margin-right: 15px; margin-top: 10px">
                                <img src="..." class="card-img-top; img-fluid" alt="...">
                                <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                            <div class="card" style="width: 18rem; margin-right: 15px; margin-top: 10px">
                                <img src="..." class="card-img-top; img-fluid" alt="...">
                                <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                            <div class="card" style="width: 18rem; margin-right: 15px; margin-top: 10px">
                                <img src="..." class="card-img-top; img-fluid" alt="...">
                                <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
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
        </div>
    </body>
</html>
