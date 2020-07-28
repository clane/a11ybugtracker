<?php

require 'helpers/connect.php';
require 'helpers/vars.php';

$column_name = "Priority";
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

$priorities = explode('\',', $levels);


foreach ($priorities as &$priority) {
        $pattern = '/\(\'/';
        $replacement = ''; 
        $priority =  preg_replace($pattern, $replacement, $priority);
	$pattern = '/\'/';
        $replacement = ''; 
        $priority  =  preg_replace($pattern, $replacement, $priority);
        $pattern = '/NA\)/';
        $replacement = 'NA'; 
        $priority  =  preg_replace($pattern, $replacement, $priority);
        $pattern = '/\)/';
        $replacement = ''; 
        $priority  =  preg_replace($pattern, $replacement, $priority);

} 

?>
