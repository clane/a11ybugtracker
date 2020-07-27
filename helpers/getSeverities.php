<?php

require 'helpers/connect.php';
require 'helpers/vars.php';

$column_name = "Severity";
$query = "SHOW COLUMNS FROM $database.$table WHERE Field=\"$column_name\"";

$result = $conn->query($query);

//clean up enough to explode the enum into an array
if ($result->num_rows > 0) {
   while($row = mysqli_fetch_assoc($result)){ 
        $levels = strval($row[Type]);  
        $pattern = '/enum/';
        $replacement = ''; 
        $levels =  preg_replace($pattern, $replacement, $levels);
        
   }
}

$severityLevels = explode('\',', $levels);

//more cleanup

foreach ($severityLevels as &$level) {
        $pattern = '/\(\'/';
        $replacement = ''; 
        $level =  preg_replace($pattern, $replacement, $level);
	$pattern = '/\'/';
        $replacement = ''; 
        $level  =  preg_replace($pattern, $replacement, $level);
        $pattern = '/NA\)/';
        $replacement = 'NA'; 
        $level  =  preg_replace($pattern, $replacement, $level);
        $pattern = '/\)/';
        $replacement = ''; 
        $level  =  preg_replace($pattern, $replacement, $level);


} 


?>
