
<?php
    $title = 'Home';
    $page = 'home';
    include_once('assets/t_header+nav.php');
    date_default_timezone_set('Asia/Kuala_Lumpur');


    $selectedtask = mysqli_query($connection, "SELECT * FROM task WHERE TASK_ID=".$_SESSION['taskid']);

    $row1 = mysqli_fetch_assoc($selectedtask);
    $highestresult = mysqli_query($connection, "SELECT MAX(MARKED) AS highest_mark FROM marking WHERE TASK_ID=". $_SESSION['taskid']);

    // Check if any rows are returned
    if (mysqli_num_rows($highestresult) > 0) {
      // Fetch the highest mark value
      $row2 = mysqli_fetch_assoc($highestresult);
      $highestMark = $row2['highest_mark'];
  } else {
      // No rows found, set highest mark to 0
      $highestMark = 0;
  }
  



  
  $lowestresult = mysqli_query($connection, "SELECT MIN(MARKED) AS lowest_mark FROM marking WHERE TASK_ID=". $_SESSION['taskid']);

  // Check if any rows are returned
  if (mysqli_num_rows($lowestresult) > 0) {
    // Fetch the highest mark value
    $row3 = mysqli_fetch_assoc($lowestresult);
    $lowestMark = $row3['lowest_mark'];
} else {
    // No rows found, set highest mark to 0
    $lowestMark = 0;
}

 // Retrieve all marks from the database for the given task
$marksResult = mysqli_query($connection, "SELECT MARKED FROM marking WHERE TASK_ID = " . $_SESSION['taskid']);

$totalMarks = mysqli_num_rows($marksResult); // Total number of marks
$pass = $row1['POINT'];
$passCount = 0;
$failCount = 0; 
$sum = 0; // Variable to store the sum of marks

// Loop through each mark and calculate the sum
while ($row4 = mysqli_fetch_assoc($marksResult)) {
    $sum += $row4['MARKED'];
    if ($row4['MARKED'] >= $pass) {
      $passCount++;
  }else{
    $failCount++;
  }
}

if ($totalMarks > 0) {
     
    $average = $sum / $totalMarks;
} else {
    $average = 0;
}

if (isset($_POST['uploadgrading'])) {

  $status = "Graded";
  $feedback = $_POST['feedbacktxt'];
  $marked = $_POST['markedtxt'];
  $markingId = $_POST['markingid'];
  $markdate = date('Y/m/d H:i:s');


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
        mysqli_query($connection, "UPDATE marking SET MARKING_STATUS='$status', MARKING_DATE='$markdate', MARKED='$marked', RETURN_FILE='$fileName', FEEDBACK='$feedback' WHERE MARKING_ID='$markingId'");
        echo '<script>alert("Marked successfully")</script>';
        
      } else {
    
        echo '<script>alert("Error uploading file")</script>';
      }
    }
  } else {

    echo '<script>alert("File upload failed. Please select a file to upload")</script>';
        
  }
}


?><?php echo $highestMark; ?>
<!DOCTYPE html>
<html lang="en">

<head>
        <link href="css/viewwork.css" rel="stylesheet" />
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
<div class="d-grid gap-3" >
  <button class="btn btn-primary" type="button"data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop"><?php echo $row1['TASK_NAME']; ?></button>
</div>


<div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
  <div class="offcanvas-header">
   
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
  <div class="progress-container">
    <div class="container1">
      <div class="progress-title">Highest Mark</div>
      <div class="progress">
      <div class="progress-bar" role="progressbar" style="width: <?php echo intval($highestMark); ?>%;" aria-valuenow="<?php echo intval($highestMark); ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $highestMark; ?>%</div>
      </div> 
      
      <div class="progress-title"> <?php echo $highestMark; ?>% Mark</div>
    </div>
    <div class="container1">
      <div class="progress-title" style="padding-right:5px;">Lowest Mark</div>
      <div class="progress">
        <div class="progress-bar" role="progressbar" style="width: <?php echo intval($lowestMark); ?>%;" aria-valuenow="<?php echo intval($lowestMark); ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $lowestMark; ?>%</div>
      </div> 
      <div class="progress-title"><?php echo $lowestMark; ?>% Mark</div>
    </div>
    <div class="container1">
      <div class="progress-title" style="padding-right:37px;">Average</div>
      <div class="progress">
      <div class="progress-bar" role="progressbar" style="width: <?php echo intval($average); ?>%;" aria-valuenow="<?php echo intval($average); ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $average; ?>%</div>
      </div> 
      <div class="progress-title"><?php echo $average; ?>% Mark</div>
    </div>
    <div class="container1">
      <div class="sidtask">
        <div><?php echo $row1['POINT']; ?>%</div>
        <div style="font-size: 12px;">Pass Mark</div>
      </div>
      <div class="sidtask">
        <div><?php echo $passCount; ?></div>
        <div style="font-size: 12px;">Pass</div>
      </div>
      <div class="sidtask">
        <div><?php echo $failCount; ?></div>
        <div style="font-size: 12px;">Fail</div>
      </div>
      <div class="sidtask">
        <div><?php echo $row1['HAND_IN_NUM']; ?></div>
        <div style="font-size: 12px;">Handed in</div>
      </div>
      
    </div>
  </div>
