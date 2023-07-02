
<?php
    $title = 'Home';
    $page = 'home';
    include_once('assets/t_header+nav.php');

    $taskid = $_SESSION['taskid'];



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
<div class="bigcontainer">
<div class="align-item-start">
    <div class="flow">
        <div class="container1">
            <div class="top-content">
                <div class="left flow">
                    <div class="profile-pic">
                        <img src="" alt="">
                    </div>
                    <div class="profile">
                        <div>Task Name</div>
                        <div style="font-size: 12px;">posted date</div>
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
            </div>
            <form action="#" method="post">
                
                <hr style="border:1px solid #365268;">
                <div class="bottom-content" style="justify-content: left">
                    <div class="profile-pic" >
                        <img src="" alt="">
                    </div>
                    <div class="profile">
                        <div>Name</div>
                        <div class="comment">
                            <div class="comment-below">comment
                                <a href="deletecomment.php?msgid=<?php echo $commentbelow["MESSAGE_ID"]; ?>">
                                <div class="delete" name="delete ">delete comment</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
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

<div class="align-item-start">
    <div class="flow">
            <div class="container3">
                <div class="mb-3">
                    <label for="formFileMultiple" class="form-label">Upload Your Task</label>
                    <input class="form-control" type="file" id="formFileMultiple" multiple>
                </div>
                <div class="d-grid gap-2">
                <button class="btn btn-primary" type="button">Submit</button>
                </div>
            </div>
    </div>
    <div class="flow">
            <div class="container2">
                <div style="margin-bottom: 10px;">View the task</div>
                <div class="d-grid gap-2">
                <button class="btn btn-secondary " type="button">View</button>
                </div>
                </a>
            </div>
    </div>
    
</div>
