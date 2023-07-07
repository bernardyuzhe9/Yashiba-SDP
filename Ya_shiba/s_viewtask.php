
<?php
    $title = 'Home';
    $page = 'home';
    include_once('assets/s_header+nav.php');
    date_default_timezone_set('Asia/Kuala_Lumpur');

    $currentDate = date('Y-m-d');
    $post_date=date('Y/m/d H:i:s');

    
	if (isset($_POST['comment'])) {
        
		$inputmessage = $_POST['inputmessage'];
		$result3 = mysqli_query($connection, "SELECT * FROM task WHERE TASK_ID=".$_SESSION['taskid']);
		$row = mysqli_fetch_array($result3);
        if (empty($row['MESSAGES_NUM'])) {
            $n=0;
        } else{
		$n = $row['MESSAGES_NUM'];}
		mysqli_query($connection, "INSERT INTO messages (USER_ID, TASK_ID,MESSAGE_DETAIL) VALUES ('{$_SESSION['id']}', '{$_SESSION['taskid']}', '$inputmessage')");
		mysqli_query($connection, "UPDATE task SET MESSAGES_NUM=$n+1 WHERE TASK_ID=".$_SESSION['taskid']);    
	} 
    if (isset($_POST['deletecomment'])) {

        $msgid=$_POST['deletecomment'];

        $result2 = mysqli_query($connection, "SELECT * FROM task WHERE TASK_ID =".$_SESSION['taskid']);
        $row = mysqli_fetch_array($result2);
        $n = $row['MESSAGES_NUM'];
        mysqli_query($connection, "UPDATE task SET MESSAGES_NUM=$n-1 WHERE TASK_ID=".$_SESSION['taskid']);
        
        $sql = "DELETE FROM messages WHERE MESSAGE_ID=$msgid";
        if (mysqli_query($connection, $sql)) {
        
            echo '<script>alert("Message deleted successfully")</script>';
            
        } else {
            echo "Error deleting record: " . mysqli_error($connection);
        }
    

    }
    
if (isset($_POST['re-submit'])) {
    $markingid=$_POST['re-submit'];
    
    if (isset($_FILES["files"]) && is_array($_FILES["files"])) {
      $fileCount = count($_FILES["files"]["name"]);
  
      if ($fileCount > 1) {
       
        echo '<script>alert("Please select only one file to upload")</script>';
      } else {

        $fileName = $_FILES["files"]["name"][0];
        $fileTmp = $_FILES["files"]["tmp_name"][0];
  
        // Move the file to the desired location
        $destination = "stu_task/" . $fileName;
        if (move_uploaded_file($fileTmp, $destination)) {
          mysqli_query($connection, "UPDATE marking SET UPLOAD_FILE='$fileName',SUBMIT_DATE='$post_date' WHERE MARKING_ID='$markingid'");
          
          echo '<script>alert("Change successfully")</script>';
          
        } else {
      
          echo '<script>alert("Error uploading file")</script>';
        }
      }
    } else {
  
      echo '<script>alert("File upload failed. Please select a file to upload")</script>';
          
    }
  }

  if (isset($_POST['add-submit'])) {
    $status = "Submitted";

    if (isset($_FILES["files"]) && is_array($_FILES["files"])) {
      $fileCount = count($_FILES["files"]["name"]);
  
      if ($fileCount > 1) {
       
        echo '<script>alert("Please select only one file to upload")</script>';
      } else {

        $fileName = $_FILES["files"]["name"][0];
        $fileTmp = $_FILES["files"]["tmp_name"][0];
  
        // Move the file to the desired location
        $destination = "stu_task/" . $fileName;
        if (move_uploaded_file($fileTmp, $destination)) {


            $result3 = mysqli_query($connection, "SELECT * FROM task WHERE TASK_ID=".$_SESSION['taskid']);
            $row = mysqli_fetch_array($result3);
            if (empty($row['HAND_IN_NUM'])) {
                $n=0;
            } else{
            $n = $row['HAND_IN_NUM'];}
            mysqli_query($connection, "UPDATE task SET HAND_IN_NUM=$n+1 WHERE TASK_ID=".$_SESSION['taskid']);    
            mysqli_query($connection, "INSERT INTO marking (USER_ID, TASK_ID, SUBMIT_DATE, UPLOAD_FILE, MARKING_STATUS) VALUES ({$_SESSION['id']}, {$_SESSION['taskid']}, '$post_date', '$fileName', '$status')");
            echo '<script>alert("Change successfully")</script>';
          
        } else {
      
          echo '<script>alert("Error uploading file")</script>';
        }
      }
    } else {
  
      echo '<script>alert("File upload failed. Please select a file to upload")</script>';
          
    }
  }


