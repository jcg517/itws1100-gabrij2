<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('includes/init.inc.php');
include('includes/head.inc.php');
?>
<title>My Website</title>
<?php
include('includes/nav.inc.php');
include('includes/conn.inc.php');
session_start();
?>



<div id="about-page" class="content">
  <h2>About Me:</h2>
  <?php
  if (isset($_POST['logout'])) {
    $_SESSION = array();
    session_destroy();
  }

  if (isset($_SESSION['loggedInUser'])) {
    $loggedInUser = $_SESSION['loggedInUser'];
  ?>
    <div class="logout">
      <form method="post" action="">
        <label for="loggedInUser">Welcome, <?php echo $loggedInUser; ?>!</label>
        <p class='login-text'>
          <button type="submit" name="logout">Logout</button>
        </p>
      </form>
    </div>
  <?php
  } else {
  ?>
    <div class="btn-container">
      <a href="login.php" class="btn">Login</a>
    </div>
  <?php
  }
  ?>



  <div id="profile-container">
    <img src="imgs/profile.jpg" alt="Picture of a reflection of my face in a spoon" class="profile-img" />
    <div class="profile-text-container">
      <div class="profile-textbox">
        <p class="profile-text">Name: Jesse, Age: 19, From: NYC</p>
      </div>
      <div class="profile-textbox">
        <p class="profile-text">
          I am a student at Rensselaer Polytechnic Institute studying
          Computer Science, Information Technology and Web Science, and
          Business Management
        </p>
      </div>

    </div>
  </div>
</div>
<div id="projects-page" class="content">
  <h2>Some Things I've Worked On</h2>
  <div class="projects-container">

  </div>
  <div class="btn-container">
    <a href="labs.php" class="btn">See All Projects</a>
  </div>
</div>
<div id="contact" class="content">
  <h2>Contact Me</h2>
  <div class="contact-links">
    <a href="https://www.linkedin.com/in/jesse-gabriel-975857179/" target="_blank" class="contact-details"><i class="fa-brands fa-linkedin"></i> LinkedIn</a>
    <a id="profile-link" href="https://github.com/wert18784" target="_blank" class="contact-details"><i class="fa-brands fa-github"></i> GitHub</a>

    <a href="mailto:gabrij2@rpi.edu" class="contact-details"><i class="fas fa-at"></i> Email</a>
    <a href="#" onclick="alert('917-993-1459');" class="contact-details"><i class="fas fa-mobile-alt"></i> Phone</a>
  </div>
</div>

<?php
include('includes/foot.inc.php');
?>