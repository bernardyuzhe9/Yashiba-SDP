<?php
    $title = 'Home';
    $page = 'home';
    include_once('assets/t_header+nav.php');
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'yashiba';
    $connection= mysqli_connect($host,$user,$password,$database);



    if ($connection === false){
        die('Connection failed' . mysqli_connect_error());
    }
    if(isset($_POST['modify'])){
        $username= $_POST['username'];
        $email= $_POST['email'];
        $contact_number= $_POST['contact'];
        $password = $_POST['password'];
        $_SESSION['username'] = $username;
         
$query1 = mysqli_query($connection, "SELECT * FROM yashiba_user WHERE USERNAME = '$username' AND user_id !=". $_SESSION['id']);
    $row = mysqli_fetch_assoc($query1); 
    $count = mysqli_num_rows($query1);
    if($count == 1){
        echo '<script>alert("There is repeated username, please try another username ")</script>';

    }else{
        $updateQuery = "UPDATE `yashiba_user` 
        SET `USERNAME`='$username',`EMAIL`='$email',`CONTACT_NUMBER`='$contact_number',`PASSWORD`='$password' WHERE `USER_ID`=" . $_SESSION['id'];
        if(mysqli_query($connection, $updateQuery)){
            echo '<script>alert("User Details Updated!")</script>';
        } else{
            echo 'Sorry, something went wrong';
            echo '<script>alert("No")</script>';
        }
    
    
        if(isset($_FILES['my_image'] )){
            if ($connection === false){
                die('Connection failed'. mysqli_connect_error());
            } 
        
       
     
        $img_name=$_FILES['my_image']['name'];
        // $img_name=empty($_POST['image'])?"":$_FILES['my_image']['name'];
        $img_size=$_FILES['my_image']['size'];
        $tmp_name=$_FILES['my_image']['tmp_name'];
        $error=$_FILES['my_image']['error'];
    
        if($error === 0){
            if($img_size>10000000){
                echo '<script>alert("Sorry your file is too large, Profile unable update")</script>';
            }else{
                $img_ex = pathinfo($img_name,PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $allowed_exs=array("jpg","jpeg","png");
                
                
                if(in_array( $img_ex_lc,$allowed_exs)){
    
                    $new_img_name=uniqid("IMG-",true).'.'.$img_ex_lc ;
                    $img_upload_path='uploads/'.$new_img_name;
                    move_uploaded_file($tmp_name,$img_upload_path);
                    //Insert into database
                    
                    $sql="UPDATE `yashiba_user` SET `USER_PROFILE`='$new_img_name' WHERE `USER_ID`=". $_SESSION['id'] ;
                    mysqli_query($connection,$sql);
                    $_SESSION['profile'] = $new_img_name;
                }else{
                    echo '<script>alert("You upload a wrong file type")</script>';
              
                }
            }
        }
    
    }else{
        echo"connection fail";
    
    }
    
    }}
?>

<!DOCTYPE html>
<html lang="en">
<title>Edit Profile - Teacher</title>
    <head>
        <link rel="stylesheet" href="css/editaccount.css">
    </head>
    <body class="sb-nav-fixed">
        
            <div id="layoutSidenav_content" class="bg-light">
                
                <main>
                <div class="container-fluid px-4">
                <div  style="margin: 30px 30px 30px 2px;">
                <a href="t_user_profile.php">
                <i class="fa-solid fa-arrow-left"></i></a>
            </div>
                        <h1 class="mt-4">Edit Profile</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"></li>
                        </ol>
                        <?php
                            $query = "SELECT USERNAME,USER_PROFILE,USER_NAME,EMAIL,CONTACT_NUMBER,PASSWORD
                            FROM yashiba_user 
                            WHERE USER_ID = ".$_SESSION['id']."";
                            $results = mysqli_query($connection, $query);
                            $row = mysqli_fetch_assoc($results);
                        ?>
                        <form action="#" method="post"  enctype="multipart/form-data" onsubmit="return validateUForm()">
                            <div class="row align-items-start">
                                <div class="picture-wrapper">
                                    <div class="profile-pic" style="width:150px;height:150px;object-fit:cover;margin-bottom:24px;position:relative;">
                                        <?php
                                        if ($row["USER_PROFILE"] == null) {
                                        ?>
                                            <img id="profile-img" src="img/profile picture.jpg" style="width: 150px; height: 150px; border-radius: 50%;">
                                        <?php
                                        } else {
                                        ?>
                                            <img id="profile-img" src="uploads/<?php echo $row["USER_PROFILE"] ?>" style="width: 150px; height: 150px; border-radius: 50%;">
                                        <?php
                                        }
                                        ?>
                                        <div id="cancel-btn" onclick="removeImg()"><i class="fas fa-times"></i></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Upload Profile</label>
                                        <input class="form-control" type="file" id="formFile1" name="my_image">
                                    </div>
                                </div>   
                            </div>
                            <div>
                                <div class="edit-acc">
                                    <input  type="text" name="username" class="editAcc" id="user_usernameR" onkeyup="validateRUsername()" value="<?php echo $row["USERNAME"]; ?>"required>
                                    <label class="acc-label"><b>Username</b></label>
                                    <span id = usernameR-error></span>
                                </div>
                                <div class="edit-acc">
                                    <input  type="text" name="email" class="editAcc" id="user_contact_email"onkeyup="validateREmail()"value="<?php echo $row["EMAIL"]; ?>"required>
                                    <label class="acc-label"><b>Email</b></label>
                                    <span id = emailR-error></span>
                                </div>
                                <div class="edit-acc">
                                    <input  type="text" name="contact" class="editAcc" id="user_contact_phone" onkeyup="validateRPhone()" value="<?php echo $row["CONTACT_NUMBER"]; ?>"required>
                                    <label class="acc-label"><b>Contact Number</b></label>
                                    <span id = phoneR-error></span>
                                </div>
                                <div class="edit-acc">
                                    <input  type="text" name="password" class="editAcc" id="user_password1" onkeyup=" validatePassword1()" value="<?php echo $row["PASSWORD"]; ?>"required>
                                    <label class="acc-label"><b>Password</b></label>
                                    <span id = passwordR1-error></span>
                                </div>
                            </div>
                            <div>
                            <button type="submit" class="savebtn" name="modify">Save Changes
                                <div class="arrow-wrapper">
                                    <div class="arrow"></div>
                                </div>
                            </button>
                            <span id=submitC-error></span>
                            </div>
                        </form>
                </main>
                <?php
                    $title = 'Home';
                    $page = 'home';
                    include_once('assets/footer.php');
                ?>
            </div>
        </div>
    </body>
    <script>
        const wrapper = document.querySelector("picture-wrapper");
        const defaultBtn= document.querySelector("#formFile1");
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
    <script src="assets/validation.js">
        function validateUForm()
		{
			return false;
		}
    </script>
</html>