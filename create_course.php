<?php session_start();?>
<?php
    require('dbconnection.php');

    if (!isset($_SESSION['username'])) {
        header('location: login.php');
      }
    

    if (isset($_POST['submit'])){
        $username = $_SESSION['username'];
        $title = $_POST['title'];
        $description = $_POST['description'];


        
        $query = "INSERT into courses (course_title, course_desc, course_username) VALUES ('$title', '$description', '$username')";
        $result = mysqli_query($conn,$query);
        
        if($result){

            
            header('location: card.php');
        }

        } else{
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
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <div class="conatainer-fluid">
                        
                        <form action="create_course.php" method="post" class="border border-light p-5">

                        <p class="h2 mb-4 text-center">Create Course</p>


                        <div class="form-group">
                            <label for="Title">Title:</label>
                            <input type="text" class="form-control" name="title">
                          </div>
                          <div class="form-group">
                            <label for="description">Description:</label>
                            <input type="text" class="form-control" name="description" rows="3">
                          </div>

                        <br><br>
                        <button class="btn btn-info btn-block my-4" type="submit" name="submit">Sign up</button>
                        
                        
                        </form>

                    </div>
                </div>
                <div class="col-sm-4"></div>
            </div>


            
            <?php include("footer.php");?>

        </div>    
        </body>
        </html>

<?php } ?>

