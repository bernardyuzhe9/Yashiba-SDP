<!-- Programmer Name: Tay Hui Yee & Bernard Ong Yuzhe-->
<!-- Program Name : Student courseoverview  -->
<!-- Description: View the task -->
<!-- First Written: 22/6/2023 -->
<!-- Eddited on: 7/7/2023-->
<?php
    $title = 'Home';
    $page = 'home';
    include_once('assets/s_header+nav.php');

    $assigned = (int)$_SESSION['classroomnstudent'] -1;
    date_default_timezone_set('Asia/Kuala_Lumpur');


    if(isset($_POST['review-task'])){
        
 
      $_SESSION['taskid']=$_POST['review-task'];
      echo '<script>window.location.href = "s_viewtask.php";</script>';
      exit();
  }

  $tasks = mysqli_query($connection, "SELECT * FROM task WHERE CLASSROOM_ID = {$_SESSION['classroomid']} ORDER BY TASK_ID DESC");
  if(isset($_POST['gopeople'])){
            
    echo '<script>window.location.href = "s_people.php";</script>';
    exit();
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
        <link href="css/block.css" rel="stylesheet" />
</head>
<body class="sb-nav-fixed">
            <div id="layoutSidenav_content" class="bg-light">

                <main>
                    
                <form action="#" method="post">
<div class="blog-navigation-container" id="blog-DIV">
    <nav>
        <ul>
        <div  style="margin: 30px 30px 30px 30px;">
                <a href="s_homepage.php">
                <i class="fa-solid fa-arrow-left"></i></a>
            </div>
            <li class="course-name"><?php echo $_SESSION['classroomname']; ?></li>
            <li>
                <button class="blog-btn" name="Task">Work</button>
            </li>
            <li>
            <button class="blog-btn" type="submit" name="gopeople">People</button>
            </li>
        </ul>
    </nav>
</form>
</div><?php while ($row = mysqli_fetch_array($tasks)){
$chckmarking = mysqli_query($connection, "SELECT * FROM marking WHERE TASK_ID={$row['TASK_ID']} AND USER_ID='{$_SESSION['id']}'");
$dueDate=  $row['TASK_SUBMIT_DATE'];
$pass = $row['POINT'];
$result=""; 
$sum = 0; 
$currentDate = date('Y-m-d');
$row1 = mysqli_fetch_assoc($chckmarking);
// 
if( $row["TASK_CATEGORY"] == "Task"){

if  (!empty($row1)) {
    $result = $row1['MARKING_STATUS'];
  }  else if (strtotime($dueDate) < strtotime($currentDate) ) {
       $result = "Due";
    } else {
     $result = "Not Due";
    }
  }
  

 ?>
    <form action="#" method="post"> 
        <?php if ($row["TASK_CATEGORY"] == "Task") { ?>
            <div class="container" style="background:#ffe8b5;">
        <?php } else if ($row["TASK_CATEGORY"] == "Material") { ?>
            <div class="container">
        <?php } else { ?>
            <div class="container" style="background: #b5fdff;">
        <?php } ?>
            <div class="wrapper">
                <div class="top-content">
                    <div class="left flow">
                        <div class="task-pic">
                            <?php if ($row["TASK_CATEGORY"] == "Task") { ?>
                                <img src="assets\img\task.png" alt="">
                            <?php } else if ($row["TASK_CATEGORY"] == "Material") { ?>
                                <img src="assets\img\material.png" alt="">
                            <?php } else { ?>
                                <img src="assets\img\annoucement.png" alt="">
                            <?php } ?>
                        </div>
                        <div class="task">
                            <div><?php echo $row["TASK_NAME"]; ?></div>
                            <?php if($row["TASK_CATEGORY"] =="Task") {?>
                        <div style="font-size: 12px;">   
                       
                        due: <?php echo $row['TASK_SUBMIT_DATE']; ?></div>
                    <?php }?>
                        </div>
                        <div class="right flow" style="font-size: 12px;">
                 
                                <div class="delete" style="    margin-left:500px; "><?php echo $result; ?></div>
                            
                               

                             
                </div>
                    </div>
                </div>
                <hr style="border:1px solid #365268;margin-top:-10px;">
                <div class="mid-content">
                    <div class="date"><?php echo $row["TASK_CREATE_TIME"]; ?></div>
                    <div class="description"><?php echo $row["TASK_DESCRIPTION"]; ?></div>
                    <hr style="border:1px solid #365268;">
                    <div class="right flow">
                        <div>
                            <button class="viewbtn" type="submit" name="review-task" value="<?php echo $row["TASK_ID"]; ?>">Review Task</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div><?php } ?>
</div>

</body>
</html>
