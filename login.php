<?php session_start();?>


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
                <form class="text-center border border-light p-5">

                <p class="h2 mb-4">Sign in</p>


                <input type="text" id="user_name" class="form-control" placeholder="User Name">
                <br>
                <input type="password" id="user_password" class="form-control mb-4" placeholder="Password">
                <br><br>

                <button class="btn btn-info btn-block my-4" type="submit">Sign in</button>

                <!-- Register -->
                <p>Not a member?
                    <a href="">Sign up</a>
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

