<?php session_start();?>
<?php
    require('dbconnection.php');

    if (!isset($_SESSION['username'])) {
        header('location: login.php');
      }
    
      $lecture_id = $_GET['lecture_id'];
      $course_id= $_GET['course_id'];
      $username = $_GET['username'];

        $query = "DELETE FROM lectures WHERE lecture_id = $lecture_id";
        $result = mysqli_query($conn,$query);
        
        if($result){
            $loc="view_course.php?course_id=".$course_id."&course_username=".$username;            
            header('location: '.$loc);
        }
        else{
            echo "Deletion Failed";
        }

?>