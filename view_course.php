<?php session_start();?>
<?php
    require('dbconnection.php');

    if (!isset($_SESSION['username'])) {
        header('location: login.php');
      }

    $username=$_GET['course_username'];
    $course_id=$_GET['course_id'];
    $sql = "SELECT * FROM lectures WHERE lecture_courseid = '$course_id'";
    $result = mysqli_query($conn, $sql);
    $lectures = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $sql = "SELECT * FROM courses WHERE course_id = '$course_id'";
    $result = mysqli_query($conn, $sql);
    $course = mysqli_fetch_assoc($result);


?>


<!DOCTYPE html>
<html>
<head>
    <title>Knowledge Share</title>
	<?php include("head.php");?>
            <link rel="stylesheet" type="text/css" href="view_course.css" />
</head>

<body>


    <div class="container-fluid">
        <div>
            <?php include("navbar.php");?>
        </div>
         

        <div id="courseview">
            <h1><?php echo $course['course_title']; ?></h1>

            <div id="lecture_body">
                <?php 
                if(isset($_GET['lecture_id']))
                {
                    $lecture_id=$_GET['lecture_id'];
                    $sql = "SELECT * FROM lectures WHERE lecture_id = '$lecture_id'";
                    $result = mysqli_query($conn, $sql);
                    $lecture = mysqli_fetch_assoc($result);
                    ?>
                    <div><h4><?php echo $lecture['lecture_title'];?></h4></div>
                    <?php echo $lecture['lecture_body'];?>
                    <?php 
                }
                ?>

            </div>
        </div>      

        <div id="lectures">
            <h1>Lectures</h1>

            <?php foreach ($lectures as $lecture): ?>
            
                
                    <h3><?php echo $lecture['lecture_title'] ?></h3>

                    
                    
                    <a href="view_course.php?course_id=<?php echo $lecture['lecture_courseid']; ?>&course_username=<?php echo $lecture['lecture_username'];?>&lecture_id=<?php echo $lecture['lecture_id']; ?>"><h4><?php echo $lecture['lecture_title'] ?></h4></a>

        <?php endforeach ?>
        </div>     

        

                
        




        <?php include("footer.php");?>
               
    </div>
</body>
</html>
