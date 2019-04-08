<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" >
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Logo</a>
      <a class="navbar-brand" href="#">Knowledge Share</a>
    </div>
    <div>
      <ul class="nav navbar-nav navbar-right ">
        <li><a href="/knowledgeShare">Home</a></li>
        <li><a href="#">Help</a></li>
        <li><a href="#">Courses</a></li>
        <?php 
          if(isset($_SESSION['status']))
          {
            echo '<li><a href="#">Create Course</a></li>';
            echo '<li><a href="#">My Profile</a></li>';
            echo '<li><a href="#">Logout</a></li>';
          }
          else
          {
            echo '<li><a href="signup.php">Sign up</a></li>';
            echo '<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
          }
      ?>
      </ul>
    </div>
  </div>
</nav>