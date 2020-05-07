<?php

require 'helpers/connect.php';
require 'helpers/vars.php';

$column_name = "Component";
$query = "SHOW COLUMNS FROM $database.$table WHERE Field=\"$column_name\"";

$result = $conn->query($query);

//clean up enough to explode the enum into an array
if ($result->num_rows > 0) {
   while($row = mysqli_fetch_assoc($result)){ 
        $values = strval($row[Type]);  
        $pattern = '/enum/';
        $replacement = ''; 
        $values =  preg_replace($pattern, $replacement, $values);
   }
}

$clrComponents = explode('\',', $values);

//more cleanup

foreach ($clrComponents as &$component) {
        $pattern = '/\(\'/';
        $replacement = ''; 
        $component =  preg_replace($pattern, $replacement, $component);
	$pattern = '/\'/';
        $replacement = ''; 
        $component =  preg_replace($pattern, $replacement, $component);
        $pattern = '/NA\)/';
        $replacement = 'NA'; 
        $component =  preg_replace($pattern, $replacement, $component);

        $pattern = '/setDatagrid/';
        $replacement = 'Datagrid'; 
        $component =  preg_replace($pattern, $replacement, $component);

        $pattern = '/Timeline\)/';
        $replacement = 'Timeline'; 
        $component =  preg_replace($pattern, $replacement, $component);




} 




?>
