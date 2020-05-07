<?php
$servername = "localhost";
$username = "root";
$password = "VMware1!";
#$database = "a11ybugtracker"; 
$table = "testtable1"; 

if($_GET["database"]) {  
	$database = htmlspecialchars($_GET["database"]); 
} elseif($_POST["database"]) {  
	$database = htmlspecialchars($_POST["database"]); 
} else {
	$database = "a11ybugtracker"; 
}

if($_GET["table"]) {  
	$table = htmlspecialchars($_GET["table"]); 
} elseif($_POST["table"]) {  
	$table = htmlspecialchars($_POST["table"]); 
} else {
	$table = "testtable1"; 
}


?>



