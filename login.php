<?php session_start();?>

<?php
    require('dbconnection.php');
    

    if (isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];


        
        $query = "SELECT * FROM user WHERE user_username='$username' AND user_password='$password'"; 

        $result = mysqli_query($conn,$query);
        
        if(mysqli_num_rows($result)>0){

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

                        <form action="login.php" method="post" class="text-center border border-light p-5">

                        <p class="h2 mb-4">Sign in</p>

                        <input type="text" name="username" class="form-control" placeholder="User Name">
                        <br>
                        <input type="password" name="password" class="form-control mb-4" placeholder="Password">
                        <br><br>
                        <button class="btn btn-info btn-block my-4" type="submit" name="submit">Sign in</button>
                        
                        <p>Not a member?
                            <a href="signup.php">Sign up</a>
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