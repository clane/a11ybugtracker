<?php
require 'helpers/connect.php';
require 'helpers/vars.php';
require 'helpers/getColNames.php'; 
require 'helpers/getWcagGuidelines.php'; 
require 'helpers/getWcagLevels.php'; 
require 'helpers/getStatuses.php'; 
require 'helpers/getClrComponents.php'; 
require 'helpers/getDropdownValues.php'; 
require 'helpers/getSeverities.php'; 
require 'helpers/getUAATs.php'; 
require 'helpers/getOpSystems.php'; 
include  'helpers/top.php'; 


$getId = $_GET['id'];
$query =  "SELECT * FROM $database.$table WHERE id = $getId";
$result = $conn->query($query);

print "<h1>Edit Bug $getId in $database $table</h1>";  

if ($result->num_rows > 0) {

	while($row = mysqli_fetch_assoc($result)){ 

		$form = "<form action=\"update.php\" method=\"post\">";
		$form .= '<input type="hidden" name="id" value="' . $getId . '"' . '/>'; 
		$form .= '<input type="hidden" name="database" value="' . $database . '"' . '/>'; 
		$form .= '<input type="hidden" name="table" value="' . $table . '"' . '/>'; 

		foreach ($fieldNames as &$fieldName) {
			if ($fieldName !== "id" && $fieldName !== "Id" ) {
				$form .= "<div>";
				$form .= "<label for='" . $fieldName . "'>" . $fieldName . "</label>";
				
				if($fieldName === "Description"){
					$form .= "<textarea id='" . $fieldName . "' name='" . $fieldName . "' rows=\"20\" cols=\"140\">";
					$form .= $row[$fieldName];
					$form .= "</textarea>";
				} elseif($fieldName === "WCAG Guideline"){
					$form .= "<select name=\"$fieldName\" id=\"$fieldName\">";
					foreach ($wcagGuidelines as &$guideline) {
						if($guideline === $currentWcagGuideline){
							$form .= "<option value=\"$guideline\" selected>$guideline</option>";
						} else  { 
							$form .= "<option value=\"$guideline\">$guideline</option>";
						}
					} 
					$form .= '</select>';

				} elseif($fieldName === "WCAG Conformance Level"){
					$form .= "<select name=\"$fieldName\" id=\"$fieldName\">";
					foreach ($wcagLevels as &$level) {
						if($level === $currentWcagLevel){
							$form .= "<option value=\"$level\" selected>$level</option>";
						} else  { 
							$form .= "<option value=\"$level\">$level</option>";
						}
					} 
					$form .= '</select>';
				} elseif($fieldName === "Status"){
					$form .= "<select name=\"$fieldName\" id=\"$fieldName\">";
					foreach ($statuses as &$status) {
						if($status === $currentStatus){
							$form .= "<option value=\"$status\" selected>$status</option>";
						} else  { 
							$form .= "<option value=\"$status\">$status</option>";
						}
	
					} 
					$form .= '</select>';
				} elseif($fieldName === "Component"){
					$form .= "<select name=\"$fieldName\" id=\"$fieldName\">";
					foreach ($clrComponents as &$component) {
						if($component === $currentComponent){
							$form .= "<option value=\"$component\" selected>$component</option>";
						} else  { 
							$form .= "<option value=\"$component\">$component</option>";
						}
					} 
					$form .= '</select>';

				} elseif($fieldName === "Severity"){
					$form .= "<select name=\"$fieldName\" id=\"$fieldName\">";
					foreach ($severityLevels as &$severity) {
						if($severity === $currentSeverity){
							$form .= "<option value=\"$severity\" selected>$severity</option>";
						} else  { 
							$form .= "<option value=\"$severity\">$severity</option>";
						}
					} 
					$form .= '</select>';

				} elseif($fieldName === "UAAT"){
					$form .= "<select name=\"$fieldName\" id=\"$fieldName\">";

					foreach ($UAATs as &$uaat) {
						if($uaat === $currentUAAT){
							$form .= "<option value=\"$uaat\" selected>$uaat</option>";
						} else  { 
							$form .= "<option value=\"$uaat\">$uaat</option>";
						}
					} 
					$form .= '</select>';


				} elseif($fieldName === "OS"){
					$form .= "<select name=\"$fieldName\" id=\"$fieldName\">";

					foreach ($OpSystems as &$os) {
						if($os === $currentOS){
							$form .= "<option value=\"$os\" selected>$os</option>";
						} else  { 
							$form .= "<option value=\"$os\">$os</option>";
						}
					} 
					$form .= '</select>';

				} else {
					$form .= "<input type=\"text\" id=\"$fieldName\" name=\"$fieldName\" value=\"$row[$fieldName]\"/>";
				}

				$form .= "</div>";
			}
		}

	}

$form .= "<input type=\"submit\" value=\"Update Bug $getId\"></form>";

echo $form;

}

include  'helpers/bottom.php'; 

?>



