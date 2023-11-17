<?php 
  include('includes/init.inc.php'); // include the DOCTYPE and opening tags
  include('includes/functions.inc.php'); // functions
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
?>
<title>PHP &amp; MySQL - ITWS</title>   

<?php include('includes/head.inc.php'); ?>

<h1>PHP &amp; MySQL</h1>
<?php include('includes/menubody.inc.php'); ?>

<?php
  $dbOk = false;
  

  @ $db = new mysqli('localhost', 'root', 'DAMphe#1878*', 'iit');
  
  if ($db->connect_error) {
    echo '<div class="messages">Could not connect to the database. Error: ';
    echo $db->connect_errno . ' - ' . $db->connect_error . '</div>';
  } else {
    $dbOk = true;
  }

  $havePost = isset($_POST["save"]);

  $errors = '';
  if ($havePost) {

    $movieTitle = htmlspecialchars(trim($_POST["title"]));
    $movieYear = htmlspecialchars(trim($_POST["year"]));

    $focusId = ''; // trap the first field that needs updating, better would be to save errors in an array

    if ($movieTitle == '') {
      $errors .= '<li>Title name may not be blank</li>';
      if ($focusId == '') $focusId = '#title';
    }

    if ($movieYear == '') {
      $errors .= '<li>Year may not be blank</li>';
      if ($focusId == '') $focusId = '#year';
    }


    if ($errors != '') {
      echo '<div class="messages"><h4>Please correct the following errors:</h4><ul>';
      echo $errors;
      echo '</ul></div>';
      echo '<script type="text/javascript">';
      echo '  $(document).ready(function() {';
      echo '    $("' . $focusId . '").focus();';
      echo '  });';
      echo '</script>';
    } else {
      if ($dbOk) {
        $movieTitleForDb = trim($_POST["title"]);
        $movieYearForDb = trim($_POST["year"]);


        $insQuery = "insert into movies (`title`,`year`) values(?,?)";
        $statement = $db->prepare($insQuery);
        // bind our variables to the question marks
        $statement->bind_param("ss",$movieTitleForDb,$movieYearForDb);
        $statement->execute();

        echo '<div class="messages"><h4>Success: ' . $statement->affected_rows . ' movie added to database.</h4>';
        echo $movieTitle . ' ' . $movieYear . '</div>';

        $statement->close();
      }
    }
  }
?>

<h3>Add Movie</h3>
<form id="addForm" name="addForm" action="movies.php" method="post" onsubmit="return validate(this);">
  <fieldset>
    <div class="formData">

      <label class="field" for="title">Movie Title:</label>
      <div class="value"><input type="text" size="60" value="<?php if($havePost && $errors != '') { echo $movieTitle; } ?>" name="title" id="title"/></div>

      <label class="field" for="year">Movie Year:</label>
      <div class="value"><input type="text" size="60" value="<?php if($havePost && $errors != '') { echo $movieYear; } ?>" name="year" id="year"/></div>

      <input type="submit" value="save" id="save" name="save"/>
    </div>
  </fieldset>
</form>

<h3>Movies</h3>
<table id="movieTable">
<?php
  if ($dbOk) {

    $query = 'select * from movies order by year';
    $result = $db->query($query);
    $numRecords = $result->num_rows;

    echo '<tr><th>Title:</th><th>Year:</th><th></th></tr>';
    for ($i=0; $i < $numRecords; $i++) {
      $record = $result->fetch_assoc();
      if ($i % 2 == 0) {
        echo "\n".'<tr id="movie-' . $record['movieid'] . '"><td>';
      } else {
        echo "\n".'<tr class="odd" id="movie-' . $record['movieid'] . '"><td>';
      }
      echo htmlspecialchars($record['title']);
      echo '</td><td>';
      echo htmlspecialchars($record['year']);
      echo '</td></tr>';

    }

    $result->free();

    $db->close();
  }

?>
</table>
<?php include('includes/foot.inc.php'); 
?>
