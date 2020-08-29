<?php 
require_once('db.php');

  $query = "SELECT * FROM tasks";
  $result_list = mysqli_query($connection, $query);
?>