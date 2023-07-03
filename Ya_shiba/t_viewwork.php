
<?php
    $title = 'Home';
    $page = 'home';
    include_once('assets/t_header+nav.php');

    $_SESSION['id'] = "1";
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



?>
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
  <button class="btn btn-primary" type="button"data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">Task Name</button>
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

<div class="container3">
<?php 
    $markings = mysqli_query($connection, "SELECT * FROM marking WHERE TASK_ID=".$_SESSION['taskid']);

while ($row5 = mysqli_fetch_array($markings)) { 
  $markingprofiles = mysqli_query($connection, "SELECT * FROM yashiba_user WHERE USER_ID=".$row5['USER_ID']."");
  $markingprofile = mysqli_fetch_assoc($markingprofiles);

?>
  <!-- <div class="container2">
    <div class="bottom-content" style="display: flex; justify-content: left; align-items: flex-start;">
      <div class="profile-pic">
        <img src="" alt="">
      </div>
      <div class="profile" style="    padding-top: 10px;">
        <div>Name</div>
      </div>
    </div>
  </div> -->
  
  
    <div class="card-container">
      <div class="card">
        <div class="card-body" style="width: 100%; padding:10px;">
          <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
              <div class="profile-pic"  style="margin-left: 30px;">
                <img src="" alt="">
              </div>
              <div class="profile">
                <div>Name</div>
              </div>
            </div>
            <div class="profile">
                <div>Status</div>
            </div>
            
           
               <div class="content" data-bs-toggle="modal"data-bs-target="#exampleModal">
              <i class="fa-solid fa-arrow-up-from-bracket"></i>
              </div>
                         
              <a href="#"> <div class="content">
              <i class="fa-solid fa-download"></i></div>              </a>
            
        </div>
      </div>
    </div>

<?php 
}
// while ($row5 = mysqli_fetch_array($markings)) { 
?>  </div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mark the task</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
          <label for="Task-file" class="col-form-label">Upload the file</label>
          <input class="form-control" type="file" id="formFileMultiple" multiple>
          </div>
          <div class="mb-3">
            <label for="Feedback" class="col-form-label">Feedback</label>
            <input type="text" class="form-control" id="Feedback">
          </div>
          <div class="mb-3">
            <label for="Grade" class="col-form-label">Grade</label>
            <input type="text" class="form-control" id="Grade">
          </div>
          
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Mark</button>
      </div>
    </div>
  </div>
</div>
