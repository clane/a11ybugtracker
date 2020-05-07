<?php
require './helpers/connect.php';
require './helpers/vars.php';

$query = "SELECT * FROM $database.$table";  
$result = $conn->query($query);
$fieldNames = array();

/* Get field information for all fields */
while ($finfo = mysqli_fetch_field($result)) {
  	array_push($fieldNames,$finfo->name);
}

mysqli_free_result($result);

?>



