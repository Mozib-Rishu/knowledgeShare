<?php session_start();?>
<?php
    require('dbconnection.php');

    if (!isset($_SESSION['username'])) {
        header('location: login.php');
      }

    $username=$_SESSION['username'];

     $sql = "SELECT * FROM user WHERE user_username = '$username'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    


?>


<!DOCTYPE html>
<html>
<head>
    <title>Knowledge Share</title>
	<?php include("head.php");?>
            <link rel="stylesheet" type="text/css" href="view_course.css" />
</head>
<body>

	<div class="container-fluid">
        <div>
            <?php include("navbar.php");?>
        </div>

        <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <div class="conatainer-fluid">
                    	<p class="h2 mb-4 text-center">Profile</p>
                    	<div style="padding: 20px;">
                    		User Name: &nbsp &nbsp <?php echo $username;?>
                    		<br><br>
                    		Email: &nbsp &nbsp <?php echo $user['user_email'];?>
                    		<br><br>
					    	Name: &nbsp &nbsp <?php echo $user['profile_name'];?>
                    		<br><br>
                    		Mobile: &nbsp &nbsp <?php echo $user['profile_mobile'];?>
                    		<br><br>
                    		Address: &nbsp &nbsp <?php echo $user['profile_address'];?>
                    		<br>
                    		<br>
						    
						     
                    		

                    		<a href="edit_profile.php"><button type="button" class="btn btn-primary">Edit</button></a>
                    	</div>

                    	
                    </div>
            </div>
            <div class="col-sm-3"></div>
        </div>






		<?php include("footer.php");?>
               
    </div>
</body>
</html>