<?php
include('includes/init.inc.php');
include('includes/head.inc.php');
session_start();
?>
<title>My Labs</title>
<link rel="stylesheet" href="resources/labs.css" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css" />
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
  $(function() {
    $(document).tooltip();
  });

  function toggleAddFormVisibility() {
    var addForm = document.getElementById('addLabForm');
    addForm.style.display = addForm.style.display === 'none' ? 'block' : 'none';
  }

  function toggleDeleteFormVisibility() {
    var deleteForm = document.getElementById('deleteLabForm');
    deleteForm.style.display = deleteForm.style.display === 'none' ? 'block' : 'none';
  }
</script>
</head>

<?php
include('includes/nav.inc.php');
include('includes/conn.inc.php');

// Process adding lab entry
if (isset($_POST['addLab'])) {
  $labNumber = $_POST['labNumber'];
  $labName = $_POST['labName'];
  $labLink = $_POST['labLink'];
  $labImg = $_POST['labImg'];
  $labDescription = $_POST['labDescription'];

  $insertQuery = "INSERT INTO mylabs (number, name, link, img, description) VALUES (?, ?, ?, ?, ?)";
  $stmt = $conn->prepare($insertQuery);
  $stmt->bind_param("issss", $labNumber, $labName, $labLink, $labImg, $labDescription);

  if ($stmt->execute()) {
    echo '<script>alert("Lab entry added successfully.");</script>';
  } else {
    echo '<script>alert("Error adding lab entry. ' . $stmt->error . '");</script>';
  }

  $stmt->close();
}

// Process deleting lab entry
if (isset($_POST['deleteLab'])) {
  $labIdToDelete = $_POST['labIdToDelete'];

  $deleteQuery = "DELETE FROM `mylabs` WHERE `number` = ?";
  $stmt = $conn->prepare($deleteQuery);
  $stmt->bind_param("i", $labIdToDelete);

  if ($stmt->execute()) {
    echo '<script>alert("Lab entry deleted successfully.");</script>';
  } else {
    echo '<script>alert("Error deleting lab entry. ' . $stmt->error . '");</script>';
  }

  $stmt->close();
}
?>

<div id="projects-page" class="content">
  <h2>My Labs:</h2>

  <?php
  if (isset($_SESSION['loggedInUser'])) {
    // Display the button only if the user is logged in
    echo '<button onclick="toggleAddFormVisibility()">Add Lab Entry</button>';
    echo '<button onclick="toggleDeleteFormVisibility()">Delete Lab Entry</button>';

    //adding lab entries
    echo '<form id="addLabForm" style="display: none;" method="post" action="">';
    echo '<label for="labNumber">Lab Number:</label>';
    echo '<input type="text" id="labNumber" name="labNumber" required>';
    echo '<label for="labName">Lab Name:</label>';
    echo '<input type="text" id="labName" name="labName" required>';
    echo '<label for="labLink">Lab Link:</label>';
    echo '<input type="text" id="labLink" name="labLink" required>';
    echo '<label for="labImg">Lab Image URL:</label>';
    echo '<input type="text" id="labImg" name="labImg" required>';
    echo '<label for="labDescription">Lab Description:</label>';
    echo '<textarea id="labDescription" name="labDescription" required></textarea>';
    echo '<button type="submit" name="addLab">Add Lab Entry</button>';
    echo '</form>';

    // deleting lab entries
    echo '<form id="deleteLabForm" style="display: none;" method="post" action="">';
    echo '<label for="labIdToDelete">Lab ID to Delete:</label>';
    echo '<input type="text" id="labIdToDelete" name="labIdToDelete" required>';
    echo '<button type="submit" name="deleteLab">Delete Lab Entry</button>';
    echo '</form>';
  }
  ?>

  <div class="projects-container">
    <?php
    $query = "SELECT `number`, `name`, `link`, `img`, `description` FROM `mylabs`";
    $result = $conn->query($query);

    while ($row = $result->fetch_assoc()) {
      echo '<div class="project-card" title="' . htmlspecialchars($row["description"]) . '">';
      echo '<p class="project-header">Lab ' . $row["number"] . ':</p>';
      echo '<a href="' . $row["link"] . '" target="_blank">';
      echo '<img class="project-img" src="' . $row["img"] . '" alt="' . $row["name"] . '" />';
      echo '<p class="project-footer">' . $row["name"] . '</p>';
      echo '</a></div>';
    }
    echo '</div>';
    ?>
  </div>
</div>

<?php
include('includes/foot.inc.php')
?>