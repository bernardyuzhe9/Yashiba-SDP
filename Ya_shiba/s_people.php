<?php
    $title = 'Home';
    $page = 'home';
    include_once('assets/s_header+nav.php');
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
                <div>
                    <h3 class="text-primary">Teacher</h3>
                    <hr class="border border-primary border-2 opacity-100">
                </div>
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
        </main>
        <?php
            $title = 'Home';
            $page = 'home';
            include_once('assets/footer.php');
            include_once('assets/s_joinclass.php');
        ?>
    </div>
</body>
