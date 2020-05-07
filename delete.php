<?php

require 'helpers/connect.php';
require 'helpers/vars.php';
include  'helpers/top.php'; 

$id =  $_GET['id'];

$query =  "DELETE FROM $database.$table WHERE id = $id";

// Perform a query, check for error
if (mysqli_query($conn, $query) && $id)
  {
  		echo("<p>Record id $id has been deleted from database $database table $table</p>");
  } else {
  		echo("<p class="/error/">ERROR: Query Failed</p>");
}


include './helpers/bottom.php';

?>
