<?php
$user = "root";
$password = "";
$database = "mySite";
$server = "localhost";

$loggedInUser = "test";


$dbOk = false;
@$conn = new mysqli($server, $user, $password, $database);

if ($conn->connect_error) {
  echo '<div class="messages">Could not connect to the database. Error: ';
  echo $conn->connect_errno . ' - ' . $conn->connect_error . '</div>';
} else {
  $dbOk = true;
}
