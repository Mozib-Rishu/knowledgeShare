<?php session_start();?>
<?php
    require('dbconnection.php');

    if (!isset($_SESSION['username'])) {
        header('location: login.php');
      }

    $username=$_SESSION['username'];




    if (isset($_POST['submit'])){
        $user_email = $_POST['user_email'];
        $profile_name = $_POST['profile_name'];
        $profile_mobile = $_POST['profile_mobile'];
        $profile_address = $_POST['profile_address'];


        $query="UPDATE user SET user_email = '$user_email', profile_name = '$profile_name' , profile_mobile = '$profile_mobile' , profile_address = '$profile_address' WHERE user_username = '$username';";
        $result = mysqli_query($conn,$query);
        
        if($result){            
            header('location: my_profile.php');
        }

        } else{

             $sql = "SELECT * FROM user WHERE user_username = '$username'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_assoc($result);

            $user_email=$user['user_email'];
            $profile_name=$user['profile_name'];
            $profile_mobile=$user['profile_mobile'];
            $profile_address=$user['profile_address'];
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
                        
                        <form action="edit_profile.php" method="post" class="border p-5">

                        <p class="h2 mb-4 text-center">Edit Profile</p>
                        <h4>User Name: <?php echo $username?></h4>


                        <div class="form-group">
                            <label for="user_email">Email:</label>
                            <input type="email" required  value="<?php echo $user_email ?>" class="form-control" name="user_email">
                          </div>
                          <div class="form-group">
                            <label for="profile_name">Name:</label>
                            <input type="text" value="<?php echo $profile_name ?>" class="form-control" name="profile_name">
                          </div>
                          <div class="form-group">
                            <label for="profile_mobile">Mobile:</label>
                            <input type="text" value="<?php echo $profile_mobile ?>" class="form-control" name="profile_mobile">
                          </div>
                          <div class="form-group">
                            <label for="profile_address">Address:</label>
                            <input type="text" value="<?php echo $profile_address ?>" class="form-control" name="profile_address">
                          </div>
                          

                        <br><br>
                        <button class="btn btn-info btn-block my-4" type="submit" name="submit">update Profile</button>
                        
                        
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

