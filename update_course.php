<?php session_start();?>
<?php
    require('dbconnection.php');

    if (!isset($_SESSION['username'])) {
        header('location: login.php');
      }
    

    if (isset($_POST['submit'])){
        $title = $_POST['title'];
        $description = $_POST['description'];
        $course_id = $_POST['course_id'];


        $query="UPDATE courses SET course_title = '$title', course_desc = '$description' WHERE course_id = '$course_id';";
        $result = mysqli_query($conn,$query);
        
        if($result){            
            header('location: all_courses.php');
        }

        } else{

            $course_id = $_GET['course_id']; 

            $sql = "SELECT * FROM courses WHERE course_id = '$course_id'";
            $result = mysqli_query($conn, $sql);
            $course = mysqli_fetch_assoc($result);
        ?>


        <!DOCTYPE html>
        <html>
        <head>
            <title>Knowledge Share</title>
            <?php include("head.php");?>
        </head>

        <body>
        <div class="container-fluid ">
            <div>
                    <?php include("navbar.php");?>
            </div>

            

            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <div class="conatainer-fluid">
                        
                        <form action="update_course.php" method="post" class="border p-5">

                        <p class="h2 mb-4 text-center">update Course</p>


                        <div class="form-group">
                            <label for="Title">Title:</label>
                            <input type="text" value="<?php echo $course['course_title'] ?>" class="form-control" name="title">
                          </div>
                          <div class="form-group">
                            <label for="description">Description:</label>
                            
                            <input type="text" value="<?php echo $course['course_desc'] ?>" class="form-control" name="description" rows="3">
                          </div>
                          <input type="hidden" name="course_id" value="<?php echo $_GET['course_id']; ?>">

                        <br><br>
                        <button class="btn btn-info btn-block my-4" type="submit" name="submit">update Course</button>
                        
                        
                        </form>

                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>


            
            <?php include("footer.php");?>

        </div>    
        </body>
        </html>

<?php } ?>

