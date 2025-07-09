<?php
require('connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $id = $_GET['id'];

  $query = "DELETE FROM reviews WHERE `Review ID` = '$id'";
  $result = mysqli_query($connect, $query);

  if ($result) {
    header('Location: index.php');
    exit;
  } else {
    echo "Error deleting record: " . mysqli_error($connect);
  }
}
?>
