<?php
$servername = "localhost";
$username = "root";
$password = "";
#$database = ""; 
$table = "testtable1"; 

if($_GET["database"]) {  
	$database = htmlspecialchars($_GET["database"]); 
} else {
	$database = "a11ybugtracker"; 
}

if($_GET["table"]) {  
	$table = htmlspecialchars($_GET["table"]); 
} else {
	$table = "testtable1"; 
}


?>



