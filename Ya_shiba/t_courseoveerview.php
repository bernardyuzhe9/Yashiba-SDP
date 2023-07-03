
<?php


    $title = 'Home';
    $page = 'home';
    include_once('assets/t_header+nav.php'); 
    
    
    $assigned = (int)$_SESSION['classroomnstudent'] -1;
    date_default_timezone_set('Asia/Kuala_Lumpur');


    if(isset($_POST['review-task'])){
        
 
      $_SESSION['taskid']=$_POST['review-task'];
      echo '<script>window.location.href = "t_viewtask.php";</script>';
      exit();
  }

  if(isset($_POST['review-work'])){
        
    $_SESSION['taskid']=$_POST['review-work'];
      
    echo '<script>window.location.href = "t_viewwork.php";</script>';
    exit();
}

if (isset($_POST['deletetask'])) {
  $taskid1= $_POST['deletetask'];
  $sql = "DELETE FROM task WHERE TASK_ID= $taskid1";
  if (mysqli_query($connection, $sql)) {
  
      echo '<script>alert("Task deleted successfully")</script>';

  } else {
      echo "Error deleting record: " . mysqli_error($connection);
  }


}

    if(isset($_POST['add-submit']) ){
      
      $taskname= $_POST['tasknametxt'];
      $description= $_POST['taskdestxt'];
      $post_date=date('Y/m/d H:i:s');
    

      $due=date('Y-m-d', strtotime($_POST['duetxt']));
      $classcat=$_POST['taskcattxt'];
      $point=$_POST['pointtxt'];
      $message="0";
      $handin="0";     


if (isset($_FILES["files"])) {
  $fileCount = count($_FILES["files"]["name"]);

  if ($fileCount > 5) {
      echo "Only a maximum of 5 files can be uploaded.";
  } else {
      // Insert a new row into the database
      $query3 = "INSERT INTO task (CLASSROOM_ID,TASK_NAME,TASK_DESCRIPTION,UPLOAD_FILE_NUM,TASK_CREATE_TIME,TASK_SUBMIT_DATE,TASK_CATEGORY,POINT,MESSAGES_NUM,HAND_IN_NUM) VALUES
       ('{$_SESSION['classroomid']}','$taskname','$description','$fileCount','$post_date','$due','$classcat','$point','$message','$handin')";
      mysqli_query($connection, $query3);
      $taskid = mysqli_insert_id($connection);
      $query2 = "INSERT INTO tec_uploaded_file (TASK_ID) VALUES ('$taskid')";
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
              echo '<script>alert("File uploaded successfully")</script>';
        
          } else {
              echo "Error uploading file: " . $fileName . "<br>";
          }
      }
  }
} else{
  
  $fileCount = "0";
  $query4 = "INSERT INTO task (CLASSROOM_ID,TASK_NAME,TASK_DESCRIPTION,UPLOAD_FILE_NUM,TASK_CREATE_TIME,TASK_SUBMIT_DATE,TASK_CATEGORY,POINT,MESSAGES_NUM,HAND_IN_NUM) VALUES
('{$_SESSION['classroomid']}','$taskname','$description','$fileCount','$post_date','$due','$classcat','$point','$message','$handin')";
mysqli_query($connection, $query4);

}
      
  
    
     
  
  }




    $tasks = mysqli_query($connection, "SELECT * FROM task WHERE CLASSROOM_ID = {$_SESSION['classroomid']} ORDER BY TASK_ID DESC");

    // $class = mysqli_fetch_assoc($tasks);
    // $count = mysqli_num_rows($tasks);
?>
<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <link href="css/tblock.css" rel="stylesheet" />
</head>
<body class="sb-nav-fixed">
            <div id="layoutSidenav_content" class="bg-light">
                <main>
