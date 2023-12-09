<?php
include('includes/init.inc.php');
include('includes/head.inc.php');
?>
<title>My Projects</title>
<link rel="stylesheet" href="resources/labs.css" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css" />
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
  $(function() {
    $(document).tooltip();
  });
</script>
</head>

<?php
include('includes/nav.inc.php');
include('includes/conn.inc.php');
?>



<div id="projects-page" class="content">
  <h2>My Projects:</h2>
  <div class="projects-container">

    <?php
    $query = "SELECT `number`, `name`, `link`, `img`, `description` FROM `myprojects`";
    $result = $conn->query($query);

    while ($row = $result->fetch_assoc()) {
      echo '<div class="project-card" title="' . htmlspecialchars($row["description"]) . '">';
      echo '<p class="project-header">Project ' . $row["number"] . ':</p>';
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