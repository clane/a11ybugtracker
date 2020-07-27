<?php

require 'helpers/connect.php';
require 'helpers/vars.php';

$column_name = "WCAG Version";
$query = "SHOW COLUMNS FROM $database.$table WHERE Field=\"$column_name\"";

$result = $conn->query($query);

//clean up enough to explode the enum into an array
if ($result->num_rows > 0) {
   while($row = mysqli_fetch_assoc($result)){ 
        $versions = strval($row[Type]);  
        $pattern = '/enum/';
        $replacement = ''; 
        $versions =  preg_replace($pattern, $replacement, $versions);
        
   }
}

$wcagVersions = explode('\',', $versions);

//more cleanup

foreach ($wcagVersions as &$version) {
        $pattern = '/\(\'/';
        $replacement = ''; 
        $version =  preg_replace($pattern, $replacement, $version);
	$pattern = '/\'/';
        $replacement = ''; 
        $version  =  preg_replace($pattern, $replacement, $version);
        $pattern = '/NA\)/';
        $replacement = 'NA'; 
        $version  =  preg_replace($pattern, $replacement, $version);
        $pattern = '/\)/';
        $replacement = ''; 
        $version  =  preg_replace($pattern, $replacement, $version);

} 


?>
