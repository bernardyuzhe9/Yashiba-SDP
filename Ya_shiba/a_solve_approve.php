<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'yashiba';
$connection= mysqli_connect($host,$user,$password,$database);

    if($repID = $_GET['reportID']){
        $query = "UPDATE report SET REPORT_STATUS = 'Solved' WHERE REPOT_ID = '$repID'";
        if (mysqli_query($connection,$query)){
            mysqli_close($connection);
            header("Location: a_manage_report.php");
        }
        else {
            echo"Error, something went wrong!";
            mysqli_close($connection);
        }
    }

    if($uID = $_GET['userID']){
        $query1 = "UPDATE yashiba_user SET USER_STATUS = 'Active' WHERE USER_ID = '$uID'";
        if (mysqli_query($connection,$query1)){
            mysqli_close($connection);
            header("Location: a_teacher_request.php");
        }
        else {
            echo"Error, something went wrong!";
            mysqli_close($connection);
        }
    }
?>