$selectedpost = mysqli_query($connection, "SELECT * FROM task WHERE TASK_ID=".$_SESSION['taskid']);
$chckmarking = mysqli_query($connection, "SELECT * FROM marking WHERE TASK_ID={$_SESSION['taskid']} AND USER_ID={$_SESSION['id']}");
  $row = mysqli_fetch_assoc($selectedpost);


  $dueDate = $row['TASK_SUBMIT_DATE'];


  $pass = $row['POINT'];
$result="Due"; 
$sum = 0; 
$row1 = mysqli_fetch_assoc($chckmarking);
?>
<!DOCTYPE html>
<html lang="en">

<head>
        <link href="css/ttask.css" rel="stylesheet" />
</head>
<body class="sb-nav-fixed">
            <div id="layoutSidenav_content" class="bg-light">
                <main>
<div class="blog-navigation-container" id="blog-DIV">
<div class="container-fluid px-4">
                
    <nav>
        <ul>
        <div  style="margin: 30px 30px 30px 2px;">
                <a href="s_courseoverview.php">
                <i class="fa-solid fa-arrow-left"></i></a>
            </div>
            <li class="course-name"><?php echo $_SESSION['classroomname']; ?></li>
        </ul>
    </nav>
</div>  
<form action="#" method="post">

<div class="bigcontainer">
<div class="align-item-start">
    <div class="flow">
        <div class="container1">
            <div class="top-content">
                <div class="left flow">
                    <div class="profile-pic">
                    <?php if($row["TASK_CATEGORY"] =="Task") {?>
                      <img src="assets\img\task.png" alt="">
      <?php }else if($row["TASK_CATEGORY"] =="Material") {?>
        <img src="assets\img\material.png" alt="">
        <?php }else{?><img src="assets\img\annoucement.png" alt="">
        <?php }?>
                    </div>
                    <div class="profile">
                        <div><?php echo $row['TASK_NAME']; ?></div>
                    <?php if($row["TASK_CATEGORY"] =="Task") {?>
                        <div style="font-size: 12px;">   
                       
                        due: <?php echo $row['TASK_SUBMIT_DATE']; ?></div>
                    <?php }?>
                    </div>   
                    <div class="right flow" style="font-size: 12px;">
                    <?php if($row["TASK_CATEGORY"] =="Task") {?>
                    <?php     if (!empty($row1)){ ?>
                                <div class="delete" style="    margin-left:460px; color: #49eb51;"><?php echo $row1["MARKING_STATUS"]; ?></div>
                                <?php     } else if (strtotime($dueDate) < strtotime($currentDate)) { ?>
                                    <div class="delete"  style="    margin-left:440px;"><?php echo $result ?></div>
                                    <?php    } ?>
                                    <?php }?>

                             
                </div>
                </div>
            
            </div>
        
            <hr style="border:1px solid #365268;margin-top:-10px;">
            <div class="mid-content">
                <div class="left flow">
                    <div class="midtask">
                        <div class="date"><?php echo $row['TASK_CREATE_TIME']; ?></div>
                        <div class="description"><?php echo $row['TASK_DESCRIPTION']; ?></div>
                    </div>
                </div>
            </div>
            <div class="comment-section" style="margin-bottom:-20px;margin-top:20px;"></div>

            <?php