<div class="blog-navigation-container" id="blog-DIV">
    <nav>
        <ul>
            <li class="course-name"><?php echo $_SESSION['classroomname']; ?></li>
            <li>
                <div  data-bs-toggle="modal" href="#createbtn">
                <i class="fa-solid fa-plus"></i>
            </div>
            </li>
            <li>
                <button class="blog-btn" name="Work">Work</button>
            </li>
            <li>
                <button class="blog-btn" name="People">People</button>
            </li>
        </ul>
    </nav>
    </div>
    <?php   while ($row = mysqli_fetch_array($tasks)) { ?>
    <form action="#" method="post"> 
      
    <?php if($row["TASK_CATEGORY"] =="Task") {?>
      <div class="container" style="background: #f7adad;">
      <?php }else if($row["TASK_CATEGORY"] =="Material") {?>
                <div class="container">
        <?php }else{?>
        <div class="container" style="background:  #caf7ad;">
        <?php }?>
        <div class="wrapper">
            <div class="top-content">
                <div class="left flow">
                    <div class="task-pic">
                    <?php if($row["TASK_CATEGORY"] =="Task") {?>
                      <img src="assets\img\task.png" alt="">
      <?php }else if($row["TASK_CATEGORY"] =="Material") {?>
        <img src="assets\img\material.png" alt="">
        <?php }else{?><img src="assets\img\annoucement.png" alt="">
        <?php }?>
                    </div>
                    <div class="task">
                        <div><?php echo $row["TASK_NAME"]; ?></div>
                        <div style="font-size: 12px;"><?php echo $row["TASK_SUBMIT_DATE"]; ?></div>
                    </div>
                </div>
                <div class="right flow" style="font-size: 12px;">
                <button class="delete" style="padding-left:60px"name="deletetask" value="<?php echo $row["TASK_ID"]; ?>">
                                <i class="fa-solid fa-trash"></i>
                </button>
                </div>
            </div>
            <hr style="border:1px solid #365268;margin-top:-10px;">
            <div class="mid-content">
                <div class="left flow">
                    <div class="midtask">
                        <div class="date"><?php echo $row["TASK_CREATE_TIME"]; ?></div>
                        <div class="description"><?php echo $row["TASK_DESCRIPTION"]; ?></div>
                    </div>
                </div>
                <div class="right flow">
                    <div class="sidtask">
                        <div ><?php echo $row["MESSAGES_NUM"]; ?></div>
                        <div style="font-size: 12px;">Comment</div>
                    </div>
                    <div class="sidtask">
                        <div><?php echo $row["HAND_IN_NUM"]; ?></div>
                        <div style="font-size: 12px;">Handed in</div>
                    </div>
                    <div class="sidtasks">
                        <div><?php echo $assigned ?></div>
                        <div style="font-size: 12px;">Assigned</div>
                    </div>
                </div>
            </div>
            <hr style="border:1px solid #365268;">
            <div class="right flow">
                <div>
                    <button class="viewbtn" type="submit" name="review-task" value="<?php echo $row["TASK_ID"]; ?>">Review Task</button>
                </div>
                <div>
                    <button class="viewbtn" type="submit" name="review-work" value="<?php echo $row["TASK_ID"]; ?>">Mark the Work</button>
                </div>
            </div>
        </div>
    </div>
    <?php   } ?>
    </form>

</body>
</html>
<div class="modal fade" id="createbtn" aria-hidden="true"  tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        Create
       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

    </button>

      <div class="modal-footer" style="justify-content:center;">
        <button class="btn btn-primary" data-bs-target="#task" data-bs-toggle="modal" data-bs-dismiss="modal">Task</button>
        <button class="btn btn-primary" data-bs-target="#material" data-bs-toggle="modal" data-bs-dismiss="modal">Material</button>
        <button class="btn btn-primary" data-bs-target="#annoucement" data-bs-toggle="modal" data-bs-dismiss="modal">Annoucement</button>

      </div>
    </div>
  </div>
