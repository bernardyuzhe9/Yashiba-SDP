<?php
session_start();


$host = 'localhost';
$user = 'root';
$password = '';
$database = 'yashiba';
$connection= mysqli_connect($host,$user,$password,$database);

if ($connection === false){
    die('Connection failed'. mysqli_connect_error());
} 
 
date_default_timezone_set('Asia/Kuala_Lumpur');

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

if(isset($_POST['login'])){
    $username = $_POST['txtusername'];
    $password = $_POST['txtpassword'];
  
    $query = "SELECT * FROM yashiba_user WHERE USERNAME = '$username' AND 
    PASSWORD = '$password'";
    $results = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($results); //$row['email']
    $count = mysqli_num_rows($results); //1 or 0
    
    if($count == 1){
        $_SESSION['id'] = $row['USER_ID'];
        $_SESSION['role'] = $row['ROLE'];
        $_SESSION['user_status'] = $row['USER_STATUS'];
        $_SESSION['profile'] = $row['USER_PROFILE'];
        $_SESSION['schoolid'] = $row['SCHOOL_ID'];
  
        if($_SESSION['role']=="Teacher" && $_SESSION['user_status']=="Active"){
          header("Location: t_homepage.php");
          
        }else if ($_SESSION['role']=="Student" && $_SESSION['user_status']=="Active"){
              header("Location: s_homepage.php");
              
          }
          else if ($_SESSION['role']=="Admin" && $_SESSION['user_status']=="Active"){
            header("Location: a_dashboard.php");
            
        }
          else{
              echo '<script>alert("This account no longer assists")</script>';
          }
    } else{
        
      echo '<script>alert("Wrong Username or Password. Please try again")</script>';
  
    }
  }
  
  
  mysqli_close($connection);
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/login.css">
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link href="css/nav+body.css" rel="stylesheet" />
        <link rel="shortcut icon" href="img/Logo(Ya-Shiba).png">   
        <title>Document</title>   
        <link rel="shortcut icon" href="img/Logo(Ya-Shiba).png">   
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/nav+body.css" rel="stylesheet" />
        <script src="https://kit.fontawesome.com/4d2389b91f.js" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Mukta:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/g_homepage.css">
        <script src="validation.js"></script>
</head>
<body>
    
<div  style="margin: 30px 30px 30px 30px;">
<a href="g_homepage.php">
<i class="fa-solid fa-arrow-left"></i></a>
</div>
<form method="post" action=#>
    <hr style="border:1px solid #365268;">

    <div class="button-box">
    <a href="g_register.php">
        <button type="button" class="toggle-btn" >Register</button></a>
</div>
    <div class="center">
    <div class="page">
        <h1 style="margin-bottom:-60px; color: #070024;font-family:Karla;font-weight:bold;">Login Page</h1>
    </div>
    <div class="page">
    <div class="edit-acc" style="margin-top:100px;">
         <label class="user-label" >Username</label> 
         <input class="editAcc"  type="text" name="txtusername" required>
           
    </div>
    </div>
    <div class="page">
    <div class="edit-acc">
    <label class="user-label" >Password</label>
    <input class="editAcc" type="password" name="txtpassword" required>        
    </div>
    </div>
    <div class="page">
    <input type="checkbox" class="checkbox" placeholder="Remember me" required>
    <span class="spantick" required>Remember Me</span>
    </div>
    <div class="page">
    <button type="submit" class="loginb" name="login">Log In</button>
    </div>
    </div>
    </form>


</body>
</html>