<?php
$servername = "localhost";
$username = "root";
$password = "";

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


$pageTitle = "A11Y Bug Tracker";

if( preg_match('/index.php/', $_SERVER['REQUEST_URI'] )){
	$pageTitle .= " - Home"; 
}

if( preg_match('/enterForm.php/', $_SERVER['REQUEST_URI'] )){
	$pageTitle .= " - Entry Form"; 
}

if( preg_match('/showTable.php/', $_SERVER['REQUEST_URI'] )){
	$pageTitle .= " - View All Bugs"; 
}

if( preg_match('/manageTable.php/', $_SERVER['REQUEST_URI'] )){
	$pageTitle .= " - Manage All Bugs"; 
}

if( preg_match('/editForm.php/', $_SERVER['REQUEST_URI'] )){
	$pageTitle .= " - Bug Update Form"; 
}

if( preg_match('/update.php/', $_SERVER['REQUEST_URI'] )){
	$pageTitle .= " - Bug Update Status"; 
}

if( preg_match('/delete.php/', $_SERVER['REQUEST_URI'] )){
	$pageTitle .= " - Bug Deletion Status"; 
}

?>



