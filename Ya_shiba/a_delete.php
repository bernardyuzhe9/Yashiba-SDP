<!-- Programmer Name: Teoh Mae Kay -->
<!-- Program Name : admin delete -->
<!-- Description: function for admin to delete -->
<!-- First Written: 22/6/2023 -->
<!-- Eddited on: 7/7/2023-->


<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'yashiba';
$connection= mysqli_connect($host,$user,$password,$database);

    if ($repID =$_GET['reportID']){
        $query = "DELETE FROM report WHERE REPOT_ID = '$repID' ";
        if (mysqli_query($connection,$query)){
            header("Location: a_manage_report.php");
            mysqli_close($connection);
        }
        else{
            echo "Error, something went wrong!";
            mysqli_close($connection);
        }
    }

    if ($uID =$_GET['userID']){
        $query1 = "DELETE FROM yashiba_user WHERE USER_ID = '$uID' ";
        if (mysqli_query($connection,$query1)){
            header("Location: a_teacher_request.php");
            mysqli_close($connection);
        }
        else{
            echo "Error, something went wrong!";
            mysqli_close($connection);
        }
    }

    if ($uID =$_GET['tecID']){
        $query2 = "DELETE FROM yashiba_user WHERE USER_ID = '$uID' ";
        if (mysqli_query($connection,$query2)){
            header("Location: a_teacher_acc.php");
            mysqli_close($connection);
        }
        else{
            echo "Error, something went wrong!";
            mysqli_close($connection);
        }
    }

    if ($uID =$_GET['stuID']){
        $query3 = "DELETE FROM yashiba_user WHERE USER_ID = '$uID' ";
        if (mysqli_query($connection,$query3)){
            header("Location: a_student_acc.php");
            mysqli_close($connection);
        }
        else{
            echo "Error, something went wrong!";
            mysqli_close($connection);
        }
    }
?>