<?php session_start();?>
<?php
    require('dbconnection.php');

    if (!isset($_SESSION['username'])) {
        header('location: login.php');
      }

    $sql = "SELECT * FROM courses";
    $result = mysqli_query($conn, $sql);


    $courses = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Knowledge Share</title>
    <link rel="stylesheet" type="text/css" href="box.css" />
        <link rel="stylesheet" type="text/css" href="card.css" />
        <link rel="stylesheet" type="text/css" href="style.css" />
    <?php include("head.php");?>
</head>

<body>

    <div class="container-fluid">
        <div>
            <?php include("navbar.php");?>
        </div>
    <div>
        <h1 style="text-align: center;">All Courses</h1>
    </div>

<div class="row">
        <?php foreach ($courses as $course): ?>
            <div class="column">
                <div class="card content" style="height: 350px; margin-bottom: 5px;" >
                    <h3><?php echo $course['course_title'] ?></h3>
                    <h5><?php echo $course['course_desc'] ?></h5>
                    <hr>
                    <a href="view_course.php?course_id=<?php echo $course['course_id']; ?>&course_username=<?php echo $course['course_username']; ?>"><button type="button" class="btn btn-primary">View</button></a>

                    <?php 

                    if($course['course_username']===$_SESSION['username'])
                    {?>
                        <a href="update_course.php?course_id=<?php echo $course['course_id']; ?>&course_username=<?php echo $course['course_username']; ?>"><button type="button" class="btn btn-primary">Update</button></a>

                        <a onclick="return confirm('Are you Sure?');" href="delete_course.php?course_id=<?php echo $course['course_id']; ?>"><button type="button" class="btn btn-danger">Delete</button></a>


                    <?php }

                    ?>


                    

                

            
            </div>
        </div>
        <?php endforeach ?>
              
    </div>      

                <!-- start footer -->
            <?php include("footer.php");?>
                <!-- end footer -->
    </div>
</body>
</html>
