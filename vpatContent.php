<?php
require 'helpers/connect.php';
require 'helpers/vars.php';
require 'helpers/getWcagGuidelines.php'; 
include  'helpers/top.php'; 

print "<h1>VPAT Content for  $database $table</h1>";  

foreach ($wcagGuidelines as &$guideline) {
	print "<h2>$guideline</h2>";
	$query = "SELECT Component, Headline FROM $database.$table WHERE `WCAG Guideline` = \"$guideline\" ORDER BY Component ASC";  
	$result = $conn->query($query);
	if (mysqli_num_rows($result) === 0){
		print "<p>";
		print "No issues to disclose in VPAT";
		print "</p>"; 
	} 
	while($row = mysqli_fetch_assoc($result)){
		print "<p>";
		print $row["Component"];
		print " - ";
		print $row["Headline"];
		print "</p>"; 
	} 
} 


include  'helpers/bottom.php'; 

?>



