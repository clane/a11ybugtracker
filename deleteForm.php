<?php

require 'helpers/connect.php';
require 'helpers/vars.php';
require 'helpers/getColNames.php'; 
require 'helpers/getWcagGuidelines.php'; 
require 'helpers/getWcagLevels.php'; 
include  'helpers/top.php'; 


$getId = $_GET['id'];;

$pageTitle = 'Delete record id: ' . $getId;

$query =  "SELECT * FROM $database.$table WHERE id = $getId";

/* Select queries return a resultset */
if ($result = mysqli_query($conn, $query)) {

	$fieldValues = array();

	while ($row = mysqli_fetch_row($result)) {
		foreach ($row as $value) {
			array_push($fieldValues,$value);
		}


	}
    /* free result set */
    mysqli_free_result($result);

	echo "<h1>Delete Bug $getId $database $table</h1>";
	echo "<form action=\"delete.php\" method=\"get\">";
	echo '<input type="hidden" name="id" value="' . $getId . '"' . '/>'; 
	echo '<input type="hidden" name="database" value="' . $database . '"' . '/>'; 
	echo '<input type="hidden" name="table" value="' . $table . '"' . '/>'; 
	for ($i = 0; $i < count($fieldValues); $i++) {
	  if($fieldNames[$i] != 'id'){
	      echo '<div>';
	      echo '<span class="fieldNames">';
		  echo $fieldNames[$i];
	      echo ': ';
	  	  echo '</span>';
		  echo $fieldValues[$i];
	  	  echo '</div>';
	  } 
	}

	echo '<div>';
	echo "<input type=\"submit\" value=\"Delete Bug $getId\" />";
	echo '</div>';
	echo '</form>';

}  else {
  		echo("<p>Query Failed: " . $query . "</p>");
  		echo("<p>Error description: " . mysqli_error($conn) . "</p>");
}


include './helpers/bottom.php';

?>

