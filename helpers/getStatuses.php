<?php

require 'helpers/connect.php';
require 'helpers/vars.php';

$column_name = "Status";
$query = "SHOW COLUMNS FROM $database.$table WHERE Field=\"$column_name\"";

$result = $conn->query($query);

//clean up enough to explode the enum into an array
if ($result->num_rows > 0) {
   while($row = mysqli_fetch_assoc($result)){ 
        $status = strval($row[Type]);  
        $pattern = '/enum/';
        $replacement = ''; 
        $status =  preg_replace($pattern, $replacement, $status);
        
   }
}

$statuses = explode('\',', $status);

//more cleanup

foreach ($statuses as &$status) {
        $pattern = '/\(\'/';
        $replacement = ''; 
        $status =  preg_replace($pattern, $replacement, $status);
	$pattern = '/\'/';
        $replacement = ''; 
        $status  =  preg_replace($pattern, $replacement, $status);
        $pattern = '/NA\)/';
        $replacement = 'NA'; 
        $status  =  preg_replace($pattern, $replacement, $status);
        $pattern = '/New in V3\)/';
        $replacement = 'New in V3'; 
        $status  =  preg_replace($pattern, $replacement, $status);

        $pattern = '/setBacklog/';
        $replacement = 'Backlog'; 
        $status  =  preg_replace($pattern, $replacement, $status);

        $pattern = '/setFixed/';
        $replacement = 'Fixed'; 
        $status  =  preg_replace($pattern, $replacement, $status);



} 


?>
