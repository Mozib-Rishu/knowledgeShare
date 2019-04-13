<?php session_start();?>
<?php
    require('dbconnection.php');
    

    if (isset($_POST['submit'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];


        
        $query = "INSERT into user (user_username, user_password, user_email) VALUES ('$username', '$password', '$email')";
        $result = mysqli_query($conn,$query);
        
        if($result){

            $_SESSION['username'] = $username;
            header('location: index.php');
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
                    <div class="conatainer-fluid login_signup">
                        
                        <form action="signup.php" method="post" class="text-center border border-light p-5">

                        <p class="h2 mb-4">Sign Up</p>


                        <input type="text" name="username" class="form-control" placeholder="User Name" required>
                        <br>
                        <input type="password" name="password" required  class="form-control mb-4" placeholder="Password">
                        <br>
                        <input type="Email" name="email" required class="form-control mb-4" placeholder="Email">
                        <br><br>
                        <button class="btn btn-info btn-block my-4" type="submit" name="submit">Sign up</button>
                        
                        <p>Already a member?
                            <a href="login.php">Login</a>
                        </p>
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

