<?php
require 'helpers/pwd.php';

$servername = "localhost";
$username = "root";

if($_GET["database"]) {  
	$database = htmlspecialchars($_GET["database"]); 
} elseif($_POST["database"]) {  
	$database = htmlspecialchars($_POST["database"]); 
} else {
	$database = "reporting"; 
}

if($_GET["table"]) {  
	$table = htmlspecialchars($_GET["table"]); 
} elseif($_POST["table"]) {  
	$table = htmlspecialchars($_POST["table"]); 
} else {
	$table = "testtable1"; 
}


$pageTitle = "";

if( preg_match('/index.php/', $_SERVER['REQUEST_URI'] )){
	$pageTitle .= "Home"; 
}

if( preg_match('/enterForm.php/', $_SERVER['REQUEST_URI'] )){
	$pageTitle .= "Entry Form"; 
}

if( preg_match('/sortTable.php/', $_SERVER['REQUEST_URI'] )){
	$pageTitle .= "View All Bugs"; 
}

if( preg_match('/manageTable.php/', $_SERVER['REQUEST_URI'] )){
	$pageTitle .= "Manage All Bugs"; 
}

if( preg_match('/editForm.php/', $_SERVER['REQUEST_URI'] )){
	$pageTitle .= " Update Form"; 
}

if( preg_match('/update.php/', $_SERVER['REQUEST_URI'] )){
	$pageTitle .= " Update Status"; 
}

if( preg_match('/deleteForm.php/', $_SERVER['REQUEST_URI'] )){
	$pageTitle .= "Bug Deletion Form"; 
}
if( preg_match('/delete.php/', $_SERVER['REQUEST_URI'] )){
	$pageTitle .= "Bug Deletion Status"; 
}
if( preg_match('/newTableForm.php/', $_SERVER['REQUEST_URI'] )){
	$pageTitle .= "New Table Form"; 
}

if( !preg_match('/newTableForm.php/', $_SERVER['REQUEST_URI']) && !preg_match('/createTable.php/', $_SERVER['REQUEST_URI'])  ){
$pageTitle .= " - $database $table";
}


?>



