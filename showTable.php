<?php

require 'helpers/connect.php';
require 'helpers/vars.php';
require 'helpers/getColNames.php';
include 'helpers/top.php';

$query = "SELECT * FROM $database.$table ORDER BY id ASC";  
$result = $conn->query($query);

$html = "<h1>View All Bugs - $database $table</h1>"; 
$html .= "<table>";
$html .=  "<tr>";  
foreach ($fieldNames as $colName) {
	$html .=  "<th>";  
   	$html .=  $colName;  
	$html .=  "</th>";  
}
$html .=  "</tr>";  

if ($result->num_rows > 0) {

	while($row = mysqli_fetch_assoc($result)){ 
		$html .=  "<tr>";  
        	foreach ($fieldNames as $colName) {
			$html .= "<td>";  
			if($colName === "id" || $colName === "Id"){
				$html .= $row[$colName];

			} elseif ($colName === "Description"){
        			$html .= "<pre>";  

        			$html .= htmlspecialchars($row[$colName], ENT_QUOTES);
;  
        			$html .= "</pre>";  
			} else {
        			$html .= $row[$colName];  
			} 
			$html .= "</td>";  
		}
		$html .= "</tr>";  
	}  

}  

$html .= "</table>";



print $html;

include  'helpers/bottom.php';

?>



