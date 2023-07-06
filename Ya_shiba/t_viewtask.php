
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
    $title = 'Home';
    $page = 'home';
    include_once('assets/t_header+nav.php');

  
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
    if (isset($_POST['deletetask'])) {
        $sql = "DELETE FROM task WHERE TASK_ID=".$_SESSION['taskid'];
        if (mysqli_query($connection, $sql)) {
        
            echo '<script>alert("Task deleted successfully")</script>';
            echo '<script>window.location.href = "t_courseoveerview.php";</script>';

        } else {
            echo "Error deleting record: " . mysqli_error($connection);
        }
    

    }

    if(isset($_POST['review-work'])){
        
          
        echo '<script>window.location.href = "t_viewwork.php";</script>';
        exit();
    }

    
    if(isset($_POST['re-submit']) ){ 
  if (isset($_FILES["files"])) {
    mysqli_query($connection, "DELETE FROM tec_uploaded_file WHERE TASK_ID=".$_SESSION['taskid']);    

    $fileCount = count($_FILES["files"]["name"]);
  
    if ($fileCount > 5) {
        echo '<script>alert("Only a maximum of 5 files can be uploaded")</script>';
    } else {
        // Insert a new row into the database
        mysqli_query($connection, "UPDATE task SET UPLOAD_FILE_NUM='$fileCount' WHERE TASK_ID=".$_SESSION['taskid']);    

        $query2 = "INSERT INTO tec_uploaded_file (TASK_ID) VALUES ('{$_SESSION['taskid']}')";
        mysqli_query($connection, $query2);
        $uploadedFileId = mysqli_insert_id($connection);
  
        // Loop through each file
        for ($i = 0; $i < $fileCount; $i++) {
            $fileName = $_FILES["files"]["name"][$i];
            $fileTmp = $_FILES["files"]["tmp_name"][$i];
  
            // Check if the file is uploaded successfully
            if (is_uploaded_file($fileTmp)) {
                // Move the file to the desired location
                $destination = "lect_task/" . $fileName;
                move_uploaded_file($fileTmp, $destination);
  
                // Update the database with the filename
                $column = "FILE_" . ($i + 1);
                $query = "UPDATE tec_uploaded_file SET $column = '$fileName' WHERE UPLOADED_FILE_ID = '$uploadedFileId'";
                mysqli_query($connection, $query);
                    mysqli_query($connection, "UPDATE task SET UPLOAD_FILE_NUM='$fileCount' WHERE TASK_ID=".$_SESSION['taskid']);    

                  

             
            } else {
              
                echo '<script>alert("Error uploading file")</script>';

            }
        }  echo '<script>alert("File uploaded successfully")</script>';
    }
  } else{
    $fileCount = "0";
    mysqli_query($connection, "UPDATE task SET UPLOAD_FILE_NUM='$fileCount' WHERE TASK_ID=".$_SESSION['taskid']);    

  
  }
        
    
      
       
    
    }
  
    
    
    
    $taskid = $_SESSION['taskid'];

$selectedpost = mysqli_query($connection, "SELECT * FROM task WHERE TASK_ID=".$_SESSION['taskid']);

    $row = mysqli_fetch_assoc($selectedpost);

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
    <nav>
        <ul>
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
                        <div style="font-size: 12px;">due <?php echo $row['TASK_SUBMIT_DATE']; ?></div>
                    </div>
                </div>
                <div class="right flow" style="font-size: 12px;">
                <button class="delete" style="padding-left:60px"name="deletetask">
                                <i class="fa-solid fa-trash"></i>
                                 </button>
                </div>
            </div>
        
            <div class="comment-section"></div>
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
                <img src="users/<?php echo $commentprofile["USER_PROFILE"]; ?>" alt="">
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
                <div class="d-grid gap-2">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reuploadtask" >Reupload the task</button>
                </div>
            </div>
    </div>
    <?php if($row['TASK_CATEGORY'] == "Task") {?>
    <form action="#" method="post">
    <div class="flow">
            <div class="container2">
                <div style="margin-bottom: 10px;">Mark the task</div>
                <div class="d-grid gap-2">
                <button class="btn btn-secondary " name="review-work" type="submit">View</button>
                </div>
                </a>
            </div>
    </div>
    </form>
    <?php }?>
    
</div>
<form action="#" method="post" enctype="multipart/form-data">
<div class="modal fade" id="reuploadtask" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title">Reupload the task</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
     
          <div class="mb-3">
          <label for="formFileMultiple" class="form-label">Upload</label>
          <label for="formFileMultiple" class="form-label">Please note that the previous file will be removed</label>
                <input class="form-control" type="file" name="files[]" multiple>
          </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button class="btn btn-primary" type="submit" name="re-submit">Submit</button>
      </div>
    </div>
  </div>
</div>
</form>
<?php } ?>