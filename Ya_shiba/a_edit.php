<!-- Programmer Name: Teoh Mae Kay -->
<!-- Program Name : Admin edit -->
<!-- Description: Edit user account -->
<!-- First Written: 20/6/2023 -->
<!-- Eddited on: 7/7/2023-->

<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'yashiba';
$connection= mysqli_connect($host,$user,$password,$database);

if ($repID =$_GET['reportID']){
    $query = "UPDATE yashiba_user SET `PASSWORD`='$password' WHERE USER_ID='$userid' ";
    if (mysqli_query($connection,$query)){
        header("Location: a_manage_report.php");
        mysqli_close($connection);
    }
    else{
        echo "Error, something went wrong!";
        mysqli_close($connection);
    }
}
?>