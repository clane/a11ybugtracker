<?php

require 'helpers/connect.php';
require 'helpers/vars.php';

$column_name = "OS";
$query = "SHOW COLUMNS FROM $database.$table WHERE Field=\"$column_name\"";

$result = $conn->query($query);

//clean up enough to explode the enum into an array
if ($result->num_rows > 0) {
   while($row = mysqli_fetch_assoc($result)){ 
        $enumFromDB = strval($row[Type]);  
        $pattern = '/enum/';
        $replacement = ''; 
        $enumFromDB =  preg_replace($pattern, $replacement, $enumFromDB);
        
   }
}

$OpSystems  = explode('\',', $enumFromDB);

//more cleanup

foreach ($OpSystems as &$option) {
        $pattern = '/\(\'/';
        $replacement = ''; 
        $option = preg_replace($pattern, $replacement, $option);
	$pattern = '/\'/';
        $replacement = ''; 
        $option  =  preg_replace($pattern, $replacement, $option);
        $pattern = '/NA\)/';
        $replacement = 'NA'; 
        $option  =  preg_replace($pattern, $replacement, $option);
        $pattern = '/New in V3\)/';
        $replacement = 'New in V3'; 
        $option  =  preg_replace($pattern, $replacement, $option);

        $pattern = '/setBacklog/';
        $replacement = 'Backlog'; 
        $option  =  preg_replace($pattern, $replacement, $option);

        $pattern = '/setFixed/';
        $replacement = 'Fixed'; 
        $option  =  preg_replace($pattern, $replacement, $option);



} 

        $option = substr($option, 0, -1); //removing last )

?>
