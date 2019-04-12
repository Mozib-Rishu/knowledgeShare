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
        $lecture_id = $_POST['lecture_id'];



            

        $query="UPDATE lectures SET lecture_title = '$title', lecture_body = '$lecture_body' WHERE lecture_id = '$lecture_id'";
        $result = mysqli_query($conn,$query);
        
        if($result){            
            $loc="view_course.php?course_id=".$course_id."&course_username=".$username."&lecture_id=".$lecture_id;          
            header('location: '.$loc);
        
        }

        } else{

            $lecture_id = $_GET['lecture_id']; 

            $sql = "SELECT * FROM lectures WHERE lecture_id = '$lecture_id'";
            $result = mysqli_query($conn, $sql);
            $lecture = mysqli_fetch_assoc($result);
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
                        
                        <form action="update_lecture.php" method="post" class="border p-5">

                        <p class="h2 mb-4 text-center">Create Course</p>


                        <div class="form-group">
                            <label for="Title">Title:</label>
                            <input type="text" value="<?php echo $lecture['lecture_title'] ?>" class="form-control" name="title">
                          </div>

                          <div>
                            <label for="lecture_body">Lecture:</label>
                            <textarea name="lecture_body" rows="10" style="width: 100%" value="'<?php echo $lecture['lecture_body'] ?>' "></textarea>
                            <script type="text/javascript">CKEDITOR.replace('lecture_body');
                            CKEDITOR.instances['lecture_body'].setData($lecture['lecture_body']);                             </script>

                            <br>

                            
                            
                            
                          </div>

                          <input type="hidden" name="course_id" value="<?php echo $_GET['course_id']; ?>">
                          <input type="hidden" name="lecture_id" value="<?php echo $_GET['lecture_id']; ?>">


                        <br><br>
                        <div class="submit_btn">
                        <button class="btn btn-info btn-block" type="submit" name="submit">Update Lecture</button>
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

