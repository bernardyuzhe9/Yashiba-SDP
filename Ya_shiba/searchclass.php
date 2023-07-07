<!-- Programmer Name: Tay Hui Yee-->
<!-- Program Name : search class-->
<!-- Description: Teacher able to search the class based on the classroom name-->
<!-- First Written: 22/6/2023 -->
<!-- Eddited on: 7/7/2023-->
                <?php
                session_start();
                $host = 'localhost';
                $user = 'root';
                $password = '';
                $database = 'yashiba';
                $connection = mysqli_connect($host, $user, $password, $database);

                if ($connection === false) {
                    die('Connection failed' . mysqli_connect_error());
                }

                $output1 = '';

                $sql = "SELECT * FROM classroom WHERE USER_ID ='{$_SESSION['id']}' AND CLASS_NAME LIKE '%".$_POST['name']."%'";
                $result = mysqli_query($connection, $sql);

                if(mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ob_start(); // Start output buffering
                ?>
<div class="mb-3">
    <div class="card" style="position:relative; display: inline-block;">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div class="d-flex">
                    <div class="col-4">
                        <?php
                        if ($row["CLASS_BACKGROUND"] == null) {
                        ?>
                            <img src="hihi.jpg" class="rounded-circle" style="width: 80px; height: 80px; border-radius: 50%;">
                        <?php
                        } else {
                        ?>
                            <img src="classroom/<?php echo $row["CLASS_BACKGROUND"] ?>" class="rounded-circle" style="width: 80px; height: 80px; border-radius: 50%;">
                        <?php
                        }
                        ?>
                    </div>
                    <div class="d-flex flex-column">
                        <!-- <h6 style="margin-left: 30px; margin-bottom: 0; margin-top: 10px;">Name: </h6> -->
                        <p style="margin-left: 30px; margin-top: 25px;"><?php echo $row['CLASS_NAME'] ?></p>
                    </div>
                </div>
                <div>
                    <form action="#" method="post">
                        <input type="hidden" name="id" value="<?php echo $row['CLASSROOM_ID'] ?>">
                        <button type="submit" class="btn btn-primary" style="margin-top: 20px;"name="gosearch">Join</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
 <?php
                        $output1 .= ob_get_clean();
                    }
                } else {
                    $output1 = '<div style="right: 450px">Classroom: 0 result\'s found</div>';
                }

                echo $output1;
                ?>