
<?php
    $title = 'Home';
    $page = 'home';
    include_once('assets/t_header+nav.php');
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
            <li class="course-name">Course Name</li>
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
    <div class="container">
        <div class="wrapper">
            <div class="top-content">
                <div class="left flow">
                    <div class="task-pic">
                        <img src="" alt="">
                    </div>
                    <div class="task">
                        <div>Task Name</div>
                        <div style="font-size: 12px;">due date</div>
                    </div>
                </div>
                <div class="right flow" style="font-size: 12px;">
                    Delete
                </div>
            </div>
            <hr style="border:1px solid #365268;margin-top:-10px;">
            <div class="mid-content">
                <div class="left flow">
                    <div class="midtask">
                        <div class="date">Date</div>
                        <div class="description">Task DescriptionTask DescriptionTask DescriptionTask DescriptionTask DescriptionTask DescriptionTask DescriptionTask DescriptionTask DescriptionTask DescriptionTask DescriptionTask DescriptionTask Description</div>
                    </div>
                </div>
                <div class="right flow">
                    <div class="sidtask">
                        <div >0</div>
                        <div style="font-size: 12px;">Comment</div>
                    </div>
                    <div class="sidtask">
                        <div>1</div>
                        <div style="font-size: 12px;">Handed in</div>
                    </div>
                    <div class="sidtasks">
                        <div>2</div>
                        <div style="font-size: 12px;">Assigned</div>
                    </div>
                </div>
            </div>
            <hr style="border:1px solid #365268;">
            <div class="right flow">
                <div>
                    <a class="viewbtn" href="post.php?pid=<?php echo $row['POST_ID'];?>">Review Task</a>
                </div>
                <div>
                    <a class="viewbtn" href="post.php?pid=<?php echo $row['POST_ID'];?>">Review Work</a>
                </div>
            </div>
        </div>
    </div>
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
        <button class="btn btn-primary" data-bs-target="#quiz" data-bs-toggle="modal" data-bs-dismiss="modal">Quiz</button>

      </div>
    </div>
  </div>
</div>
</div>
<div class="modal fade" id="task" aria-hidden="true" tabindex="-1">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Task</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
                <label for="Title" class="col-form-label">Title</label>
                <input type="text" class="form-control" id="Title">
            </div>
        
        <div class="mb-3">
            <label for="Description" class="col-form-label">Description</label>
            <textarea class="form-control" id="Description"></textarea>
            </div>
       
        <div class="mb-3">
                <label for="Point" class="col-form-label">Point</label>
                <input type="text" class="form-control" id="Point">
            </div>
     
        <div class="mb-3">
                <label for="due" class="col-form-label">Due</label>
                <input type="text" class="form-control" id="due">

            </div>
        <div class="mb-3">
                <label for="formFileMultiple" class="form-label">Upload</label>
                <input class="form-control" type="file" id="formFileMultiple" multiple>
        </div>
        </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-target="#createbtn" data-bs-toggle="modal" data-bs-dismiss="modal">Back</button>
        <button class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="quiz" aria-hidden="true" tabindex="-1">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Quiz</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
                <label for="Title" class="col-form-label">Title</label>
                <input type="text" class="form-control" id="Title">
            </div>
        
        <div class="mb-3">
            <label for="Description" class="col-form-label">Description</label>
            <textarea class="form-control" id="Description"></textarea>
            </div>
       
        <div class="mb-3">
                <label for="Point" class="col-form-label">Paste Form</label>
                <input type="text" class="form-control" id="formlink">
                <button class="btn btn-light btn-sm" onclick="openNewTab()" style="margin-top:10px;padding: 5px 5px; font-size: 12px;">Create a form</button>

            </div>
     
        <div class="mb-3">
                <label for="due" class="col-form-label">Due</label>
                <input type="text" class="form-control" id="due">

            </div>
        </div>
      <div class="modal-footer">
      <button class="btn btn-secondary" data-bs-target="#createbtn" data-bs-toggle="modal" data-bs-dismiss="modal">Back</button>
        <button class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="material" aria-hidden="true" tabindex="-1">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Material</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
                <label for="Title" class="col-form-label">Title</label>
                <input type="text" class="form-control" id="Title">
            </div>
        
        <div class="mb-3">
            <label for="Description" class="col-form-label">Description</label>
            <textarea class="form-control" id="Description"></textarea>
            </div>
        <div class="mb-3">
                <label for="formFileMultiple" class="form-label">Upload</label>
                <input class="form-control" type="file" id="formFileMultiple" multiple>
        </div>
        </div>
      <div class="modal-footer">
      <button class="btn btn-secondary" data-bs-target="#createbtn" data-bs-toggle="modal" data-bs-dismiss="modal">Back</button>
        <button class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>

<script>
   function openNewTab() {
  // Open a new tab or window
  window.open("https://docs.google.com/forms/u/0/?tgif=d", "_blank");
} 
  $(function() {
    $("#due").datepicker();
  });
</script>
