<?php



$host = 'localhost';
$user = 'root';
$password = '';
$database = 'yashiba';
$connection= mysqli_connect($host,$user,$password,$database);

if ($connection === false){
    die('Connection failed'. mysqli_connect_error());
} 
 
date_default_timezone_set('Asia/Kuala_Lumpur');


if(isset($_POST['goregister'])){
  $schoolid = $_POST['schoolid'];
  $role = $_POST['role'];
if (empty($role)) {
  echo '<script>alert("Please select the role")</script>';
} elseif(empty($schoolid)){
  echo '<script>alert("Please select the school id")</script>';
}
else {

  $query = "SELECT * FROM yashiba_school WHERE SCHOOL_ID = '$schoolid'";
  $results = mysqli_query($connection, $query);
  $row = mysqli_fetch_assoc($results); //$row['email']
  $count = mysqli_num_rows($results); //1 or 0
  
  if($count == 1){
      echo 'record found';
      session_start();
      $_SESSION['sclid'] =$row['SCHOOL_ID'] ;
      $_SESSION['role'] = $role;
      header("Location: g_register_1.php");
  } else{
      
    echo '<script>alert("Wrong School ID. Please try again")</script>';

  }


  }}
mysqli_close($connection);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/register.css">
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link href="css/nav+body.css" rel="stylesheet" />
    <link rel="shortcut icon" href="img/Logo(Ya-Shiba).png">   
    <title>Document</title>        
    <link rel="shortcut icon" href="img/Logo(Ya-Shiba).png">   
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/nav+body.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Mukta:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/g_homepage.css">
        <script src="https://kit.fontawesome.com/4d2389b91f.js" crossorigin="anonymous"></script>

    </head>

<body>
<div  style="margin: 30px 30px 30px 30px;">
<a href="g_homepage.php">
<i class="fa-solid fa-arrow-left"></i></a>
</div>
<div class="button-box">
    <a href="g_login.php">
        <button type="button" class="toggle-btn" >Login</button></a>
    </div>
<hr style="border:1px solid #365268;">

<form  action="#" method="post">
 
  <div class="page">
    <button class="login-container" type="button"  id="button1">
    <div class="reg-content">
      <i class="fa-solid fa-graduation-cap"></i>    
      <p>Student</p>
      </div>
    </button>
    <button class="login-container" type="button"  id="button2" >
      <value="Teacher">
      <div class="reg-content">
      <i class="fa-solid fa-chalkboard-user"></i>
      <p>Teacher</p>
      </div>
    </button>
    <input type="text" name="role" id="roleInput" value="" hidden>
  </div>  
  <div class="page" style="margin: 20px 0px -30px 0px;">
  <p>You are given a ID code to proceed with</p>
</div>
  <div class="page" >
  
  <div ><i class="fa-sharp fa-light fa-school"></i></div>
  <input type="text" name="schoolid" style="width: 300px;margin: 0 10px 0 10px;padding:5px"class="form-control" placeholder="Insert school ID" name="schoolid">
  <button class="btn btn-outline-secondary" type="submit" name='goregister' id="button-addon2">></button>

 
</div>
</form>
</body>
<script>

    const button1 = document.getElementById("button1");
    const button2 = document.getElementById("button2");
    const roleInput = document.getElementById("roleInput");

    
    button1.addEventListener("click", function() {
      button1.classList.add("active");
      button2.classList.remove("active");
      roleInput.value = "Student";
    });

    button2.addEventListener("click", function() {
      button1.classList.remove("active");
      button2.classList.add("active");
      roleInput.value = "Teacher";
    });
</script>

