<?php
    $title = 'Home';
    $page = 'home';
    include_once('assets/s_header+nav.php');

    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'yashiba';
    $connection= mysqli_connect($host,$user,$password,$database);
    
    if ($connection === false){
        die('Connection failed' . mysqli_connect_error());
    }

?>

<!DOCTYPE html>
<html lang="en">
<title>Home Page - Student</title>
    <body class="sb-nav-fixed">
            <div id="layoutSidenav_content" class="bg-light">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4" style="font-family:Karla;font-weight:bold;">All Classes</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"></li>
                        </ol>
                        <div class="row">
                            <div class="list-group" style="margin-bottom: 10px;">
                                <a href="#" class="list-group-item list-group-item-action active" aria-current="true" style="font-family:Karla;font-weight:bold;">
                                To Do List
                                </a>
                                <a href="#" class="list-group-item list-group-item-action">A second link item</a>
                                <a href="#" class="list-group-item list-group-item-action">A third link item</a>
                                <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
                                <a href="#" class="list-group-item list-group-item-action">A fifth link item</a>
                            </div>
                            <div class="card" style="width: 18rem; margin-right: 60px; margin-top: 10px;margin-bottom:15px;">
                                <img src="https://t4.ftcdn.net/jpg/02/97/79/83/360_F_297798377_VB9egqGnRKcZxU53wybEHLRnnTrcvlAH.jpg"  style="height: 150px; object-fit: cover;width: 17.9rem;margin-left:-12px;border-radius:5px;" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <hr class="divider" />
                                    <a href="#">
                                        <svg style="" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-eye-slash-fill; float-end" viewBox="0 0 16 16">
                                        <path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
                                        <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12-.708.708z"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="card" style="width: 18rem; margin-right: 60px; margin-top: 10px;margin-bottom:15px;">
                                <img src="https://c4.wallpaperflare.com/wallpaper/307/10/490/eromanga-sensei-izumi-sagiri-wallpaper-preview.jpg" style="height: 150px; object-fit: cover;width: 17.9rem;margin-left:-12px;border-radius:5px;" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <hr class="divider" />
                                    <a href="#">
                                        <svg style="" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-eye-slash-fill; float-end" viewBox="0 0 16 16">
                                        <path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
                                        <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12-.708.708z"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="card" style="width: 18rem; margin-right: 60px; margin-top: 10px;margin-bottom:15px;">
                                <img src="https://images4.alphacoders.com/747/747593.png" style="height: 150px; object-fit: cover;width: 17.9rem;margin-left:-12px;border-radius:5px;" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <hr class="divider" />
                                    <a href="#">
                                        <svg style="" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-eye-slash-fill; float-end" viewBox="0 0 16 16">
                                        <path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
                                        <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12-.708.708z"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="card" style="width: 18rem; margin-right: 60px; margin-top: 10px;margin-bottom:15px;">
                                <img src="https://images.alphacoders.com/995/995884.png" style="height: 150px; object-fit: cover;width: 17.9rem;margin-left:-12px;border-radius:5px;" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <hr class="divider" />
                                    <a href="#">
                                        <svg style="" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-eye-slash-fill; float-end" viewBox="0 0 16 16">
                                        <path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
                                        <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12-.708.708z"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="card" style="width: 18rem; margin-right: 60px; margin-top: 10px;margin-bottom:15px;">
                                <img src="https://images2.alphacoders.com/713/713297.png" style="height: 150px; object-fit: cover;width: 17.9rem;margin-left:-12px;border-radius:5px;" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <hr class="divider" />
                                    <a href="#">
                                        <svg style="" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-eye-slash-fill; float-end" viewBox="0 0 16 16">
                                        <path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
                                        <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12-.708.708z"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="card" style="width: 18rem; margin-right: 60px; margin-top: 10px;margin-bottom:15px;">
                                <img src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/ae67dbcc-91f7-4369-a654-3159c9f4a09f/dfnirdv-be480234-a8f7-4317-82f5-1535072eec37.jpg/v1/fill/w_1192,h_670,q_70,strp/high_quality_4k_lycoris_recoil_wallpaper_by_sdugoten_dfnirdv-pre.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7ImhlaWdodCI6Ijw9NzIwIiwicGF0aCI6IlwvZlwvYWU2N2RiY2MtOTFmNy00MzY5LWE2NTQtMzE1OWM5ZjRhMDlmXC9kZm5pcmR2LWJlNDgwMjM0LWE4ZjctNDMxNy04MmY1LTE1MzUwNzJlZWMzNy5qcGciLCJ3aWR0aCI6Ijw9MTI4MCJ9XV0sImF1ZCI6WyJ1cm46c2VydmljZTppbWFnZS5vcGVyYXRpb25zIl19.uxTAXMhmvZ93rmeZQlszCoq0b7zg8Sp1305gCw9VOgM" style="height: 150px; object-fit: cover;width: 17.9rem;margin-left:-12px;border-radius:5px;" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <hr class="divider" />
                                    <a href="#">
                                        <svg style="" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-eye-slash-fill; float-end" viewBox="0 0 16 16">
                                        <path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
                                        <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12-.708.708z"/>
                                        </svg>
                                    </a>
                                </div>
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
