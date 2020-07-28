<?php

require 'helpers/connect.php';
require 'helpers/vars.php';
include 'helpers/top2.php'; 
include 'helpers/getColNames.php'; 

print "<h1>Table Creation - database:$database</h1>"; 

$newTable =  $_POST['newTable'];

$query =  "CREATE TABLE $database.$newTable LIKE $database.template";

if ($result = mysqli_query($conn, $query)) {
	echo "<p>$database.$newTable has been created</p>";
        $table = $newTable;
echo "<p><a href=\"./index.php?database=reporting&table=$newTable\">Go to $database.$newTable home page</a></p>";

 } else {
        echo "<p class=\"error\">Error: the attempt to create $database.$table  has failed</p>";
        echo $query;
        print "<p> $query </p>";
} 

include './helpers/bottom.php'; 

?>



