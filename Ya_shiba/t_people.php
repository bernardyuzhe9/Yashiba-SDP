<?php
    $title = 'Home';
    $page = 'home';
    include_once('assets/t_header+nav.php');

    // $_SESSION['schoolid'] = "SCKL001";
    $classID = $_SESSION['classroomid'];
    $schoolid= $_SESSION['schoolid'] ;



    if(isset($_POST['delete4'])){
      
            $user_id = $_POST['delete4'];

            $getnumq = mysqli_query($connection,"SELECT * FROM classroom WHERE CLASSROOM_ID='$classID'");
            $row1 = mysqli_fetch_assoc($getnumq);
            $number =$row1['NUM'];
            mysqli_query($connection, "UPDATE classroom SET NUM=$number-1 WHERE CLASSROOM_ID='$classID'");
            mysqli_query($connection, "DELETE FROM enrolled_classroom WHERE CLASSROOM_ID='$classID' AND USER_ID='$user_id'"); 
            echo '<script>alert("The student has been removed from class")</script>';
            
         
    }
    if (isset($_POST['add'])) {
        if (isset($_POST['id'])) {
            $uid = $_POST['id'];
            echo $uid;
            $status = "Show";
            $getnumq = mysqli_query($connection, "SELECT * FROM classroom WHERE CLASSROOM_ID='$classID'");
    
            $checkq = mysqli_query($connection, "SELECT * FROM enrolled_classroom WHERE USER_ID='$uid' AND CLASSROOM_ID='$classID'");
            $row = mysqli_fetch_assoc($checkq);
            $count = mysqli_num_rows($checkq);
            if ($count == 1) {
                echo '<script>alert("Error! The student has been added before")</script>';
            } else {
                $row2 = mysqli_fetch_array($getnumq);
                if (empty($row2['NUM'])) {
                    $number = 0;
                } else {
                    $number = $row2['NUM'];
                }
                
                $number += 1; // Increment the number by 1
    
                $sql2 = "INSERT INTO enrolled_classroom (CLASSROOM_ID,USER_ID,STATUS) 
                    VALUES ('$classID','$uid','$status')";
    
                mysqli_query($connection, $sql2);
                mysqli_query($connection, "UPDATE classroom SET NUM='$number' WHERE CLASSROOM_ID='$classID'");
                echo '<script>alert("The student has been added to this class")</script>';
            }
        }
    }
    if(isset($_POST['confirm'])){
        $batchid = $_POST['batchID'];
        $query = "SELECT * FROM student_batch WHERE STUDENT_BATCH_ID = '$batchid' ";
    $results = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($results); //$row['email']
    $count = mysqli_num_rows($results); //1 or 0
   
    if($count == 1){
        $student="Student";
        $getStudentBatchQuery = mysqli_query($connection, "SELECT * FROM yashiba_user WHERE STUDENT_BATCH_ID='$batchid' AND ROLE='$student' AND SCHOOL_ID ='$schoolid'");
 
        if (mysqli_num_rows($getStudentBatchQuery) > 0) {

        while ($studentBatchRow = mysqli_fetch_assoc($getStudentBatchQuery)) {
            $studentID = $studentBatchRow['USER_ID'];
            
            $checkEnrollmentQuery = mysqli_query($connection, "SELECT * FROM enrolled_classroom WHERE USER_ID='$studentID' AND CLASSROOM_ID='$classID'");
            $enrollmentCount = mysqli_num_rows($checkEnrollmentQuery);
            
            if ($enrollmentCount == 0) {
                $status = "Show";
                
                $sql2 = "INSERT INTO enrolled_classroom (CLASSROOM_ID, USER_ID, STATUS) 
                         VALUES ('$classID', '$studentID', '$status')";
                
                mysqli_query($connection, $sql2);
                
                $updateNumQuery = mysqli_query($connection, "UPDATE classroom SET NUM = NUM + 1 WHERE CLASSROOM_ID='$classID'");
            }
        }
        
        echo '<script>alert("Students have been added to this class")</script>';
    }else{
        echo (mysqli_num_rows($getStudentBatchQuery));
        echo '<script>alert("Batch ID was from other school")</script>';
    
    }
}
      else {
        echo '<script>alert("Invalid Batch ID")</script>';

    } 
    }

