
<?php
    $title = 'Home';
    $page = 'home';
    include_once('assets/t_header+nav.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
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
                <button class="blog-btn" name="Task">Task</button>
            </li>
            <li>
                <button class="blog-btn" name="Material">Material</button>
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
