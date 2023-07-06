<html>
<head>
<link rel="stylesheet" href="blog.css">
<link rel="stylesheet" href="event.css">
</head>

<?php
session_start();
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'yashiba';
$connection= mysqli_connect($host,$user,$password,$database);

// $_SESSION['schoolid'] = $_POST['name'];

if ($connection === false){
    die('Connection failed' . mysqli_connect_error());
}

$output = ''; // Initialize an empty variable to store the generated HTML content

$sql = "SELECT * FROM yashiba_user WHERE SCHOOL_ID ='{$_SESSION['schoolid']}' AND ROLE='Student' AND USER_NAME LIKE '%".$_POST['name']."%'";
$result = mysqli_query($connection, $sql);

if(mysqli_num_rows($result) > 0){
    while ($row = mysqli_fetch_assoc($result)) {
        ob_start(); // Start output buffering

        ?>
        <div class="mb-3">
            <div class="card">
            <div class="card-body">
               
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <div class="col-4">
                                <?php
                                if ($row["USER_PROFILE"] == null) {
                                ?>
                                    <img src="img/profile picture.jpg" class="rounded-circle" style="width: 80px; height: 80px; border-radius: 50%;">
                                <?php
                                } else {
                                ?>
                                    <img src="uploads/<?php echo $row["USER_PROFILE"] ?>" class="rounded-circle" style="width: 80px; height: 80px; border-radius: 50%;">
                                <?php
                                }
                                ?>
                            </div>
                            <div class="d-flex flex-column">
                                <h6 style="margin-left: 30px; margin-bottom: 0; margin-top: 10px;">Name: </h6>
                                <p style="margin-left: 30px; margin-top: 10px;"><?php echo $row['USER_NAME'] ?></p>
                            </div>
                        </div>
                        <div>
                            <form action="#" method="post">
                                <input type="hidden" name="id" value="<?php echo $row['USER_ID'] ?>">
                                <button type="submit" class="btn btn-primary" name="add">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
        </div>
        
        <?php

        $output .= ob_get_clean(); // Append the generated HTML content to the $output variable
    }
} else {
    $output = '<div style="right: 450px">Student: 0 result\'s found</div>';
}

echo $output; // Echo or return the generated HTML content
?>

</html>