if (isset($row["MESSAGES_NUM"])) {
    $commentsbelow = mysqli_query($connection, "SELECT * FROM messages WHERE TASK_ID=" . $row['TASK_ID'] . "");
    $count = mysqli_num_rows($commentsbelow);

    foreach ($commentsbelow as $commentbelow) {
        $commentprofile = mysqli_query($connection, "SELECT * FROM yashiba_user WHERE USER_ID=" . $commentbelow['USER_ID'] . "");
        $commentprofile = mysqli_fetch_assoc($commentprofile);
?>
        <div class="bottom-content" style="justify-content: left">
            <div class="profile-pic">
            <?php
                if ($commentprofile["USER_PROFILE"] == null) {
            ?>
                <img src="img/profile picture.jpg" >
                <?php
                } else {
            ?>
                <img src="uploads/<?php echo $commentprofile["USER_PROFILE"] ?>" >
            <?php
                }
            ?>      
            </div>
            <div class="profile">
                <div><?php echo $commentprofile["USER_NAME"]; ?></div>
                <div class="comment">
                    <div class="comment-below"><?php echo $commentbelow["MESSAGE_DETAIL"]; ?></div>
                    <?php if ($commentbelow["USER_ID"] == $_SESSION['id']) { ?>
                        <button type="submit" class="delete" name="deletecomment" value="<?php echo $commentbelow["MESSAGE_ID"]; ?>">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php } ?> 
<?php
}
?>

                
<div class="comment-section">
                    <div class="search">
                        <input type="text" name="inputmessage" placeholder="Add a comment...">
                    </div>
                    <div class="comment icon">
                        <button type="submit" name="comment" id="Comment_Post" class="btn">SENT</button>
                    </div>
                </div>
            
            </div>
        </form>
    </div>
</div>

<?php if ($row['TASK_CATEGORY'] == "Task" ||$row['TASK_CATEGORY']== "Material") { ?>
<div class="align-item-start">
    <div class="flow">
            <div class="container3">
                <div class="mb-3">
                <?php
$taskfile = mysqli_query($connection, "SELECT * FROM tec_uploaded_file WHERE TASK_ID=".$_SESSION['taskid']);

while ($wee = mysqli_fetch_assoc($taskfile)) {
    for ($i = 1; $i <= 5; $i++) {
        $columnName = "FILE_" . $i;
        if (isset($wee[$columnName]) && !empty($wee[$columnName])) {
            $fileName = $wee[$columnName];
            $filePath = "lect_task/" . $fileName;

            // Check if the file exists before displaying the download button
            if (file_exists($filePath)) {
                ?>
                <i class="fa-solid fa-file"></i>
                <?php echo $fileName; ?>
            <div class="mb-3"> 
            <a href="download.php?file=<?php echo urlencode($fileName); ?>">
                <button type="button" class="btn btn-primary">Download</button>
            </a>
            </div>
               
        
 <?php
            } else {
                echo "File not found: " . $fileName . "<br>";
            }
        }
    }
}
?>                    
                </div>
              
            </div>
    </div>
    <?php if($row['TASK_CATEGORY'] == "Task") {
      

if  (!empty($row1)) {
$result = $row1['MARKING_STATUS'];
}  else if (strtotime($dueDate) < strtotime($currentDate) ) {
$result = "Due";
} else {
$result = "Not Due";
}
              
              
            
    if(!empty($row1)) {
        ?>
         <form action="#" method="post" enctype="multipart/form-data">

    <div class="flow">
            <div class="container3">
                <div class="mb-3">
                <label for="formFileMultiple" class="form-label">Submmited on :<?php echo $row1["SUBMIT_DATE"]; ?></label><br>
    
                <?php if($row1['MARKING_STATUS'] == "Graded") { ?>
                <label for="formFileMultiple" class="form-label">Status : <?php echo $row1["MARKING_STATUS"]; ?> on <?php echo $row1["MARKING_DATE"]; ?></label><br>
                <label for="formFileMultiple" class="form-label">Mark : <?php echo $row1["MARKED"]; ?> (<?php echo $result ?>)</n></label><br>
                <label for="formFileMultiple" class="form-label">Feedback : <?php echo $row1["FEEDBACK"]; ?></label><br>
                <label for="formFileMultiple" class="form-label">Your submitted file : </label>
<?php

    $fileName = $row1['UPLOAD_FILE'];
    $filePath = "stu_task/" . $fileName;

    // Check if the file exists before displaying the download button
    if (file_exists($filePath)) {
        ?>
   
   
            <a href="download2.php?file=<?php echo urlencode($fileName); ?>">
            <i class="fa-solid fa-download"></i><br>
          </a>

        <?php
    } else {
        ?><i class="fa-sharp fa-solid fa-circle-exclamation"></i><br><?php
    }
   
?>
<label for="formFileMultiple" class="form-label">Teacher's return file : </label>
<?php
$taskfile = mysqli_query($connection, "SELECT * FROM marking WHERE MARKING_ID='" . $row1['MARKING_ID'] . "'");

while ($wee = mysqli_fetch_assoc($taskfile)) {
    $fileName = $wee['RETURN_FILE'];
    $filePath = "stu_task/" . $fileName;

    // Check if the file exists before displaying the download button
    if (file_exists($filePath)) {
        ?>
   
   
            <a href="download2.php?file=<?php echo urlencode($fileName); ?>">
            <i class="fa-solid fa-download"></i>
          </a>

        <?php
    } else {
        ?><i class="fa-sharp fa-solid fa-circle-exclamation"></i><?php
    }
}
?>
     <?php  }else { ?>
        <label for="formFileMultiple" class="form-label">Status <?php echo $row1["MARKING_STATUS"]; ?></label>

       
        <label for="formFileMultiple" class="form-label">Your submitted file : </label>
<?php

    $fileName = $row1['UPLOAD_FILE'];
    $filePath = "stu_task/" . $fileName;

    // Check if the file exists before displaying the download button
    if (file_exists($filePath)) {
        ?>
   
   
            <a href="download2.php?file=<?php echo urlencode($fileName); ?>">
            <i class="fa-solid fa-download"></i><br>
          </a>

        <?php
    } else {
        ?><i class="fa-sharp fa-solid fa-circle-exclamation"></i><br><?php
    }
   
?>
            <hr style="border:1px solid #365268;">

                    <label for="formFileMultiple" class="form-label">Re-Upload Your Work</label>
                    <input class="form-control" type="file" name="files[]" multiple required>

                <div class="d-grid gap-2"style="padding-top:10px">
                <button class="btn btn-primary" type="submit" name="re-submit" value="<?php echo $row1["MARKING_ID"]; ?>">Submit</button>
                </div>
             
    <?php } ?>  </div></form>

    
            <?php }  else if($result=="Due"){?>
                <form action="#" method="post" enctype="multipart/form-data">
    <div class="flow">
            <div class="container3">
                <div class="mb-3">
                    <label for="formFileMultiple" class="form-label">You're not able to upload your work</label>
                </div>
            </div>  </div>
    </form>



                <?php     }else { ?>
    <form action="#" method="post" enctype="multipart/form-data">
    <div class="flow">
            <div class="container3">
                <div class="mb-3">
                    <label for="formFileMultiple" class="form-label">Upload Your Work</label>
                    <input class="form-control" type="file" name="files[]" multiple required>
                </div>
                <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit" name="add-submit" >Submit</button>
                </div>
            </div>  </div>
    </form>
    <?php }
}?>
    

<?php } ?> 