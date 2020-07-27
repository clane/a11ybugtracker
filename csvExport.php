<?php
require 'helpers/connect.php';
require 'helpers/vars.php';
require 'helpers/getColNames.php';
header('Content-Type: text/csv; charset=utf-8');  
$filename = $database . "_" . $table;
header("Content-Disposition: attachment; filename=$filename.csv");  
ob_clean();//fixes the blank lines problem
$output = fopen("php://output", "w"); 

fputcsv($output, $fieldNames); 

$query = "SELECT * FROM $database.$table ORDER BY id ASC";  
$result = $conn->query($query);

if ($result->num_rows > 0) {
	while($row = mysqli_fetch_assoc($result)){  
        	fputcsv($output, $row); 
	}  

}  

fclose($output); 

exit(); 

?>



