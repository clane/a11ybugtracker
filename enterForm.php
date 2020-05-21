<?php
require 'helpers/connect.php';
require 'helpers/vars.php';
require 'helpers/getColNames.php'; 
require 'helpers/getWcagGuidelines.php'; 
require 'helpers/getWcagLevels.php'; 
require 'helpers/getStatuses.php'; 
require 'helpers/getClrComponents.php'; 
require 'helpers/getSeverities.php'; 
include  'helpers/top.php'; 

print "<h1>Enter a Bug into $database $table</h1>";  

$form = "<form action=\"insert.php?database=$database&table=$table\" method=\"post\">";

foreach ($fieldNames as &$fieldName) {
	if ($fieldName !== "id" && $fieldName !== "Id" ) {
		$form .= "<div>";
		$form .= "<label for='" . $fieldName . "'>" . $fieldName . "</label>";
		
		if($fieldName === "Description"){
			$form .= "<textarea id='" . $fieldName . "' name='" . $fieldName . "' rows=\"20\" cols=\"140\">";
                        $form .= "
[Test URL]
[WCAG 2.1 Guideline]
[WCAG Conformance Level (A,AA,AAA)]
[OS]
[User Agents/Assistive Technologies]
[Component]
[Description]
[User Impact]
[Severity (1 -10)]
[Steps to Reproduce]
[Recommendation]

			";


			$form .= "</textarea>";
		} elseif($fieldName === "WCAG Guideline"){
			$form .= "<select name=\"$fieldName\" id=\"$fieldName\">";
			foreach ($wcagGuidelines as &$guideline) {
				$form .= "<option value=\"$guideline\">$guideline</option>";
			} 
			$form .= '</select>';

		} elseif($fieldName === "WCAG Conformance Level"){
		 	$form .= "<select name=\"$fieldName\" id=\"$fieldName\">";
			foreach ($wcagLevels as &$level) {
				$form .= "<option value=\"$level\">$level</option>";
			} 
			$form .= '</select>';
		} elseif($fieldName === "Status"){
		 	$form .= "<select name=\"$fieldName\" id=\"$fieldName\">";
			foreach ($statuses as &$status) {
				$form .= "<option value=\"$status\">$status</option>";
			} 
			$form .= '</select>';
		} elseif($fieldName === "Component"){
		 	$form .= "<select name=\"$fieldName\" id=\"$fieldName\">";
			foreach ($clrComponents as &$component) {
				$form .= "<option value=\"$component\">$component</option>";
			} 
			$form .= '</select>';

		} elseif($fieldName === "Severity"){
		 	$form .= "<select name=\"$fieldName\" id=\"$fieldName\">";
			foreach ($severityLevels as &$severity) {
				$form .= "<option value=\"$severity\">$severity</option>";
			} 
			$form .= '</select>';


		} else {
			$form .= "<input type='text' id='" . $fieldName . "' name='" . $fieldName . "'>";
	 	}

		$form .= "</div>";
	}
}

$form .= "<input type='submit' value='Submit'></form>";

echo $form;

include  'helpers/bottom.php'; 

?>



