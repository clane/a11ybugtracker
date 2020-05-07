<?php

require 'helpers/connect.php';
require 'helpers/vars.php';

$getId = $_GET['id'];

$column_name = "WCAG Conformance Level";
$query = "SELECT `$column_name` FROM $database.$table WHERE id = \"$getId\"";
$result = $conn->query($query);
if ($result->num_rows > 0) {
   	while($row = mysqli_fetch_assoc($result)){
		$currentWcagLevel = $row[$column_name];
	} 
} 

$column_name = "WCAG Guideline";
$query = "SELECT `$column_name` FROM $database.$table WHERE id = \"$getId\"";
$result = $conn->query($query);
if ($result->num_rows > 0) {
   	while($row = mysqli_fetch_assoc($result)){
		$currentWcagGuideline = $row[$column_name];
	} 
}


?>
