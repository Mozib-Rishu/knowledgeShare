<?php session_start();?>
<?php
    require('dbconnection.php');

    if (!isset($_SESSION['username'])) {
        header('location: login.php');
      }

    if (isset($_POST['submit'])){
        $username = $_SESSION['username'];
        $title = $_POST['title'];
        $lecture_body = $_POST['lecture_body'];
        $course_id= $_POST['course_id'];



            

        $query = "INSERT into lectures (lecture_title, lecture_body,lecture_courseid, lecture_username) VALUES ('$title', '$lecture_body', '$course_id' ,'$username')";
        $result = mysqli_query($conn,$query);
        
        if($result){  
            $last_id = mysqli_insert_id($conn);
            $loc="view_course.php?course_id=".$course_id."&course_username=".$username."&lecture_id=".$last_id;          
            header('location: '.$loc);
        }

        } else{
        ?>


        <!DOCTYPE html>
        <html>
        <head>
            <title>Knowledge Share</title>
            <?php include("head.php");?>
                <script src="ckeditor/ckeditor.js" ></script>
                <link rel="stylesheet" type="text/css" href="style.css" />
        </head>

        <body>
        <div class="container-fluid ">
            <div>
                    <?php include("navbar.php");?>
            </div>

            

            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <div class="conatainer-fluid">
                        
                        <form action="create_lecture.php" method="post" class="border p-5">

                        <p class="h2 mb-4 text-center">Create Course</p>


                        <div class="form-group">
                            <label for="Title">Title:</label>
                            <input type="text" required  class="form-control" name="title">
                          </div>

                          <div>
                            <label for="lecture_body">Lecture:</label>
                            <textarea name='lecture_body' rows="14" style='border: 3px solid black; width: 100%;'>                            </textarea>
                            <script type="text/javascript">CKEDITOR.replace('lecture_body'); </script>

                            <br>

                            
                            
                            
                          </div>

                          <input type="hidden" name="course_id" value="<?php echo $_GET['course_id']; ?>">


                        <br><br>
                        <div class="submit_btn">
                        <button class="btn btn-info btn-block" type="submit" name="submit">Create Lecture</button>
                        </div>
                        
                        
                        </form>

                    </div>
                </div>
                <div class="col-sm-1"></div>
            </div>


            
            <?php include("footer.php");?>

        </div>    
        </body>
        </html>

<?php } ?>

