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

if(isset($_POST['addSch'])){
    
    $schID= $_POST['schID'];
    $schName= $_POST['schName'];
    $address= $_POST['schAddress'];
    $pic= $_POST['schPic'];
    $contact=$_POST['schContact'];
    $rDate=date('Y/m/d H:i:s');
    
    $query1 =mysqli_query($connection,"SELECT * FROM yashiba_school WHERE SCHOOL_ID = '$schID'");
    $row = mysqli_fetch_assoc($query1); 
    $count = mysqli_num_rows($query1);
    if($count == 1){
        echo '<script>alert("There is repeated school ID, please try another school ID ")</script>';

    }else{
    $query = "INSERT INTO yashiba_school (SCHOOL_ID,SCHOOL_NAME,SCHOOL_ADDRESS,PERSON_IN_CHARGE,PERSON_IN_CHARGE_PHONE,SCHOOL_REGISTER_DATE) 
    VALUES ('$schID', '$schName', '$address', '$pic', $contact, '$rDate')";
    if(mysqli_query($connection,$query)){
        echo '<script>alert("School Account was created successfully")</script>';
    }else{

      echo '<script>alert("School Account was not create, please try again")</script>';
    }}}

mysqli_close($connection);   
?>

<!DOCTYPE html>
<title>Add School - Admin</title>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/Logo(Ya-Shiba).png">
    <script src="https://kit.fontawesome.com/4d2389b91f.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mukta:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/a_add_school.css">
    </head>
    <?php {?>
        <body>
            
            <div  style="margin: 30px 30px 30px 30px;">
                <a href="a_school_acc.php">
                <i class="fa-solid fa-arrow-left"></i></a>
            </div>
            <hr style="border:1px solid #365268;">
            <div class="center">
                <div class="page">
                    <h1 style="margin-top:-20px;margin-bottom:-30px; color: #03396c;font-family:Karla;font-weight:bold;">Add School Page</h1>                
                </div>
            </div>
            <form class="flow" action="#" method="post"  onsubmit="return validateSchBtnForm()" style ="font-family:Mukta; color: #03396c;">
                <div class="edit-sch">
                    <input  type="text" name="schID" class="editSch" id="sch_ID" onkeyup="validateSchID()"required>
                    <label class="sch-label"><b>School ID</b></label>
                    <span id = sch_ID_ER></span>
                </div>
                <div class="edit-sch">
                    <input  type="text" name="schName" autocomplete="off" class="editSch" id="sch_name"  onkeyup="validateSchName()" required>
                    <label class="sch-label"><b>School Name</b></label>
                    <span id = sch_name_ER></span>
                </div>
                <div class="edit-sch">
                    <input type="text" name="schAddress" autocomplete="off" class="editSch" id="sch_address" onkeyup="validateSchAddress()"required >
                    <label class="sch-label"><b>School Address</b></label>
                    <span id = sch_address_ER></span>
                </div>
                <div class="edit-sch">
                    <input type="text" name="schPic" autocomplete="off" class="editSch" id="sch_pic" onkeyup="validateSchPic()"required >
                    <label class="sch-label"><b>Person-In-Charge</b></label>
                    <span id = sch_pic_ER></span>
                </div>
                <div class="edit-sch">
                    <input type="text" name="schContact" autocomplete="off" class="editSch" id="sch_contact" onkeyup="validateSchContact()"required >
                    <label class="sch-label"><b>Contact Number</b></label>
                    <span id = sch_contact_ER></span>
                </div>
                <div class="textSubmit">
                    <button type="addSch" class="addBtn" id="submitButton" name="addSch">ADD</button>
                    <span id =sch_btn_ER></span>
                </div>
            </form>
    <?php } ?>
    <script src="assets/validation.js"></script>
</body>
</html>
