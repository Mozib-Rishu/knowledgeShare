<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Logo</a>
      <a class="navbar-brand" href="#">Knowledge Share</a>
    </div>
    <div>
      <ul class="nav navbar-nav navbar-right ">
        <li><a href="/knowledgeShare">Home</a></li>
        <!--<li><a href="#">Help</a></li>-->
        <li><a href="all_courses.php">Courses</a></li>
        <?php 
          if(isset($_SESSION['username']))
          {
            echo '<li><a href="create_course.php">Create Course</a></li>';
            echo '<li><a href="my_profile.php">My Profile</a></li>';
            echo '<li><a href="logout.php">Logout</a></li>';
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