?>

<title>People - Student</title>
<body >
    <div id="layoutSidenav_content" class="bg-light">
        <main>
            <div class="container-fluid px-4">
            <div  style="margin: 30px 30px 30px 2px;">
                <a href="t_courseoveerview.php">
                <i class="fa-solid fa-arrow-left"></i></a>
            </div>
                <h1 class="mt-4">People Page</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"></li>
                </ol>
                <div class="row">
                    <h3 class="col text-primary">Teacher</h3>
                    <div class="col text-end">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="30" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <hr class="border border-primary border-2 opacity-100">
                <table class="table table-hover  table-bordered">
                    <thead class="text-center" style="background-color: #bcd2e1fe; vertical-align:middle; white-space:nowrap;">
                        <tr>
                            <th scope="col">Profile</th>
                            <th scope="col">Name</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        
                        $query = "SELECT yashiba_user.USER_PROFILE, yashiba_user.USER_NAME 
                        FROM yashiba_user
                        INNER JOIN enrolled_classroom ON yashiba_user.USER_ID = enrolled_classroom.USER_ID
                        WHERE enrolled_classroom.CLASSROOM_ID = '$classID' AND yashiba_user.ROLE='Teacher'";
                        $results = mysqli_query($connection, $query);
                        while($row = mysqli_fetch_assoc($results)){
                        ?>
                        <tr style="vertical-align:middle;">
                            <td scope="row">
                            <?php
                                if ($row["USER_PROFILE"] == null) {
                            ?>
                                <img src="img/profile picture.jpg" style="width: 70px; height: 70px; border-radius: 50%;">
                                <?php
                                } else {
                            ?>
                                <img src="uploads/<?php echo $row["USER_PROFILE"] ?>" style="width: 70px; height: 70px; border-radius: 50%;">
                            <?php
                                }
                            ?>
                            </td>
                            <td ><?php echo $row['USER_NAME'];?></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
                <div class="row">
                        <?php
                   
                        $query1 = mysqli_query($connection,"SELECT * FROM classroom WHERE CLASSROOM_ID='$classID'");
                        $row1 = mysqli_fetch_assoc($query1);
                        $studentnum= $row1["NUM"]-1;
                        ?>
                        <h3 class="col text-primary">Student</h3>
                        <h6 class="col text-end" style="margin-top: 12px"><?php echo $studentnum ?> Students</h3>
                </div>
                <form action="#" method="post">
                <hr class="border border-primary border-2 opacity-100">
                    <table class="table table-hover  table-bordered">
                        <thead class="text-center" style="background-color: #bcd2e1fe; vertical-align:middle; white-space:nowrap;">
                            <tr>
                                <th scope="col">Profile</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php
                            
                                $query = "SELECT yashiba_user.USER_ID, yashiba_user.USER_PROFILE, yashiba_user.USER_NAME 
                                FROM yashiba_user
                                INNER JOIN enrolled_classroom ON yashiba_user.USER_ID = enrolled_classroom.USER_ID
                                WHERE enrolled_classroom.CLASSROOM_ID = '$classID' AND yashiba_user.ROLE='Student'";
                                $result = mysqli_query($connection, $query);
                                while($rows = mysqli_fetch_assoc($result)){
                            ?>
                            <tr style="vertical-align:middle;">
                                <td scope="row">
                                <?php
                                    if ($rows["USER_PROFILE"] == null) {
                                ?>
                                    <img src="img/profile picture.jpg" style="width: 70px; height: 70px; border-radius: 50%;">
                                    <?php
                                    } else {
                                ?>
                                    <img src="uploads/<?php echo $rows["USER_PROFILE"] ?>" style="width: 70px; height: 70px; border-radius: 50%;">
                                <?php
                                    }
                                ?>
                                </td>
                                <td ><?php echo $rows['USER_NAME'];?></td>
                                <td style="text-align:center;white-space:nowrap;">
                                    <input type="hidden" name="user_id" >                                                                         
                                    <button type="submit" class="delete-button" name="delete4" value="<?php echo $rows['USER_ID']; ?>" style="background: none; border: none;" onclick="return confirm('Are you sure you want to proceed?')">
                                        <i class="fa-solid fa-trash" style="color: #404a69;width:25px;height:25px;"></i>
                                    </button>                                               
                                </td>
                            </tr> 
                            <?php }?>
                        </tbody>
                    </table>
                </form>
            </div>
            <!-- main Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Student Arrangement</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex justify-content-center">
                    <button type="button" class="btn btn-primary" style="margin-right: 10px" data-bs-toggle="modal" data-bs-target="#add_student">Add Student</button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_student_batch">Add Student Batch</button>
                </div>
                </div>
            </div>
            </div>
            <!-- Modal for add student-->
            <div class="modal fade" id="add_student" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="d-flex flex-column align-items-center"> <!-- Center alignment -->
                            <div class="mb-3">
                                <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                                <div class="input-group">
                                    <input class="form-control" type="text"  id="searchstf" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                                    <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                                    
                                </div>
                                <table>
                                        <tbody id="output"></tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                        <?php
                   
                            $sql2 = mysqli_query($connection, "SELECT USER_ID, USER_PROFILE, USER_NAME
                                FROM yashiba_user
                                WHERE SCHOOL_ID ='$schoolid'AND ROLE='Student' 
                                ORDER BY USER_ID DESC
                                ");
                        
                            while($school = mysqli_fetch_assoc($sql2)){
                                $studentID = $school['USER_ID'];

                                $checkEnrollmentQuery = mysqli_query($connection, "SELECT * FROM enrolled_classroom WHERE USER_ID='$studentID' AND CLASSROOM_ID='$classID'");
                                $enrollmentCount = mysqli_num_rows($checkEnrollmentQuery);
                            
                                if ($enrollmentCount == 0) {
                        ?>
                            <div class="mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <div class="col-4">
                                                <?php
                                                if ($school["USER_PROFILE"] == null) {
                                                ?>
                                                    <img src="img/profile picture.jpg" class="rounded-circle" style="width: 80px; height: 80px; border-radius: 50%; ">
                                                <?php
                                                } else {
                                                ?>
                                                    <img src="uploads/<?php echo $school["USER_PROFILE"] ?>" class="rounded-circle" style="width: 80px; height: 80px; border-radius: 50%; ">
                                                <?php
                                                }
                                                ?>
                                                 </div>
                                                <div class="d-flex flex-column">
                                                    <h6 style="margin-left: 30px; margin-bottom: 0;margin-top:10px;">Name: </h6>
                                                    <p style="margin-left: 30px; margin-top: 10px;"><?php echo $school['USER_NAME']?></p>
                                                </div>
                                            </div>
                                            <div>
                                                <form action="#" method="post">
                                                <input type="hidden" name="id" value="<?php echo $school['USER_ID'] ?>">
                                                <button type="submit" class="btn btn-primary" name="add">Add</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- </div> -->
                        <?php
                        }}
                        ?>
                    </div> </div>
                </div>
            </div>
             <!-- Modal for add student-->
             <div class="modal fade" id="add_student_batch" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Student By Student Batch</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="#" method="post">
                        <div class="modal-body">
                            <div class="d-flex flex-column align-items-center"> <!-- Center alignment -->
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Student Batch ID</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" require placeholder="Example:YS0000" name="batchID">
                                </div>
                                <div class="d-flex justify-content-end mb-3">
                                    <button type="submit" class="btn btn-primary" name="confirm">Confirm</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
             </div>
        </main>
        <?php
            $title = 'Home';
            $page = 'home';
            include_once('assets/footer.php');
        ?>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
  $("#searchstf").keypress(function(){
    var schoolID = "<?php echo $_SESSION['schoolid']; ?>"; // Retrieve school_id from Session variable

    $.ajax({
      type: 'POST',
      url: 'searchstudent.php',
      data: {
        name: $("#searchstf").val(),
        schoolID: schoolID
      },
      success: function(data){
        $("#output").html(data);
      }
    });
  });
});

</script>