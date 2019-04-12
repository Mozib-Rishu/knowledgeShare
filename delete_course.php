<?php session_start();?>
<?php
    require('dbconnection.php');

    if (!isset($_SESSION['username'])) {
        header('location: login.php');
      }
    
      $course_id = $_GET['course_id'];

        $query = "DELETE FROM courses WHERE course_id = $course_id";
        $result = mysqli_query($conn,$query);
        
        if($result){            
            header('location: all_courses.php');
        }
        else{
            echo "Deletion Failed";
        }

        ?>