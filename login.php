<?php
include('includes/init.inc.php');
include('includes/head.inc.php');
?>
<title>Login</title>
<link rel="stylesheet" href="resources/login.css" />
</head>

<?php
include('includes/nav.inc.php');
include('includes/conn.inc.php');
session_start();
?>

<!-- If if user with credentials admin, password sign in, they will be able to delete entries -->

<div class="content">
  <div class="login-container">

    <h2>Login:</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required>

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>

      <button type="submit" name="save">Login</button>

      <?php
      include('includes/conn.inc.php');
      if (isset($_POST["save"])) {
        // Get user input
        $username = $_POST["username"];
        $password = $_POST["password"];

        $query = "SELECT * FROM `mysiteusers` WHERE `user` = ? AND `password` = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
          echo '<p>Login successful!</p>';
          echo '<a class="nav-link" href="labs.php">Go to Labs</a>';
          echo '<a class="nav-link" href="index.php">Go to Home</a>';
          $_SESSION['loggedInUser'] = $username;
        } else {
          echo '<script>';
          echo 'alert("Invalid username or password");';
          echo '</script>';
        }

        $stmt->close();
        $conn->close();
      }
      ?>
    </form>
  </div>
</div>
<?php
include('includes/foot.inc.php')
?>