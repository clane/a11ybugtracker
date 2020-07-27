<?php

require 'helpers/connect.php';
require 'helpers/vars.php';
require 'helpers/getColNames.php';
include 'helpers/top.php';


$sortBy = $_POST["sortBy"];

$whereClause = " WHERE Status = \"Not Fixed in V3\" || Status = \"New in V3\"";

if($sortBy && $sortBy !=="" && $sortBy !=="Description" ){
	$sortBy = "`" . $sortBy . "`"; 
	$query = "SELECT * FROM $database.$table $whereClause ORDER BY $sortBy ASC";  
} else {
	$query = "SELECT * FROM $database.$table $whereClause ORDER BY id ASC";  
}


$result = $conn->query($query);

if($sortBy && $sortBy !==""){
	$html = "<h1>VPAT View - $database $table Sorted by $sortBy</h1>"; 
} else {
	$html = "<h1>VPAT View - $database $table Sorted by id</h1>"; 
}

$html .= "<form id=\"sortForm\" action=\"\" method=\"post\">";
$html .= '<input type="hidden" name="database" value="' . $database . '"' . '/>'; 
$html .= '<input type="hidden" name="table" value="' . $table . '"' . '/>'; 
$html .= "<label for=\"sortBy\">Sort by</label>";
$html .= "<select name=\"sortBy\" `id=\"sortBy\"/>";
foreach ($fieldNames as $sortCol) {
	if($sortCol !== "Description"){
		$html .=  "<option value=\"$sortCol\">";  
		$html .=  $sortCol;  
		$html .=  "</option>";
	} 
}
$html .= "</select>";
$html .= "<input type=\"submit\" value=\"Sort\">";
$html .= "</form>";



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



