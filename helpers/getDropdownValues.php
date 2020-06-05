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

$column_name = "Status";
$query = "SELECT `$column_name` FROM $database.$table WHERE id = \"$getId\"";
$result = $conn->query($query);
if ($result->num_rows > 0) {
   	while($row = mysqli_fetch_assoc($result)){
		$currentStatus = $row[$column_name];
	} 
}


$column_name = "Component";
$query = "SELECT `$column_name` FROM $database.$table WHERE id = \"$getId\"";
$result = $conn->query($query);
if ($result->num_rows > 0) {
   	while($row = mysqli_fetch_assoc($result)){
		$currentComponent = $row[$column_name];
	} 
}

$column_name = "Severity";
$query = "SELECT `$column_name` FROM $database.$table WHERE id = \"$getId\"";
$result = $conn->query($query);
if ($result->num_rows > 0) {
   	while($row = mysqli_fetch_assoc($result)){
		$currentSeverity = $row[$column_name];
	} 
}

$column_name = "UAAT";
$query = "SELECT `$column_name` FROM $database.$table WHERE id = \"$getId\"";
$result = $conn->query($query);
if ($result->num_rows > 0) {
   	while($row = mysqli_fetch_assoc($result)){
		$currentUAAT = $row[$column_name];
	} 
}

$column_name = "OS";
$query = "SELECT `$column_name` FROM $database.$table WHERE id = \"$getId\"";
$result = $conn->query($query);
if ($result->num_rows > 0) {
   	while($row = mysqli_fetch_assoc($result)){
		$currentOS = $row[$column_name];
	} 
}

$column_name = "Noticeability";
$query = "SELECT `$column_name` FROM $database.$table WHERE id = \"$getId\"";
$result = $conn->query($query);
if ($result->num_rows > 0) {
   	while($row = mysqli_fetch_assoc($result)){
		$currentNoticeability = $row[$column_name];
	} 
}

$column_name = "Tractability";
$query = "SELECT `$column_name` FROM $database.$table WHERE id = \"$getId\"";
$result = $conn->query($query);
if ($result->num_rows > 0) {
   	while($row = mysqli_fetch_assoc($result)){
		$currentTractability = $row[$column_name];
	} 
}

?>