</div>
</div>
<div class="container1">
<div class="container3">
<form action="#" method="post" enctype="multipart/form-data">
  <?php
  $markings = mysqli_query($connection, "SELECT * FROM marking WHERE TASK_ID=" . $_SESSION['taskid']);
  while ($row5 = mysqli_fetch_array($markings)) {
    $markingprofiles = mysqli_query($connection, "SELECT * FROM yashiba_user WHERE USER_ID=" . $row5['USER_ID'] . "");
    $markingprofile = mysqli_fetch_assoc($markingprofiles);
    $markingId = $row5['MARKING_ID']; 
  ?>

  <div class="card-container">
    <!-- Card content -->
    <div class="card">
      <div class="card-body" style="width: 100%; padding:10px;">
        <div class="d-flex align-items-center justify-content-between">
          <div class="d-flex align-items-center">
            <div class="profile-pic" style="margin-left: 30px;">
              <img src="" alt="">
            </div>
            <div class="profile">
              <div><?php echo $markingprofile['USER_NAME']; ?></div>
            </div>
          </div>
          <div class="content" style="width:120px">
            <div style="width: 100%;"><?php echo $row5['MARKING_STATUS']; ?></div>
          </div>
          <div class="content" style="width:50px">
            <div ><?php echo $row5['MARKED']; ?>%</div>
          </div>
          <div class="content"  style="width:300px;">
            <div style="width: 100%;word-wrap: break-word;"><?php echo $row5['FEEDBACK']; ?></div>
          </div>

          <div class="content">
            <button type="button" style="background:none;border:none;" data-bs-toggle="modal" data-bs-target="#exampleModal" data-markingid="<?php echo $markingId ?>" name="markingbutton"><i class="fa-solid fa-arrow-up-from-bracket"></i></button>
          </div>

        
            <div class="content">
            <?php
$taskfile = mysqli_query($connection, "SELECT * FROM marking WHERE MARKING_ID='" . $row5['MARKING_ID'] . "'");

while ($wee = mysqli_fetch_assoc($taskfile)) {
    $fileName = $wee['UPLOAD_FILE'];
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

             
            </div>
      
        </div>
      </div>
    </div>
  </div>
  </form>

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <form action="#" method="post" enctype="multipart/form-data">

    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">  

          <h5 class="modal-title" id="exampleModalLabel">Mark the task</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="Task-file" class="col-form-label">Upload the file  (<span id="markingIdLabel"></span>)</label>
            <input class="form-control" type="file" name="files[]" multiple required>
          </div>
          <div class="mb-3">
            <label for="Feedback" class="col-form-label">Feedback</label>
            <input type="text" class="form-control" name="feedbacktxt" required>
          </div>
          <div class="mb-3">
            <label for="Grade" class="col-form-label">Grade</label>
            <input type="text" class="form-control" name="markedtxt" required>
          </div>
          <input type="hidden" id="markingIdInput" name="markingid" >
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="uploadgrading" value="<?php echo $markingId ?>">Mark</button>
        </div>
      </div>
    </div>
  </div>

  <?php
  }
  ?>
</form>

<script>
  const modalButtons = document.querySelectorAll("[data-bs-target='#exampleModal']");
  modalButtons.forEach((button) => {
    button.addEventListener("click", function() {
      const markingId = this.dataset.markingid;
      document.getElementById("markingIdLabel").textContent = markingId;
      document.getElementById("markingIdInput").value = markingId;
    });
  });
</script>
