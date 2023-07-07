<!-- Programmer Name: She Jun Yuan-->
<!-- Program Name : Logout  -->
<!-- Description:unser all the data  -->
<!-- First Written: 10/6/2023 -->
<!-- Eddited on: 7/7/2023-->

<?php
session_start();
unset($_SESSION['id']);
unset($_SESSION['role']);
unset($_SESSION['user_status']);
unset($_SESSION['profile']);
echo '<script>alert("Log out successful")</script>';
header("Location: g_homepage.php");
?>