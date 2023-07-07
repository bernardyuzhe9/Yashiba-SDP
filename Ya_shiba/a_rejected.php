<!-- Programmer Name:  She Jun Yuan-->
<!-- Program Name : Admin rejecct -->
<!-- Description: allow admin to reject school teacher-->
<!-- First Written: 20/6/2023 -->
<!-- Eddited on: 7/7/2023-->

<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'yashiba';
$connection= mysqli_connect($host,$user,$password,$database);

    if($uID = $_GET['userID']){
        $query = "UPDATE yashiba_user SET USER_STATUS = 'Rejected' WHERE USER_ID = '$uID'";
        if (mysqli_query($connection,$query)){
            mysqli_close($connection);
            header("Location: a_teacher_request.php");
        }
        else {
            echo"Error, something went wrong!";
            mysqli_close($connection);
        }
    }
?>