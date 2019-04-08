<?php
    require('dbconnection.php');
    
    //insert values into the database.
    if (isset($_POST['username'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];


        
        $query = "INSERT into user (user_username, user_password, user_email) VALUES ('$username', '$password', '$email')";
        $result = mysqli_query($conn,$query);
        if($result){
            echo "<div class='form'><h3>You are registered successfully.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
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
                <!-- Default form login -->
                <form action="regi.php" method="post" class="text-center border border-light p-5">

                <p class="h2 mb-4">Sign Up</p>


                <input type="text" name="username" class="form-control" placeholder="User Name">
                <br>
                <input type="password" name="password" class="form-control mb-4" placeholder="Password">
                <br>
                <input type="Email" name="email" class="form-control mb-4" placeholder="Email">
                <br><br>

                <button class="btn btn-info btn-block my-4" type="submit">Sign up</button>

                <!-- Register -->
                <p>Already a member?
                    <a href="">Login</a>
                </p>

                </form>

            </div>
        </div>
        <div class="col-sm-4"></div>
    </div>


        <!-- footer -->
    <?php include("footer.php");?>

</div>    


</body>
</html>

    <?php } ?>