</div>
</div>
<div class="modal fade" id="task" aria-hidden="true" tabindex="-1">
  <div class="modal-dialog modal-xl">
  <form action="#" method="post" enctype="multipart/form-data">

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Task</h5>
        <input type="hidden" name="taskcattxt" value="Task">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
                <label for="Title" class="col-form-label">Title</label>
                <input type="text" class="form-control"  name="tasknametxt">
            </div>
        
        <div class="mb-3">
            <label for="Description" class="col-form-label">Description</label>
            <textarea class="form-control" name="taskdestxt"></textarea>
            </div>
       
        <div class="mb-3">
                <label for="Point" class="col-form-label" name="pointtxt">Point</label>
                <input type="text" class="form-control" name="pointtxt">
            </div>
     
        <div class="mb-3">

                <label for="due" class="col-form-label">Due</label>
                <input type="text" class="form-control" id="due" name="duetxt" >

            </div>
        <div class="mb-3">
                <label for="formFileMultiple" class="form-label">Upload</label>
                <input class="form-control" type="file" name="files[]" multiple>
        </div>
    
        </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-bs-target="#createbtn" data-bs-toggle="modal" data-bs-dismiss="modal">Back</button>
        <button class="btn btn-primary" type="submit" name="add-submit">Submit</button>
      </div>
    </div>
  </div>
  </form>
</div>

<div class="modal fade" id="annoucement" aria-hidden="true" tabindex="-1">
  <div class="modal-dialog modal-xl">
  <form action="#" method="post" enctype="multipart/form-data">

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Annoucement</h5>
        <input type="hidden" name="taskcattxt" value="Annoucement">
        
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
                <label for="Title" class="col-form-label">Title</label>
                <input type="text" class="form-control" name="tasknametxt">
            </div>
        
        <div class="mb-3">
            <label for="Description" class="col-form-label">Description</label>
            <textarea class="form-control" name="taskdestxt"></textarea>
            </div>
        </div>
        <input type="hidden" name="duetxt" value="0000-00-00">
        <input type="hidden" name="pointtxt" value="0">
        
      <div class="modal-footer">
      <button class="btn btn-secondary" type="button" data-bs-target="#createbtn" data-bs-toggle="modal" data-bs-dismiss="modal">Back</button>
        <button class="btn btn-primary" type="submit" name="add-submit">Submit</button>
      </div>
    </div>
  </div>
  </form>
</div>


<div class="modal fade" id="material" aria-hidden="true" tabindex="-1">
  <div class="modal-dialog modal-xl">
  <form action="#" method="post" enctype="multipart/form-data">

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Study Material</h5>
        <input type="hidden" name="taskcattxt" value="Material">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
                <label for="Title" class="col-form-label">Title</label>
                <input type="text" class="form-control" name="tasknametxt">
            </div>
        
        <div class="mb-3">
            <label for="Description" class="col-form-label">Description</label>
            <textarea class="form-control" name="taskdestxt"></textarea>
            </div>
            <input type="hidden" name="duetxt" value="None">
            <input type="hidden" name="pointtxt" value="0">

        <div class="mb-3">
        <input type="hidden" name="additional" value="Null">
                <label for="formFileMultiple" class="form-label">Upload</label>
                <input class="form-control" type="file" name="files[]" multiple>
        </div>
        </div>
      <div class="modal-footer">
      <button class="btn btn-secondary" type="button" data-bs-target="#createbtn" data-bs-toggle="modal" data-bs-dismiss="modal">Back</button>
        <button class="btn btn-primary" type="submit" name="add-submit">Submit</button>
      </div>
    </div>
  </div>
  </form>
</div>

<script>
   function openNewTab() {
  // Open a new tab or window
  window.open("https://docs.google.com/forms/u/0/?tgif=d", "_blank");
} 
$(function() {
  $("#due").datepicker({
    dateFormat: "yy-mm-dd"  // Specify the desired date format
  });
});
</script>
