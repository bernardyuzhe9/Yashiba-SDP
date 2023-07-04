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
                <table class="table table-hover  table-bordered">
                    <thead class="text-center" style="background-color: #bcd2e1fe; vertical-align:middle; white-space:nowrap;">
                        <tr>
                            <th scope="col">Profile</th>
                            <th scope="col">Name</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        $classid = 12;
                        $query = "SELECT yashiba_user.USER_PROFILE, yashiba_user.USER_NAME 
                        FROM yashiba_user
                        INNER JOIN enrolled_classroom ON yashiba_user.USER_ID = enrolled_classroom.USER_ID
                        WHERE enrolled_classroom.CLASSROOM_ID = '$classid' AND yashiba_user.ROLE='Teacher'";
                        $results = mysqli_query($connection, $query);
                        while($row = mysqli_fetch_assoc($results)){
                        ?>
                        <tr style="vertical-align:middle;">
                            <td scope="row">
                            <?php
                                if ($row["USER_PROFILE"] == null) {
                            ?>
                                <img src="img/profile picture.jpg" style="width: 70px; height: 70px; border-radius: 50%;">
                                <?php
                                } else {
                            ?>
                                <img src="uploads/<?php echo $row["USER_PROFILE"] ?>" style="width: 70px; height: 700px; border-radius: 50%;">
                            <?php
                                }
                            ?>
                            </td>
                            <td ><?php echo $row['USER_NAME'];?></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
                <div class="row">
                        <?php
                        $classid = 12;
                        $query1 = mysqli_query($connection,"SELECT * FROM classroom WHERE CLASSROOM_ID='$classid'");
                        $row1 = mysqli_fetch_assoc($query1);
                        ?>
                        <h3 class="col text-primary">Student</h3>
                        <h6 class="col text-end" style="margin-top: 12px"><?php echo $row1["NUM"] ?> Students</h3>
                </div>
                <hr class="border border-primary border-2 opacity-100">
                <table class="table table-hover  table-bordered">
                    <thead class="text-center" style="background-color: #bcd2e1fe; vertical-align:middle; white-space:nowrap;">
                        <tr>
                            <th scope="col">Profile</th>
                            <th scope="col">Name</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                            $classid = 12;
                            $query = "SELECT yashiba_user.USER_ID, yashiba_user.USER_PROFILE, yashiba_user.USER_NAME 
                            FROM yashiba_user
                            INNER JOIN enrolled_classroom ON yashiba_user.USER_ID = enrolled_classroom.USER_ID
                            WHERE enrolled_classroom.CLASSROOM_ID = '$classid' AND yashiba_user.ROLE='Student'";
                            $result = mysqli_query($connection, $query);
                            while($rows = mysqli_fetch_assoc($result)){
                        ?>
                        <tr style="vertical-align:middle;">
                            <td scope="row">
                            <?php
                                if ($rows["USER_PROFILE"] == null) {
                            ?>
                                <img src="img/profile picture.jpg" style="width: 70px; height: 70px; border-radius: 50%;">
                                <?php
                                } else {
                            ?>
                                <img src="uploads/<?php echo $rows["USER_PROFILE"] ?>" style="width: 70px; height: 700px; border-radius: 50%;">
                            <?php
                                }
                            ?>
                            </td>
                            <td ><?php echo $rows['USER_NAME'];?></td>
                        </tr> 
                        <?php }?>
                    </tbody>
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
