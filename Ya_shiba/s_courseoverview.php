
<?php
    $title = 'Home';
    $page = 'home';
    include_once('assets/s_header+nav.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
        <link href="css/block.css" rel="stylesheet" />
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
 <div class="container" >
            <div class="wrapper">
            <div class="top-content">
        <div class="left flow">
            <div class="task-pic">
            <img src="" alt=" ">
            </div>
            <div class="task"><div>Task Name</div><div style="font-size: 12px;">posted date</div></div>
    </div><hr style="border:1px solid #365268;margin-top:-10px;">
    <div class="mid-content">
   
                    <div class="date">Date</div>
        
                    <div class="description">Task DescriptionTask DescriptionTask DescriptionTask DescriptionTask DescriptionTask DescriptionTask DescriptionTask DescriptionTask DescriptionTask DescriptionTask DescriptionTask DescriptionTask Description</div>
                   
                    <hr style="border:1px solid #365268;">
                    <div ><a class="viewbtn"  href="post.php?pid=<?php echo $row['POST_ID'];?>">View</a>   </div>  
            </div> </div>
</div>

    </body>

</html>