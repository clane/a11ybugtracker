<?php

require 'helpers/connect.php';
require 'helpers/vars.php';

$column_name = "WCAG Success Criterion";
$query = "SHOW COLUMNS FROM $database.$table WHERE Field=\"$column_name\"";

$result = $conn->query($query);

//clean up enough to explode the enum into an array
if ($result->num_rows > 0) {
   while($row = mysqli_fetch_assoc($result)){ 
        $guidelines = strval($row[Type]);  
        $pattern = '/enum/';
        $replacement = ''; 
        $guidelines =  preg_replace($pattern, $replacement, $guidelines);
   }
}

$wcagGuidelines = explode('\',', $guidelines);

//more cleanup

foreach ($wcagGuidelines as &$guideline) {
        $pattern = '/\(\'/';
        $replacement = ''; 
        $guideline =  preg_replace($pattern, $replacement, $guideline);
	$pattern = '/\'/';
        $replacement = ''; 
        $guideline =  preg_replace($pattern, $replacement, $guideline);
        $pattern = '/NA\)/';
        $replacement = 'NA'; 
        $guideline =  preg_replace($pattern, $replacement, $guideline);

} 




?>
