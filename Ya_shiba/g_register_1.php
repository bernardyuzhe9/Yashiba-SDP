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

if(isset($_POST['register'])){
    
    $username= $_POST['username'];
    $name= $_POST['name'];
    $email= $_POST['email'];
    $password= $_POST['txtPasswordR'];
    $role=$_SESSION['role'];
    $contact_number=$_POST['txtphone'];
    $reg_date=date('Y/m/d H:i:s');
    
    $query1 =mysqli_query($connection,"SELECT * FROM yashiba_user WHERE USERNAME = '$username'");
    $row = mysqli_fetch_assoc($query1); 
    $count = mysqli_num_rows($query1);
    if($count == 1){
        echo '<script>alert("There is repeated username, please try another username ")</script>';

    }else{
    if($_SESSION['role']==="Student"){
        $user_status='Active';
    }else{
        $user_status='Pending';
    }

    $query = "INSERT INTO yashiba_user (SCHOOL_ID,USERNAME, USER_NAME, EMAIL, CONTACT_NUMBER,PASSWORD,ROLE,USER_STATUS,REGISTERED_DATE) 
    VALUES ('" . $_SESSION['sclid'] . "', '$username', '$name', '$email', $contact_number, '$password', '$role', '$user_status', '$reg_date')";
    if(mysqli_query($connection,$query)){
        if($user_status==="Pending"){
            echo '<script>alert("Account request was sent. Please wait for the approval of the Admin, will contact you once the validation done"); window.location.href="g_homepage.php"</script>';
        }else{
            echo '<script>alert("Account created successfully. You can proceed to Login"); window.location.href = "g_login.php";</script>';
        }
        
    }else{

      echo '<script>alert("Account was not create, please try again")</script>';
    }}}




$school = mysqli_query($connection, "SELECT * FROM yashiba_school WHERE `SCHOOL_ID`='".$_SESSION['sclid']."'");
$row = mysqli_fetch_array($school); 
   

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
        <script src="https://kit.fontawesome.com/4d2389b91f.js" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Mukta:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/g_homepage.css">
        <script src="validation.js"></script>
</head>
<?php {?>

<body>

 <!-- Edit User Acc -->
<div  style="margin: 30px 30px 30px 30px;">
<a href="g_register.php">
<i class="fa-solid fa-arrow-left"></i></a>
</div>
    <hr style="border:1px solid #365268;">
    <form class="flow" action="#" method="post" onsubmit="return validateRForm()">
    <div class="edit-acc" style="margin-top: 70px;">
         <input class="editAcc" id="disabledInput" type="text" value="<?php echo $row["SCHOOL_NAME"]; ?>" disabled>
         <label class="user-label" >School Name </label>
       
    </div>
    <div class="edit-acc">
         <input class="editAcc" id="disabledInput" type="text" value="<?php echo $_SESSION['role'] ?>" disabled>
         <label class="user-label" >Role</label>   
    </div>
    
      
        <div class="edit-acc">

            <input  type="text" name="username" class="editAcc" id="user_usernameR" onkeyup="validateRUsername()"required>
            <span id = usernameR-error></span>
            <label class="user-label">Username </label>
        </div>
        <div class="edit-acc">
            <input  type="text" name="name" autocomplete="off" class="editAcc" id="user_contact_name"  onkeyup="validateRName()" required>
            <label class="user-label">Full Name</label><span id = nameR-error></span>
            
        </div>
        <div class="edit-acc">
            <input type="text" name="email" autocomplete="off" class="editAcc" id="user_contact_email" onkeyup="validateREmail()"required >
             <label class="user-label">Email</label><span id = emailR-error></span>
           
        </div>
        <div class="edit-acc">
            <input type="text" name="txtphone" autocomplete="off" class="editAcc" id="user_contact_phone" onkeyup="validateRPhone()"required >
             <label class="user-label">Phone</label><span id = phoneR-error></span>
           
        </div>
        <div class="edit-acc">
            <input type="password" class="editAcc" autocomplete="off" placeholder="Password" required name="password" id="user_password1" onkeyup="validatePassword1()";>
            <label class="user-label">Password</label><span id =passwordR1-error></span>
            
        </div>
        
        <div class="edit-acc">
            <input type="password" class="editAcc" autocomplete="off" placeholder="Password" required name="txtPasswordR" id="user_password2" onkeyup="validatePassword2()";>
              <label class="user-label">Confirm password</label><span id =passwordR2-error></span>
            <span id = phoneR-error></span>
          
        </div>
        
    </div>
    <div class="textSubmit">
        <button  type="submit" class="submit" id="submitButton" name="register">REGISTER</button>
            <span  id =submit-error></span>
        
   
    </form>
 </div></div>
    <?php } ?>
   
</body>
</html>

<script src="validation.js"></script>
<script>
const wrapper = document.querySelector("picture-wrapper");
  const defaultBtn= document.querySelector("#default-btn");
  const customBtn= document.querySelector("#custom-btn");
  const img= document.querySelector("#profile-img");
  const cancelBtn = document.querySelector("#cancel-btn i");
  
  
    
         function defaultBtnActive(){
           defaultBtn.click();
         }
         defaultBtn.addEventListener("change", function(){
           const file = this.files[0];
           if(file){
             const reader = new FileReader();
             reader.onload = function(){
               const result = reader.result;
               img.src = result;
               wrapper.classList.add("active");
             }
             reader.readAsDataURL(file);
           }

         });
        function removeImg(){
            img.src=""; 
            defaultBtn.value="";
        }
</script>
<script src="validationscript.js">

function validateUForm()
		{
			return false;
		}
</script>
