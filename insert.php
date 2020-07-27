<?php

require 'helpers/connect.php';
require 'helpers/vars.php';
include 'helpers/top.php'; 
include 'helpers/getColNames.php'; 

print "<h1>A11y Bug Entry Results $database $table</h1>"; 

$colValues = [];
$colNamesString;

$fieldnamesForQuery = array();

foreach ($fieldNames as $fieldname) {
	if($fieldname !== "id" && $fieldname !== "Id" ){
	$fieldname = "`".$fieldname."`";
      		array_push($fieldnamesForQuery, $fieldname); 
        }
}


foreach ($_POST as $colName => $colValue) {

        $colValue = htmlspecialchars($colValue, ENT_QUOTES);
	$colValue = '"' . $colValue . '"';
	array_push($colValues, $colValue);
}

$colNamesString = implode(',',$fieldnamesForQuery); 
$colValuesString = implode(',',$colValues); 

$query =  "INSERT INTO $database.$table (";
$query .= $colNamesString . ')';
$query .=  ' VALUES (';
$query .= $colValuesString . ')';

if ($result = mysqli_query($conn, $query)) {
	echo '<p>A new bug has been created</p>';
 } else {
        echo '<p class="error">The attempt to add a new bug has failed</p>';
        echo $query;
} 

include './helpers/bottom.php'; 

?>



