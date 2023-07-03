<?php
session_start();
unset($_SESSION['id']);
unset($_SESSION['role']);
unset($_SESSION['user_status']);
unset($_SESSION['profile']);
echo '<script>alert("Log out successful")</script>';
header("Location: g_homepage.php");
?>